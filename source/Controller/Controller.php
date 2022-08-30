<?php

namespace Source\Controller;

abstract class Controller
{

    public function responseJson(bool $erro, array $params): void
    {
        $params["erro"] = $erro;
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        return;
    }

}
