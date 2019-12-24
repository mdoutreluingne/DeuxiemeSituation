<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partie
 *
 * @ORM\Table(name="partie")
 * @ORM\Entity
 */
class Partie
{
    /**
     * @var \Reservation
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reservation_id", referencedColumnName="id")
     * })
     */
    private $reservation_id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="temps", type="time", nullable=false)
     */
    private $temps;




}
