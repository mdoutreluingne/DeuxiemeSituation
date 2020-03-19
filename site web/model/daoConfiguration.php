<?php
/**
 *
 */
class daoConfiguration
{
  private $dbal;

  function __construct()
  {
    $this->dbal = new dbal();
  }

  public function getAllConfig()
  {
    $data = $this->dbal->get("http://localhost:8080/api/configurations");
    $result = json_decode($data, true);
    return $result;
  }

}

?>
