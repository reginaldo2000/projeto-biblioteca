<?php

namespace Source\Controller;

class AuthController extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../view");
    }

    public function paginaLogin(): void
    {
        echo $this->view->render("login/pagina-login", []);
    }
}
