<div class="content_news">
  <div class="slide_news">
    <?php

    $actualites = $daoActu->getAllActu();
    $nbActus = $daoActu->countActu();

      //Affiche les Actualités
      for ($t=0; $t < $nbActus; $t++) {
          //Affiche les news qui sont supérieur à celle d'aujourd'hui
        if (new DateTime($actualites[$t]['dateFin']) > new DateTime(date('Y-m-d'))) {
            echo '
        <div class="carousel-inner">
          <div class="item active">
            <img src="css/images/actualites/'. $actualites[$t]['image'] .'" class="img-fluid img-thumbnail mx-auto d-block">
            <div class="carousel-caption">
              <h3 class="titre_actu">'. $actualites[$t]['titre'] .'</h3>
              <p class="date_actu">'. date('d/m/Y H:i:s', strtotime($actualites[$t]['dateDebut'])) .' - '. date('d/m/Y H:i:s', strtotime($actualites[$t]['dateFin'])) .'</p>
              <p class="text_actu">'. $actualites[$t]['paragraphe'] .'</p>
            </div>
          </div>
        </div>';
        }
      }

    ?>

  </div>
</div>
