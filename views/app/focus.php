<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center"><?= $produit['nom'] ;?></h1>

<p class="text-center"><?= $produit['categorie'] ;?></p>

<div class="container text-center"><img class="mx-auto" src="<?= UPLOAD . $produit['image']; ?>" alt="" ></div>

<p class="text-center"><?= $produit['description']; ?></p>

<p class="text-center"><?= $produit['prix'] . '€' ;?></p>





<?php include(VIEWS . '_partials/footer.php'); ?>
