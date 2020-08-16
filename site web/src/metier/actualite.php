<?php
/**
 *
 */
namespace App\metier;
class actualite
{
  private $id;
  private $titre;
  private $paragraphe;
  private $date_debut;
  private $date_fin;
  private $image;

  function __construct($id=null, $titre=null, $paragraphe=null, $date_debut=null, $date_fin=null, $image=null)
  {
    $this->id = $id;
    $this->titre = $titre;
    $this->paragraphe = $paragraphe;
    $this->date_debut = $date_debut;
    $this->date_fin = $date_fin;
    $this->image = $image;
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getTitre()
  {
    return $this->titre;
  }

  /**
   * @param mixed $titre
   */
  public function setTitre($titre)
  {
    $this->titre = $titre;
  }

  /**
   * @return mixed
   */
  public function getParagraphe()
  {
    return $this->paragraphe;
  }

  /**
   * @param mixed $paragraphe
   */
  public function setParagraphe($paragraphe)
  {
    $this->paragraphe = $paragraphe;
  }

  /**
   * @return mixed
   */
  public function getDateDebut()
  {
    return $this->date_debut;
  }

  /**
   * @param mixed $date_debut
   */
  public function setDateDebut($date_debut)
  {
    $this->date_debut = $date_debut;
  }

  /**
   * @return mixed
   */
  public function getDateFin()
  {
    return $this->date_fin;
  }

  /**
   * @param mixed $date_fin
   */
  public function setDateFin($date_fin)
  {
    $this->date_fin = $date_fin;
  }

  /**
   * @return mixed
   */
  public function getImage()
  {
    return $this->image;
  }

  /**
   * @param mixed $image
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
}

?>
