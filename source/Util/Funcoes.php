<?php

function url(string $rota): string {
    return URL_BASE."".$rota;
}

function redirect(string $rota): void {
    header("location: ".url($rota));
    exit;
}