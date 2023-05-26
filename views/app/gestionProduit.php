<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center">Gestion des produits</h1>

<div class="container my-3">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Categorie</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($produits as $produit): ?>
            <tr>
                <td><?= $produit['id_produit']; ?></td>
                <td><?= $produit['nom']; ?></td>
                <td><?= $produit['categorie']; ?></td>
                <td><img src="<?= UPLOAD . $produit['image']; ?>" alt="" width="50px"></td>
                <td><?= $produit['prix']; ?>€</td>
                <td>
                    <a href="<?= BASE . 'produit/focus?id=' . $produit['id_produit'] ;?>" class="text-info"><i class="bi bi-eyeglasses"></i></a>
                    <a href="<?= BASE . 'produit/modifier?id=' . $produit['id_produit'] ; ?>" class="text-primary mx-3"><i class="bi bi-pencil-square"></i></a>
                    <a  onclick="return confirm('Etes-vous sûr de vouloir supprimer ce produit ?')" href="<?= BASE . 'produit/supprimer?id=' . $produit['id_produit'] ; ?>" class="text-danger"><i class="bi bi-trash3"></i></a>
                </td>
            </tr>
        <?php endforeach; ?> 
        </tbody>
    </table>
</div>


<?php include(VIEWS . '_partials/footer.php'); ?>