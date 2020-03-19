<?php
/**
 *
 */
class daoSalle
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

  public function countSalle()
  {
    $donnees = $this->dbal->get("http://localhost:8080/api/salles/countSalle");
    $result = json_decode($donnees, true);
    return $result;
  }

  public function getAllSalle()
  {
    $donnees = $this->dbal->get("http://localhost:8080/api/salles/lesSalles");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
