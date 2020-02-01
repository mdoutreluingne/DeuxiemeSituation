<div class="comm_avis" id="comm_avis">
  <div class="container">
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Photos</h2>
      </div>
    </div>
    <div class="row">
      <div class="gallery_comm col-lg-4 col-md-4 col-sm-4 col-xs-4 filter hdpe">
        <img src="css/images/noel.jpg" class="img-responsive">
      </div>

      <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-4 filter sprinkle">
        <img src="css/images/noel.jpg" class="img-responsive">
      </div>

      <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-4 filter hdpe">
        <img src="css/images/noel.jpg" class="img-responsive">
      </div>
    </div>
    <div class="row">
      <div class="text-center">
        <h2 class="underline text-uppercase">Avis</h2>
      </div>
    </div>
    <div class="row">

      <?php
      $nbavis = 0;
      $notemini = 0;
      $nbAvisAlea = 0;
      $tab = array();
      //Recherche le nombre d'avis d'avis
      $nbAvisTotal = file_get_contents("http://localhost:8080/api/avis/countAvis");
      $nbMaxAvis = json_decode($nbAvisTotal, true);


      $configurations = file_get_contents("http://localhost:8080/api/configurations");
      $parsee = json_decode($configurations, true);

      foreach ($parsee as $config){
        $nbavis = $config['nbAvis'];
        $notemini = $config['noteMin'];
      }

      $lesAvis = file_get_contents("http://localhost:8080/api/avis/allAvis");
      $avis = json_decode($lesAvis, true);

      /*foreach ($avis as $key => $value) {

        if ($value['note'] >= $notemini) {
          $tab['id'] = $value['id'];

        }
      }*/
        //var_dump($random[0]);

$inc = 1;
        for ($j=1; $j < $nbMaxAvis; $j++) {

          $nbAvisAlea = rand(1, $nbMaxAvis-1); //nombre aléatoire

          if ($inc > $nbavis) {
            break;
          }
          if ($avis[$nbAvisAlea]['note'] >= $notemini) {

              echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
              <div class="card" style="width: 18rem;">
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
