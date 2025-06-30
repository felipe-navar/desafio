<?php

namespace App\Entity;

use App\Repository\VeiculoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeiculoRepository::class)]
class Veiculo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $fabricante = null;

    #[ORM\Column(length: 50)]
    private ?string $modelo = null;

    #[ORM\Column]
    private ?int $ano = null;

    #[ORM\Column(length: 255)]
    private ?string $versao = null;

    #[ORM\Column]
    private ?float $preco = null;

    #[ORM\Column]
    private ?int $qtd_estoque = null;

    #[ORM\OneToOne(inversedBy: 'yes', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Fipe $fipe = null;

    #[ORM\Column(length: 50)]
    private ?string $tipo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFabricante(): ?string
    {
        return $this->fabricante;
    }

    public function setFabricante(string $fabricante): static
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): static
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(int $ano): static
    {
        $this->ano = $ano;

        return $this;
    }

    public function getVersao(): ?string
    {
        return $this->versao;
    }

    public function setVersao(string $versao): static
    {
        $this->versao = $versao;

        return $this;
    }

    public function getPreco(): ?float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): static
    {
        $this->preco = $preco;

        return $this;
    }

    public function getQtdEstoque(): ?int
    {
        return $this->qtd_estoque;
    }

    public function setQtdEstoque(int $qtd_estoque): static
    {
        $this->qtd_estoque = $qtd_estoque;

        return $this;
    }

    public function getFipe(): ?Fipe
    {
        return $this->fipe;
    }

    public function setFipe(Fipe $fipe): static
    {
        $this->fipe = $fipe;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }
}
