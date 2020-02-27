<?php

if (isset($_POST['submit_notemini'])) {

  if (!empty($_POST['notemini'])) {

    if ($_POST['notemini'] >= 0 && $_POST['notemini'] <= 5) {
      $notemini = $_POST['notemini'];

      $url = "http://localhost:8080/api/configuration/modifConfiguration/,/,/$notemini";
      $data = array('noteMin' => $notemini);

      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'PUT',
              'content' => http_build_query($data)
          )
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

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
