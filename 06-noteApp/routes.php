<?php

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->get('/', '/controllers/index.php');
$router->get('/about', '/controllers/about.php');
$router->get('/contact', '/controllers/contact.php');

$router->get('/notes', '/controllers/notes/index.php');
$router->get('/note', '/controllers/notes/show.php');
$router->delete('/note', '/controllers/notes/destroy.php');

$router->get('/notes/create', '/controllers/notes/create.php');
$router->post('/notes/create', '/controllers/notes/store.php');

$router->get('/note/edit', '/controllers/notes/edit.php');
$router->patch('/note', '/controllers/notes/update.php');

$router->route($uri, $method);
