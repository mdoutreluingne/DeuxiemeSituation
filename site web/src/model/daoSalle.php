<?php
/**
 *
 */
namespace App\model;
use App\metier\image;
use App\metier\Salle;
use App\metier\theme;
use App\metier\ville;

class daoSalle extends dao
{
  /**
  * Récupère le nombre de salle.
  * @return array un tableau de type string
  */
  public function countSalle()
  {
    $donnees = $this->dbal->get("/salles/countSalle");
    $result = json_decode($donnees, true);
    return $result;
  }

  /**
  * Récupère les salles.
  * @return array un tableau de type salle
  */
  public function getAllSalle()
  {
    $lesSalles = array();
    $donnees = $this->dbal->get("/salles/lesSalles");
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $ville = new ville(null, $result[$t]['ville']);
      $theme = new theme(null, $result[$t]['theme']);
      $image = new image(null, null, null, $result[$t]['image'], null, null);
      $lesSalles[] = new salle(null, $ville, $result[$t]['salle_id'], null, null, null, null, $theme, $image);
    }
    return $lesSalles;
  }

}

?>
