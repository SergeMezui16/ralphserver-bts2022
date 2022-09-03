<?php
namespace RalphServer\Account;


class Session {


    public function __construct()
    {
        self::init();
    }


    /**
     * Demare une session
     * @return bool
     */
    public static function init() : bool
    {
        if(!session_id()){
            session_start();
            session_regenerate_id(true);
            return true;
        }

        return false;
    }

    /**
     * Ferme une session
     * @return bool
     */
    public static function clean() : bool
    {
        Cookies::unset('email');
        Cookies::unset('password');

        return session_unset() && session_destroy();
    }

    /**
     * Ajouter une variable de session
     * @param string $var Clé du tableau
     * @param $value Valeur 
     * @return void
     */
    public static function bindValue($var, $value) : void
    {
        $_SESSION[$var] = $value;
    }

    public static function getValue($var) : ?string
    {
        return $_SESSION[$var];
    }
}