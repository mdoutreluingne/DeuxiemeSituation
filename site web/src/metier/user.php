<?php
/**
 *
 */
namespace App\metier;
class user
{
  private $id;
  private $login;
  private $mdp;
  private $roles;
  private $client_id;

  function __construct($id=null, $login=null, $mdp=null, $roles=null, $client_id=null)
  {
    $this->id = $id;
    $this->login = $login;
    $this->mdp = $mdp;
    $this->roles = $roles;
    $this->client_id = $client_id;
  }

  /**
   * @return null
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param null $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * @return null
   */
  public function getLogin()
  {
    return $this->login;
  }

  /**
   * @param null $login
   */
  public function setLogin($login)
  {
    $this->login = $login;
  }

  /**
   * @return null
   */
  public function getMdp()
  {
    return $this->mdp;
  }

  /**
   * @param null $mdp
   */
  public function setMdp($mdp)
  {
    $this->mdp = $mdp;
  }

  /**
   * @return null
   */
  public function getRoles()
  {
    return $this->roles;
  }

  /**
   * @param null $roles
   */
  public function setRoles($roles)
  {
    $this->roles = $roles;
  }

  /**
   * @return null
   */
  public function getClientId()
  {
    return $this->client_id;
  }

  /**
   * @param null $client_id
   */
  public function setClientId($client_id)
  {
    $this->client_id = $client_id;
  }
}

?>
