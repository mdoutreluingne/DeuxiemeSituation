<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle", indexes={@ORM\Index(name="ville_id", columns={"ville_id"}), @ORM\Index(name="theme_id", columns={"theme_id"})})
 * @ORM\Entity
 */
class Salle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     * })
     */
    private $ville_id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero", type="integer", nullable=true)
     */
    private $numero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prix", type="decimal", precision=6, scale=2, nullable=true)
     */
    private $prix;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="heure_ouverture", type="time", nullable=true)
     */
    private $heureOuverture;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="heure_fermeture", type="time", nullable=true)
     */
    private $heureFermeture;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="archive", type="boolean", nullable=true)
     */
    private $archive;

    /**
     * @var \Theme
     *
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     * })
     */
    private $theme_id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articleSalles = new ArrayCollection();
    }

}
