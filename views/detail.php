<?php
include_once "header.php";
include_once '../controlers/detail_control.php';
?>
    <div class="container fluid">
        <div class="row justify-content-md-center pt-3">
            <form action="update_form.php" method="get">
                <fieldset>
                    <div class="card text-center text-white bg-dark mb-3" style="width: 22rem;">
                        <img class="card-img-top" id='img' name='img' src="../assets/img/<?= $tab->disc_picture ?>"
                             alt="Cover image" width="320" height="270">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li><p class="card-text" name="title"><strong>Title : </strong><?= $tab->disc_title ?>
                                    </p>
                                </li>
                                <li><p class="card-text" name="name"><strong>Name : </strong><?= $tab->artist_name ?>
                                    </p>
                                </li>
                                <li><p class="card-text" name="label"><strong>Label : </strong><?= $tab->disc_label ?>
                                    </p>
                                </li>
                                <li><p class="card-text" name="year"><strong>Year : </strong><?= $tab->disc_year ?></p>
                                </li>
                                <li><p class="card-text" name="genre"><strong>Genre : </strong><?= $tab->disc_genre ?>
                                    </p>
                                </li>
                                <li><p class="card-text" name="price"><strong>Price : </strong><?= $tab->disc_price ?>
                                    </p>
                                </li>
                            </ul>
                            <input type="hidden" name="id" value="<?= $tab->disc_id ?>">
                            <input type="hidden" name="id_art" value="<?= $tab->artist_id ?>">
                            <input type="submit" name="mofifier" class="btn btn-primary" value="Modifier">
                            <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                                   value="Supprimer">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <!-- Modal pour confirmation de la supression -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimer ce Vinyle</p>
                </div>
                <div class="modal-footer">
                    <form action="delete_form.php" method="get">
                        <input type="hidden" name="id" value="<?= $tab->disc_id ?>">
                        <button type="submit" class="btn btn-primary" id="supprime">Oui</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Non</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
include "footer.php";
?>