<?php
include_once '../models/m_cd.php';
include_once '../models/m_artist.php';

$disc = new Disc();
$list = new Artist();

$artist = $list->getList();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$tab = $disc->getDetail($id);
