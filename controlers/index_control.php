<?php
include_once 'models/m_cd.php';
include_once 'models/m_artist.php';
// Récupration de la classes Disc présente dans mon model m_cd.php 
session_start();
// Contrôle de la connexion our l'affichage du bouton de connexion 
if (!isset($_SESSION['isConnect']))
    $_SESSION['isConnect'] = false;
// Récupration des classes Disc et Artist pésentent dans mes models

$disc = new Disc();
$list = new Artist();
// Appel des méthodes getList,getNumber et getList de la class Arist
$tableau = $disc->getList();
$number = $disc->getNumber();
$artist = $list->getList();

foreach ($number as $value) {
    $count = $value;
}
