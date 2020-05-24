<?php
include_once "header.php";
include_once "../controlers/update_control.php";
if (isset($_POST['envoie'])) {
    ?>
    <h4 class="list-group-item list-group-item-success text-center"><?= $message ?></h4>
<?php } ?>
    <section class="row">
        <form action="" method="POST" class="col-5" enctype="multipart/form-data">
            <fieldset>
                <legend class="titre2">Modifier un Vinyle</legend>
                <div class="form-row">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" value="<?= $detail->disc_title ?>">
                    <span <?php if (isset($tabError['title'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errTitle"><?= (isset($tabError['title'])) ? $tabError['title'] : '' ?></span>
                </div>
                <div>
                    <label>Artist</label>
                    <select class="form-control" id="artist" name="artist">
                        <option value="<?= $detail->artist_id ?>"><?= $detail->artist_name ?></option>
                        <?php foreach ($artist as $row) { ?>
                            <option value="<?= $row->artist_id ?>"><?= $row->artist_name ?></option>
                        <?php } ?>
                    </select>
                    <span <?php if (isset($tabError['artist'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errArtist"><?= (isset($tabError['artist'])) ? $tabError['artist'] : '' ?></span>
                </div>
                <div class="form-row">
                    <label for="year">Year</label>
                    <input id="year" type="text" class="form-control" name="year" value="<?= $detail->disc_year ?>">
                    <span <?php if (isset($tabError['year'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?>id="errYear"><?= (isset($tabError['year'])) ? $tabError['year'] : '' ?></span>
                </div>
                <div class="form-row">
                    <label for="genre">Genre</label>
                    <input id="genre" type="text" class="form-control" name="genre" value="<?= $detail->disc_genre ?>">
                    <span <?php if (isset($tabError['genre'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errGenre"><?= (isset($tabError['genre'])) ? $tabError['genre'] : '' ?></span>
                </div>
                <div class="form-row">
                    <label for="label">Label</label>
                    <input id="label" type="text" class="form-control" name="label" value="<?= $detail->disc_label ?>">
                    <span <?php if (isset($tabError['label'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?> id="errLabel"><?= (isset($tabError['label'])) ? $tabError['label'] : '' ?></span>
                </div>
                <div class="form-row">
                    <label for="mail">Price</label>
                    <input id="price" type="text" class="form-control" name="price" value="<?= $detail->disc_price ?>">
                    <span <?php if (isset($tabError['price'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?>  id="errPrice"><?= (isset($tabError['price'])) ? $tabError['price'] : '' ?></span>
                </div>
                <div class="form-row">
                    <label for="image">Picture</label>
                    <input type="file" class="custom-file" name="newPicture" id="file">
                    <span <?php if (isset($tabError['picture'])) {
                        echo 'class="list-group-item list-group-item-danger"';
                    } ?>id="errPicture"><?= (isset($tabError['picture'])) ? $tabError['picture'] : '' ?></span>
                </div>
                <input type="hidden" name="id" value="<?= $detail->disc_id ?>">
                <input type="hidden" name="picture" value="<?= $detail->disc_picture ?>">
                <div id="bouton">
                    <input id="envoie" name="envoie" class="btn btn-primary" type="submit" value="Modifier">
                    <input class="btn btn-primary" type="reset" value="Annuler">
                </div>
            </fieldset>
        </form>
    </section>
<?php
include "./footer.php";
?>