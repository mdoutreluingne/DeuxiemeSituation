<div class="stat" id="stat">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Taux de satisfaction de nos joueurs</h2>
      </div>
    </div>
    <div class="row" id="test">
        <div class="card-deck text-white w-100">

          <?php
          //Récupère le nombre de salles
          $nombreSalles = file_get_contents("http://localhost:8080/api/salles/countSalle");
          $nbSalles = json_decode($nombreSalles, true);

          //Récupère les thèmes
          $themes = file_get_contents("http://localhost:8080/api/themes/lesThemes");
          $lesThemes = json_decode($themes, true);

          //Génère les cards avec les noms et les avis des salles
          for ($i=0; $i < $nbSalles; $i++) {

            echo '
            <div class="col-sm-4 col-md-4 pb-2">
              <div class="card cardstat" id="Panel">
                <div class="card-block text-center">
                  <div class="card-title"><h5 class="card-title" id="salle'. $i .'">'. $lesThemes[$i]['nom'] .'</h5></div>
                  <p class="card-text" id="taux'. $i .'"></p>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-danger" id="button_salle'. $i .'" data-toggle="modal" data-target="#modal'. $i .'">
                    AVIS
                  </button>

                  <!-- Modal -->
                  <div class="modal fade text-dark" id="modal'. $i .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">'. $lesThemes[$i]['nom'] .'</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- Contenu de la popup -->
                        <div class="modal-body text-left" id="avis_salle'. $i .'">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
          }
          /*$nbSalles = 0;

          $nombreSalles = file_get_contents("http://localhost:8080/api/salles/countSalle");
          $nbSalles = json_decode($nombreSalles, true);

          $themes = file_get_contents("http://localhost:8080/api/themes/lesThemes");
          $lesThemes = json_decode($themes, true);

          $nbSalles = $nbSalles % 3; //Reste des salles
          //var_dump($lesThemes);
          $incre = 0; //Utile pour incrementé le nombre des id

for ($j=1; $j <= 3; $j++) {

  echo '
  <div class="row">
      <div class="card-deck text-white w-100">';

        if ($nbSalles > 0) {
          for ($i=1; $i <= 3; $i++) {
            echo '
            <div class="card col-4 cardstat">
              <div class="card-body text-center">
                <h5 class="card-title" id="salle'. $incre .'">'. $lesThemes[$incre]['nom'] .'</h5>
                <p class="card-text" id="taux'. $incre .'"></p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" id="button_salle'. $incre .'" data-toggle="modal" data-target="#modal'. $incre .'">
                  AVIS
                </button>

                <!-- Modal -->
                <div class="modal fade text-dark" id="modal'. $incre .'" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <!-- Contenu de la popup -->
                      <div class="modal-body text-left" id="avis_salle'. $incre .'">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>';

            $incre++;
          }
        }
        else {

        }



      echo '
      </div>
  </div>';

}

*/
           ?>

         </div>
         </div>

  </div>
</div>
