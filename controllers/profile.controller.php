<?php
namespace RalphServer\Profile;

use RalphServer\Constants;
use RalphServer\Helpers\Util;


// Id de la session
$id = $server->getValue('id');

// Recuperartion des données de l'utilisateur
$user = ProfileModel::getById($id)[0];

// Recupere l'avatar
$avatar = $server->getValue('Avatar');


// Modifier la photo de profil
if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])){

    $maxSize = 2097152;
    $validExt = ['jpg', 'jpeg', 'gif', 'png'];
    $ext = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
    $avatarName = $id.'-ralphserver.'.$ext;
    $path = Constants::PATH . 'src/img/avatar/'.$avatarName;



    if($_FILES['avatar']['size'] <= $maxSize){
        
        if(in_array($ext, $validExt)){
            
            $save = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);

            if($save){
                
                ProfileModel::setAvatar($avatarName, $id);

                $server->bindValue('Avatar', $avatarName);
            }else{
                $error = 'Erreur lors de l\'importation du fichier';
            }
        }else{
            $error = 'Format non pris en charge';
        }

    }else{
        $error = 'Taille de l\'image trop elevé';
    }

}


// Modifier les infos de l'utilisateur
if(isset($_POST['edit-profile'])){

    if(Util::def($_POST['fullName']) && Util::def($_POST['about']) && Util::def($_POST['email']) && Util::def($_POST['job']) && Util::def($_POST['sex']) && Util::def($_POST['birth']) && Util::def($_POST['phone'])){

        $name = htmlspecialchars(trim($_POST['fullName']));
        $about = htmlspecialchars(trim($_POST['about']));
        $email = htmlspecialchars(trim($_POST['email']));
        $job = htmlspecialchars(trim($_POST['job']));
        $sex = $_POST['sex'];
        $birth = $_POST['birth'];
        $phone = htmlspecialchars(trim($_POST['phone']));

        $mod = ProfileModel::modUser($id, $name, $birth, $email, $phone, $job, $sex, $about);

        $server->bindValue('Name', $name);
        $server->bindValue('Email', $email);

        $_POST = [];
        // header('Refresh: 0');

    } else {
        $error = 'Veuillez remplir tous les champs.';
    }
}




// Changer le mot de passe
if(isset($_POST['change-pwd'])){
    if(Util::def($_POST['password']) && Util::def($_POST['newpassword']) && Util::def($_POST['renewpassword'])){

        if($_POST['newpassword'] == $_POST['renewpassword']){

            $old = htmlspecialchars($_POST['password']);
            $new = htmlspecialchars($_POST['newpassword']);


            if(password_verify($old, $user['Password'])){

                ProfileModel::setPassword($new, $id);
                header('Refresh: 0');

            } else{$error = 'Mot de passe incorrecte';}

        }else{
            $error = 'Les mot de passe ne sont pas identique';
        }
    }
}

