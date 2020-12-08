<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StyleRepository::class)
 */
class Style
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=artist::class, mappedBy="style")
     */
    private $artists;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|artist[]
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(artist $artist): self
    {
        if (!$this->artists->contains($artist)) {
            $this->artists[] = $artist;
            $artist->setStyle($this);
        }

        return $this;
    }

    public function removeArtist(artist $artist): self
    {
        if ($this->artists->removeElement($artist)) {
            // set the owning side to null (unless already changed)
            if ($artist->getStyle() === $this) {
                $artist->setStyle(null);
            }
        }

        return $this;
    }
}
