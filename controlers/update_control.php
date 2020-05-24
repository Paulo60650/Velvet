<?php
include_once "../models/m_cd.php";
include_once "../models/m_artist.php";
session_start();

$disc = new Disc();
$list = new Artist();
$tabError = [];
$message = '';

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
    if (empty($_POST['artist'])) {
        $tabError['artist'] = 'Renseignez ce champs';
    }
    if (count($tabError) == 0) {
        $array = [
            ':title' => filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS),
            ':artist' => filter_input(INPUT_POST, 'artist', FILTER_SANITIZE_NUMBER_INT),
            ':year' => filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT),
            ':label' => filter_input(INPUT_POST, 'label', FILTER_SANITIZE_SPECIAL_CHARS),
            ':genre' => filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_SPECIAL_CHARS),
            ':id' => filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT),
            ':price' => filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS),
            ':picture' => $_FILES['newPicture']['name']
        ];
        if (empty($array[':picture'])) {
            $array[':picture'] = filter_input(INPUT_POST, 'picture', FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            if ($_FILES['picture']['size'] > 2000000) {
                $tabError['picture'] = 'La taille de l\'image dépasse celle autorisé';
            }
            $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
            // On récupère l'information sur le MIME_TYPE
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimetype = finfo_file($finfo, $_FILES["newPicture"]["tmp_name"]);
            finfo_close($finfo);

            if (!in_array($mimetype, $aMimeTypes)) {
                $tabError['picture'] = 'Le type de fichier n\'est pas pris en charge';
            }
            if (!file_exists("../assets/img/" . $_FILES['newPicture']['name'])) {
                if (is_uploaded_file($_FILES['newPicture']['tmp_name'])) {
                    move_uploaded_file($_FILES['newPicture']['tmp_name'], __DIR__ . '/../../Velvet/assets/img/' . $_FILES["newPicture"]['name']);
                }
            }
        }
        if (empty($tabError['picture'])) {
            $disc->setDisc($array);
            $message = 'Le Vinyle à bien été mofifié ! Vous allez être redirigé vers l\'Accueil dans 3 secondes';
            header("refresh:3;url=../index.php");
        }
    }
}
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT) ?: $array[':id'];
$detail = $disc->getDetail($id);
$artist = $list->getList();
