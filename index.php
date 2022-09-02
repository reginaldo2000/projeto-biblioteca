<?php

include __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router("http://localhost/sistema-biblioteca");

$route->group("app")->namespace("Source\Controller");
$route->get("/inicio", function() {
    echo "HELLO WORLD!!!";
});

/* Rotas de erros */
$route->group("oops")->namespace("Source\Controller");
$route->get("/{codigo}", "ErroController:trataErro");

$route->dispatch();

if ($route->error()) {
    $route->redirect("/oops/{$route->error()}");
}
