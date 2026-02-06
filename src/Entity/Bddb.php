<?php

namespace App\Entity;

use App\Repository\BddbRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BddbRepository::class)]
class Bddb
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $date = null;

    #[ORM\Column(length: 20)]
    private ?string $title = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(int $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }
}
