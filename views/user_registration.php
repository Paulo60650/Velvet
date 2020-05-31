<?php
include_once "header.php";
include_once '../controlers/user_registration_control.php';
if (isset($_POST['envoie']) && count($error) == 0) {
    ?>
    <h4 class="list-group-item list-group-item-success text-center"><?= $message ?></h4>
<?php } ?>
<div class="row justify-content-md-center">
    <form action="" method="POST" class="col-6" enctype="multipart/form-data">
                <fieldset>
                    <legend class="text-center pt-3"> <h3>Inscrivez-vous</h3></legend>
                    <div class="form-row">
                        <label for="mail"><strong>Adresse mail valide</strong></label>
                        <input type="mail" id="mail" class="form-control" name="mail" placeholder="exemple@gmail.fr"
                            value="<?php if (isset($_POST['mail'])) {
                                echo $_POST['mail'];
                            } ?>">
                        <span <?php if (isset($error['mail'])) {
                            echo 'class="list-group-item list-group-item-danger"';
                        } ?> id="errMail"><?php if(isset($error['mail'])){ echo $error['mail'];} ?></span>

                        <label for="password"><strong>Mot de passe</strong></label>
                                            <input type="password" id="password1" class="form-control" name="password1" placeholder="Mot de passe">
                                            <span <?php if (isset($error['password1'])) {
                                                                echo 'class="list-group-item list-group-item-danger"';
                                                            } ?> id="errPassword"><?= (isset($error['password1'])) ? $error['password1'] : '' ?></span>
                            <label for="password"><strong>Confirmez le mot de passe</strong></label>
                                                            <input type="password" id="password2" class="form-control" name="password2" placeholder="Mot de passe">
                                                            <span <?php if (isset($error['password2'])) {
                                                                echo 'class="list-group-item list-group-item-danger"';
                                                            } ?> id="errPassword"><?= (isset($error['password2'])) ? $error['password1'] : '' ?></span>
                    </div>
                    <div class="col-row offset-4 pt-4">
                    <input id="envoie" name="envoie" class="btn btn-primary" type="submit" value="S'inscrire">
                        <input class="btn btn-danger" type="reset" value="Annuler">
                </div>
                </fieldset>
            </form>
        </div>
<?php
 include_once "footer.php";
?>