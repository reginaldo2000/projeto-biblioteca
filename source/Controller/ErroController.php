<?php

namespace Source\Controller;

class ErroController extends Controller
{

    public function trataErro(array $data): void
    {
        $codigoErro = filter_var($data["codigo"], FILTER_VALIDATE_INT);
        switch ($codigoErro) {
            case 404:
                echo "<h1>OOPS!!! <br> Página não encontrada!</h1>";
                break;
            case 500:
                echo "<h1>OOPS!!! <br> Houve um problema durante a execução da sua solicitação!</h1>";
                break;
            default:
                echo "<h1>OOPS!!! <br> Sua solicitação não pode ser processada!";
                break;
        }
    }
}
