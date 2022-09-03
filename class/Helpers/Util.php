<?php

namespace RalphServer\Helpers;

use RalphServer\Constants;
use RalphServer\Entities\User;

class Util {

    /**
     * Génère un mot de passe hashé 
     * @param string $password Chaine a hasher
     * @return string Resultat hashé
     */
    public static function hash(string $password) : string 
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Génère une clé unique haché
     * @return string clé hashé
     */
    public static function genUniqKey() : string
    {
        return str_replace(Constants::ARCHIVE_INVALID_SPECIAL_CHAR, '',password_hash(uniqid(), PASSWORD_DEFAULT));
    }

    /**
     * Verifie qu'une variable est defini et qu'elle n'est pas vide
     * @param $var Variable a analyser
     * @return bool 
     */
    public static function def($var) : bool
    {
        // return (isset($var) && !empty($var)) ? true : false;

        if(isset($var) && !empty($var))
            return true;
        return false;
    }


    /**
     * Affiche le contenu d'une variable si elle existe et si elle n'est pas vide
     * @param ?string $param Variable a analyser et a afficher
     * @return string
     */
    public static function post(?string $var) : string
    {
        return (self::def($var)) ? $var : '';
    }

    /**
     * Renvoi une chaine en remplacant les caracteres speciaux en underscore (_)
     * @param string $fileName Chaine a transformer
     * @return string 
     */
    public static function toFileNameFormat($fileName) : string
    {
        return strtolower(self::replaceAccent(str_replace(Constants::ARCHIVE_INVALID_SPECIAL_CHAR, '_', $fileName)));
    }


    /**
     * Remplace les caracteres accentués par leurs equivalents non accentués
     * @param string $string Chaine
     * @return string
     */
    public static function replaceAccent(string $string) : string
    {
        return str_replace(Constants::ACCENT_CHAR, Constants::NON_ACCENT_CHAR, $string);
    } 


    public static function arrayToString(array $tab) : string
    {
        $string = '';
        foreach($tab as $t){
            $string .= $t . ', ';
        }
        return substr($string, 0, -2);
    }


    public static function jsonToSringUserId(string $json) : string
    {
        $tab =  json_decode($json);
        $rec = [];

        for ($i=0; $i < count($tab); $i++) { 
            if(isset(User::getById((int) $tab[$i])[0]['Name'])){
                $rec[$i] = User::getById((int) $tab[$i])[0]['Name'];
            }
        }       

        return Util::arrayToString($rec);
    }
}