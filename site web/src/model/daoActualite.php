<?php
/**
 *
 */

namespace App\model;
use App\metier\actualite;

class daoActualite extends dao
{
  /**
  * Récupère toutes les actualités.
  * @return array un tableau de type actualité
  */
  public function getAllActu()
  {
    $lesActus = array();
    $actualites = $this->dbal->get("/actualites");
    $result = json_decode($actualites, true);
    for($t = 0, $size = count($result); $t < $size; ++$t) {
      $lesActus[] = new actualite($result[$t]['id'], $result[$t]['titre'], $result[$t]['paragraphe'], $result[$t]['dateDebut'], $result[$t]['dateFin'], $result[$t]['image']);
    }
    return $lesActus;
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
    $uneActu = new actualite(null, $titre, $contenu, $date_debut, $date_fin, $image);
    $tabDonnees = array('titre' => $uneActu->getTitre(), 'paragraphe' => $uneActu->getParagraphe(), 'dateDebut' => $uneActu->getDateDebut(), 'dateFin' => $uneActu->getDateFin(), 'image' => $uneActu->getImage());
    $data = $this->dbal->post("/actualites/addActualite/". $uneActu->getTitre()."/". $uneActu->getParagraphe()."/". $uneActu->getImage()."/". $uneActu->getDateDebut()."/". $uneActu->getDateFin()."", $tabDonnees);
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
    $uneActu = new actualite($idActu, null, null, null, null, null);
    $tabDonnees = array('id' => $uneActu->getId());
    $data = $this->dbal->delete("/actualites/". $uneActu->getId()."", $tabDonnees);
    return $data;
  }
}

?>
