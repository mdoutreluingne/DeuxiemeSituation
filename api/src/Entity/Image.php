<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image", indexes={@ORM\Index(name="theme_id", columns={"theme_id"}), @ORM\Index(name="partie_id", columns={"partie_id"}), @ORM\Index(name="salle_id", columns={"salle_id"})})
 * @ORM\Entity
 */
class Image
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \Salle
     *
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="salle_id", referencedColumnName="id")
     * })
     */
    private $salle;

    /**
     * @var \Theme
     *
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     * })
     */
    private $theme;

    /**
     * @var \Partie
     *
     * @ORM\ManyToOne(targetEntity="Partie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="partie_id", referencedColumnName="reservation_id")
     * })
     */
    private $partie;


}
