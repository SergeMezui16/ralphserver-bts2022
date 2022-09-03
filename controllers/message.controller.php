<?php
namespace RalphServer\Message;

use RalphServer\Helpers\Util;
use RalphServer\Entities\User;


// Variable de status de Page : Elle permettent de definir quelle vue il faut choisir
$list = isset($params['action']) && $params['action'] === 'list' ; //Liste
$new = isset($params['action']) && $params['action'] === 'new'; //Nouveau
$delMessage = isset($params['action']) && $params['action'] === 'del'; //Supprimer

// Recuperation de la liste des utilisateurs
$listUser = User::getAll();

// Id de la session
$id = (int) $server->getValue('id');

// Liste des messages
$listMessage = MessageModel::getAll();


// Envoyer un message
if(isset($_POST['send-message'])){

    if(Util::def($_POST['object']) && Util::def($_POST['user']) && Util::def($_POST['content'])){

        $object = htmlspecialchars(trim($_POST['object']));
        $recipient = $_POST['user'];
        $content = $_POST['content'];

        $send = MessageModel::addMessage($object, $id, $recipient, $content);

        $send ? $success = 'Message envoyé avec success !' : $error = 'Erreur lors de l\'envoie du message';

    } else {
        $error = 'Veuillez remplir tous les champs';
    }
}


// Supprimer un message
if($delMessage){
    $idMessage = (int) $params['key'];
    MessageModel::delMessage($idMessage);

    header('Location: /message/list');
}