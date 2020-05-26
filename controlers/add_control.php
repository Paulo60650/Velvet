<?php
include_once "../models/m_cd.php";
include_once "../models/m_artist.php";

session_start();
// Contrôle de la connexion , sinon impossible d'aller sur ajout

if (!$_SESSION['isConnect']) {
    header('location:../index.php');
}
// Récupration des classes Disc et Artist pésentent dans mes models
$disc = new Disc();
$list = new Artist();
// Appel de la méthode getList
$artist = $list->getList();
// Déclarations de mon tableau d'erreur 
$tabError = [];

// REGEX
$filtreText = '/(^[\wéèêëûüîïôàçæœ\(\)\&\s\-\.\,\_\+\=\/\%€@\'\"\*\\`\!\?\;\[\]]*$)/i';
$filtrePrix = '/(^[0-9]{1,4}\.[0-9]{2}$)/';
$filtreYear = '/(^(19|20){1}[0-9]{2}$)/';

// Si le bouton submit de 'modifier' est envoyé
if (isset($_POST['envoie'])) {
    // Verification des champs et récupération des erreurs
    //  Controle de la valeur de l'ínput Titre
    if (empty($_POST['title'])) {
        $tabError['title'] = 'Renseignez ce champs';
    } else if (!preg_match($filtreText, $_POST['title'])) {
        $tabError['title'] = 'Vous utilisez des caractères interdits';
    }
    // Controle de la valeur de l'ínput Genre
    if (empty($_POST['genre'])) {
        $tabError['genre'] = 'Renseignez ce champs';
    } else if (!preg_match($filtreText, $_POST['genre'])) {
        $tabError['genre'] = 'Vous utilisez des caractères interdits';
    }
    // Controle de la valeur de l'ínput Label
    if (empty($_POST['label'])) {
        $tabError['label'] = 'Renseignez ce champs';
    } else if (!preg_match($filtreText, $_POST['label'])) {
        $tabError['label'] = 'Vous utilisez des caractères interdits';
    }
    // Controle de la valeur de l'ínput Price
    if (empty($_POST['price'])) {
        $tabError['price'] = 'Renseignez ce champs';
    } else if (!preg_match($filtrePrix, $_POST['price'])) {
        $tabError['price'] = 'Vous utilisez des caractères interdits';
    }
    // Controle de la valeur de l'ínput Year
    if (empty($_POST['year'])) {
        $tabError['year'] = 'Renseignez ce champs';
    } else if (!preg_match($filtreYear, $_POST['year'])) {
        $tabError['year'] = 'Vous utilisez des caractères interdits';
    }

// Controle de la valeur de l'ínput Artist
    if ($_POST['artist'] == 0) {
        $tabError['artist'] = 'Renseignez ce champs';
    }
    if (empty($_FILES['picture']['name'])) {
        $tabError['picture'] = 'Veuillez choisir une image';
    } else {

        if ($_FILES['picture']['size'] > 2000000) {
            $tabError['picture'] = 'La taille de l\'image dépasse celle autorisé';
        }
        // Controle de la valeur de l'ínput Picture
        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");

        // On récupère l'information sur le MIME_TYPE
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
        finfo_close($finfo);
        // Test du MYME_TYPE
        if (!in_array($mimetype, $aMimeTypes)) {
            $tabError['picture'] = 'Le type de fichier n\'est pas pris en charge ! Veuillez recommencer';
        }
        if (!file_exists("../assets/img/" . $_FILES['picture']['name'])) {
            if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
                // Téléchargement du fichier
                move_uploaded_file($_FILES['picture']['tmp_name'], __DIR__ . '/../../Velvet/assets/img/' . $_FILES["picture"]['name']);
            } else {
                $tabError['picture'] = 'Problème lors du téléchargement de l\'image';
            }
        }
    }
    // Contrôle du nombre d'erreur si egal à 0 on récupère les valeurs des inputs en les recontolant dans un tableaux
    if (count($tabError) == 0) {
        $array = [
            ':title' => filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS),
            ':artist' => filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_NUMBER_INT),
            ':year' => filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT),
            ':label' => filter_input(INPUT_POST, 'label', FILTER_SANITIZE_SPECIAL_CHARS),
            ':genre' => filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_SPECIAL_CHARS),
            ':price' => filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS),
            ':picture' => $_FILES['picture']['name']
        ];
        // Appel de la méthode setAddDisc
        if($disc->setAddDisc($array) == NULL){
            $class = 'list-group-item list-group-item-success text-center';
            $message = 'Le Vinyle a bien été ajouté félicitations! Vous serez redirigé vers l\'accueil dans 3 secondes';
            header("refresh:3;url=../index.php");
        }else{
            $class = 'list-group-item list-group-item-danger text-center';
            $message = 'Le Vinyle n\'a pas pu être ajouté ! Vous serez redirigé vers l\'accueil dans 3 secondes';
            header("refresh:3;url=../index.php");
        }
    }
}
