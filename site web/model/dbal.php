<?php
/**
 *
 */
class dbal
{
  private $username;
  private $password;
  private $server;
  private $token;

  function __construct()
  {
    $this->username = "Annecy-comptabilite";
    $this->password = "test";
    $this->server = "localhost:8080/api";
    $this->token = $this->getToken();
  }

  //Recupère le token
  public function getToken()
  {
    $token = "";

    $url = "http://" . $this->server ."/login_check";

    $data = array("username" => $this->username, "password" => $this->password);
    $data_string = json_encode($data);

    $options = array(
      'http' => array(
        'header'  => "Content-type: application/json",
        'method'  => 'POST',
        'content' => $data_string
      )
    );
    $donnees  = stream_context_create($options);

    $res = file_get_contents($url, false, $donnees);
    $obj = json_decode($res);
    $token = $obj->token;

    return $token;
  }

  public function get($url)
  {
    $options = array('http' => array(
      'method'  => 'GET',
      'header' => 'Authorization: Bearer '.$this->token
    ));
    $lesDonnees  = stream_context_create($options);
    $lesDonnees = file_get_contents($url, false, $lesDonnees);

    return $lesDonnees;
  }

}

?>
