<?php

if (isset($_POST['submit_nbphotos'])) {

  if (!empty($_POST['nbphotos'])) {

    if ($_POST['nbphotos'] >= 3) {
      $nbphotos = $_POST['nbphotos'];

      //Modification du nombre de photos
      $nbphotos = $daoConfig->putNbPhotos($nbphotos);

      $msg_nbphotos = '<div class="alert alert-success text-center" role="alert">Le nombre d’affichage des photos a bien été modifier.</div>';
    }
    else {
      $msg_nbphotos = '<div class="alert alert-danger text-center" role="alert">Le chiffre saisi doit être au minimum 3.</div>';
    }

  }
  else {
    $msg_nbphotos = '<div class="alert alert-danger text-center" role="alert">Le formulaire est vide.</div>';
  }

}

?>
