<?php
if (isset($_POST['delete_new'])) {

      $idActu = $_POST['id_title'];

      //Supprime l'actualite par son id
      $deleteNews = $daoActu->deleteActuById($idActu);

      $msg_delete_news = '<div class="alert alert-success text-center" role="alert">L\'actualité a été supprimer</div>';

}
?>
