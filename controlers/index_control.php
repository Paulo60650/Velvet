<?php
include_once 'models/m_cd.php';
include_once 'models/m_artist.php';

session_start();

if (!isset($_SESSION['isConnect']))
    $_SESSION['isConnect'] = false;

$disc = new Disc();
$list = new Artist();

$tableau = $disc->getList();
$number = $disc->getNumber();
$artist = $list->getList();

foreach ($number as $value) {
    $count = $value;
}
