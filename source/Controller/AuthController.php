<?php

namespace Source\Controller;

use Exception;
use Source\Entity\Usuario;
use Source\Util\EntityManagerFactory;

class AuthController extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../view");
    }

    public function paginaLogin(): void
    {
        $this->boot();
        echo $this->view->render("login/pagina-login", []);
    }

    public function autenticar(array $data): void
    {
        try {
            $login = filter_var($data["login"], FILTER_SANITIZE_SPECIAL_CHARS);
            $senha = md5($data["senha"]);

            $em = EntityManagerFactory::getEntityManager();
            $usuario = $em->getRepository(Usuario::class)->findOneBy([
                "login" => $login,
                "senha" => $senha
            ]);

            if (empty($usuario)) {
                redirect("/app/login");
            }
            redirect("/app/inicio");
        } catch (Exception $e) {
            echo $e;
        }
    }

    private function boot(): void
    {
        try {
            $em = EntityManagerFactory::getEntityManager();

            $listaUsuarios = $em->getRepository(Usuario::class)->findAll();

            if (empty($listaUsuarios)) {
                $usuario = new Usuario("admin", md5("admin"), "Administrador do Sistema", "arcs.si3@gmail.com");
                $em->persist($usuario);
                $em->flush();
            }
        } catch (Exception $e) {
            echo "Desculpe, houve algum problema no sistema!!!";
        }
    }
}
