<?php

use Core\Router;

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes/create', 'notes/store.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->get('/user', 'user/register.php')->only('guest');
$router->post('/user', 'user/store.php')->only('guest');

$router->get('/login', 'auth/login.php')->only('guest');
$router->post('/login', 'auth/authenticate.php')->only('guest');
$router->delete('/logout', 'auth/logout.php')->only('auth');

$router->route($uri, $method);
