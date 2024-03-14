<?php

use Core\Session;

view('auth/login.php', [
    'errors' => Session::get('errors') ?? []
]);
