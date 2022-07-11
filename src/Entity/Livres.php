<?php

namespace App\Entity;

use App\Repository\LivresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivresRepository::class)
 */
class Livres
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
    private $auteur_livre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre_livre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_livre;

    /**
     * @ORM\ManyToOne(targetEntity=Genres::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre_livre;

    /**
     * @ORM\ManyToOne(targetEntity=Formats::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $format_livre;

    /**
     * @ORM\ManyToOne(targetEntity=EtatsUsure::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etat_livre;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vendeur_livre;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_livre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_annonce_livre;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getAuteurLivre(): ?string
    {
        return $this->auteur_livre;
    }

    public function setAuteurLivre(string $auteur_livre): self
    {
        $this->auteur_livre = $auteur_livre;

        return $this;
    }

    public function getTitreLivre(): ?string
    {
        return $this->titre_livre;
    }

    public function setTitreLivre(string $titre_livre): self
    {
        $this->titre_livre = $titre_livre;

        return $this;
    }

    public function getImageLivre(): ?string
    {
        return $this->image_livre;
    }

    public function setImageLivre(string $image_livre): self
    {
        $this->image_livre = $image_livre;

        return $this;
    }

    public function getGenreLivre(): ?Genres
    {
        return $this->genre_livre;
    }

    public function setGenreLivre(?Genres $genre_livre): self
    {
        $this->genre_livre = $genre_livre;

        return $this;
    }

    public function getFormatLivre(): ?Formats
    {
        return $this->format_livre;
    }

    public function setFormatLivre(?Formats $format_livre): self
    {
        $this->format_livre = $format_livre;

        return $this;
    }

    public function getEtatLivre(): ?EtatsUsure
    {
        return $this->etat_livre;
    }

    public function setEtatLivre(?EtatsUsure $etat_livre): self
    {
        $this->etat_livre = $etat_livre;

        return $this;
    }

    public function getVendeurLivre(): ?User
    {
        return $this->vendeur_livre;
    }

    public function setVendeurLivre(?User $vendeur_livre): self
    {
        $this->vendeur_livre = $vendeur_livre;

        return $this;
    }

    public function getPrixLivre(): ?float
    {
        return $this->prix_livre;
    }

    public function setPrixLivre(float $prix_livre): self
    {
        $this->prix_livre = $prix_livre;

        return $this;
    }

    public function getDateAnnonceLivre(): ?\DateTimeInterface
    {
        return $this->date_annonce_livre;
    }

    public function setDateAnnonceLivre(\DateTimeInterface $date_annonce_livre): self
    {
        $this->date_annonce_livre = $date_annonce_livre;

        return $this;
    }

}
