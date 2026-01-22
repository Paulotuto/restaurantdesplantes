<?php

namespace App\Entity;

use App\Repository\ArticleCarousselRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleCarousselRepository::class)]
class ArticleCaroussel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;


    #[ORM\Column(length: 1000)]
    private ?string $description = null;

    /**
     * @param string|null $image
     * @param string|null $titre
     * @param string|null $description
     */
    public function __construct(?string $image='', ?string $titre='', ?string $description='')
    {
        $this->image = 'images/articles/'.$image;
        $this->titre = $titre;
        $this->description = $description;
    }



    /**
     * @param string|null $image
     * @param string|null $titre
     */



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
        $this->image = 'images/articles/'.$image;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

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
