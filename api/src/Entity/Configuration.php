<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 *
 * @ORM\Table(name="configuration")
 * @ORM\Entity
 */
class Configuration
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
     * @var int
     *
     * @ORM\Column(name="nb_commentaire", type="integer", nullable=false)
     */
    private $nbCommentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_avis", type="integer", nullable=false)
     */
    private $nbAvis;

    /**
     * @var float
     *
     * @ORM\Column(name="note_min", type="float", precision=10, scale=0, nullable=false)
     */
    private $noteMin;


}
