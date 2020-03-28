<?php
/**
 *
 */
namespace App\model;
class daoConfiguration extends dao
{
  /**
  * Récupère la configuration.
  * @return array un tableau de string
  */
  public function getAllConfig()
  {
    $data = $this->dbal->get("/configurations");
    $result = json_decode($data, true);
    return $result;
  }

  /**
  * Modifie le nombre d'avis à afficher.
  *
  * @param int $nbAvis Le nombre d'avis
  *
  * @return boolean
  */
  public function putNbAvis($nbAvis)
  {
    $tabDonnees = array('nbAvis' => $nbAvis);
    $data = $this->dbal->put("/configuration/modifConfiguration/,/$nbAvis/,", $tabDonnees);
    return $data;
  }

  /**
  * Modifie le nombre de photo à afficher.
  *
  * @param int $nbPhotos Le nombre de photo
  *
  * @return boolean
  */
  public function putNbPhotos($nbPhotos)
  {
    $tabDonnees = array('nbCommentaire' => $nbPhotos);
    $data = $this->dbal->put("/configuration/modifConfiguration/$nbPhotos/,/,", $tabDonnees);
    return $data;
  }

  /**
  * Modifie la note minimale des avis.
  *
  * @param int $noteMini La note minimale des avis
  *
  * @return boolean
  */
  public function putNoteMini($noteMini)
  {
    $tabDonnees = array('noteMin' => $noteMini);
    $data = $this->dbal->put("/configuration/modifConfiguration/,/,/$noteMini", $tabDonnees);
    return $data;
  }

}

?>
