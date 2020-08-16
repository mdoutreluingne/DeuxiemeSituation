<?php
session_start();
if (!isset($_SESSION['id']))
{
  header('Location: ../vues/login.php ');
}

require "../vendor/autoload.php";

//Inclue les classe métier
use App\metier\actualite;
use App\metier\configuration;

//Inclue les classes dao
use App\model\dao;
use App\model\daoActualite;
use App\model\daoConfiguration;
?>

<?php
$dao = new dao();
$daoActu = new daoActualite();
$daoConfig = new daoConfiguration();
?>

<?php
include 'include/header.php';
include 'put_nbphotos.php'; //Formulaire pour changer le nombre de photo
include 'put_nbavis.php'; //Formulaire pour changer le nombre d'avis
include 'put_notemini.php'; //Formulaire pour changer la note minimale
include 'post_news.php'; //Formulaire pour ajouter une actu
include 'delete_news.php'; //Formulaire pour supprimer une actu
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
    <div class="container">
      <div class="row">
        <div class="col-6">
          <?php if(isset($msg_news)) {echo $msg_news;}  ?>
          <button type="button" class="btn btn-success btn-lg btn-block text-uppercase" id="button_addnews">Ajouter des news</button>
          <div class="add_news">
            <form action="" method="post" enctype="multipart/form-data">
                <span class="text-danger">Champs obligatoires : *</span><br>
                <span class="text-white">Titre de la news :<span class="obligatoire">*</span></span><br>
                <input type="text" name="titre" class="form-control" value="<?php if (isset($_POST['titre'])){ echo $_POST['titre']; }?>">
                <span class="text-white">Contenu de la news :</span><br>
                <textarea class="form-control" name="contenu" id="exampleFormControlTextarea1" rows="3"><?php if (isset($_POST['contenu'])){ echo $_POST['contenu']; }?></textarea>
                <span class="text-white">Date de début :<span class="obligatoire">*</span></span><br>
                <input type="datetime-local" class="form-control" name="date_debut" value="<?php if (isset($_POST['date_debut'])){ echo $_POST['date_debut']; }?>">
                <span class="text-white">Date de fin :<span class="obligatoire">*</span></span><br>
                <input type="datetime-local" class="form-control" name="date_fin" value="<?php if (isset($_POST['date_fin'])){ echo $_POST['date_fin']; }?>">
                <span class="text-white">Image :<span class="obligatoire">*</span></span><br>
                <span class="text-danger font-italic">Taille maximale : 1Mo </span><br>
                <span class="text-danger font-italic">Dimension 1200x400 de préférence</span><br>
                <input type="file" class="text-white" name="photo">
                <input type="submit" class="btn btn-info form-control save" name="submit_new" value="Valider">
            </form>
          </div>
        </div>
        <div class="col-6">
          <?php if(isset($msg_delete_news)) {echo $msg_delete_news;}  ?>
          <button type="button" class="btn btn-danger btn-lg btn-block text-uppercase" id="button_deletenews">Supprimer des news</button>
          <div class="delete_news text-center">
            <table class="table table-bordered table-dark table-hover">
              <thead>
                <tr>
                  <th scope="col">Titre</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php

                //Récupération des actualités en json
                $actualites = $daoActu->getAllActu();

                //Parcour le resultat obtenue en json
                foreach ($actualites as $actu){
                  echo '
                  <form class="" action="" method="post">
                    <tr>
                      <th scope="row">'. $actu->getTitre() .'</th>
                      <input type="hidden" name="id_title" value="'. $actu->getId() .'">
                      <td><input type="submit" name="delete_new" class="btn btn-danger" value="Supprimer"></td>
                    </tr>
                  </form>';
                }

                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="nb_alea">
    <div class="container text-center">
      <div class="row">
        <div class="col-12">
          
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          
        </div>
      </div>
    </div>
  </div>

  <div class="container">
  <?php 
    //Variables initialisé pour les photos et avis
    $nbavis = 0;
    $notemini = 0;
    $nbphotos = 0;

    //Récupération de la configuration
      $lesConfig = $daoConfig->getAllConfig();

      //Parcour le resultat en json de la configuration et affecte les valeurs de la configuration
      foreach ($lesConfig as $config){
        $nbavis = $config->getNbAvis();
        $notemini = $config->getNoteMin();
        $nbphotos = $config->getNbCommentaire();
      }
    
    ?>
    <?php
      //Message d'information concernant les formulaires
     if(isset($msg_nbavis)) {echo $msg_nbavis;} 
     if(isset($msg_nbphotos)) {echo $msg_nbphotos;} 
     if(isset($msg_notemini)) {echo $msg_notemini;} 
     
     ?>
    <div class="row">
    <div class="col-md-4">
      <div class="card-counter primary" id="modif_avis">
        <h5>Modifier le nombre d'avis</h5>
        <span class="count-numbers"><?php echo $nbavis; ?></span>
        <span class="count-name">Avis affichés</span>
        <div class="form_config">
          <form class="" action="" method="post">
            <span class="text-white font-italic">Saisir le nombre d’affichage des avis : </span>
            <input type="number" name="nbavis" value="" placeholder="Minimum 3">
            <button type="submit" name="submit_nbavis" id="submit" class="btn btn-info">Valider</button> 
          </form> 
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-counter danger">
        <h5>Modifier le nombre de photo</h5>
        <span class="count-numbers"><?php echo $nbphotos; ?></span>
        <span class="count-name">Photos affichées</span>
        <div class="form_config">
          <form class="" action="" method="post">
            <span class="text-white font-italic">Saisir le nombre d’affichage des photos : </span>
            <input type="number" name="nbphotos" value="" placeholder="Minimum 3">
            <button type="submit" name="submit_nbphotos" id="submit" class="btn btn-info">Valider</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-counter success">
        <h5>Modifier la note minimale</h5>
        <span class="count-numbers"><?php echo $notemini; ?></span>
        <span class="count-name">Note minimale des avis</span>
        <div class="form_config">
          <form class="" action="" method="post">
            <span class="text-white font-italic">Saisir la note minimale des avis : </span>
            <input type="number" step="any" name="notemini" value="" placeholder="Chiffre entre 0 et 5">
            <button type="submit" name="submit_notemini" id="submit" class="btn btn-info">Valider</button> 
          </form>
        </div>
      </div>
    </div>

    
  </div>

</div>

<?php
include 'include/footer.php';
?>
