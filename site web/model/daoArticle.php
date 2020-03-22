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
    $donnees = $this->dbal->get("/articles/lesArticles");
    $result = json_decode($donnees, true);
    return $result;
  }

}

?>
