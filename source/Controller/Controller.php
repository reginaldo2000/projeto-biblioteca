<?php

namespace Source\Controller;

use League\Plates\Engine;

abstract class Controller
{

    protected Engine $view;

    public function __construct(string $path)
    {
        $this->view = new Engine($path);
    }

    public function responseJson(bool $erro, array $params): void
    {
        $params["erro"] = $erro;
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        return;
    }

}
