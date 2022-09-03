<?php

namespace RalphServer\Entities;

use RalphServer\Data\DataBase;


/**
 * Classe d'interaction entre la table Group de la Base de Donnée
 * @author Serge Mezui
 */
class Group {

    /**
     * Ajouter un groupe
     * @param string $name Nom du groupe
     * @param int $level Niveau du groupe
     * @param string $about Description du groupe
     * @return bool true si le groupe a été ajouté et false sinon
     */
    public static function addGroup(string $name, int $level, string $about) : bool
    {
        $add = DataBase::connect()->prepare('INSERT INTO `Group` (`Name`, `About`, `Level`, `created`, `modified`) VALUE(?,?,?, NOW(), NOW())');
        return $add->execute([$name, $about, $level]);
    }


    /**
     * Suprimer un groupe definitivement
     * @param int $id Identifiant du groupe a supprimer
     * @return bool true si le groupe a été suprimé et false sinon
     */
    private function delGroupRealy(int $id) : bool
    {
        $del = DataBase::connect()->prepare('DELETE FROM `Group` WHERE `id` = ?');
        return $del->execute([$id]);
    }

    /**
     * Suprimer un groupe
     * @param int $id Identifiant du groupe a supprimer
     * @return bool true si le groupe a été suprimé et false sinon
     */
    public static function delGroup(int $id) : bool
    {
        $del = DataBase::connect()->prepare('UPDATE `Group` SET `deleted` = 1 WHERE `id` = ?');
        return $del->execute([$id]);
    }
    
     /**
      * Modifier un groupe
      * @param int $id Identifiant du groupe a modifier
      * @param string $name Nouveau nom du groupe
      * @param string $about Nouvelle description du groupe
      * @param int $level Nouveau niveau du groupe
      * @return bool true si le groupe a été modifié et false sinon
      */
    public static function modGroup(int $id, string $name, string $about, int $level) : bool
    {
        $mod = DataBase::connect()->prepare('UPDATE `Group` SET `Name` = ?, `About` = ?, `Level` = ?, `modified` = NOW() WHERE id = ?');
        return $mod->execute([$name, $about, $level, $id]);
    }

    /**
     * Renvoi la liste des groupes rangé par id
     * @return array Tableau des groupes rangé par id
     */
    public static function getAll() : array
    {
        return DataBase::connect()->query('SELECT `id`, `Name`, `About`, `Level`, `created` FROM `Group` WHERE `deleted` = 0 ORDER BY `id`')->fetchAll();
    }

    /**
     * Renvoi un groupe avec son id
     * @param int $id Identifiant du groupe
     * @return array Tableau du groupe selectionné
     */
    public static function getById(int $id) : array
    {
        $group = DataBase::connect()->prepare('SELECT `id`, `Name`, `About`, `Level`, `created` FROM `Group` WHERE `deleted` = 0 AND `id` = ?');

        return $group->execute([$id]) ? $group->fetchAll() : false;
    }

    public static function getGroupLevel(int $id) : string
    {
        $group = DataBase::connect()->prepare('SELECT `Level` FROM `Group` WHERE `deleted` = 0 AND `id` = ?');

        return $group->execute([$id]) ? $group->fetchAll()[0]['Level'] : false;
    }


    public static function getNameById(int $id) : string
    {
        $group = DataBase::connect()->prepare('SELECT `Name` FROM `Group` WHERE `deleted` = 0 AND `id` = ?');

        return $group->execute([$id]) ? $group->fetchAll()[0]['Name'] : false;
    }

}