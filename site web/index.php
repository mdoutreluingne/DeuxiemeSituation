<?php
include 'include/header.php';
require('model/dbal.php');
require('model/daoActualite.php');
require('model/daoConfiguration.php');
require('model/daoAvis.php');
require('model/daoImage.php');
require('model/daoSalle.php');
require('model/daoTheme.php');
require('model/daoArticle.php');
?>

<?php
$daoSalle = new daoSalle();
$daoTheme = new daoTheme();
$daoActu = new daoActualite();
$daoConfig = new daoConfiguration();
$daoImage = new daoImage();
$daoAvis = new daoAvis();
$daoArticle = new daoArticle();
?>

  <header>
    <div class="container-fluid">
      <div class="row">
        <?php
          /* Barre de naviguation */
          include 'include/navbar.php';
        ?>
        <div class="content">
          <div class="content_accueil">
            <h1 class="title">Bienvenue chez Escape Game Corporation</h1>
            <h4 class="description_egc">POURREZ-VOUS VOUS ÉCHAPPER ?</h4>
          </div>
          <?php
            include 'vues/actualite.php';
          ?>
        </div>
      </div>
    </div>
  </header>

<?php
include 'vues/le_jeu.php';
include 'vues/obstacles.php';
include 'vues/salles.php';
include 'vues/stat.php';
include 'vues/comm_avis.php';
?>

<?php
include 'include/footer.php';
?>
