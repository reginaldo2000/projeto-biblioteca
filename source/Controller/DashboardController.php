<?php

namespace Source\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../view");
    }

    public function paginaInicial(array $data): void {
        echo $this->view->render("inicio/pagina-inicial", []);
    }
}
