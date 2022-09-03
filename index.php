<?php 
namespace RalphServer;
require 'vendor/autoload.php';


use AltoRouter;

use RalphServer\Account\Account;
use RalphServer\Account\Cookies;
use RalphServer\Account\Session;
use RalphServer\Helpers\DateFormat;
use RalphServer\Constants;

// Router
$router = new AltoRouter();

// Session
$server = new Session();

// Account
$ralph = new Account();


// Instence de date
$_date = new DateFormat();

// Instence de constante
$_const = new Constants();

// Cookies
$_cookie = new Cookies();

/**
 * Acceuil
 */
$router->map('GET|POST', '/', 'home');


/**
 * Groupe
 */
$router->map('GET|POST', '/group', 'group'); // Administration
$router->map('GET|POST', '/group/[*:action]/[*:key]?', 'group'); // Actions


/**
 * Utilisateur
 */
$router->map('GET|POST', '/user', 'user'); // Administration
$router->map('GET|POST', '/user/[*:action]/[*:key]?', 'user'); // Actions

/**
 * Fichier
 */
$router->map('GET|POST', '/file', 'files'); // Administration
$router->map('GET|POST', '/file/[a:action]/[*:key]?', 'files'); // Actions


/**
 * Message
 */
$router->map('GET|POST', '/message', 'message'); // Administration
$router->map('GET|POST', '/message/[a:action]/[*:key]?', 'message'); // Actions

/**
 * Profile
 */
$router->map('GET|POST', '/profile', 'profile'); // Administration
$router->map('GET|POST', '/profile/[a:action]/[*:key]?', 'profile'); // Actions


// Connexion
$router->map('GET|POST', '/connexion', 'connexion');


// Deconnexion
$router->map('GET', '/logout', function (){
    Session::clean();
    header('Location: /');
});


$match = $router->match();

// echo '<pre>';
// var_dump(!$ralph->isLogged() && isset($_COOKIE['email'], $_COOKIE['password']));
// echo '</pre> ';
// die;

if ($match) {

    if (is_callable($match['target'])) {
        call_user_func_array($match['target'], $match['params']);
    } else {
        $params = $match['params'];

        if(!$ralph->isLogged()){
            $match['target'] = 'connexion';
        }

        require "models/{$match['target']}.model.php";
        require "controllers/{$match['target']}.controller.php";
        require "views/{$match['target']}.view.php";
    }
    
} else {
    echo '404';
}

