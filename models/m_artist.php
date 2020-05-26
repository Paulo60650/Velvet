<?php
include_once "connexion_database.php";
// Déclarations de ma class contenant toute mes méthodes sur la table artist
class Artist
{
    // Connexion à la database
    private $co;

    public function __construct()
    {
        $this->co = connection();
    }
// Déclaration d'une méthode permettant toute les infos de la table artist
    public function getList(): array
    {
        $requete = $this->co->query("SELECT * FROM artist ORDER BY artist_name");
        $tabartist = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tabartist;
    }
// Fin de la connexion à la database
    public function __destruct()
    {
        $this->co = null;
    }
}