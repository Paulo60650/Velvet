<?php
include_once '../models/m_artist.php';

$list = new Artist();
$artist = $list->getList();
