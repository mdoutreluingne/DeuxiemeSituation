<?php

if (isset($_POST['submit_nbavis'])) {

  if (!empty($_POST['nbavis'])) {

    if ($_POST['nbavis'] >= 3) {
      $nbavis = $_POST['nbavis'];

      $url = "http://localhost:8080/api/configuration/modifConfiguration/,/$nbavis/,";
      $data = array('nbAvis' => $nbavis);

      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'PUT',
              'content' => http_build_query($data)
          )
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

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
