<div class="comm_avis" id="comm_avis">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Photos</h2>
      </div>
    </div>
    <div class="row">
      <?php
      //Variables initialisé pour le container photos et avis
      $nbavis = 0;
      $notemini = 0;
      $nbAvisAlea = 0;
      $nbphotos = 0;

      //Récupération de la configuration en json
      $configurations = file_get_contents("http://localhost:8080/api/configurations");
      $parsee = json_decode($configurations, true);

      //Parcour le resultat en json de la configuration
      foreach ($parsee as $config){
        $nbavis = $config['nbAvis'];
        $notemini = $config['noteMin'];
        $nbphotos = $config['nbCommentaire'];
      }

        //Affichage des photos
        for ($o=0; $o < $nbphotos; $o++) {
          echo '
          <div class="gallery_comm col-lg-4 col-md-4 col-sm-4 col-xs-4 filter hdpe">
            <img src="css/images/room.jpg" class="img-responsive">
          </div>';
        }
      ?>

    </div>
    <!--LES AVIS-->
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Avis</h2>
      </div>
    </div>
    <div class="row">

      <?php

          //Récupération du nombre d'avis en json
          $nbAvisTotal = file_get_contents("http://localhost:8080/api/avis/countAvis");
          $nbMaxAvis = json_decode($nbAvisTotal, true);

          //Récupération des avis en json
          $lesAvis = file_get_contents("http://localhost:8080/api/avis/allAvis");
          $avis = json_decode($lesAvis, true);

          $inc = 1;

          for ($j=1; $j < $nbMaxAvis; $j++) {

            $nbAvisAlea = rand(1, $nbMaxAvis-1); //nombre aléatoire

            if ($inc > $nbavis) { //Force le sortie de la boucle
              break;
            }
            if ($avis[$nbAvisAlea]['note'] >= $notemini) { //Affichage des avis

              echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="card" id="lesAvis">
              <div class="card-body">
              <h5 class="font-italic text-danger">'. $avis[$nbAvisAlea]['theme'] .'</h5>
              <h6 class="card-subtitle mb-2 font-weight-bold">'. $avis[$nbAvisAlea]['note'] .'/5</h6>
              <p class="card-text">'. $avis[$nbAvisAlea]['commentaire'] .'</p>
              </div>
              </div>
              </div>';

              $inc++;
            }

          }

       ?>

    </div>
  </div>
</div>
