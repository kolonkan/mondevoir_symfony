<?php

namespace App\Entity;

use App\Repository\RencontreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RencontreRepository::class)]
class Rencontre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adversaire = null;

    #[ORM\Column(length: 255)]
    private ?string $lieu = null;

    #[ORM\Column]
    private ?\DateTime $daterencontre = null;

    #[ORM\Column(nullable: true)]
    private ?int $scoredomicile = null;

    #[ORM\Column(nullable: true)]
    private ?int $scoreadversaire = null;

    #[ORM\Column]
    private ?bool $valide = null;

    /**
     * @var Collection<int, Composition>
     */
    #[ORM\OneToMany(targetEntity: Composition::class, mappedBy: 'rencontre')]
    private Collection $compositions;

    public function __construct()
    {
        $this->compositions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdversaire(): ?string
    {
        return $this->adversaire;
    }

    public function setAdversaire(string $adversaire): static
    {
        $this->adversaire = $adversaire;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDaterencontre(): ?\DateTime
    {
        return $this->daterencontre;
    }

    public function setDaterencontre(\DateTime $daterencontre): static
    {
        $this->daterencontre = $daterencontre;

        return $this;
    }

    public function getScoredomicile(): ?int
    {
        return $this->scoredomicile;
    }

    public function setScoredomicile(?int $scoredomicile): static
    {
        $this->scoredomicile = $scoredomicile;

        return $this;
    }

    public function getScoreadversaire(): ?int
    {
        return $this->scoreadversaire;
    }

    public function setScoreadversaire(?int $scoreadversaire): static
    {
        $this->scoreadversaire = $scoreadversaire;

        return $this;
    }

    public function isValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(bool $valide): static
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * @return Collection<int, Composition>
     */
    public function getCompositions(): Collection
    {
        return $this->compositions;
    }

    public function addComposition(Composition $composition): static
    {
        if (!$this->compositions->contains($composition)) {
            $this->compositions->add($composition);
            $composition->setRencontre($this);
        }

        return $this;
    }

    public function removeComposition(Composition $composition): static
    {
        if ($this->compositions->removeElement($composition)) {
            // set the owning side to null (unless already changed)
            if ($composition->getRencontre() === $this) {
                $composition->setRencontre(null);
            }
        }

        return $this;
    }
}
