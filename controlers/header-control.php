<?php
include_once '../models/m_artist.php';
// Récupration de la classes Disc présente dans mon model m_arist.php 
$list = new Artist();
// Appel de la méhode getList
$artist = $list->getList();
