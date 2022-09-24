<?php

function url(string $rota): string
{
    return URL_BASE . "" . $rota;
}

function asset(string $caminho): string
{
    return URL_BASE . "/_assets" . $caminho;
}

function redirect(string $rota): void
{
    header("location: " . url($rota));
    exit;
}

function session(): object
{
    return (object) $_SESSION;
}

function setMessage(string $message, string $typeMessage): void
{
    $_SESSION["message"] = $message;
    $_SESSION["type_message"] = $typeMessage;
}

function showMessage(): void
{
    if (isset($_SESSION["message"])) {
        $typeMessage = $_SESSION["type_message"];
        $message = $_SESSION["message"];

        $stringMessage = '
        <div class="alert ' . $typeMessage . ' alert-dismissible fade show" role="alert">
            ' . $message . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        unset($_SESSION["message"]);
        echo $stringMessage;
    }
}
