<?php include(VIEWS . '_partials/header.php'); ?>

<div class="container text-center col-6">
    <form method="post">
        <fieldset>
            <h1 class="text-warning">Connexion</h1>
            <div class="form-group text-center">
                <label for="pseudo" class="form-label mt-4">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" aria-describedby="emailHelp" placeholder="Votre pseudo" name="pseudo">
                
            </div>
            <div class="form-group">
                <label for="prenom" class="form-label mt-4">Mot de passe</label>
                <input type="password" class="form-control" id="prenom" placeholder="Votre mot de passe" name="password">
            </div>
            <div class="container text-center">
                <button class="btn btn-lg btn-primary mt-5" type="submit">Se connecter</button>
            </div>
</form>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>