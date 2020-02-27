<?php

if (isset($_POST['submit_nbphotos'])) {

  if (!empty($_POST['nbphotos'])) {

    if ($_POST['nbphotos'] >= 3) {
      $nbphotos = $_POST['nbphotos'];

      $url = "http://localhost:8080/api/configuration/modifConfiguration/$nbphotos/,/,";
      $data = array('nbCommentaire' => $nbphotos);

      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'PUT',
              'content' => http_build_query($data)
          )
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

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
