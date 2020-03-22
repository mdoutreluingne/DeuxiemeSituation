<?php
/**
 *
 */
class daoTheme
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

  public function getAllTheme()
  {
    $donnees = $this->dbal->get("/themes/lesThemes");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
