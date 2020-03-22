<?php
/**
 *
 */
class daoImage
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

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
