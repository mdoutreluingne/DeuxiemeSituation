<div class="obstacles" id="obstacles">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Découvrez nos obstacles</h2>
      </div>
      <div class="slides_obstacles" id="slides_obstacles">
          <?php
          //Récupération des obstacles en json
          $lesArticles = $daoArticle->getAllObstacles();

          //Variable d'incrémentation
          $l=0;

          //Affiche les obstacles
          for ($i=0; $i < 2; $i++) {

            echo '
            <div class="card-deck">
            <div class="row row-cols-1 row-cols-md-3">
              ';
            for ($y=0; $y < 6; $y++) {
              echo '
              <div class="col mb-4">
                <div class="card cardobstacles">
                  <img src="css/images/obstacles/'. $lesArticles[$l]['image'] .'" class="img-fluid img-thumbnail img_obstacle" alt="...">
                  <div class="card-body">
                    <h5 class="card-title text-white titre_obstacles">'. $lesArticles[$l]['libelle'] .'</h5>
                    <p class="card-text text-white chiffre_obstacles">'. $lesArticles[$l]['montant'] .'€</p>
                  </div>
                </div>
              </div>
              ';
              $l++;
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
