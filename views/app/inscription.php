<?php include(VIEWS . '_partials/header.php'); ?>


<!-- Formulaire a récupérer sur Bootswatch. Ne pas oublier les name des inputs et la method post -->
<div class="container text-center col-6">
    <form method="post">
        <fieldset>
            <h1 class="text-warning">Inscription</h1>
            <div class="form-group text-center">
                <label for="nom" class="form-label mt-4">Nom</label>
                <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Votre nom" name="nom">
                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais vos informations personnelles.</small>
            </div>
            <div class="form-group">
                <label for="prenom" class="form-label mt-4">Prénom</label>
                <input type="text" class="form-control" id="prenom" placeholder="Votre prénom" name="prenom">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Adresse mail</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" aria-describedby="emailHelp" placeholder="Entrez vos pseudo" name="pseudo">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Mot de passe</label>
                <input type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Enter email" name="password">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="container text-center">
                <button class="btn btn-lg btn-primary mt-5" type="submit">S'inscrire</button>
            </div>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>