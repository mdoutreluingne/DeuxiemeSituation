<?php
/**
 *
 */
class daoActualite
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

  public function getAllActu()
  {
    $actualites = $this->dbal->get("/actualites");
    $result = json_decode($actualites, true);
    return $result;
  }

  public function countActu()
  {
    $nbActualites = $this->dbal->get("/actualites/countActualite");
    $result = json_decode($nbActualites, true);
    return $result;
  }

  public function postActu($titre, $contenu, $date_debut, $date_fin, $image)
  {
    $tabDonnees = array('titre' => $titre, 'paragraphe' => $contenu, 'dateDebut' => $date_debut, 'dateFin' => $date_fin, 'image' => $image);
    $data = $this->dbal->post("/actualites/addActualite/$titre/$contenu/$image/$date_debut/$date_fin", $tabDonnees);
    return $data;
  }

  public function deleteActuById($idActu)
  {
    $tabDonnees = array('id' => $idActu);
    $data = $this->dbal->delete("/actualites/$idActu", $tabDonnees);
    return $data;
  }
}

?>
