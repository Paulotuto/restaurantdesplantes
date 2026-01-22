<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(length: 255)]
    private ?string $midi = null;

    #[ORM\Column(length: 255)]
    private ?string $soir = null;

    /**
     * @param string|null $jour
     * @param string|null $midi
     * @param string|null $soir
     */
    public function __construct(?string $jour='', ?string $midi='', ?string $soir='')
    {
        $this->jour = $jour;
        $this->midi = $midi;
        $this->soir = $soir;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getMidi(): ?string
    {
        return $this->midi;
    }

    public function setMidi(string $midi): static
    {
        $this->midi = $midi;

        return $this;
    }

    public function getSoir(): ?string
    {
        return $this->soir;
    }

    public function setSoir(string $soir): static
    {
        $this->soir = $soir;

        return $this;
    }
}
