<?php
include 'include/header.php';
include 'put_nbphotos.php'; //Formulaire pour changer le nombre de photo
include 'put_nbavis.php'; //Formulaire pour changer le nombre d'avis
include 'put_notemini.php'; //Formulaire pour changer la note minimale
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
        </div>
        <div class="col-6">
          <button type="button" class="btn btn-danger btn-lg btn-block text-uppercase" id="button_deletenews">Supprimer des news</button>
          <div class="delete_news">

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="nb_alea">
    <div class="container text-center">
      <div class="row">
        <div class="col-12">
          <form class="" action="" method="post">
            <span class="text-white font-weight-bold">Saisir le nombre d’affichage des photos : </span>
            <input type="number" name="nbphotos" value="" placeholder="Minimum 3">
            <button type="submit" name="submit_nbphotos" id="submit" class="btn btn-info">Valider</button>
            <?php if(isset($msg_nbphotos)) {echo $msg_nbphotos;}  ?>
          </form>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <form class="" action="" method="post">
            <span class="text-white font-weight-bold">Saisir le nombre d’affichage des avis : </span>
            <input type="number" name="nbavis" value="" placeholder="Minimum 3">
            <button type="submit" name="submit_nbavis" id="submit" class="btn btn-info">Valider</button>
            <?php if(isset($msg_nbavis)) {echo $msg_nbavis;}  ?>
          </form>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <form class="" action="" method="post">
            <span class="text-white font-weight-bold">Saisir la note minimale des avis : </span>
            <input type="number" name="notemini" value="" placeholder="Chiffre entre 0 et 5">
            <button type="submit" name="submit_notemini" id="submit" class="btn btn-info">Valider</button>
            <?php if(isset($msg_notemini)) {echo $msg_notemini;}  ?>
          </form>
        </div>
      </div>
    </div>

  </div>

</div>

<?php
include 'include/footer.php';
?>
