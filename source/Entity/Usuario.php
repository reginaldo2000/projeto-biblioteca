<?php

namespace Source\Entity;

use DateTime;

class Usuario extends EntidadeGenerica {

    private string $login;

    private string $senha;

    private string $nome;

    private string $email;

    private string $perfil = "PADRAO";

    private DateTime $dataCriacao;

    public function __construct(string $login, string $senha, string $nome, string $email)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->email = $email;
        $this->dataCriacao = new DateTime();
    }
}