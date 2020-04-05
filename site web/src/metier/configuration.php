<?php
/**
 *
 */
namespace App\metier;
class configuration
{
  private $id;
  private $nb_commentaire;
  private $nb_avis;
  private $note_min;

  function __construct($id=null, $nb_commentaire=null, $nb_avis=null, $note_min=null)
  {
    $this->id = $id;
    $this->nb_commentaire = $nb_commentaire;
    $this->nb_avis = $nb_avis;
    $this->note_min = $note_min;
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
  public function getNbCommentaire()
  {
    return $this->nb_commentaire;
  }

  /**
   * @param null $nb_commentaire
   */
  public function setNbCommentaire($nb_commentaire)
  {
    $this->nb_commentaire = $nb_commentaire;
  }

  /**
   * @return null
   */
  public function getNbAvis()
  {
    return $this->nb_avis;
  }

  /**
   * @param null $nb_avis
   */
  public function setNbAvis($nb_avis)
  {
    $this->nb_avis = $nb_avis;
  }

  /**
   * @return null
   */
  public function getNoteMin()
  {
    return $this->note_min;
  }

  /**
   * @param null $note_min
   */
  public function setNoteMin($note_min)
  {
    $this->note_min = $note_min;
  }
}

?>
