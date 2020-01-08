<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PartieRepository")
 */
class Partie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Reservation", cascade={"persist", "remove"})
     */
    private $reservation;

    /**
     * @ORM\Column(type="time")
     */
    private $temps;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getTemps(): ?\DateTimeInterface
    {
        return $this->temps;
    }

    public function setTemps(\DateTimeInterface $temps): self
    {
        $this->temps = $temps;

        return $this;
    }
}
