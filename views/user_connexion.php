<?php
include_once "header.php";
include_once '../controlers/user_connexion_control.php';
?>
<div class="row justify-content-md-center">
    <form action="" method="POST" class="col-5" enctype="multipart/form-data">
        <fieldset>
        <legend class="text-center pt-3"><h3>Connexion</h3></legend>
            <div class="form-row">
                <label for="mail"><strong>Votre adresse mail</strong></label>
                <input type="mail" id="mail" class="form-control" name="mail" placeholder="exemple@gmail.fr"
                value="<?php if (isset($_POST['mail'])) {
                echo $_POST['mail'];
                } ?>">
                <span <?php if (isset($error['mail'])) {
                echo 'class="list-group-item list-group-item-danger"';
                } ?> id="errMail"><?php if(isset($error['mail'])){ echo $error['mail'];} ?></span>
                 </div>

                 <div class="form-row mb-4">
                <label for="password"><strong>Votre mot de passe</strong></label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Mot de passe">
                <span <?php if (isset($error['password'])) {
                echo 'class="list-group-item mt-2 list-group-item-danger"';
                } ?> id="errPassword"><?= (isset($error['password'])) ? $error['password'] : '' ?></span>
                </div>
                <div class="col-row offset-3">
                        <button type="submit" class="btn btn-primary " name="connect">Connexion</button>               
                        <button type="reset" class="btn btn-danger " >Annuler</buton>
                </div>
        </fieldset>
    </form>
</div>               