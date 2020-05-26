<?php
include_once "header.php";
include_once "../controlers/add_control.php";
// Affichage du message en cas de réussite de l'ajout
if (isset($_POST['envoie']) && count($tabError) == 0) {
    ?>
    <h4 class="list-group-item list-group-item-success text-center"><?= $message ?></h4>
<?php } ?>
    <section class="row">
    <!-- Début du Formulaire d'ajout -->
        <form action="" method="POST" class="col-5" enctype="multipart/form-data">
            <fieldset>
                <legend class="titre2">Ajouter un Vinyle</legend>
                <div class="form-row">
                <!-- Champs Titre -->
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" placeholder="Fugazi"
                           value="<?php if (isset($_POST['title'])) {
                               echo $_POST['title'];
                           } ?>">
                    <span <?php if (isset($tabError['title'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errTitle"><?= (isset($tabError['title'])) ? $tabError['title'] : '' ?></span>
                </div>
                <div>
                <!-- Champs artiste -->
                    <label>Artist</label>
                    <select class="form-control" id="artist" name="artist">
                        <?php if (isset($_POST['artist'])) { ?>
                            <option value="<?= $_POST['artist'] ?>"><?= $row->artist_name ?></option>
                            <?php foreach ($artist as $row) { ?>
                                <option value="<?= $row->artist_id ?>"><?= $row->artist_name ?></option>
                            <?php }
                        } else { ?>
                            <option value="0">Choisissez</option>
                            <?php foreach ($artist as $row) { ?>
                                <option value="<?= $row->artist_id ?>"><?= $row->artist_name ?></option>
                            <?php }
                        } ?>
                    </select>
                    <span <?php if (isset($tabError['artist'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errArtist"><?= (isset($tabError['artist'])) ? $tabError['artist'] : '' ?></span>
                </div>
                <div class="form-row">
                <!-- Champs de l'année -->
                    <label for="year">Year</label>
                    <input id="year" type="text" class="form-control" name="year" placeholder="1984"
                           value="<?php if (isset($_POST['year'])) {
                               echo $_POST['year'];
                           } ?>">
                    <span <?php if (isset($tabError['year'])) {
                        echo 'class="list-group-item list-group-item-danger "';
                    } ?> id="errYear"><?= (isset($tabError['year'])) ? $tabError['year'] : '' ?></span>
                </div>
                <div class="form-row">
                <!-- Champs Genre -->
                    <label for="genre">Genre</label>
                    <input id="genre" type="text" class="form-control" name="genre" placeholder="Prog"
                           value="<?php if (isset($_POST['year'])) {
                               echo $_POST['year'];
                           } ?>">
                    <span <?php if (isset($tabError['genre'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errGenre"><?= (isset($tabError['genre'])) ? $tabError['genre'] : '' ?></span>
                </div>
                <div class="form-row">
                <!-- Champs Label -->
                    <label for="label">Label</label>
                    <input id="label" type="text" class="form-control" name="label" placeholder="EMI"
                           value="<?php if (isset($_POST['label'])) {
                               echo $_POST['label'];
                           } ?>">
                    <span <?php if (isset($tabError['label'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errLabel"><?= (isset($tabError['label'])) ? $tabError['label'] : '' ?></span>
                </div>
                <div class="form-row">
                <!-- Champs Prix -->
                    <label for="mail">Price</label>
                    <input id="price" type="text" class="form-control" name="price" placeholder="14.99"
                           value="<?php if (isset($_POST['price'])) {
                               echo $_POST['price'];
                           } ?>">
                    <span <?php if (isset($tabError['price'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errPrice"><?= (isset($tabError['price'])) ? $tabError['price'] : '' ?></span>
                </div>
                <div class="form-row">
                <!-- Champs pour téléchargement de l'image -->
                    <label for="image">Picture</label>
                    <input type="file" class="form-control-file" name="picture" id="picture">
                    <span <?php if (isset($tabError['picture'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errPicture"><?= (isset($tabError['picture'])) ? $tabError['picture'] : '' ?></span>
                </div>
                <input type="hidden" name="id_art" value="<?= $row->artist_id ?>">
                <div id='bouton'>
                    <input id="envoie" name="envoie" class="btn btn-primary" type="submit" value="Ajouter">
                    <input class="btn btn-primary" type="reset" value="Annuler">
                </div>
            </fieldset>
        </form>
        <!-- Fin du Formulaire -->
    </section>
<?php
include_once "footer.php"
?>