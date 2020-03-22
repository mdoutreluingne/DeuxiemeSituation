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

  public function getUserById($idUser)
  {
    $tabDonnees = array('id' => $idUser);
    $result = $this->dbal->getById("/users/$idUser", $tabDonnees);
    $result = json_decode($result, true);
    return $result;
  }
}

?>
