<?php
/**
 *
 */
class daoUser
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

  /**
  * Récupère l'utilisateur en fonction de l'id.
  *
  * @param int $idUser Le titre de l'actualité
  *
  * @return array un tableau de string
  */
  public function getUserById($idUser)
  {
    $tabDonnees = array('id' => $idUser);
    $result = $this->dbal->getById("/users/$idUser", $tabDonnees);
    $result = json_decode($result, true);
    return $result;
  }
}

?>
