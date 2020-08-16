<?php
/**
 *
 */
namespace App\metier;
class avis
{
  private $id;
  private $note;
  private $date;
  private $commentaire;
  private $salle_id;
  private $client_id;
  private $theme;

  function __construct($id=null, $note=null, $date=null, $commentaire=null, $salle_id=null, $client_id=null, $theme=null)
  {
    $this->id = $id;
    $this->note = $note;
    $this->date = $date;
    $this->commentaire = $commentaire;
    $this->salle_id = $salle_id;
    $this->client_id = $client_id;
    $this->theme = $theme;
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
  public function getNote()
  {
    return $this->note;
  }

  /**
   * @param null $note
   */
  public function setNote($note)
  {
    $this->note = $note;
  }

  /**
   * @return null
   */
  public function getDate()
  {
    return $this->date;
  }

  /**
   * @param null $date
   */
  public function setDate($date)
  {
    $this->date = $date;
  }

  /**
   * @return null
   */
  public function getCommentaire()
  {
    return $this->commentaire;
  }

  /**
   * @param null $commentaire
   */
  public function setCommentaire($commentaire)
  {
    $this->commentaire = $commentaire;
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
  public function getClientId()
  {
    return $this->client_id;
  }

  /**
   * @param null $client_id
   */
  public function setClientId($client_id)
  {
    $this->client_id = $client_id;
  }

  /**
   * @return null
   */
  public function getTheme()
  {
    return $this->theme;
  }

  /**
   * @param null $theme
   */
  public function setTheme($theme)
  {
    $this->theme = $theme;
  }
}

?>
