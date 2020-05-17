<?php
/**
 *
 */
namespace App\model;
use App\metier\article;
use App\metier\image;

class daoArticle extends dao
{
  /**
  * Récupère touts les obstacles.
  * @return array un tableau de type article
  */
  public function getAllObstacles()
  {
    $lesArticles = array();
    $donnees = $this->dbal->get("/articles/lesArticles");
    $result = json_decode($donnees, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $uneImage = new Image(null, null, null, $result[$t]['image'], null, null);
      $lesArticles[] = new article(null, $result[$t]['libelle'], $result[$t]['montant'], null, $uneImage);
    }
    return $lesArticles;
  }

  /**
  * Récupère le nombre d'obstacle.
  * @return array un tableau de type string
  */
  public function getCountObstacles()
  {
    $donnees = $this->dbal->get("/articles/countArticles");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
