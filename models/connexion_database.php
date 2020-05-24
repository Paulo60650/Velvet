<?php
function connection()
{
    // Le "try ... catch" permet de "tenter" une connection à la base (try) et de retourner une erreur si la connection ne se fait pas (catch).
    try {
        $co = new PDO("mysql:host=localhost;dbname=record", 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
    return $co;
}
