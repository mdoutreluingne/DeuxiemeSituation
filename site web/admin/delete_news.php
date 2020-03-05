<?php
if (isset($_POST['delete_new'])) {


      $delete_actu = $_POST['id_title'];

      $url = "http://localhost:8080/api/actualites/$delete_actu";
      $data = array('id' => $delete_actu);

      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'DELETE',
              'content' => http_build_query($data)
          )
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

      $msg_delete_news = '<div class="alert alert-success text-center" role="alert">L\'actualité a été supprimer</div>';



}
?>
