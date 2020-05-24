<?php
include_once 'controlers/index_control.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <link rel="stylesheet" href="assets/CSS/style.css" ;
    ">
    <title>Velvet-Record</title>
</head>
<body class="container fluid">
<header class="row">
    <nav class="navbar navbar-expand navbar-dark fixed-top bg-dark col-12 mb-5">
        <a class="navbar-brand" href="#">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="views/add_form.php">Ajout<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Artist
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($artist as $row) {
                            ?>
                            <a class="dropdown-item"
                               href="views/artist.php?id=<?= $row->artist_id ?>"><?= $row->artist_name ?></a>
                        <?php } ?>
                    </div>
                </li>
                </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="./controlers/login_control.php" method="post" >
                        <?php if ($_SESSION['isConnect']) { ?>
                            <button type="submit" class="btn btn-primary" name="disconnect">
                                Logout
                            </button>
                        <?php } else { ?>
                            <button type="submit" class="btn btn-primary" name="connect">
                                Login
                            </button>
                        <?php } ?>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="mt-5 col-12">
        <h1 class="text-center mt-4">Velvet Record</h1>
    </div>
</header>
<div class=" mt-5">
    <h3 class="text-center">Il y a <?= $count ?> Vinyle disponible actuellement</h3>
</div>
<div class="col-12">
    <div class="row ml-5 pt-5">
        <?php
        // Foreach pour récupérer les données du tableau et les afficher dans le Formulaire
        foreach ($tableau as $line) {
            ?>
            <form action="views/detail.php" method="get">
                <fieldset>
                    <div class="card text-center text-white bg-dark mb-3 ml-3" style="width: 18rem;">
                        <img class="card-img-top" id='img' name='img' src="assets/img/<?= $line->disc_picture ?>"
                             alt="Cover image" width="300" height="270">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li><p class="card-text" name="title"><strong>Title
                                            : </strong><?= $line->disc_title ?>
                                    </p></li>
                                <li><p class="card-text" name="name"><strong>Name
                                            : </strong><?= $line->artist_name ?>
                                    </p></li>
                                <li><p class="card-text" name="label"><strong>Label
                                            : </strong><?= $line->disc_label ?>
                                    </p></li>
                                <li><p class="card-text" name="year"><strong>Year : </strong><?= $line->disc_year ?>
                                    </p>
                                </li>
                                <li><p class="card-text" name="genre"><strong>Genre
                                            : </strong><?= $line->disc_genre ?>
                                    </p></li>
                            </ul>
                            <input type="hidden" name="id" value="<?= $line->disc_id ?>">
                            <input type="hidden" name="id_art" value="<?= $line->artist_id ?>">
                            <button type="submit" name="details" class="btn btn-primary">Détails</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        <?php } ?>
    </div>
</div>
<hr>
<footer>
    <ul class="nav justify-content-center">
        <li class="nav-item"><a class="nav-link active" href="#">Mention légales</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Horaires</a></li>
        <li class="nav-item"><a class="nav-link active" href="#">Plan du site</a></li>
    </ul>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="<?php echo $js ?>"></script>
</html>