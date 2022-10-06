<?php

namespace Source\Controller;

use Exception;
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
        $categorias = CategoriaDAO::getInstance()->list();
        echo $this->view->render("categoria/pagina-categoria", [
            "categorias" => $categorias
        ]);
    }

    public function salvar(array $data): void
    {
        $categoria = new Categoria();
        $categoria->setNome($data["nome"]);

        CategoriaDAO::getInstance()->save($categoria);

        setMessage("Categoria cadastrada com sucesso!", "alert-success");
        redirect("/app/categorias");
    }

    public function get(array $data): void
    {
        try {
            $categoria = $this->validaCategoria($data);

            $this->responseJson(false, [
                "obj" => $categoria->toArray()
            ]);
        } catch (Exception $ex) {
            $this->responseJson(true, [
                "msg" => $ex->getMessage()
            ]);
        }
    }

    public function editar(array $data): void
    {
        try {
            $categoria = $this->validaCategoria($data);

            $categoria->setNome($data["nome"]);
            CategoriaDAO::getInstance()->update();

            setMessage("Categoria editada com sucesso!", "alert-success");
            redirect("/app/categorias");
        } catch (Exception $ex) {
            setMessage($ex->getMessage(), "alert-warning");
            redirect("/app/categorias");
        }
    }

    public function excluir(array $data): void
    {
        try {
            $categoria = $this->validaCategoria($data);

            CategoriaDAO::getInstance()->delete($categoria->getId());

            setMessage("Categoria excluída com sucesso!", "alert-success");
            redirect("/app/categorias");
        } catch (Exception $ex) {
            setMessage($ex->getMessage(), "alert-warning");
            redirect("/app/categorias");
        }
    }

    private function validaCategoria(array $data): Categoria
    {
        $id = filter_var($data["id"] ?? "", FILTER_VALIDATE_INT);
        if (!$id) {
            throw new Exception("Informe um ID válido!");
        }

        $categoria = CategoriaDAO::getInstance()->get($id);

        if (empty($categoria)) {
            throw new Exception("Nenhuma categoria correspondente ao ID informado!");
        }
        return $categoria;
    }
}
