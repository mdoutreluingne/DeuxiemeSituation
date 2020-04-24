<?php

if (isset($_POST['submit_new'])) {
    // Test si les champs obligatoires ne sont pas vide
  if (!empty($_POST['titre']) AND !empty($_POST['date_debut']) AND !empty($_POST['date_fin']) AND !empty($_FILES['photo'])) {

      // Testons si l'image a bien été envoyé et s'il n'y a pas d'erreur
      if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0) {

          // Testons si le fichier est inférieur à 1Mo
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
                  $titre = $_POST['titre'];
                  $contenu = $_POST['contenu'];
                  $date_debut = $_POST['date_debut'];
                  $date_fin = $_POST['date_fin'];

                  //Ajout l'actualité
                  $image = new \App\metier\image(null, null, null, $image, null, null);
                  $addNews = $daoActu->postActu($titre, $contenu, $date_debut, $date_fin, $image);

                  $msg_news = '<div class="alert alert-success text-center" role="alert">La news a bien été ajouté</div>';
              }
              else {
                  $msg_news = '<div class="alert alert-danger text-center" role="alert">L\'extension de cette image n\'est pas autorisée</div>';
              }
          }
          else {
              $msg_news = '<div class="alert alert-danger text-center" role="alert">L\'image est trop volumineuse</div>';
          }
      }
      else {
          $msg_news = '<div class="alert alert-danger text-center" role="alert">Une erreur est survenue lors de l\'envoi de l\'image, veuillez ressayer</div>';
      }
  }
  else {
      $msg_news = '<div class="alert alert-danger text-center" role="alert">Vous devez renseigner les champs indiqués</div>';
  }
}

 ?>
