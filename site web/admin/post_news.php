<?php

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
                        move_uploaded_file($_FILES['photo']['tmp_name'], '../css/images/' . basename($_FILES['photo']['name']));
                        $chemin = $_FILES['photo']['name'];
                        $upload_avatar = $bdd->exec('UPDATE membre SET avatar ="'.$chemin.'" WHERE id = "'.$_SESSION['id'].'" ');
                        $msg = '<div class="alert alert-success" role="alert">La news a bien été ajouté</div>';
                }
        }
}

 ?>
