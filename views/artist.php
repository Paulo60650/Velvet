<?php
include_once "header.php";
include_once '../controlers/artist_control.php';
if ($count == 0){
?>
<!-- Affichage si pas de Vinile présent de l'artiste  -->
<div class="mt-5 text-center">
    <h3>Il n'y a aucun Vinyle disponible actuellement de cette artiste</h3>
</div>
<?php } else{?>
<!-- Affichage du nombre de Vinyle de l'artiste -->
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
            // Foreach pour afficher les données du tableau dans le Formulaire
            foreach ($tab as $row) {
                ?>
                <!-- Début du formulaire -->
                <form action="./detail.php" method="get">
                    <fieldset>
                        <div class="card text-center text-white bg-dark mb-3 ml-3" style="width: 18rem;">
                        <a href="detail.php?id=<?= $row->disc_id ?>"><img class="card-img-top" id='img' name='img' src="../assets/img/<?= $row->disc_picture ?>"
                                 alt="Cover image" width="300" height="270"></a>
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
                <!-- Fin du Formulaire -->
            <?php } ?>
        </div>
    </div>
    <?php
    include_once "footer.php";
    ?>
