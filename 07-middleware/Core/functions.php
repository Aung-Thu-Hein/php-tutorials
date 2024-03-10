<?php

use Core\Response;

function dd($var = null)
{

    echo "<pre>";
    var_dump($var);
    echo "</pre>";

    die();
}

function urlIs($url)
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require basePath('views/' . $path);
}

function abort($status_code = 404)
{
    http_response_code($status_code);
    require(basePath("views/$status_code.php"));

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}
