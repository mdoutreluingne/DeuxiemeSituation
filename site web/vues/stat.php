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

            $avisStat = $daoAvis->getAvisByTheme($lesThemes[$i]->getNom());

            echo '
            <div class="col-sm-4 col-md-4 pb-2">
              <div class="card cardstat" id="Panel">
                <div class="card-block text-center">
                  <div class="card-title"><h5 class="card-title stat_salle" id="salle'. $i .'">'. $lesThemes[$i]->getNom() .'</h5></div>
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
                          <h5 class="modal-title" id="exampleModalScrollableTitle">'. $lesThemes[$i]->getNom() .'</h5>
                        </div>
                        <!-- Contenu de la popup -->
                        <div class="modal-body text-left" id="avis_salle'. $i .'">';
                        //Parcours les avis selon le thème
                        foreach ($avisStat as $unAvisStat) {
                          echo '<h6 class="text-white"><strong>'.$unAvisStat->getNote().'/5</strong> - '.$unAvisStat->getCommentaire().'</h6>';
                        }
                        echo '</div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
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
