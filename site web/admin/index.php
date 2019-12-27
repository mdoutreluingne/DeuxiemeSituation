<?php
include 'include/header.php';
?>
<div class="container-fluid">
  <div class="row">
    <?php
    include 'include/navbar.php';
    ?>
  </div>
</div>

<div class="panel_admin">
  <div class="gestion_news">
    <div class="container text-center">
      <div class="row">
        <div class="col-6">
          <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" id="button_news">Ajouter des news</button>
          <div class="add_news">
            <form action="" method="post" enctype="multipart/form-data">
                <label>Photo :</label><br>
                <input type="file" name="photo"><br>
                <input type="submit" name="submit" value="Envoyer"><br>
            </form>
          </div>
        </div>
        <div class="col-6">
          <button type="button" class="btn btn-danger btn-lg btn-block text-uppercase" id="button_news">Supprimer des news</button>
        </div>
      </div>
    </div>
  </div>
  <div class="nb_alea">
    <div class="container text-center">
      <div class="row">
        <div class="col-12">
          <span class="text-white">Saisir le nombre d’affichage des photos : </span>
          <input type="text" name="" value="" placeholder="Minimum 3">
          <button type="button" class="btn btn-info">Valider</button>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <span class="text-white">Saisir le nombre d’affichage des avis : </span>
          <input type="text" name="" value="" placeholder="Minimum 3">
          <button type="button" class="btn btn-info">Valider</button>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
include 'include/footer.php';
?>
