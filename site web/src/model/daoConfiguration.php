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
    $tabDonnees = array('nbcommentaire' => ",",'nbavis' => $uneConfig->getNbAvis(), 'notemini' => ",");
    $tabDonnees = json_encode($tabDonnees);
    $data = $this->dbal->put("/configuration/modifConfiguration", $tabDonnees);
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
    $tabDonnees = array('nbcommentaire' => $uneConfig->getNbCommentaire(),'nbavis' => ",", 'notemini' => ",");
    $tabDonnees = json_encode($tabDonnees);
    $data = $this->dbal->put("/configuration/modifConfiguration", $tabDonnees);
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
    $tabDonnees = array('nbcommentaire' => ",",'nbavis' => ",", 'notemini' => $uneConfig->getNoteMin());
    $tabDonnees = json_encode($tabDonnees);
    $data = $this->dbal->put("/configuration/modifConfiguration", $tabDonnees);
    return $data;
  }

}

?>
