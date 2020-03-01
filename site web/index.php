<?php
include 'include/header.php';
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
          <div class="content_news">
            <div class="slide_news">
              <?php

                //Récupération des actualités en json
                $lesActus = file_get_contents("http://localhost:8080/api/actualites");
                $actualites = json_decode($lesActus, true);
                $date_debut = date('d/m/Y H:i:s', strtotime($actualites[0]['dateDebut'])); //Fomatage de date
                $date_fin = date('d/m/Y H:i:s', strtotime($actualites[0]['dateFin'])); //Fomatage de date

                //Récupération du nombre d'actualités en json
                $nombreActualites = file_get_contents("http://localhost:8080/api/actualites/countActualite");
                $nbActus = json_decode($nombreActualites, true);

                for ($t=0; $t < $nbActus; $t++) {
                  echo '
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="css/images/actualites/'. $actualites[$t]['image'] .'" class="img-fluid img-thumbnail mx-auto d-block">
                      <div class="carousel-caption">
                        <h3 class="titre_actu">'. $actualites[$t]['titre'] .'</h3>
                        <p class="date_actu">'. $date_debut .' - '. $date_fin .'</p>
                        <p class="text_actu">'. $actualites[$t]['paragraphe'] .'</p>
                      </div>
                    </div>
                  </div>';
                }

              ?>

            </div>
          </div>
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
