<?php
include_once '../models/m_cd.php';

$disc = new Disc();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$disc->setDelDisc($id);

$class = 'list-group-item list-group-item-success text-center';
$message = "Le Vynile a été supprimé avec succès !  Vous allez être redirigé vers l'accueil dans 3 sec";
header("refresh:3;url=../index.php");