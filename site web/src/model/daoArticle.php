<?php
/**
 *
 */
namespace App\model;
use App\metier\article;

class daoArticle extends dao
{
  /**
  * Récupère touts les obstacles.
  * @return array un tableau de string
  */
  public function getAllObstacles()
  {
    $lesArticles = array();
    $donnees = $this->dbal->get("/articles/lesArticles");
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $lesArticles[] = new article(null, $result[$t]['libelle'], $result[$t]['montant'], null, $result[$t]['image']);
    }
    return $lesArticles;
  }

}

?>
