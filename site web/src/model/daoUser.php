<?php
/**
 *
 */
namespace App\model;
use App\metier\user;

class daoUser extends dao
{
  /**
  * Récupère l'utilisateur en fonction de l'id.
  *
  * @param int $idUser Le titre de l'actualité
  *
  * @return array un tableau de type user
  */
  public function getUserById($idUser)
  {
    $tabDonnees = array('id' => $idUser);
    $leUser = array();
    $result = $this->dbal->getById("/users/$idUser", $tabDonnees);
    $result = json_decode($result, true);
    for($t = 0; $t < 1; ++$t) {
      $leUser[] = new user($result['id'], $result['username'], $result['password'], $result['roles'], null);
    }
    return $leUser;
  }
}

?>
