<?php
include_once "connexion_database.php";

class Disc
{
    private $co;

    public function __construct()
    {
        $this->co = connection();
    }

    public function getList(): array
    {
        $requete = $this->co->prepare('SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id ORDER BY artist_name');
        $requete->execute();
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableau;
    }

    public function getNumber(): object
    {
        $requete = $this->co->prepare('SELECT COUNT(disc_id) AS `numberCd` FROM disc');
        $requete->execute();
        $count = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $count;
    }

    public function getDetail(int $id): object
    {
        $result = $this->co->prepare('SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc.disc_id = :id');
        $result->bindParam(':id', $id);
        $result->execute();
        $obj = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor();
        return $obj;
    }

    public function setDisc(array $array): void
    {
        $requete = $this->co->prepare('UPDATE disc SET disc_title = :title, disc_price = :price, artist_id = :artist, disc_year = :year, disc_label = :label , disc_genre = :genre ,disc_picture =:picture WHERE disc_id = :id');
        $requete->execute($array);
        $requete->closeCursor();
    }

    public function setDelDisc(int $id): void
    {
        $requete = $this->co->prepare('DELETE  FROM disc WHERE disc_id =:id');
        $requete->bindParam(':id', $id);
        $requete->execute();
        $requete->closeCursor();
    }

    public function setAddDisc(array $array): void
    {
        $requete = $this->co->prepare('INSERT INTO disc(disc_title, disc_label, disc_genre, disc_year, disc_price, disc_picture, artist_id) VALUE (:title, :label, :genre, :year, :price, :picture, :artist)');
        $requete->execute($array);
        $requete->closeCursor();
    }

    public function getArtist(int $id): array
    {
        $requete = $this->co->prepare('SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id WHERE disc.artist_id =:id ORDER BY disc_year');
        $requete->bindParam(':id', $id);
        $requete->execute();
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableau;
        var_dump($id);
    }

    public function getCount(int $id): object
    {
        $requete = $this->co->prepare('SELECT COUNT(disc_id) AS `numberCd` FROM disc WHERE artist_id =:id');
        $requete->bindParam(':id', $id);
        $requete->execute();
        $count = $requete->fetch(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $count;
    }

    public function __destruct()
    {
        $this->co = null;
    }
}