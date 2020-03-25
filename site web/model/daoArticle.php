<?php
/**
 *
 */
class daoArticle
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

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
