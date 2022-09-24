<?php

namespace Source\Controller;

use Source\DAO\CategoriaDAO;
use Source\Entity\Categoria;

class CategoriaController extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../view");
    }

    public function index(): void
    {
        echo $this->view->render("categoria/pagina-categoria", []);
    }

    public function salvar(array $data): void
    {
        $categoria = new Categoria();
        $categoria->setNome($data["nome"]);

        CategoriaDAO::getInstance()->save($categoria);

        setMessage("Categoria cadastrada com sucesso!", "alert-success");
        redirect("/app/categorias");
    }
}
