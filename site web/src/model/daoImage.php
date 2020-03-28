<?php
/**
 *
 */
namespace App\model;
class daoImage extends dao
{
  public function getPhotosSalle()
  {
    $donnees = $this->dbal->get("/images/getImagesSalle");
    $result = json_decode($donnees, true);
    return $result;
  }

  public function countPhotos()
  {
    $donnees = $this->dbal->get("/images/countPhotos");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
