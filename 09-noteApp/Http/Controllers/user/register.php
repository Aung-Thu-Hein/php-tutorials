<?php

use Core\Session;

view('user/register.view.php', [
    'errors' => Session::get('errors') ?? []
]);
