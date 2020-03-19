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
          $nbSalles = $daoSalle->countSalle();

          //Récupère les thèmes
          $lesThemes = $daoTheme->getAllTheme();

          //Récupère les taux de satisfaction des salles
          $lesTaux = $daoAvis->getTauxSatisfaction();

          //Génère les cards avec les noms et les avis des salles
          for ($i=0; $i < $nbSalles; $i++) {

            echo '
            <div class="col-sm-4 col-md-4 pb-2">
              <div class="card cardstat" id="Panel">
                <div class="card-block text-center">
                  <div class="card-title"><h5 class="card-title stat_salle" id="salle'. $i .'">'. $lesThemes[$i]['nom'] .'</h5></div>
                  <p class="card-text taux" id="taux'. $i .'">'. round($lesTaux[$i]['taux']) .'%</p>
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
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
          }

           ?>

         </div>
         </div>

  </div>
</div>
