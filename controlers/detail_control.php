<?php
include_once '../models/m_cd.php';
include_once '../models/m_artist.php';
session_start();
// Récupration des classes Disc et Artist pésentent dans mes models
$disc = new Disc();
$list = new Artist();
// Appel de la méthode getList
$artist = $list->getList();
// Récupération de l'id via la méthode get
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
// Appel de la méthode getDetail
$tab = $disc->getDetail($id);
