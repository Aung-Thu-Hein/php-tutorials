<?php
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routers = [
    '/02-router/' => '/controllers/index.php',
    '/02-router/about' => '/controllers/about.php',
    '/02-router/contact' => '/controllers/contact.php'
];

function routeToController($url, $routers)
{
    if (array_key_exists($url, $routers)) {
        require('.' . $routers[$url]);
    } else {
        abort();
    }
}

function abort($status_code = 404)
{
    require('./views/404.php');
    http_response_code($status_code);

    die();
}

routeToController($url, $routers);
