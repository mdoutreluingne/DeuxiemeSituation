<?php
/**
 *
 */
namespace App\metier;
class article
{
  private $id;
  private $libelle;
  private $montant;
  private $archive;
  private $image;

  function __construct($id=null, $libelle=null, $montant=null, $archive=null, $image=null)
  {
    $this->id = $id;
    $this->libelle = $libelle;
    $this->montant = $montant;
    $this->archive = $archive;
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
  public function getLibelle()
  {
    return $this->libelle;
  }

  /**
   * @param mixed $libelle
   */
  public function setLibelle($libelle)
  {
    $this->libelle = $libelle;
  }

  /**
   * @return mixed
   */
  public function getMontant()
  {
    return $this->montant;
  }

  /**
   * @param mixed $montant
   */
  public function setMontant($montant)
  {
    $this->montant = $montant;
  }

  /**
   * @return mixed
   */
  public function getArchive()
  {
    return $this->archive;
  }

  /**
   * @param mixed $archive
   */
  public function setArchive($archive)
  {
    $this->archive = $archive;
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
