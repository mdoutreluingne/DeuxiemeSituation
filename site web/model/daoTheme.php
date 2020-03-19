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
    $donnees = $this->dbal->get("http://localhost:8080/api/themes/lesThemes");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
