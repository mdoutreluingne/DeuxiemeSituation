<?php
/**
 *
 */
namespace App\model;
class daoActualite extends dao
{
  /**
  * Récupère toutes les actualités.
  * @return array un tableau de string
  */
  public function getAllActu()
  {
    $actualites = $this->dbal->get("/actualites");
    $result = json_decode($actualites, true);
    return $result;
  }

  /**
  * Récupère le nombre d'actualités.
  * @return array un tableau de string
  */
  public function countActu()
  {
    $nbActualites = $this->dbal->get("/actualites/countActualite");
    $result = json_decode($nbActualites, true);
    return $result;
  }

  /**
  * Ajoute une actualité.
  *
  * @param string $titre Le titre de l'actualité
  * @param string $contenu Contenue de l'actualité
  * @param datetime $date_debut Date de l'ajout
  * @param datetime $date_fin Date d'éxpiration
  * @param string $image Chemin de l'image
  *
  * @return boolean
  */
  public function postActu($titre, $contenu, $date_debut, $date_fin, $image)
  {
    $tabDonnees = array('titre' => $titre, 'paragraphe' => $contenu, 'dateDebut' => $date_debut, 'dateFin' => $date_fin, 'image' => $image);
    $data = $this->dbal->post("/actualites/addActualite/$titre/$contenu/$image/$date_debut/$date_fin", $tabDonnees);
    return $data;
  }

  /**
  * Supprime l'actualité par son id
  *
  * @param int $idActu id de l'actualité
  *
  * @return boolean
  */
  public function deleteActuById($idActu)
  {
    $tabDonnees = array('id' => $idActu);
    $data = $this->dbal->delete("/actualites/$idActu", $tabDonnees);
    return $data;
  }
}

?>
