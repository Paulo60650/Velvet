<?php
session_start();
// Si connexion via le bouton la connexion vaut true
if (!$_SESSION['isConnect'] && isset($_POST['connect'])) {
    $_SESSION['isConnect'] = true;
    session_regenerate_id();
}
// Sinon on détruit la connexion
if ($_SESSION['isConnect'] && isset($_POST['disconnect'])) {
    unset($_SESSION['isConnect']);
    if(ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time()-84600);
    }
    session_destroy();
}
// On recharge la page pour changer l'affichage du bouton de connexion
header('location:../index.php');
