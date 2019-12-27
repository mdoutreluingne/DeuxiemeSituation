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
          <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" id="button_addnews">Ajouter des news</button>
          <div class="add_news">
            <form action="post_news.php" method="post" enctype="multipart/form-data">
                <span class="text-white">Titre de la news :</span><br>
                <input type="text" class="form-control" placeholder="Titre"><br>
                <span class="text-white">Contenu de la news :</span><br>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea><br>
                <span class="text-white">Date de début :</span><br>
                <input type="date" name="" value=""><br>
                <span class="text-white">Date de fin :</span><br>
                <input type="date" name="" value=""><br>
                <span class="text-white">Image :</span><br>
                <input type="file" class="text-white" name="photo"><br>
                <input type="submit" class="btn btn-info" name="submit" value="Envoyer"><br>
            </form>
          </div>
          <?php if (isset($msg)) { echo $msg; } ?>
        </div>
        <div class="col-6">
          <button type="button" class="btn btn-danger btn-lg btn-block text-uppercase" id="button_deletenews">Supprimer des news</button>
          <div class="delete_news">
            
          </div>
          <?php if (isset($msg)) { echo $msg; } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="nb_alea">
    <div class="container text-center">
      <div class="row">
        <div class="col-12">
          <span class="text-white font-weight-bold">Saisir le nombre d’affichage des photos : </span>
          <input type="text" name="" value="" placeholder="Minimum 3">
          <button type="button" class="btn btn-info">Valider</button>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <span class="text-white font-weight-bold">Saisir le nombre d’affichage des avis : </span>
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
