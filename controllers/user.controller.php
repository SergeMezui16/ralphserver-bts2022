<?php

namespace RalphServer\User;


use RalphServer\Helpers\Util;
use RalphServer\Entities\Group;

// Page reservé aux administrateurs
if((int) $server->getValue('GroupLevel') != 1){
    header('Location:/');
}


// Variable de status de Page : Elle permettent de definir quelle vue il faut choisir
$userList = isset($params['action']) && $params['action'] === 'admin'; //Administration
$userAdd = isset($params['action']) && $params['action'] === 'add'; //Ajout
$userMod = isset($params['action']) && $params['action'] === 'mod'; //Modification


// Recuperation de la liste des utilisateurs
$listUser = UserModel::getAll();

// Recuperation de la liste des groupes
$listGroup = Group::getAll();

// Recuperer les données d'un utilisateur
if(isset($params['action']) && $params['action'] === 'mod'){
    $id = (int) $params['key'];

    $user = UserModel::getById($id);

    if(empty($user)){
        echo '404';
        die;
    }

    $user = $user[0];
}

// Ajout d'utilisateur
if(isset($_POST['add-user'])){

    if( Util::def($_POST['email']) && Util::def($_POST['name']) && Util::def($_POST['password']) && Util::def($_POST['group'])){

        $email = htmlspecialchars(trim($_POST['email']));
        $name = htmlspecialchars(trim($_POST['name']));
        $password = htmlspecialchars(trim($_POST['password']));
        $group = (int) htmlspecialchars(trim($_POST['group']));

        // Ajouter l'utilisateur
        $add = UserModel::addUser($email, $name, $password, $group);

        $add = (true) ? header('Location: /user/add/added') : header('Location: /user/add/not-added') ;

    } else{
        $error = 'Veuillez remplir tous les champs !';
    }
}

// Modifier un utilisateur
if(isset($_POST['mod-user'])){

    if( Util::def($_POST['id']) && Util::def($_POST['email']) && Util::def($_POST['name']) && Util::def($_POST['group'])){
        
        $id = (int) htmlspecialchars(trim($_POST['id']));
        $email = htmlspecialchars(trim($_POST['email']));
        $name = htmlspecialchars(trim($_POST['name']));
        $group = (int) htmlspecialchars(trim($_POST['group']));

        // Modifier l'utilisateur
        $mod = UserModel::modUserAdmin($id,  $name, $email, $group);

        $mod = (true) ? header('Location: /user/admin') : header('Location: /user/mod/not-added');

    } else{
        $error = 'Veuillez remplir tous les champs !';
    }
}

// Changer le mot de passe
if(isset($_POST['change-pwd'])){
    if(Util::def($_POST['newpassword']) && Util::def($_POST['renewpassword'])){

        if($_POST['newpassword'] == $_POST['renewpassword']){
            $new = htmlspecialchars(trim($_POST['newpassword']));
            
            UserModel::setPassword($new, $id);
            $success = 'Mot de passe mis a jour avec succes.';

        }else{
            $error = 'Les mot de passe ne sont pas identique';
        }
    }
}

// Suppression d'un utilisateur
if(isset($params['action']) && $params['action'] === 'del'){
    $id = (int) $params['key'];
    $del = UserModel::delUser($id);

    $del = (true) ? header('Location: /user/admin') : header('Location: /user/add/not-added');
}


// Message de success
if(isset($params['key']) && $params['key'] === 'added'){
    $success = 'Utilisateurs Ajouté avec Success !';
}

// Message d'echec'
if(isset($params['key']) && $params['key'] === 'not-added'){
    $error = 'Erreur lors de l\'ajout de l\'utilisateurs ! Veuillez reessayer.';
}