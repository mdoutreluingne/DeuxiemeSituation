<?php
/**
 *
 */
namespace App\model;
use App\metier\theme;

class daoTheme extends dao
{
  /**
  * Récupère les thèmes.
  * @return array un tableau de type theme
  */
  public function getAllTheme()
  {
    $lesThemes = array();
    $donnees = $this->dbal->get("/themes/lesThemes");
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $lesThemes[] = new theme($result[$t]['id'], $result[$t]['nom']);
    }
    return $lesThemes;
  }

}

?>
