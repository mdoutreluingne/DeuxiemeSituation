<?php
/**
 *
 */
namespace App\model;
use App\metier\Salle;

class daoSalle extends dao
{
  /**
  * Récupère le nombre de salle.
  * @return array un tableau de string
  */
  public function countSalle()
  {
    $donnees = $this->dbal->get("/salles/countSalle");
    $result = json_decode($donnees, true);
    return $result;
  }

  /**
  * Récupère les salles.
  * @return array un tableau de string
  */
  public function getAllSalle()
  {
    $lesSalles = array();
    $donnees = $this->dbal->get("/salles/lesSalles");
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $lesSalles[] = new salle(null, $result[$t]['ville'], $result[$t]['salle_id'], null, null, null, null, $result[$t]['theme'], $result[$t]['image']);
    }
    return $lesSalles;
  }

}

?>
