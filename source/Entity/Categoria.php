<?php

namespace Source\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categorias")
 */
class Categoria extends EntidadeGenerica
{

    /**
     * @ORM\Column(length=100)
     */
    private string $nome;

    public function __construct()
    {
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }
}
