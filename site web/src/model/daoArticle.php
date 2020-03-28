<?php
/**
 *
 */
namespace App\model;
class daoArticle extends dao
{
  /**
  * Récupère touts les obstacles.
  * @return array un tableau de string
  */
  public function getAllObstacles()
  {
    $donnees = $this->dbal->get("/articles/lesArticles");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
