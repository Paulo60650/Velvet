<?php
session_start();
include_once "../models/m_user.php";
$user = new User();
$error =[];

if (isset($_POST['envoie'])) {

    $list = $user->getUserMail(); 

    foreach($list as $value){
        if($value->user_mail == $_POST['mail']){
            $error['mail'] ='Cette adresse mail possède déjà un compte';
        }
    }

    if (empty($_POST['mail'])) {
        $error['mail'] ='Champs obligatoire';
    }

    if(empty($_POST['password1'])){
        $error['password1'] ='Champs obligatoire';
    }

    if(empty($_POST['password2'])){
        $error['password2'] ='Champs obligatoire';
    }
    if($_POST['password1'] != $_POST['password2']){
        $error['password1'] = 'Les mots de passes ne correspondent pas';
        $error['password2'] = 'Les mots de passes ne correspondent pas';
    }

    if(count($error) == 0){
        $array = [
                   ':mail' => filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS),
                   ':password1' => password_hash($_POST['password1'],PASSWORD_DEFAULT),
                 ];
        $ajout = $user->setUser($array);
        $_SESSION['isConnect'] = true;
        $message = 'Bienvenue chez Velvet-Record ! Vous allez être redirigé vers l\'Accueil';
        session_regenerate_id();
        header("refresh:3;url=../index.php");
    }

}