<?php
/**
 *
 */
namespace App\metier;
class Salle
{
  private $id;
  private $ville_id;
  private $numero;
  private $prix;
  private $heure_ouverture;
  private $heure_fermeture;
  private $archive;
  private $theme_id;

  function __construct($id, $ville_id, $numero, $prix, $heure_ouverture, $heure_fermeture, $archive, $theme_id)
  {
    $this->id;
    $this->ville_id;
    $this->numero;
    $this->prix;
    $this->heure_ouverture;
    $this->heure_fermeture;
    $this->archive;
    $this->theme_id;
  }
}

?>
