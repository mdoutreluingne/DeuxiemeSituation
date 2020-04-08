<?php
/**
 *
 */
namespace App\model;
use App\metier\image;

class daoImage extends dao
{
  /**
   * Récupère les photos des salles.
   * @return array un tableau de type image
   */
  public function getPhotosSalle()
  {
    $lesImagesSalle = array();
    $donnees = $this->dbal->get("/images/getImagesSalle");
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $lesImagesSalle[] = new image(null, null, null, $result[$t]['nom'], null, null);
    }
    return $lesImagesSalle;
  }

  /**
   * Récupère le nombre de photos.
   * @return array un tableau de type string
   */
  public function countPhotos()
  {
    $donnees = $this->dbal->get("/images/countPhotos");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
