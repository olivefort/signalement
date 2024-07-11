<?php

namespace App\Entity;

use App\Repository\AlertRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AlertRepository::class)]
class Alert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank()]
    private string $germe;

    #[ORM\Column(type: 'datetime_immutable')]
    #[Assert\NotNull()]
    private \DateTimeImmutable $date;

    #[ORM\Column(type: 'boolean')]
    private bool $cloture;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank()]
    #[Assert\Range(min: 180000000, max: 459999999 )]
    private int $finess;

    #[ORM\Column(length: 255)]
    private ?string $Ville = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Departement = null;


    /*
    *  CONSTRUCTOR
    */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGerme(): ?string
    {
        return $this->germe;
    }
    public function setGerme(string $germe): static
    {
        $this->germe = $germe;
        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }
    public function setDate(\DateTimeImmutable $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function isCloture(): ?bool
    {
        return $this->cloture;
    }
    public function setCloture(bool $cloture): static
    {
        $this->cloture = $cloture;
        return $this;
    }

    public function getFiness(): ?int
    {
        return $this->finess;
    }
    public function setFiness(int $finess): static
    {
        $this->finess = $finess;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }
    public function setVille(string $Ville): static
    {
        $this->Ville = $Ville;
        return $this;
    }

    public function getDepartement(): ?int
    {
        return $this->Departement;
    }
    public function setDepartement(int $Departement): static
    {
        $this->Departement = $Departement;
        return $this;
    }
}
