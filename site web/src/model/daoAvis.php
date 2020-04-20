<?php
/**
 *
 */
namespace App\model;
use App\metier\avis;
use App\metier\Salle;
use App\metier\theme;

class daoAvis extends dao
{
  /**
  * Récupère le nombre d'avis.
  * @return array un tableau de type string
  */
  public function countAvis()
  {
    $donnees = $this->dbal->get("/avis/countAvis");
    $result = json_decode($donnees, true);
    return $result;
  }

  /**
  * Récupère les avis.
  * @return array un tableau de type avis
  */
  public function getAllAvis()
  {
    $lesAvis = array();
    $donnees = $this->dbal->get("/avis/allAvis");
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $theme = new theme(null, $result[$t]['theme']);
      $lesAvis[] = new avis($result[$t]['id'], $result[$t]['note'], null, $result[$t]['commentaire'], null, null, $theme);
    }
    return $lesAvis;
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
  * @return array un tableau de type theme
  */
  public function getAvisByTheme($theme)
  {
    $lesAvisByThemes = array();
    $theme = str_replace(' ', '%20', $theme);
    $donnees = $this->dbal->get("/avis/byTheme/" . $theme);
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $lesAvisByThemes[] = new avis($result[$t]['id'], $result[$t]['note'], $result[$t]['date'], $result[$t]['commentaire'], $result[$t]['salle'], $result[$t]['client']);
    }
    return $lesAvisByThemes;
  }

}

?>
