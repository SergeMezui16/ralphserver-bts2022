<?php
namespace RalphServer;

use RalphServer\Helpers\Util;
use RalphServer\Entities\User;
use RalphServer\Entities\Group;
use RalphServer\Account\Account;

if(Account::isLogged()){
    header('Location: /');
}



// Conexion avec cookies
if(!$ralph->isLogged() && isset($_COOKIE['email'], $_COOKIE['password'])) {

    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    $user = User::getByEmail($email);

    if(count($user) == 1){

        if($password == $user[0]['Password']){

            $server->bindValue('id', $user[0]['id']);
            $server->bindValue('Name', $user[0]['Name']);
            $server->bindValue('Email', $user[0]['Email']);
            $server->bindValue('Group', $user[0]['Group']);
            $server->bindValue('Avatar', $user[0]['Avatar']);
            $server->bindValue('GroupLevel', (int) Group::getGroupLevel($user[0]['Group']));

            header('Location: /');

        }

    }

}


// Connexion
if(isset($_POST['connexion'])){

    if(Util::def($_POST['email']) && Util::def($_POST['password'])){
        
        $email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));

        $user = User::getByEmail($email);

        if(count($user) == 1){

            if(password_verify($password, $user[0]['Password'])){

                if(isset($_POST['remember-me'])){
                    $_cookie->setCookie('email', $email);
                    $_cookie->setCookie('password', $user[0]['Password']);
                }

                $server->bindValue('id', $user[0]['id']);
                $server->bindValue('Name', $user[0]['Name']);
                $server->bindValue('Email', $user[0]['Email']);
                $server->bindValue('Group', $user[0]['Group']);
                $server->bindValue('Avatar', $user[0]['Avatar']);
                $server->bindValue('GroupLevel', (int) Group::getGroupLevel($user[0]['Group']));

                header('Location: /');

            } else {
                $error = 'Email ou mot de passe incorect';
            }

        } else {
            $error = 'Email ou mot de passe incorect';
        }
   
    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}