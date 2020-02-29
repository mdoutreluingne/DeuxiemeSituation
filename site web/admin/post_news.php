<?php

if (isset($_POST['submit_new'])) {
  // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
  if (isset($_FILES['photo']) AND !empty($_FILES['photo']) AND $_FILES['photo']['error'] == 0) {

          // Testons si le fichier n'est pas trop gros
          if ($_FILES['photo']['size'] <= 1000000) {
                  // Testons si l'extension est autorisée
                  $infosfichier = pathinfo($_FILES['photo']['name']);
                  $extension_upload = $infosfichier['extension'];
                  $extensions_autorisees = array('jpg', 'jpeg', 'png');
                  if (in_array($extension_upload, $extensions_autorisees))
                  {
                          // On peut valider le fichier et le stocker définitivement
                          move_uploaded_file($_FILES['photo']['tmp_name'], '../css/images/actualites/' . basename($_FILES['photo']['name']));
                          $image = $_FILES['photo']['name'];
                          $image = str_replace('.', ',', $image); //Remplace , par . dans le nom de l'image 
                          $titre = $_POST['titre'];
                          $contenu = $_POST['contenu'];
                          $date_debut = $_POST['date_debut'];
                          $date_fin = $_POST['date_fin'];

                          $url = "http://localhost:8080/api/actualites/addActualite/$titre/$contenu/$image/$date_debut/$date_fin";
                          $data = array('titre' => $titre, 'paragraphe' => $contenu, 'dateDebut' => $date_debut, 'dateFin' => $date_fin, 'image' => $image);

                          $options = array(
                              'http' => array(
                                  'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                                  'method'  => 'POST',
                                  'content' => http_build_query($data)
                              )
                          );
                          $context  = stream_context_create($options);
                          $result = file_get_contents($url, false, $context);

                          $msg_news = '<div class="alert alert-success" role="alert">La news a bien été ajouté</div>';
                  }
          }
  }
}

 ?>
