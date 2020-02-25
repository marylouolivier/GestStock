<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntreesRepository")
 */
class Entrees
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $QtEntree;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="Entree")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQtEntree(): ?int
    {
        return $this->QtEntree;
    }

    public function setQtEntree(int $QtEntree): self
    {
        $this->QtEntree = $QtEntree;

        return $this;
    }

    public function getArticle(): ?Articles
    {
        return $this->Article;
    }

    public function setArticle(?Articles $Article): self
    {
        $this->Article = $Article;

        return $this;
    }
}
