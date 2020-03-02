<div class="obstacles" id="obstacles">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Découvrez nos obstacles</h2>
      </div>
      <div class="row row-cols-1 row-cols-md-3">
        <?php

        //Récupération des obstacles en json
        $articles = file_get_contents("http://localhost:8080/api/articles/lesArticles");
        $lesArticles = json_decode($articles, true);

        for ($y=0; $y < 6; $y++) {
          echo '
          <div class="col mb-4">
            <div class="card cardobstacles">
              <img src="css/images/obstacles/'. $lesArticles[$y]['image'] .'" class="img-fluid img-thumbnail img_obstacle" alt="...">
              <div class="card-body">
                <h5 class="card-title text-white titre_obstacles">'. $lesArticles[$y]['libelle'] .'</h5>
                <p class="card-text text-white chiffre_obstacles">'. $lesArticles[$y]['montant'] .'€</p>
              </div>
            </div>
          </div>';
        }
        ?>


      </div>
    </div>
  </div>
</div>
