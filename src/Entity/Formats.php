<?php

namespace App\Entity;

use App\Repository\FormatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormatsRepository::class)
 */
class Formats
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
    private $Format;

    /**
     * @ORM\OneToMany(targetEntity=Livres::class, mappedBy="format_livre")
     */
    private $livres;

    public function __construct()
    {
        $this->livres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormat(): ?string
    {
        return $this->Format;
    }

    public function setFormat(string $Format): self
    {
        $this->Format = $Format;

        return $this;
    }

    /**
     * @return Collection<int, Livres>
     */
    public function getLivres(): Collection
    {
        return $this->livres;
    }

    public function addLivre(Livres $livre): self
    {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setFormatLivre($this);
        }

        return $this;
    }

    public function removeLivre(Livres $livre): self
    {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getFormatLivre() === $this) {
                $livre->setFormatLivre(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->Format;
    }
}
