<?php
    //Variables initialisé pour les photos et avis
    $nbavis = 0;
    $notemini = 0;
    $nbAvisAlea = 0;
    $nbphotos = 0;
    $nbPhotosAlea = 0;
    $nbMaxPhotos = 0;

    /**
     * Génère des nombres aléatoires sans doublons.
     * @return array un tableau d'entier
     */
    function nbAlea($nbTotal, $nbMax)
    {
      //Contient les numéros aléatoires
      $numTab = array();

      //Evite qu'un nombre aléatoire ce répète
      for ($h=0; $h < $nbTotal; $h++) {
        $nbPhotosAlea = rand(0, $nbMax-1); //nombre aléatoire généré

        if (in_array($nbPhotosAlea, $numTab, true) == false) { //Vérifie si le nombre généré n'est pas dans le tableau
          $numTab[] = $nbPhotosAlea; //Affecte le nombre
        }
        else {
          $nbTotal++;
        }

      }
      return $numTab;
    }

    //Récupération de la configuration
    $lesConfig = $daoConfig->getAllConfig();

    //Parcour le resultat en json de la configuration et affecte les valeurs de la configuration
    foreach ($lesConfig as $config){
      $nbavis = $config->getNbAvis();
      $notemini = $config->getNoteMin();
      $nbphotos = $config->getNbCommentaire();
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
      //Récupération du nombre d'image
      $nbMaxPhotos = $daoImage->countPhotos();

      //Parcour le tableau retournée
      foreach ($nbMaxPhotos as $nombre) {
        $nbMaxPhotos = $nombre['nbPhotos'];
      }

      //Récupération du nom des photos
      $nomPhotos = $daoImage->getPhotosSalle();
      //Récupère les nombres aléatoires
      $numTabPhotos = nbAlea($nbphotos, $nbMaxPhotos);
        //Affichage les photos
        for ($o=0; $o < $nbphotos; $o++) {

          echo '
          <div class="col-md-4" id="border_salle">
                <div class="card">
                    <a href="css/images/photos/'. $nomPhotos[$numTabPhotos[$o]]->getNom() .'" class="photos"><img src="css/images/photos/'. $nomPhotos[$numTabPhotos[$o]]->getNom() .'" class="card-img-top img-fluid affiche_photos"></a>
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

          //Récupération du nombre d'avis
          $nbMaxAvis = $daoAvis->countAvis();

          //Récupération des avis
          $avis = $daoAvis->getAllAvis();

          //Variable d'incrémentation
          $inc = 1;
          //Affiche les avis
          for ($j=0; $j < $nbMaxAvis; $j++) {

            $nbAvisAlea = rand(0, $nbMaxAvis-1); //nombre aléatoire généré

            if ($inc > $nbavis) { //Force le sortie de la boucle
              break;
            }
            if ($avis[$nbAvisAlea]->getNote() >= $notemini) { //Test si la note est supérieur ou égale à la note minimale
              //Affichage des avis
              echo '
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 content_avis">
                <div class="card cardavis" id="lesAvis">
                  <div class="card-body">
                    <h5 class="font-italic text-danger avis_theme">'. $avis[$nbAvisAlea]->getTheme() .'</h5>
                    <h6 class="card-subtitle mb-2 font-weight-bold text-white">'. $avis[$nbAvisAlea]->getNote() .'/5</h6>
                    <p class="card-text text-white">'. $avis[$nbAvisAlea]->getCommentaire() .'</p>
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
