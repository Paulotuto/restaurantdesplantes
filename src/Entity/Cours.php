<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $plat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dessert = null;

    #[ORM\Column(nullable: true)]
    private ?array $dates = [];


    public function getId(): ?int
    {
        return $this->id;
    }



    public function getEntree(): ?string
    {
        return $this->entree;
    }

    public function setEntree(?string $entree): static
    {
        $this->entree = $entree;

        return $this;
    }

    public function getPlat(): ?string
    {
        return $this->plat;
    }

    public function setPlat(?string $plat): static
    {
        $this->plat = $plat;

        return $this;
    }

    public function getDessert(): ?string
    {
        return $this->dessert;
    }

    public function setDessert(?string $dessert): static
    {
        $this->dessert = $dessert;

        return $this;
    }

    public function getDates(): ?array
    {
        return $this->dates;
    }

    public function setDates(?array $dates): static
    {
        $this->dates = $dates;

        return $this;
    }

}
