<?php
include_once '../models/m_artist.php';
// Contrôle de la connexion pour l'affichage du bouton de connexion 
if (isset($_SESSION['isConnect']))
    $_SESSION['isConnect'] = true;
else{
    $_SESSION['isConnect'] = false;
}
// Récupration de la classes Disc présente dans mon model m_arist.php 
$list = new Artist();
// Appel de la méhode getList
$artist = $list->getList();
