<?php

namespace Source\Controller;

class ErroController extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../view");
    }

    public function trataErro(array $data): void
    {
        $codigoErro = filter_var($data["codigo"], FILTER_VALIDATE_INT);
        $mensagem = "";
        switch ($codigoErro) {
            case 404:
                $mensagem = "Página não encontrada!";
                break;
            case 500:
                $mensagem = "Houve um problema durante a execução da sua solicitação!";
                break;
            default:
                $mensagem = "Sua solicitação não pode ser processada!";
                break;
        }
        echo $this->view->render("erro", [
            "codigo" => $codigoErro,
            "mensagem" => $mensagem
        ]);
    }
}
