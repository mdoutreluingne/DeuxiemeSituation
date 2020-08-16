<?php


namespace App\metier;


class ville
{
    private $id;
    private $nom;

    function __construct($id=null, $nom=null)
    {
        $this->id = $id;
        $this->nom = $nom;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param null $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}