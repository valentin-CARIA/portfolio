<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'text')]
    private $technologie;

    #[ORM\Column(type: 'text')]
    private $charge;

    #[ORM\Column(type: 'string', length: 255)]
    private $periode;

    #[ORM\Column(type: 'text')]
    private $besoins;

    #[ORM\Column(type: 'text')]
    private $bilan;

    #[ORM\OneToMany(mappedBy: 'projets', targetEntity: ImagesProjet::class)]
    private $imagesProjets;

    #[ORM\Column(type: 'string', length: 255)]
    private $lienProjet;

    public function __construct()
    {
        $this->imagesProjets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTechnologie(): ?string
    {
        return $this->technologie;
    }

    public function setTechnologie(string $technologie): self
    {
        $this->technologie = $technologie;

        return $this;
    }

    public function getCharge(): ?string
    {
        return $this->charge;
    }

    public function setCharge(string $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getBesoins(): ?string
    {
        return $this->besoins;
    }

    public function setBesoins(string $besoins): self
    {
        $this->besoins = $besoins;

        return $this;
    }

    public function getBilan(): ?string
    {
        return $this->bilan;
    }

    public function setBilan(string $bilan): self
    {
        $this->bilan = $bilan;

        return $this;
    }

    /**
     * @return Collection<int, ImagesProjet>
     */
    public function getImagesProjets(): Collection
    {
        return $this->imagesProjets;
    }

    public function addImagesProjet(ImagesProjet $imagesProjet): self
    {
        if (!$this->imagesProjets->contains($imagesProjet)) {
            $this->imagesProjets[] = $imagesProjet;
            $imagesProjet->setProjets($this);
        }

        return $this;
    }

    public function removeImagesProjet(ImagesProjet $imagesProjet): self
    {
        if ($this->imagesProjets->removeElement($imagesProjet)) {
            // set the owning side to null (unless already changed)
            if ($imagesProjet->getProjets() === $this) {
                $imagesProjet->setProjets(null);
            }
        }

        return $this;
    }

    public function getLienProjet(): ?string
    {
        return $this->lienProjet;
    }

    public function setLienProjet(string $lienProjet): self
    {
        $this->lienProjet = $lienProjet;

        return $this;
    }

}
