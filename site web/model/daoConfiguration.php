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
    $data = $this->dbal->get("/configurations");
    $result = json_decode($data, true);
    return $result;
  }

  public function putNbAvis($nbAvis)
  {
    $tabDonnees = array('nbAvis' => $nbAvis);
    $data = $this->dbal->put("/configuration/modifConfiguration/,/$nbAvis/,", $tabDonnees);
    return $data;
  }

  public function putNbPhotos($nbPhotos)
  {
    $tabDonnees = array('nbCommentaire' => $nbPhotos);
    $data = $this->dbal->put("/configuration/modifConfiguration/$nbPhotos/,/,", $tabDonnees);
    return $data;
  }

  public function putNoteMini($noteMini)
  {
    $tabDonnees = array('noteMin' => $noteMini);
    $data = $this->dbal->put("/configuration/modifConfiguration/,/,/$noteMini", $tabDonnees);
    return $data;
  }

}

?>
