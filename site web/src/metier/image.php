<?php
/**
 *
 */
namespace App\metier;
class image
{
  private $id;
  private $salle_id;
  private $theme_id;
  private $nom;
  private $partie_id;
  private $article_id;

  function __construct($id=null, $salle_id=null, $theme_id=null, $nom=null, $partie_id=null, $article_id=null)
  {
    $this->id = $id;
    $this->salle_id = $salle_id;
    $this->theme_id = $theme_id;
    $this->nom = $nom;
    $this->partie_id = $partie_id;
    $this->article_id = $article_id;
  }

  /**
   * @return null
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param null $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return null
   */
  public function getSalleId()
  {
    return $this->salle_id;
  }

  /**
   * @param null $salle_id
   */
  public function setSalleId($salle_id)
  {
    $this->salle_id = $salle_id;
  }

  /**
   * @return null
   */
  public function getThemeId()
  {
    return $this->theme_id;
  }

  /**
   * @param null $theme_id
   */
  public function setThemeId($theme_id)
  {
    $this->theme_id = $theme_id;
  }

  /**
   * @return null
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * @param null $nom
   */
  public function setNom($nom)
  {
    $this->nom = $nom;
  }

  /**
   * @return null
   */
  public function getPartieId()
  {
    return $this->partie_id;
  }

  /**
   * @param null $partie_id
   */
  public function setPartieId($partie_id)
  {
    $this->partie_id = $partie_id;
  }

  /**
   * @return null
   */
  public function getArticleId()
  {
    return $this->article_id;
  }

  /**
   * @param null $article_id
   */
  public function setArticleId($article_id)
  {
    $this->article_id = $article_id;
  }
}

?>
