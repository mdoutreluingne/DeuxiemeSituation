<div class="salles" id="salles">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Nos différentes salles</h2>
      </div>
      <div class="slide_salles" id="slide_salles">
        <?php
        $json = file_get_contents("http://localhost:8080/api/salles/countSalle");
        $parsee = json_decode($json, true);

        //Récupère les salles avec theme et ville
        $salles = file_get_contents("http://localhost:8080/api/salles/lesSalles");
        $lesSalles = json_decode($salles, true);

        $m=0;

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
                <img src="css/images/salles/'. $lesSalles[$m]['image'] .'" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title" id="salle_presentation">'. $lesSalles[$m]['theme'] .'</h5>
                    <span class="font-italic text-white" id="ville">'. $lesSalles[$m]['ville'] .'</span>
                  </div>
                </div>';
              }

              $m++;
            }

            echo '
            </div>
          </div>';


        }

        /*for ($i=0; $i < $parsee; $i++) {
          echo '
          <div class="col-sm-4 col-md-4 pb-2">
            <div class="card card-outline-info" id="Panel">
              <div class="card-block">
                <div class="card-title">
                <img src="css/images/noel.jpg" class="card-img-top" alt="...">
                    <span>Card #</span>
                    <button type="button" class="close" data-target="#Panel" data-dismiss="alert">
                    <span class="float-right"><i class="fa fa-remove"></i></span>
                    </button>
                  </div>
                </div>
              </div>
          </div>';
        }*/


         ?>

      </div>
    </div>
  </div>
</div>
