<?php

namespace Source\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="livros")
 */
class Livro extends EntidadeGenerica {

    /**
     * @ORM\Column
     */
    private string $titulo;

    /**
     * @ORM\Column(type="text")
     */
    private string $resumo;

    /**
     * @ORM\Column(length=120)
     */
    private string $autor;

    /**
     * @ORM\Column(type="datetime", name="data_publicacao")
     */
    private DateTime $dataPublicacao;

    /**
     * @ORM\ManyToOne
     */
    private ?Categoria $categoria;

    public function __construct()
    {
        
    }

    public function isValid(): bool {
        if($this->titulo == "" || $this->resumo == "" || $this->autor == "") {
            return false;
        }
        if(empty($this->categoria)) {
            return false;
        }
        return true;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getResumo(): string
    {
        return $this->resumo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }

    public function getDataPublicacao(): DateTime
    {
        return $this->dataPublicacao;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function setResumo(string $resumo): void
    {
        $this->resumo = $resumo;
    }

    public function setAutor(string $autor): void
    {
        $this->autor = $autor;
    }

    public function setDataPublicacao(DateTime $dataPublicacao): void
    {
        $this->dataPublicacao = $dataPublicacao;
    }

    public function setCategoria(?Categoria $categoria): void
    {
        $this->categoria = $categoria;
    }

}
