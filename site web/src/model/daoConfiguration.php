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
  * @return array un tableau de type configuration
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
    $uneConfig = new configuration(null, null, $nbAvis, null);
    $tabDonnees = array('nbAvis' => $uneConfig->getNbAvis());
    $data = $this->dbal->put("/configuration/modifConfiguration/,/". $uneConfig->getNbAvis()."/,", $tabDonnees);
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
    $uneConfig = new configuration(null, $nbPhotos, null, null);
    $tabDonnees = array('nbCommentaire' => $uneConfig->getNbCommentaire());
    $data = $this->dbal->put("/configuration/modifConfiguration/". $uneConfig->getNbCommentaire()."/,/,", $tabDonnees);
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
    $uneConfig = new configuration(null, null, null, $noteMini);
    $tabDonnees = array('noteMin' => $uneConfig->getNoteMin());
    $data = $this->dbal->put("/configuration/modifConfiguration/,/,/". $uneConfig->getNoteMin()."", $tabDonnees);
    return $data;
  }

}

?>
