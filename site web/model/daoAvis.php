<?php
/**
 *
 */
class daoAvis
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

  public function countAvis()
  {
    $donnees = $this->dbal->get("http://localhost:8080/api/avis/countAvis");
    $result = json_decode($donnees, true);
    return $result;
  }

  public function getAllAvis()
  {
    $donnees = $this->dbal->get("http://localhost:8080/api/avis/allAvis");
    $result = json_decode($donnees, true);
    return $result;
  }

  public function getTauxSatisfaction()
  {
    $donnees = $this->dbal->get("http://localhost:8080/api/avis/byTauxSatisfaction");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
