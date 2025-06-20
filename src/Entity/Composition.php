<?php

namespace App\Entity;

use App\Repository\CompositionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompositionRepository::class)]
class Composition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $titulaire = null;

    #[ORM\ManyToMany(targetEntity: Joueur::class)]
    private Collection $joueurs;

    #[ORM\ManyToOne(inversedBy: 'compositions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rencontre $rencontre = null;

    public function __construct()
    {
        $this->joueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isTitulaire(): ?bool
    {
        return $this->titulaire;
    }

    public function setTitulaire(?bool $titulaire): static
    {
        $this->titulaire = $titulaire;
        return $this;
    }

    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): static
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs->add($joueur);
        }
        return $this;
    }

    public function removeJoueur(Joueur $joueur): static
    {
        $this->joueurs->removeElement($joueur);
        return $this;
    }

    public function getRencontre(): ?Rencontre
    {
        return $this->rencontre;
    }

    public function setRencontre(?Rencontre $rencontre): static
    {
        $this->rencontre = $rencontre;
        return $this;
    }
}
