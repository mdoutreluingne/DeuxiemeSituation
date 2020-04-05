<div class="salles" id="salles">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Nos différentes salles</h2>
      </div>
      <div class="slide_salles" id="slide_salles">
        <?php
        //Récupère le nombre de salle
        $parsee = $daoSalle->countSalle();

        //Récupère les salles avec le theme et la ville
        $lesSalles = $daoSalle->getAllSalle();

        //Variable d'incrémentation
        $m=0;

        //Affiche les salles
        for ($i=0; $i < 3; $i++) {

          echo '
          <div class="col-sm-4 col-md-4 pb-2">
            <div class="card-deck">';
            for ($j=0; $j < 3; $j++) {
              echo '
              <div class="card cardsalle">';
              if ($i == 2 && $j == 2) { //La dernière card
                echo '
                <img src="css/images/salles/comming_soon.png" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title" id="salle_presentation">Jack L\'eventreur</h5>
                    <span class="text-white font-italic" id="ville">Toutes les salles</span>
                  </div>
                </div>';
              }
              else {
                echo '
                <img src="css/images/salles/'. $lesSalles[$m]->getImage() .'" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title" id="salle_presentation">'. $lesSalles[$m]->getTheme() .'</h5>
                    <span class="font-italic text-white" id="ville">'. $lesSalles[$m]->getVille() .'</span>
                  </div>
                </div>';
              }

              $m++;
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
