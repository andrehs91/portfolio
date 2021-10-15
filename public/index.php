<?php

require_once "../config.php";
require_once "../vendor/autoload.php";

$method = $_SERVER['REQUEST_METHOD'];
if ($method != "GET" && $method != "POST") return "Método HTTP não aceito.";

$route = explode("?", str_replace("/", "", $_SERVER["REQUEST_URI"]))[0];
$path = "../source/";
switch ($route) {
    case '':
        require $path . "template-header.html";
        require $path . "portfolio.html";
        require $path . "sobre-mim.html";
        require $path . "contato.html";
        require $path . "template-footer.html";
        break;
    case 'enviar-email':
        require $path . "enviar-email.php";
        break;
    default:
        require $path . "template-header.html";
        require $path . "404.html";
        require $path . "template-footer.html";
        break;
}
