<?php
/**
 *
 */
namespace App\model;
class dao
{
  protected $dbal;

  function __construct()
  {
    $data = file_get_contents(__DIR__ . "\config.json");
    $data = json_decode($data, true);

    $this->dbal = new dbal($data[0]["username"], $data[1]["password"], $data[2]["server"]);
  }

}

?>
