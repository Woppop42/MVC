<!doctype html>
<html lang="en">

<head>
    <title><?= CONFIG['app']['name'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../public/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/solar/bootstrap.min.css" integrity="sha512-SGLY63IpxQgjNZfOfmayBxXeh5Uw6/b3ZgAxONQb9OW5MosjvFOPmT6aTgLEerDOTc03knEaeeTdV6q5lOkLKw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Boutique</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?= BASE; ?>">Accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">BACKEND</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="<?= BASE . 'produit/ajout'; ?>">Ajouter Produit</a>
            <a class="dropdown-item" href="<?= BASE . 'produit/gestion'; ?>">Gestion Produit</a>
            <a class="dropdown-item" href="<?= BASE . 'user/inscription'; ?>">S'inscrire</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= BASE . 'user/connexion'; ?>">Se connecter</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php echo '<pre>';
      var_dump($_SESSION);
      echo '</pre>';?>
<div class="container mt-5">
  <?php if(isset($_SESSION['messages'])): ?>
    <?php foreach($_SESSION['messages'] as $type => $messages) :?>
      <?php foreach($messages as $message): ?>
        <div class="w-50 text-center mx-auto alert alert-<?= $type ; ?>"><?= $message;?></div> 
      <?php endforeach; ?>
    <?php endforeach; ?>
    <?php unset($_SESSION['messages']); ?>
  <?php endif; ?>
</div>
<body>




