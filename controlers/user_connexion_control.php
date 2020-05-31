<?php
session_start();
include_once "../models/m_user.php";
$user = new User();
$error =[];
$check = false;

if(isset($_POST['connect'])){

    
    if(empty($_POST['mail'])){
        $error['mail'] = 'Veuillez renseigner votre adresse mail';
    }
    else{
        $list = $user->getUserMail();
        foreach($list as $value){
            if($value->user_mail == $_POST['mail']){
            $check = true;
            }
        }
    }   
    if(empty($error['mail']) && $check == false){
        $error['mail'] ='Aucun résultat';
    }

    if(empty($_POST['password'])){
        $error['password'] = 'Veuillez renseigner votre mot de passe';
    }
    else{
        $password = $user->getUserPassword($_POST['mail']);
        foreach($password as $value){
            if($value->user_password != password_verify($_POST['password'],$value->user_password )){
            $error['password'] = 'Le mot de passe est incorrect';
            }
        }
    }
    if(count($error) == 0){
        $_SESSION['isConnect'] = true;
        session_regenerate_id();
        header('location:../index.php');
    }
}

if ($_SESSION['isConnect'] && isset($_POST['disconnect'])) {
    unset($_SESSION['isConnect']);
    if(ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time()-84600);
    }
    session_destroy();
    header('location:../index.php');
}