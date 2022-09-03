<?php

// information de configuration de la BD
$DB_DSN = 'mysql:host=localhost;dbname=ralphserver;charset=utf8'; // URL de la BD avec des ';' a la place des '/'
$DB_USER = 'serge'; // nom d'utilisateur de la BD
$DB_PSW = 'sergemezui16'; //mot de passe de la BD

// options de connexion
$BD_options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // garder l'encodage de la BD
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // le mode d'affichage des erreurs
    PDO::ATTR_PERSISTENT => false, // pour garder la connexion persistante (true)
    PDO::ATTR_EMULATE_PREPARES => false // eviter l'emulation (simulation) des requettes preparee
];