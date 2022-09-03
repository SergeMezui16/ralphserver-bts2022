<?php

namespace RalphServer\Data;

use PDO;
use PDOException;
/**
 * Class DataBase
 * Permet de se connecter a la base de donnée
 */
class DataBase {
    
    /**
     * URL de la Base de donnée
     */
    private const DB_DSN = "mysql:host={host};dbname=ralphserver;charset=utf8";
        
    /**
     * Nom d'utilisateur de la Base de donnée
     */
    private const DB_USER = '{user}';

    /**
     * Mot de passe de la Base de donnée
     */
    private const DB_PSW = '{password}';


    /**
     * Options de connexion
     */
    private const DB_OPS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // garder l'encodage de la BD
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // le mode d'affichage des erreurs
        PDO::ATTR_PERSISTENT => false, // pour garder la connexion persistante (true)
        PDO::ATTR_EMULATE_PREPARES => false // eviter l'emulation (simulation) des requettes preparee
    ];

    /**
     * Methode qui initie une connexion
     * @return ?PDO
     */
    public static function connect() : ?PDO
    {
        try{
            return new PDO(self::DB_DSN, self::DB_USER, self::DB_PSW, self::DB_OPS);

        } catch(PDOException $e){
            return false;
        }
    }
}