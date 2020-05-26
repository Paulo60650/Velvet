<?php
include_once '../models/m_cd.php';
// Récupration de la classes Disc présente dans mon model m_cd.php 
$disc = new Disc();
// Récupération de l'id via la méthode get
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// Apppel des méthodes getArtist et getCount
$tab = $disc->getArtist($id);
$number = $disc->getCount($id);

foreach ($number as $value)
{
    $count = $value;
}
