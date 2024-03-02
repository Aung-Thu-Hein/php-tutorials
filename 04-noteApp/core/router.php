<?php

$routers = require basePath('routes.php');

function routeToController($url, $routers)
{
    if (array_key_exists($url, $routers)) {
        require(basePath($routers[$url]));
    } else {
        abort();
    }
}

function abort($status_code = 404)
{
    require(basePath("views/$status_code.php"));
    http_response_code($status_code);

    die();
}

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
routeToController($url, $routers);
