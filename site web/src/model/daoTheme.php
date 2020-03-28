<?php
/**
 *
 */
namespace App\model;
class daoTheme extends dao
{
  /**
  * Récupère les thèmes.
  * @return array un tableau de string
  */
  public function getAllTheme()
  {
    $donnees = $this->dbal->get("/themes/lesThemes");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
