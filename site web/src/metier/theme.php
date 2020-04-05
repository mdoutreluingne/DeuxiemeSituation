<?php
/**
 *
 */
namespace App\metier;
class theme
{
  private $id;
  private $nom;

  function __construct($id=null, $nom=null)
  {
    $this->id = $id;
    $this->nom = $nom;
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
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * @param mixed $nom
   */
  public function setNom($nom)
  {
    $this->nom = $nom;
  }
}

?>
