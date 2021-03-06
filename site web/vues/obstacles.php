<div class="obstacles" id="obstacles">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Découvrez nos obstacles</h2>
      </div>
      <div class="slides_obstacles" id="slides_obstacles">
          <?php
          //Récupération des obstacles
          $lesArticles = $daoArticle->getAllObstacles();

          //Récupération le nombre d'obstacles
          $nbArticles = $daoArticle->getCountObstacles();
          $nbSlides = $nbArticles / 6; //Calcul le nombre nécéssaire de slide
          $nbObstacles = $nbArticles % 6; //Calcul le reste d'obstacles
          
          //Ajuste le nombre de slide nécéssaire en fonction du nombre d'article
          if (is_float($nbSlides) == true) {
            $nbSlides = intval($nbSlides);
            $nbSlides++;
          }
          //Variable d'incrémentation
          $l=0;

          //Affiche les obstacles
          for ($i=0; $i < $nbSlides; $i++) {

            echo '
            <div class="card-deck">
            <div class="row row-cols-1 row-cols-md-3">
              ';
                //Affiche le reste des obstacles
                if ($i == 2) {
                  $nbObstacles = $nbArticles % 6; //Calcul le reste d'obstacles
                    for ($y=0; $y < $nbObstacles; $y++) {
                    echo '
                    <div class="col mb-4">
                      <div class="card cardobstacles">
                        <img src="css/images/obstacles/'. $lesArticles[$l]->getImage()->getNom() .'" class="img-fluid img-thumbnail img_obstacle" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-white titre_obstacles">'. $lesArticles[$l]->getLibelle() .'</h5>
                          <p class="card-text text-white chiffre_obstacles">'. $lesArticles[$l]->getMontant() .'€</p>
                        </div>
                      </div>
                    </div>
                    ';
                    $l++;
                  }
                } else {
                    for ($y=0; $y < 6; $y++) {
                    echo '
                    <div class="col mb-4">
                      <div class="card cardobstacles">
                        <img src="css/images/obstacles/'. $lesArticles[$l]->getImage()->getNom() .'" class="img-fluid img-thumbnail img_obstacle" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-white titre_obstacles">'. $lesArticles[$l]->getLibelle() .'</h5>
                          <p class="card-text text-white chiffre_obstacles">'. $lesArticles[$l]->getMontant() .'€</p>
                        </div>
                      </div>
                    </div>
                    ';
                    $l++;
                  }
                }
                
            echo '
            </div>
          </div>';
          }

          ?>

      </div>

    </div>
  </div>
</div>
