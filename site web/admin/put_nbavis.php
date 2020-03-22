<?php

if (isset($_POST['submit_nbavis'])) {

  if (!empty($_POST['nbavis'])) {

    if ($_POST['nbavis'] >= 3) {
      $nbavis = $_POST['nbavis'];

      //Modification du nombre d'avis
      $nbavis = $daoConfig->putNbAvis($nbavis);

      $msg_nbavis = '<div class="alert alert-success text-center" role="alert">Le nombre d’affichage des avis a bien été modifier.</div>';
    }
    else {
      $msg_nbavis = '<div class="alert alert-danger text-center" role="alert">Le chiffre saisi doit être au minimum 3.</div>';
    }

  }
  else {
    $msg_nbavis = '<div class="alert alert-danger text-center" role="alert">Le formulaire est vide.</div>';
  }

}

?>
