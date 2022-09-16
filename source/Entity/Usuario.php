<?php

namespace Source\Entity;

use DateTime;

class Usuario extends EntidadeGenerica
{

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

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPerfil(): string
    {
        return $this->perfil;
    }

    public function getDataCriacao(): DateTime
    {
        return $this->dataCriacao;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPerfil(string $perfil): void
    {
        $this->perfil = $perfil;
    }

    public function setDataCriacao(DateTime $dataCriacao): void
    {
        $this->dataCriacao = $dataCriacao;
    }
}
