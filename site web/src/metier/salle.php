<?php
/**
 *
 */
namespace App\metier;
class Salle
{
  private $id;
  private $ville;
  private $numero;
  private $prix;
  private $heure_ouverture;
  private $heure_fermeture;
  private $archive;
  private $theme;
  private $image;

  function __construct($id=null, $ville=null, $numero=null, $prix=null, $heure_ouverture=null, $heure_fermeture=null, $archive=null, $theme=null, $image=null)
  {
    $this->id = $id;
    $this->ville = $ville;
    $this->numero = $numero;
    $this->prix = $prix;
    $this->heure_ouverture = $heure_ouverture;
    $this->heure_fermeture = $heure_fermeture;
    $this->archive = $archive;
    $this->theme = $theme;
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
  public function getVille()
  {
    return $this->ville;
  }

  /**
   * @param mixed $ville
   */
  public function setVille($ville)
  {
    $this->ville = $ville;
  }

  /**
   * @return mixed
   */
  public function getNumero()
  {
    return $this->numero;
  }

  /**
   * @param mixed $numero
   */
  public function setNumero($numero)
  {
    $this->numero = $numero;
  }

  /**
   * @return mixed
   */
  public function getPrix()
  {
    return $this->prix;
  }

  /**
   * @param mixed $prix
   */
  public function setPrix($prix)
  {
    $this->prix = $prix;
  }

  /**
   * @return mixed
   */
  public function getHeureOuverture()
  {
    return $this->heure_ouverture;
  }

  /**
   * @param mixed $heure_ouverture
   */
  public function setHeureOuverture($heure_ouverture)
  {
    $this->heure_ouverture = $heure_ouverture;
  }

  /**
   * @return mixed
   */
  public function getHeureFermeture()
  {
    return $this->heure_fermeture;
  }

  /**
   * @param mixed $heure_fermeture
   */
  public function setHeureFermeture($heure_fermeture)
  {
    $this->heure_fermeture = $heure_fermeture;
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
  public function getTheme()
  {
    return $this->theme;
  }

  /**
   * @param mixed $theme
   */
  public function setTheme($theme)
  {
    $this->theme = $theme;
  }

  /**
   * @return null
   */
  public function getImage()
  {
    return $this->image;
  }

  /**
   * @param null $image
   */
  public function setImage($image)
  {
    $this->image = $image;
  }
}

?>
