<?php
/**
 *
 */
namespace App\model;
class daoAvis extends dao
{
  /**
  * Récupère le nombre d'avis.
  * @return array un tableau de string
  */
  public function countAvis()
  {
    $donnees = $this->dbal->get("/avis/countAvis");
    $result = json_decode($donnees, true);
    return $result;
  }

  /**
  * Récupère les avis.
  * @return array un tableau de string
  */
  public function getAllAvis()
  {
    $donnees = $this->dbal->get("/avis/allAvis");
    $result = json_decode($donnees, true);
    return $result;
  }

  /**
  * Récupère les taux de satisfaction.
  * @return array un tableau de string
  */
  public function getTauxSatisfaction()
  {
    $donnees = $this->dbal->get("/avis/byTauxSatisfaction");
    $result = json_decode($donnees, true);
    return $result;
  }

  /**
  * Récupère les avis.
  *
  * @param string $theme Le thème
  *
  * @return array un tableau de string
  */
  public function getAvisByTheme($theme)
  {
    $theme = str_replace(' ', '%20', $theme);
    $donnees = $this->dbal->get("/avis/byTheme/" . $theme);
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
