<?php
include_once "connexion_database.php";
// Déclarations de ma class contenant toute mes méthodes sur la table user
class User
{
    // Connexion à la database
    private $co;

    public function __construct()
    {
        $this->co = connection();
    }

   public function setUser($array): void
    {
        $requete = $this->co->prepare('INSERT INTO user(user_mail, user_password) VALUE(:mail, :password1)');
        $requete->execute($array);
        $requete->closeCursor();
    }

    public function getUserMail(): array
    {
        $requete = $this->co->prepare('SELECT user_mail FROM user');
        $requete->execute();
        $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $tableau;
    }

    public function getUserPassword($mail): array
    {
        $requete = $this->co->prepare('SELECT user_password FROM user WHERE user_mail= :mail');
        $requete->bindParam(':mail', $mail);
        $requete->execute();
        $obj = $requete->fetchall(PDO::FETCH_OBJ);
        $requete->closeCursor();
        return $obj;
    }

    public function __destruct()
    {
        $this->co = null;
    }
}