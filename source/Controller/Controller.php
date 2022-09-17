<?php

namespace Source\Controller;

use League\Plates\Engine;
use Source\Util\Session;

abstract class Controller
{

    protected Engine $view;
    protected Session $session;

    public function __construct(string $path)
    {
        $this->view = new Engine($path);
        $this->session = new Session();
    }

    public function responseJson(bool $erro, array $params): void
    {
        $params["erro"] = $erro;
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        return;
    }

}
