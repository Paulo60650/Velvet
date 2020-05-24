<?php
include_once "header.php";
include_once '../controlers/artist_control.php';
if ($count == 0){
?>
<div class="mt-5 text-center">
    <h3>Il n'y a aucun Vinyle disponible actuellement de cette artiste</h3>
</div>
<?php } else{?>
<div class=" mt-5 text-center">
    <h3>Il y a <?= $count ?> Vinyle de <?= $tab[0]->artist_name ?> disponible actuellement </h3>
</div>
<?php } ?>
<div class="col-12">
    <?php if ($count <= 2){ ?>
    <div class="row justify-content-md-center pt-3">
        <?php }
        else{
        ?>
        <div class="row ml-5 pt-5">
            <?php } ?>

            <?php
            // Foreach pour récupérer les données du tableau et les afficher dans le Formulaire
            foreach ($tab as $row) {
                ?>
                <form action="./detail.php" method="get">
                    <fieldset>
                        <div class="card text-center text-white bg-dark mb-3 ml-3" style="width: 18rem;">
                            <img class="card-img-top" id='img' alt="Pochette"
                                 src="../assets/img/<?= $row->disc_picture ?>"
                                 alt="Cover image" width="300" height="270">
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li><p class="card-text" name="title"><strong>Title
                                                : </strong><?= $row->disc_title ?>
                                        </p></li>
                                    <li><p class="card-text" name="name"><strong>Name
                                                : </strong><?= $row->artist_name ?>
                                        </p></li>
                                    <li><p class="card-text" name="label"><strong>Label
                                                : </strong><?= $row->disc_label ?>
                                        </p></li>
                                    <li><p class="card-text" name="year"><strong>Year : </strong><?= $row->disc_year ?>
                                        </p>
                                    </li>
                                    <li><p class="card-text" name="genre"><strong>Genre
                                                : </strong><?= $row->disc_genre ?>
                                        </p></li>
                                </ul>
                                <input type="hidden" name="id" value="<?= $row->disc_id ?>">
                                <input type="hidden" name="id_art" value="<?= $row->artist_id ?>">
                                <button type="submit" name="details" class="btn btn-primary">Détails</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            <?php } ?>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
