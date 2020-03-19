<?php
    //Variables initialisé pour le container photos et avis
    $nbavis = 0;
    $notemini = 0;
    $nbAvisAlea = 0;
    $nbphotos = 0;
    $nbPhotosAlea = 0;
    $nbMaxPhotos = 0;

    //Récupération de la configuration en json
    $lesConfig = $daoConfig->getAllConfig();

    //Parcour le resultat en json de la configuration
    foreach ($lesConfig as $config){
      $nbavis = $config['nbAvis'];
      $notemini = $config['noteMin'];
      $nbphotos = $config['nbCommentaire'];
    }

?>
<div class="comm_avis" id="comm_avis">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Photos</h2>
      </div>
    </div>
    <div class="row mb-3">

      <?php
      //Récupération du nombre d'image en json

      $nbMaxPhotos = $daoImage->countPhotos();

      //Parcour le tableau retournée
      foreach ($nbMaxPhotos as $nombre) {
        $nbMaxPhotos = $nombre['nbPhotos'];
      }

      $nomPhotos = $daoImage->getPhotosSalle();
      //Récupération du nom des photos en json

        //Affichage des photos
        for ($o=0; $o < $nbphotos; $o++) {

          $nbPhotosAlea = rand(0, $nbMaxPhotos-1); //nombre aléatoire photos

          echo '
          <div class="col-md-4" id="border_salle">
                <div class="card">
                    <a href="css/images/photos/'. $nomPhotos[$nbPhotosAlea]['nom'] .'" class="photos"><img src="css/images/photos/'. $nomPhotos[$nbPhotosAlea]['nom'] .'" class="card-img-top img-fluid affiche_photos"></a>
                </div>
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
          
          $nbMaxAvis = $daoAvis->countAvis();

          //Récupération des avis en json

          $avis = $daoAvis->getAllAvis();

          $inc = 1;

          for ($j=0; $j < $nbMaxAvis; $j++) {

            $nbAvisAlea = rand(0, $nbMaxAvis-1); //nombre aléatoire avis

            if ($inc > $nbavis) { //Force le sortie de la boucle
              break;
            }
            if ($avis[$nbAvisAlea]['note'] >= $notemini) { //Affichage des avis

              echo '
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 content_avis">
                <div class="card cardavis" id="lesAvis">
                  <div class="card-body">
                    <h5 class="font-italic text-danger avis_theme">'. $avis[$nbAvisAlea]['theme'] .'</h5>
                    <h6 class="card-subtitle mb-2 font-weight-bold text-white">'. $avis[$nbAvisAlea]['note'] .'/5</h6>
                    <p class="card-text text-white">'. $avis[$nbAvisAlea]['commentaire'] .'</p>
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
