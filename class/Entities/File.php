<?php
namespace RalphServer\Entities;

use RalphServer\Constants;
use RalphServer\Data\DataBase;
use RalphServer\Helpers\Util;

class File {
    
    /**
     * Ajouter un ficher
     * @param string $name Nom du fichier
     * @param string $path chemin du fichier
     * @param int $owner id de l'auteur
     * @param string $note Description
     * @param array $group id des groupes ayant acces
     * @param bool $status Privé/Public
     * @return bool
     */
    public static function saveFile(string $name, string $path, int $owner, string $note, array $group, bool $status) : bool
    {
        $save = DataBase::connect()->prepare('INSERT INTO `file` (`Name`, `Key`, `Path`, `Owner`, `Type`, `Download`, `Note`, `Right`, `Status`, `created`, `modified`, deleted) VALUES(?,?,?,?,?,?,?,?,?, NOW(), NOW(), 0)');

        return $save->execute([$name, Util::genUniqKey(), $path, $owner, 1, 0,$note, json_encode($group), $status]);
    }

    /**
     * Supprimer un fichier
     * @param string $key Clé du fichier
     * @return bool
     */
    public static function delFile(string $key) : bool
    {
        $del = DataBase::connect()->prepare('UPDATE `file` SET `deleted` = 1 WHERE `Key` = ?');
        return $del->execute([$key]);
    }

    /**
     * Modifier un fichier
     * @param string $key Clé du fichier
     * @param bool $status Privé/Public
     * @param array $group id des groupes ayant acces
     * @param string $note Description
     */
    public static function modFile(string $key, bool $status, array $group, string $note) : bool
    {
        $mod = DataBase::connect()->prepare('UPDATE `file` SET `Status` = ?, `Right` = ?, `Note` = ?, `modified` = NOW() WHERE `Key` = ?');
        return $mod->execute([$status, json_encode($group), $note, $key]);
    }

    /**
     * Récuperer la liste des fichiers
     * @return array Tableau de fichier
     */
    public static function getAll() : array
    {
        return DataBase::connect()->query('SELECT `id`, `Name`, `Key`, `Path`, `Owner`, `Type`, `Download`, `Note`, `Right`, `Status`, `modified`, `created` FROM `file` WHERE `deleted` = 0 AND `Status` = 0 ORDER BY modified DESC')->fetchAll();
    }


    /**
     * Renvoi un fichier avec sa clé
     * @param string $key Clé du fichier
     * @return array Tableau du groupe selectionné
     */
    public static function getByKey(string $key) : array
    {
        $file = DataBase::connect()->prepare('SELECT `id`, `Name`, `Key`, `Path`, `Owner`, `Type`, `Download`, `Note`, `Right`, `Status`, `modified`, `created` FROM `file` WHERE `deleted` = 0 AND `Key` = ?');
        return $file->execute([$key]) ? $file->fetchAll() : false;
    }

    /**
     * Recuperer les fichiers d'un utilisateur
     * @param int $id Identifiant de l'utilisateur
     * @return array 
     */
    public static function getMyFiles(int $id) : array
    {
        $file = DataBase::connect()->prepare('SELECT `id`, `Name`, `Key`, `Path`, `Owner`, `Type`, `Download`, `Note`, `Right`, `Status`, `modified`, `created` FROM `file` WHERE `deleted` = 0 AND `Owner` = ? ORDER BY modified DESC');
        return $file->execute([$id]) ? $file->fetchAll() : false;
    }

    /**
     * Recuperer les fichiers partagés
     * @param int $id Identifiant de l'utilisateur
     * @return array 
     */
    public static function getSharedFiles(int $id) : array
    {
        $file = DataBase::connect()->prepare('SELECT `id`, `Name`, `Key`, `Path`, `Owner`, `Type`, `Download`, `Note`, `Right`, `Status`, `modified`, `created` FROM `file` WHERE `deleted` = 0 AND `Owner` != ? AND `Status` = 0 ORDER BY modified DESC');
        return $file->execute([$id]) ? $file->fetchAll() : false;
    }



    /**
     * Recupere l'extention d'un fichier
     * @param string $file Fichier a extraire l"estention
     * @return string 
     */
    public static function getExtension(string $file) : string
    {
        return strtolower(substr(strrchr($file, '.'), 1));
    }

    /**
     * Archive le fichier sur le serveur
     * @param string $file tmp_name du fichier a archiver
     * @param string $path Chemin du fichier
     * @return bool
     */
    public static function archiveFile(string $file, string $path) : bool
    {                
        return move_uploaded_file($file, $path);
    }

    /**
     * Edite un chemin de fichier
     * @param string $saveName nom du fichier envoyé au serveur
     * @return string
     */
    public static function setPathName(string $saveName) : string
    {
        return Constants::ARCHIVE_PATH . $saveName;
    }

    /**
     * Edite le nom de fichier a enregistrer
     * @param string $fileName nom du fichier envoyé au serveur
     * @param string $name Nom d'archive donné par le proprietaire
     * @return string
     */
    public static function setSaveName(string $fileName, string $name) : string
    {
        return Util::toFileNameFormat($name) . '-' . Constants::POJECTNAME . '-' . uniqid() . '.' . self::getExtension($fileName);
    }


    public static function hasRight(int $group, string $json) : bool
    {
        return in_array($group, json_decode($json)) ? true : false;
    }

}

