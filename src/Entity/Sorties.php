<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SortiesRepository")
 */
class Sorties
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
    private $QtSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQtSortie(): ?int
    {
        return $this->QtSortie;
    }

    public function setQtSortie(int $QtSortie): self
    {
        $this->QtSortie = $QtSortie;

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
