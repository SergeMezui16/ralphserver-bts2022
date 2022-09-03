<?php

namespace RalphServer\Entities;

use RalphServer\Data\DataBase;
use RalphServer\Helpers\Util;


/**
 * Classe d'interaction avec la table User de la Base de Donnée
 * @author Serge Mezui
 */
class User {

    /**
     * Ajouter un utilisateur
     * @param string $email Adresse email de l'utilisateur
     * @param string $name Nom de l'utilisateur
     * @param string $password Mot de passe de l'utilisateur
     * @param int $group Groupe de l'utilisateur
     */
    public static function addUser(string $email, string $name, string $password, int $group) : bool
    {
        $add = DataBase::connect()->prepare('INSERT INTO `user` (`Email`, `Name`, `Password`, `Group`, `created`) VALUE(?,?,?,?, NOW())');
        return $add->execute([$email, $name, Util::hash($password), $group]);
    }

    /**
     * Suprimer un utilisateur
     * @param int $id Identifiant de l'utilisateur a supprimer
     * @return bool true si l'utilisateur a été suprimé et false sinon
     */
    private function delUserRealy(int $id) 
    {
        $del = DataBase::connect()->prepare('DELETE FROM `user` WHERE `id` = ?');
        return $del->execute([$id]);
    }

    /**
     * Suprimer un utilisateur
     * @param int $id Identifiant de l'utilisateur a supprimer
     * @return bool true si l'utilisateur a été suprimé et false sinon
     */
    public static function delUser(int $id) 
    {
        $del = DataBase::connect()->prepare('UPDATE `user` SET `deleted` = 1 WHERE `id` = ?');
        return $del->execute([$id]);
    }

    /**
     * Modifier un utilisateur
     * @param int $id Identifiant de l'utilisateur
     * @param string $name Nom de l'utilisateur
     * @param string $birth Date de naissance de l'utilisateur
     * @param string $email Adresse email de l'utilisateur
     * @param string $phone Numero de telephone de l'utilisateur
     * @param string $job Travail de l'utilisateur
     * @param string $sex Sex de l'utilisateur
     * @param string $about Description de l'utilisateur
     * @return bool true si l'utilisateur a été modifié et false sinon
     */
    public static function modUser(int $id, string $name, string $birth, string $email, string $phone, string $job, string $sex, string $about) : bool
    {
        $mod = DataBase::connect()->prepare('UPDATE `user` SET `Name` = ?, `Birth` = ?, `Email` = ?, `Phone` = ?, `Job` = ?, `Sex` = ?, `About` = ?, `modified` = NOW()  WHERE `id` = ?');
        return $mod->execute([$name, $birth, $email, $phone, $job, $sex, $about, $id]);
    }

    /**
     * Modifier un utilisateur en tant qu'administrateur
     * @param int $id Identifiant de l'utilisateur
     * @param string $name Nom de l'utilisateur
     * @param string $email Adresse email de l'utilisateur
     * @param string $password Mot de passe de l'utilisateur
     * @param int $group Groupe de l'utilisateur
     * @return bool true si l'utilisateur a été modifié et false sinon
     *
     */
    public static function modUserAdmin(int $id, string $name, string $email, int $group) : bool
    {
        $mod = DataBase::connect()->prepare('UPDATE `user` SET `Name` = ?, `Email` = ?, `Group` = ?, `modified` = NOW()  WHERE `id` = ?');
        return $mod->execute([$name, $email, $group, $id]);
    }


    /**
     * Liste des Utilisateurs
     * @return array Tableau des utilisateurs rangé par id
     */
    public static function getAll() : array
    {
        return DataBase::connect()->query('SELECT `id`, `Name`, `Birth`, `Email`, `Password`, `Phone`, `Job`, `Sex`, `About`, `Group`, `created` FROM `user` WHERE `deleted` = 0 ORDER BY `id`')->fetchAll();
    }

    /**
     * Renvoi un utilisateur avec son id
     * @param int $id Identifiant de l'utilisateur
     * @return array Tableau de l'utilisateur selectionné
     */
    public static function getById(int $id) : array
    {
        $user = DataBase::connect()->prepare('SELECT `id`, `Name`, `Birth`, `Email`, `Password`, `Phone`, `Job`, `Sex`, `About`, `Group` FROM `user` WHERE `deleted` = 0 AND `id` = ? LIMIT 1');

        return $user->execute([$id]) ? $user->fetchAll() : false;
    }

    /**
     * Renvoi un utilisateur avec son email
     * @param string Email de l'utilisateur
     * @return array Tableau de l'utilisateur selectionné
     */
    public static function getByEmail(string $email) : array
    {
        $user = DataBase::connect()->prepare('SELECT `id`, `Name`, `Birth`, `Email`, `Password`, `Phone`, `Job`, `Sex`, `About`, `Group`, `Avatar`  FROM `user` WHERE `deleted` = 0 AND `Email` = ?');

        return $user->execute([$email]) ? $user->fetchAll() : false;
    }

    
    public static function setAvatar(string $name, string $id) : bool{
        $avatar = DataBase::connect()->prepare('UPDATE `user` SET `Avatar` = ?, `modified` = NOW()  WHERE `id` = ?');
        return $avatar->execute([$name, $id]);
    }

    public static function setPassword(string $password, string $id) : bool{
        $avatar = DataBase::connect()->prepare('UPDATE `user` SET `Password` = ?, `modified` = NOW()  WHERE `id` = ?');
        return $avatar->execute([Util::hash($password), $id]);
    }

}