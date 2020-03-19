<?php
/**
 *
 */
class daoActualite
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

  public function getAllActu()
  {
    $actualites = $this->dbal->get("http://localhost:8080/api/actualites");
    $result = json_decode($actualites, true);
    return $result;
  }

  public function countActu()
  {
    $nbActualites = $this->dbal->get("http://localhost:8080/api/actualites/countActualite");
    $result = json_decode($nbActualites, true);
    return $result;
  }
}

?>
