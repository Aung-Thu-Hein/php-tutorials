<?php
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routers = [
    '/04-noteApp/' => '/controllers/index.php',
    '/04-noteApp/about' => '/controllers/about.php',
    '/04-noteApp/contact' => '/controllers/contact.php',
    '/04-noteApp/notes' => '/controllers/notes.php',
    '/04-noteApp/note' => '/controllers/note.php'
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
    require("./views/$status_code.php");
    http_response_code($status_code);

    die();
}

routeToController($url, $routers);
