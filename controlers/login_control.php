<?php
session_start();

if (!$_SESSION['isConnect'] && isset($_POST['connect'])) {
    $_SESSION['isConnect'] = true;
    session_regenerate_id();
}

if ($_SESSION['isConnect'] && isset($_POST['disconnect'])) {
    unset($_SESSION['isConnect']);
    if(ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time()-84600);
    }
    session_destroy();
}
header('location:../index.php');
