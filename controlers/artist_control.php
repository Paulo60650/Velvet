<?php
include_once '../models/m_cd.php';

$disc = new Disc();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$tab = $disc->getArtist($id);
$number = $disc->getCount($id);

foreach ($number as $value)
{
    $count = $value;
}
