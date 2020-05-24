<?php
include_once "connexion_database.php";

class Artist
{
    private $co;

    public function __construct()
    {
        $this->co = connection();
    }

    public function getList(): array
    {
        $requete = $this->co->query("SELECT * FROM artist ORDER BY artist_name");
        $tabartist = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tabartist;
    }

    public function __destruct()
    {
        $this->co = null;
    }
}