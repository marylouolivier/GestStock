<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FournisseursRepository")
 */
class Fournisseurs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomFour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SiteWebFour;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Articles", mappedBy="Fournisseur")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFour(): ?string
    {
        return $this->NomFour;
    }

    public function setNomFour(string $NomFour): self
    {
        $this->NomFour = $NomFour;

        return $this;
    }

    public function getSiteWebFour(): ?string
    {
        return $this->SiteWebFour;
    }

    public function setSiteWebFour(string $SiteWebFour): self
    {
        $this->SiteWebFour = $SiteWebFour;

        return $this;
    }

    /**
     * @return Collection|Articles[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Articles $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setFournisseur($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getFournisseur() === $this) {
                $article->setFournisseur(null);
            }
        }

        return $this;
    }
}
