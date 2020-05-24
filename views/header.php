<?php
include_once '../controlers/header-control.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/CSS/style.css">
    <title>Velvet-Record</title>
</head>
<body class="container fluid">
<header class="row">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark col-12 mb-5" id="navbar">
        <a class="navbar-brand" href="../index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./add_form.php">Ajout<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Artist
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($artist as $row) {
                            ?>
                            <a class="dropdown-item" href="artist.php?id=<?= $row->artist_id ?>"><?= $row->artist_name ?></a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="mt-5 col-12">
        <h1 class="text-center mt-4">Velvet Record</h1>
    </div>
</header>
