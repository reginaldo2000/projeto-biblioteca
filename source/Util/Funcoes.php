<?php

function url(string $rota): string {
    return URL_BASE."".$rota;
}

function asset(string $caminho): string {
    return URL_BASE."/_assets".$caminho;
}

function redirect(string $rota): void {
    header("location: ".url($rota));
    exit;
}

function session(): object {
    return (object) $_SESSION;
}