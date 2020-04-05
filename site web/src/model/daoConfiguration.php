<?php
/**
 *
 */
namespace App\model;
use App\metier\configuration;

class daoConfiguration extends dao
{
  /**
  * Récupère la configuration.
  * @return array un tableau de string
  */
  public function getAllConfig()
  {
    $laConfiguration = array();
    $data = $this->dbal->get("/configurations");
    $result = json_decode($data, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $laConfiguration[] = new configuration(null, $result[$t]['nbCommentaire'], $result[$t]['nbAvis'], $result[$t]['noteMin']);
    }
    return $laConfiguration;
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
