<?php
include 'include/header.php';

require "vendor/autoload.php";

//Inclue les classes metier
use App\metier\actualite;
use App\metier\article;
use App\metier\avis;
use App\metier\configuration;
use App\metier\image;
use App\metier\salle;
use App\metier\theme;
use App\metier\user;

//Inclue les classes dao
use App\model\dao;
use App\model\daoSalle;
use App\model\daoTheme;
use App\model\daoActualite;
use App\model\daoConfiguration;
use App\model\daoImage;
use App\model\daoAvis;
use App\model\daoArticle;

?>

<?php
//Initialisation des dao
$dao = new dao();
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
            //Inclue la vue actualite
            include 'vues/actualite.php';
          ?>
        </div>
      </div>
    </div>
  </header>

<?php
//Inclue les vues
include 'vues/le_jeu.php';
include 'vues/obstacles.php';
include 'vues/salles.php';
include 'vues/stat.php';
include 'vues/comm_avis.php';
?>

<?php
include 'include/footer.php';
?>
