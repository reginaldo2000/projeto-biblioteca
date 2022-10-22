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
        $livro->setTitulo(mb_strtoupper($data["titulo"]) ?? "");
        $livro->setResumo($data["resumo"] ?? "");
        $livro->setCategoria(CategoriaDAO::getInstance()->get($categoriaId));
        $livro->setAutor($data["autor"] ?? "");
        $livro->setDataPublicacao(new DateTime($data["data_publicacao"] ?? "now"));

        if (!$livro->isValid()) {
            setMessage("Preencha todos os campos obrigatórios de forma correta!", "alert-warning");
            redirect("/app/livros");
        }

        LivroDAO::getInstance()->save($livro);

        setMessage("Livro cadastrado com sucesso!", "alert-success");
        redirect("/app/livros");
    }
}
