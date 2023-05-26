<?php include(VIEWS . '_partials/header.php'); ?>

<?php 
// if(isset($produit)){
//      echo '<pre>';
//     var_dump($produit);
//     echo'</pre>';
// }

   

?>
<h1 class="text-center">Modifier Produit</h1>

<div class="container mt-3">
    <form method="post" enctype="multipart/form-data"> 
    <fieldset>
        <input type="hidden" value="<?= $produit['image'] ?? ""; ?>" name="ancienneImg">
        <div class="form-group">
        <label for="nom" class="form-label mt-4">Nom</label>
        <input type="text" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="nom du produit" name="nom" value="<?= $produit['nom'] ?? '' ; ?>">
        <small class="text-danger"><?= $error['nom'] ?? '' ; ?></small>
        </div>
        <div class="form-group">
        <label for="categorie" class="form-label mt-4">Categorie</label>
        <select class="form-select" id="categorie" name="categorie">
            <option <?= (isset($produit['categorie']) && $produit['categorie'] == 'T-shirt')? 'selected' : ''; ?>>T-shirt</option>
            <option <?= (isset($produit['categorie']) && $produit['categorie'] == 'Chaussures')? 'selected' : ''; ?>>Chaussures</option>
            <option <?= (isset($produit['categorie']) && $produit['categorie'] == 'Pantalons')? 'selected' : ''; ?>>Pantalons</option>
        </select>   
        </div>
        <div class="form-group">
        <label for="image" class="form-label mt-4">Image</label>
        <input class="form-control" type="file" id="image" name="image" onchange="loadFile(event)">
        <small class="text-danger"><?= $error['ancienneImg'] ?? ""; ?></small>

        <img src="<?= UPLOAD . $produit['image'];?>" alt="" width="300">
        <img src="" id="photo" width="300" alt="">

        </div>
        <div class="form-group">
        <label for="description" class="form-label mt-4">Description</label>
        <textarea class="form-control" id="description" name="description" rows="8"><?= $produit['description'] ?? ""; ?></textarea>
        </div>
        <small class="text-danger"><?= $error['description'] ?? ""; ?></small>
        <div class="form-group">
        <label for="prix" class="form-label mt-4">Prix</label>
        <input type="number" class="form-control" id="prix" name="prix" min="0" step="0.01" value="<?= $produit['prix'] ?? ""; ?>">
        </div>
        <small class="text-danger"><?= $error['prix'] ?? ""; ?></small>
        <button type="submit" class="mt-3 mb-3 col-12 btn btn-primary">Modifier</button>
    </fieldset>
    </form>
</div>

<script>
    let loadFile = function(event)
    {
        let image = document.getElementById('photo');

        image.src = URL.createObjectURL(event.target.files[0]);
    }

</script>

<?php include(VIEWS . '_partials/footer.php'); ?>