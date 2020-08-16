<?php

if (isset($_POST['submit_notemini'])) {

  if (!empty($_POST['notemini'])) {

    if ($_POST['notemini'] >= 0 && $_POST['notemini'] <= 5) {
      $notemini = $_POST['notemini'];

      //Modification du nombre mini des notes des avis
      $notemini = $daoConfig->putNoteMini($notemini);

      $msg_notemini = '<div class="alert alert-success text-center" role="alert">La note minimale a bien été modifier.</div>';
    }
    else {
      $msg_notemini = '<div class="alert alert-danger text-center" role="alert">Le chiffre saisi doit être entre 0 et 5.</div>';
    }

  }
  else {
    $msg_notemini = '<div class="alert alert-danger text-center" role="alert">Le formulaire est vide.</div>';
  }

}

?>
