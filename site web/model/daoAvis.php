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
    $donnees = $this->dbal->get("/avis/countAvis");
    $result = json_decode($donnees, true);
    return $result;
  }

  public function getAllAvis()
  {
    $donnees = $this->dbal->get("/avis/allAvis");
    $result = json_decode($donnees, true);
    return $result;
  }

  public function getTauxSatisfaction()
  {
    $donnees = $this->dbal->get("/avis/byTauxSatisfaction");
    $result = json_decode($donnees, true);
    return $result;
  }

  public function getAvisByTheme($theme)
  {
    $theme = str_replace(' ', '%20', $theme);
    $donnees = $this->dbal->get("/avis/byTheme/" . $theme);
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
