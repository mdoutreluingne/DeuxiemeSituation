<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ArticleSalleRepository")
 */
class ArticleSalle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue("NONE")
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Salle", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $salle;

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }
}
