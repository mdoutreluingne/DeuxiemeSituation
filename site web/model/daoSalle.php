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
    $donnees = $this->dbal->get("/salles/lesSalles");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
