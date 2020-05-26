<?php
include_once '../models/m_cd.php';
// Récupration de la classes Disc présente dans mon model m_cd.php 
$disc = new Disc();
// Récupération de l'id via la méthode get
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// Appel de la méthode setDelDisc
$disc->setDelDisc($id);
    $class = 'list-group-item list-group-item-success text-center';
    $message = "Le Vynile a été supprimé avec succès !  Vous allez être redirigé vers l'accueil dans 3 sec";
    header("refresh:3;url=../index.php");

