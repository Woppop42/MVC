<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center my-3">Bienvenue sur mon site de vente</h1>
<?php 
// echo '<pre>';
//     print_r($produits);
// echo '</pre>';
?>
<div class="container">
    <div class="row justify-content-evenly">
    <?php foreach($produits as $produit): ?>
    <div class="card text-white bg-danger mb-3 col-4" >
        <img src="<?= UPLOAD . $produit['image']; ?>" alt="" class="img-fluid p-2">
        <div class="card-header"><?= $produit['categorie']; ?></div>
        <div class="card-body">
            <h4 class="card-title"><?= $produit['nom']; ?></h4>
            <p class="card-text"><?= $produit['description']; ?></p>
            <div class="text-center">
                <a href="<?= BASE . 'produit/focus?id=' . $produit['id_produit'] ;?>" class="btn btn-primary">Détails</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    </div>
</div>



<?php include(VIEWS . '_partials/footer.php'); ?>
