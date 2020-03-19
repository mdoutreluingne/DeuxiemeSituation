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

  public function getAllObstacles()
  {
    $donnees = $this->dbal->get("http://localhost:8080/api/articles/lesArticles");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
