<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
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
    private $NomArt;

    /**
     * @ORM\Column(type="integer")
     */
    private $QtArt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fournisseurs", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Fournisseur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Entrees", mappedBy="Article")
     */
    private $Entree;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sorties", mappedBy="Article")
     */
    private $sorties;

    public function __construct()
    {
        $this->Entree = new ArrayCollection();
        $this->sorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArt(): ?string
    {
        return $this->NomArt;
    }

    public function setNomArt(string $NomArt): self
    {
        $this->NomArt = $NomArt;

        return $this;
    }

    public function getQtArt(): ?int
    {
        return $this->QtArt;
    }

    public function setQtArt(int $QtArt): self
    {
        $this->QtArt = $QtArt;

        return $this;
    }

    public function getFournisseur(): ?Fournisseurs
    {
        return $this->Fournisseur;
    }

    public function setFournisseur(?Fournisseurs $Fournisseur): self
    {
        $this->Fournisseur = $Fournisseur;

        return $this;
    }

    /**
     * @return Collection|Entrees[]
     */
    public function getEntree(): Collection
    {
        return $this->Entree;
    }

    public function addEntree(Entrees $entree): self
    {
        if (!$this->Entree->contains($entree)) {
            $this->Entree[] = $entree;
            $entree->setArticle($this);
        }

        return $this;
    }

    public function removeEntree(Entrees $entree): self
    {
        if ($this->Entree->contains($entree)) {
            $this->Entree->removeElement($entree);
            // set the owning side to null (unless already changed)
            if ($entree->getArticle() === $this) {
                $entree->setArticle(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sorties[]
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function addSorty(Sorties $sorty): self
    {
        if (!$this->sorties->contains($sorty)) {
            $this->sorties[] = $sorty;
            $sorty->setArticle($this);
        }

        return $this;
    }

    public function removeSorty(Sorties $sorty): self
    {
        if ($this->sorties->contains($sorty)) {
            $this->sorties->removeElement($sorty);
            // set the owning side to null (unless already changed)
            if ($sorty->getArticle() === $this) {
                $sorty->setArticle(null);
            }
        }

        return $this;
    }
}
