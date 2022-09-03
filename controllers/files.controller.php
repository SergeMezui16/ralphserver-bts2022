<?php

namespace RalphServer\File;

use RalphServer\Helpers\Util;
use RalphServer\Entities\Group;


// Id de la session
$id = $server->getValue('id');

// Groupe de la session
$_group = $server->getValue('Group');

// Recuperation de la liste des fichiers
$listFile = FileModel::getAll();

// Recuperation de la liste des groupes
$listGroup = Group::getAll();

// Recuperation des fichiers partagés
$sharedFiles = FileModel::getSharedFiles($id);

// Recuperation de mes fichiers
$myFiles = FileModel::getMyFiles($id);


// Recuperer les données d'un fichier
if(isset($params['action']) && $params['action'] === 'mod'){
    $key = $params['key'];

    $file = FileModel::getByKey($key);

    if(empty($file)){
        echo '404';
        die;
    }

    $file = $file[0];

    $right = json_decode($file['Right']);

}

// Variable de status de Page : Elle permettent de definir quelle vue il faut choisir
// $groupList = isset($params['action']) && $params['action'] === 'admin'; //Administration
$fileAdd = isset($params['action']) && $params['action'] === 'add'; //Ajout
$fileMod = isset($params['action']) && $params['action'] === 'mod'; //Modification
$fileMine = isset($params['action']) && $params['action'] === 'mine'; //Mes fichiers
$fileShare = isset($params['action']) && $params['action'] === 'share'; //Fichiers partagés
$allFile = isset($params['action']) && $params['action'] === 'all'; //Tous les fichiers



// Ajout un fichier
if(isset($_POST['addFile']) && isset($_FILES['file'])){

    if(Util::def($_POST['name']) && isset($_POST['status']) && Util::def($_POST['group']) && Util::def($_POST['note'])){

        $name = htmlspecialchars(trim($_POST['name']));
        $status = (bool) $_POST['status'];
        $group = $_POST['group'];
        $note = htmlspecialchars(trim($_POST['note']));

        $fileName = $_FILES['file']['name'];
        $file = $_FILES['file']['tmp_name'];
        $fError = $_FILES['file']['error'];

        $saveName = FileModel::setSaveName($fileName, $name);

        $path = FileModel::setPathName($saveName);

        if(!$fError){

            // Stocke du fichier
            $archive = FileModel::archiveFile($file, $path);

            if($archive){

                // Enregistrement
                $save = FileModel::saveFile($name, $saveName, $id, $note, $group, $status);
                $save ? header('Location: /file/add/added') : header('Location: /file/add/not-added');
            } else {
                $error = 'Une erreur est survenu lors de l\'archivage du fichier, veuillez reessayer.';
            }


        } else{
            $error = 'Une erreur est survenu lors de l\'archivage du fichier, veuillez reessayer.';
        }
        


    } else {
        $error = 'Veuillez remplir tous les champs !';
    }

}


// Modifier un fichier
if(isset($_POST['mod-file'])){

    if(isset($_POST['status']) && Util::def($_POST['group']) && Util::def($_POST['note'])){

        $key = $params['key'];
        $status = (int) $_POST['status'];
        $group = $_POST['group'];
        $note = $_POST['note'];

        // Modifier le fichier
        $mod = FileModel::modFile($key, $status, $group, $note);

        $mod ? header('Location: /file/mine') : header('Location: /file/mod/not-added') ;

    } else{
        $error = 'Veuillez remplir tous les champs !';
    }
}

// Suppression d'un fichier
if(isset($params['action']) && $params['action'] === 'del'){
    $key = $params['key'];

    $del = FileModel::delFile($key);

    $del ? header('Location: /file/mine') : header('Location: /file/mine') ;
}


// Message de success
if(isset($params['key']) && $params['key'] === 'added'){
    $success = 'Fichier Ajouté avec Success !';
}

// Message d'echec'
if(isset($params['key']) && $params['key'] === 'not-added'){
    $error = 'Erreur lors de l\'ajout du fichier ! Veuillez reessayer.';
}