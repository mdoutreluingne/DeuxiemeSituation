<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $montant;

    /**
     * @var bool
     *
     * @ORM\Column(name="archive", type="boolean", nullable=false)
     */
    private $archive;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Salle", inversedBy="article")
     * @ORM\JoinTable(name="article_salle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="salle_id", referencedColumnName="id")
     *   }
     * )
     */
    private $salle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->salle = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
