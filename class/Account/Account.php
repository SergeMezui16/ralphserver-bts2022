<?php
namespace RalphServer\Account;


class Account {

    /**
     * Verifie si l'utilisateur est connecté
     * @return bool
     */
    public static function isLogged() : bool 
    {
        return (session_id() && isset($_SESSION['id'])) ? true : false;
    }

    /**
     * Verifie si c'est son anniversaire
     * @return bool
     */
    public static function isBirthday(string $day) : bool
    {
        $today = date('m-d');
        $birthday = explode( '-', explode(' ',$day)[0])[1].'-'.explode( '-', explode(' ',$day)[0])[2];
    
        return $today == $birthday;
    }


    public static function tryConnectWithCookies()
    {
        
    }
    
}