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
    $this->username = "Annecy-direction";
    $this->password = "test";
    $this->server = "http://localhost:8080/api";
    $this->token = $this->getToken();
  }

  /**
  * Récupère le token.
  * @return string le token
  */
  public function getToken()
  {
    $token = "";

    $url = $this->server ."/login_check";

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

  /**
  * Méthode de type get.
  *
  * @param string $url l'url de la fonction
  *
  * @return boolean
  */
  public function get($url)
  {
    $options = array('http' => array(
      'method'  => 'GET',
      'header' => 'Authorization: Bearer '.$this->token
    ));
    $lesDonnees  = stream_context_create($options);
    $lesDonnees = file_get_contents($this->server . $url, false, $lesDonnees);

    return $lesDonnees;
  }

  /**
  * Méthode de type get.
  *
  * @param string $url l'url de la fonction
  * @param array $data tableau des paramètres
  *
  * @return boolean
  */
  public function getById($url, $data)
  {
    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n".
                         "Authorization: Bearer ".$this->token,
            'method'  => 'GET',
            'content' => http_build_query($data)
        )
    );
    $lesDonnees  = stream_context_create($options);
    $lesDonnees = file_get_contents($this->server . $url, false, $lesDonnees);

    return $lesDonnees;
  }

  /**
  * Méthode de type put.
  *
  * @param string $url l'url de la fonction
  * @param array $data tableau des paramètres
  *
  * @return boolean
  */
  public function put($url, $data)
  {
    $options = array(
        'http' => array(
            'header'  => 'Authorization: Bearer '.$this->token,
            'method'  => 'PUT',
            'content' => http_build_query($data)
        )
    );
    $lesDonnees  = stream_context_create($options);
    $lesDonnees = file_get_contents($this->server . $url, false, $lesDonnees);

    return $lesDonnees;
  }

  /**
  * Méthode de type post.
  *
  * @param string $url l'url de la fonction
  * @param array $data tableau des paramètres
  *
  * @return boolean
  */
  public function post($url, $data)
  {
    $options = array(
        'http' => array(
            'header'  => 'Authorization: Bearer '.$this->token,
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $lesDonnees  = stream_context_create($options);
    $lesDonnees = file_get_contents($this->server . $url, false, $lesDonnees);

    return $lesDonnees;
  }

  /**
  * Méthode de type delete.
  *
  * @param string $url l'url de la fonction
  * @param array $data tableau des paramètres
  *
  * @return boolean
  */
  public function delete($url, $data)
  {
    $options = array(
        'http' => array(
            'header'  => 'Authorization: Bearer '.$this->token,
            'method'  => 'DELETE',
            'content' => http_build_query($data)
        )
    );
    $lesDonnees  = stream_context_create($options);
    $lesDonnees = file_get_contents($this->server . $url, false, $lesDonnees);

    return $lesDonnees;
  }

}

?>
