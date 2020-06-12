<div class="content_news">
  <div class="slide_news">
    <?php
    //Récupération des actualités
    $actualites = $daoActu->getAllActu();

    foreach ($actualites as $uneActu) {
        //Test si la date de fin des news est supérieur à la date d'aujourd'hui
        if (new DateTime($uneActu->getDateFin()) > new DateTime(date('Y-m-d'))) {
            echo '
            <div class="carousel-inner">
              <div class="item active">
                <img src="css/images/actualites/' . $uneActu->getImage()->getNom() . '" class="img-fluid img-thumbnail mx-auto d-block">
                <div class="carousel-caption">
                  <h3 class="titre_actu">' . $uneActu->getTitre() . '</h3>
                  <p class="date_actu">' . date('d/m/Y H:i:s', strtotime($uneActu->getDateDebut())) . ' - ' . date('d/m/Y H:i:s', strtotime($uneActu->getDateFin())) . '</p>
                  <p class="text_actu">' . $uneActu->getParagraphe() . '</p>
                </div>
              </div>
            </div>';
        }
    }

    ?>

  </div>
</div>
