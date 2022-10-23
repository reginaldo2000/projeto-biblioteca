<?php

namespace Source\Controller;

use DateTime;
use Source\DAO\CategoriaDAO;
use Source\DAO\LivroDAO;
use Source\Entity\Livro;

class LivroController extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../view");
    }

    public function index(): void
    {
        $categorias = CategoriaDAO::getInstance()->list();
        $livros = LivroDAO::getInstance()->list();

        echo $this->view->render("livro/pagina-livro", [
            "livros" => $livros,
            "categorias" => $categorias
        ]);
    }

    public function salvarLivro(array $data): void
    {
        $categoriaId = filter_var($data["categoria"], FILTER_VALIDATE_INT) ?: 0;
        $livro = new Livro();

        if (isset($data["id"])) {
            $id = $data["id"];
            $livro = LivroDAO::getInstance()->get($id);
        }

        $livro->setTitulo(mb_strtoupper($data["titulo"]) ?? "");
        $livro->setResumo($data["resumo"] ?? "");
        $livro->setCategoria(CategoriaDAO::getInstance()->get($categoriaId));
        $livro->setAutor($data["autor"] ?? "");
        $livro->setDataPublicacao(new DateTime($data["data_publicacao"] ?? "now"));

        if (!$livro->isValid()) {
            setMessage("Preencha todos os campos obrigatórios de forma correta!", "alert-warning");
            redirect("/app/livros");
        }

        if (!isset($data["id"])) {
            LivroDAO::getInstance()->save($livro);
        } else {
            LivroDAO::getInstance()->update();
        }

        $msg = (!isset($data["id"]) ? 'cadastrado' : 'atualizado');
        setMessage("Livro {$msg} com sucesso!", "alert-success");
        redirect("/app/livros");
    }

    public function getLivro(array $data): void
    {
        $id = filter_var($data["id"], FILTER_VALIDATE_INT) ?: 0;
        $livro = LivroDAO::getInstance()->get($id);
        if (empty($livro)) {
            $this->responseJson(true, [
                "msg" => "Não foi possível encontrar o livro!"
            ]);
            return;
        }
        $this->responseJson(false, $livro->toArray());
    }

    public function visualizarLivro(array $data): void
    {
        $id = filter_var($data["id"], FILTER_VALIDATE_INT) ?: 0;
        $livro = LivroDAO::getInstance()->get($id);
        if (empty($livro)) {
            $this->responseJson(true, [
                "msg" => "Não foi possível encontrar o livro!"
            ]);
            return;
        }
        $render = $this->view->render("livro/render/render-visualizar", [
            "livro" => $livro
        ]);

        $this->responseJson(false, [
            "render" => $render
        ]);
    }

    public function prepareEdicao(array $data): void
    {
        $id = filter_var($data["id"], FILTER_VALIDATE_INT) ?: 0;
        $livro = LivroDAO::getInstance()->get($id);
        if (empty($livro)) {
            $this->responseJson(true, [
                "msg" => "Não foi possível encontrar o livro!"
            ]);
            return;
        }

        $categorias = CategoriaDAO::getInstance()->list();

        $render = $this->view->render("livro/render/render-editar", [
            "livro" => $livro,
            "categorias" => $categorias
        ]);

        $this->responseJson(false, [
            "render" => $render
        ]);
    }

    public function novoLivro(array $data): void
    {
        $categorias = CategoriaDAO::getInstance()->list();
        $render = $this->view->render("livro/render/render-novo", [
            "categorias" => $categorias
        ]);
        $this->responseJson(false, [
            "render" => $render
        ]);
    }

}
