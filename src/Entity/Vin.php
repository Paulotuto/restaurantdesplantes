<?php

namespace App\Entity;

use App\Repository\VinRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VinRepository::class)]
class Vin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $extrait = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    /**
     * @param string|null $image
     * @param string|null $nom
     * @param string|null $extrait
     * @param string|null $description
     */
    public function __construct(?string $image='', ?string $nom='', ?string $extrait='', ?string $description='')
    {
        $this->image = 'images/vins/'.$image;
        $this->nom = $nom;
        $this->extrait = $extrait;
        $this->description = $description;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image ='images/vins/'. $image;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getExtrait(): ?string
    {
        return $this->extrait;
    }

    public function setExtrait(string $extrait): static
    {
        $this->extrait = $extrait;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
