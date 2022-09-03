<?php
namespace RalphServer\Group;

use RalphServer\Helpers\Util;


// Page reservé aux administrateurs
if((int) $server->getValue('GroupLevel') != 1){
    header('Location:/');
}

// Variable de status de Page : Elle permettent de definir quelle vue il faut choisir
$groupList = isset($params['action']) && $params['action'] === 'admin'; //Administration
$groupAdd = isset($params['action']) && $params['action'] === 'add'; //Ajout
$groupMod = isset($params['action']) && $params['action'] === 'mod'; //Modification


// Recuperation de la liste des groupes
$listGroup = GroupModel::getAll();

// Recuperer les données d'un groupe
if(isset($params['action']) && $params['action'] === 'mod'){
    $id = (int) $params['key'];

    $group = GroupModel::getById($id);

    if(empty($group)){
        echo '404';
        die;
    }

    $group = $group[0];
}

// Ajout de groupe
if(isset($_POST['add-group'])){

    if( Util::def($_POST['name']) && Util::def($_POST['level']) && Util::def($_POST['about'])){

        $name = htmlspecialchars(trim($_POST['name']));
        $level = (int) htmlspecialchars(trim($_POST['level']));
        $about = htmlspecialchars(trim($_POST['about']));

        // Ajouter le groupe
        $add = GroupModel::addGroup($name, $level, $about);

        $add = (true) ? header('Location: /group/add/added') : header('Location: /group/add/not-added') ;

    } else{
        $error = 'Veuillez remplir tous les champs !';
    }
}

// Modifier un groupe
if(isset($_POST['mod-group'])){

    if( Util::def($_POST['name']) && Util::def($_POST['level']) && Util::def($_POST['about']) && Util::def($_POST['id'])){

        $name = htmlspecialchars(trim($_POST['name']));
        $level = (int) htmlspecialchars(trim($_POST['level']));
        $id = (int) htmlspecialchars(trim($_POST['id']));
        $about = htmlspecialchars(trim($_POST['about']));

        // Modifier le groupe
        $mod = GroupModel::modGroup($id, $name, $about, $level);

        $mod = (true) ? header('Location: /group/admin') : header('Location: /group/mod/not-added') ;

    } else{
        $error = 'Veuillez remplir tous les champs !';
    }
}

// Suppression d'un groupe
if(isset($params['action']) && $params['action'] === 'del'){
    $id = (int) $params['key'];
    $del = GroupModel::delGroup($id);

    $del = (true) ? header('Location: /group/admin') : header('Location: /group/admin') ;
}



// Message de success
if(isset($params['key']) && $params['key'] === 'added'){
    $success = 'Groupe Ajouté avec Success !';
}

// Message d'echec'
if(isset($params['key']) && $params['key'] === 'not-added'){
    $error = 'Erreur lors de l\'ajout du groupe ! Veuillez reessayer.';
}