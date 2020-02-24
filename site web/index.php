<?php
include 'include/header.php';
?>
  <header>
    <div class="container-fluid">
      <div class="row">
        <?php
        include 'include/navbar.php';
        ?>
        <div class="content">
          <div class="content_accueil">
            <h1 class="title">Bienvenue chez Escape Game Corporation</h1>
            <p class="description_egc">Plongez dans un monde digne des plus grands films, résistez au stress et à l’angoisse oppressante qui vous entourent, déjouez les plus grandes énigmes et sortez indemnes … Ou presque … De cette aventure !</p>
            <p class="description_egc">Vous avez 60 minutes, pas une de plus pour vous échapper de ces rooms ...</p>
            <p class="description_egc" id="color_accueil">C’est à vous de jouer !</p>
          </div>
          <div class="content_news">
            <div class="slide_news">
              <?php
                //Récupération des actualités en json
                $lesActus = file_get_contents("http://localhost:8080/api/actualites");
                $actualites = json_decode($lesActus, true);
                $date_debut = date('d-m-Y H:i:s', strtotime($actualites[0]['dateDebut'])); //Fomatage de date
                $date_fin = date('d-m-Y H:i:s', strtotime($actualites[0]['dateFin'])); //Fomatage de date


                for ($t=0; $t < 2; $t++) {
                  echo '
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="css/images/actualites/'. $actualites[$t]['image'] .'" class="img-fluid img-thumbnail mx-auto d-block">
                      <div class="carousel-caption">
                        <h3>'. $actualites[$t]['titre'] .'</h3>
                        <p>'. $date_debut .' - '. $date_fin .'</p>
                        <p>'. $actualites[$t]['paragraphe'] .'</p>
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
include 'vues/obstacles.php';
include 'vues/salles.php';
include 'vues/stat.php';
include 'vues/comm_avis.php';
?>

<?php
include 'include/footer.php';
?>
