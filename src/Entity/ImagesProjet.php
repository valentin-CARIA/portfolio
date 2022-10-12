<?php

namespace App\Entity;

use App\Repository\ImagesProjetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesProjetRepository::class)]
class ImagesProjet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomFichier;

    #[ORM\ManyToOne(targetEntity: Projet::class, inversedBy: 'imagesProjets')]
    private $projets;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomFichier(): ?string
    {
        return $this->nomFichier;
    }

    public function setNomFichier(string $nomFichier): self
    {
        $this->nomFichier = $nomFichier;

        return $this;
    }

    public function getProjets(): ?projet
    {
        return $this->projets;
    }

    public function setProjets(?projet $projets): self
    {
        $this->projets = $projets;

        return $this;
    }
}
