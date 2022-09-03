<?php
namespace RalphServer\Account;


class Cookies {

    /**
     * Creer ou modifier un cookie valide un an
     * @param string $name Nom du cookie
     * @param string|int $value Valeur du cookie
     * @return bool
     */
    public static function setCookie(string $name, $value) : bool
    {
        return setcookie($name, $value, time()+365*24*3600, '/');
    }

    /**
     * Recuperer la valeur d'un cookie
     * @param string $name Nom du cookie
     * @return string
     */
    public static function getCookie(string $name) : string
    {
        return $_COOKIE[$name];
    }


    /**
     * Detruire un cookie
     * @param string $name Nom du cookie
     * @return bool
     */
    public static function unset($name) : bool
    {
        return setcookie($name, '', time()-3600);
    }
}

