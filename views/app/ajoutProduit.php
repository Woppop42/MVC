<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center mt-3 text-primary">Ajout d'un produit</h1>
<?php var_dump($_POST);
      echo '<br>';
      var_dump($_FILES); ?>
<div class="container">
<form class="m-3" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>Back-office produit</legend>
    <div class="form-group">
      <label for="Nom" class="form-label mt-4">Nom</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom du produit" name="nom"> 
    </div>
    <div class="form-group">
      <label for="categorie" class="form-label mt-4">Catégorie</label>
      <select class="form-select" id="categorie" name="categorie">
        <option>T-shirts</option>
        <option>Chaussures</option>
        <option>Pantalons</option>
      </select>
    </div>
    <div class="form-group">
      <label for="description" class="form-label mt-4">Description</label>
      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du produit"></textarea>
    </div>
    <div class="form-group">
      <label for="image" class="form-label mt-4">Image du produit</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="form-group">
      <label for="prix" class="form-label mt-4">Prix</label>
      <input type="number" class="form-control" id="prix" placeholder="Prix du produit" name="prix" min="0" step="0.01"> 
    </div>
    <button type="submit" class="btn btn-primary mt-3 col-12">Ajouter</button>
  </fieldset>
</form>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>