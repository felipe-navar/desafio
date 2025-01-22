<?php

namespace App\Entity;

use App\Repository\FipeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FipeRepository::class)]
class Fipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 8)]
    private ?string $codigo = null;

    #[ORM\Column]
    private ?float $valor = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $historico = null;

    #[ORM\OneToOne(mappedBy: 'fipe', cascade: ['persist', 'remove'])]
    private ?Veiculo $yes = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): static
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): static
    {
        $this->valor = $valor;

        return $this;
    }

    public function getHistorico(): ?\DateTimeInterface
    {
        return $this->historico;
    }

    public function setHistorico(\DateTimeInterface $historico): static
    {
        $this->historico = $historico;

        return $this;
    }

    public function getYes(): ?Veiculo
    {
        return $this->yes;
    }

    public function setYes(Veiculo $yes): static
    {
        // set the owning side of the relation if necessary
        if ($yes->getFipe() !== $this) {
            $yes->setFipe($this);
        }

        $this->yes = $yes;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->historico;
    }


}
