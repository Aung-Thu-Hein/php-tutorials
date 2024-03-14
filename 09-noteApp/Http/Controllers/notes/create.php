<?php

use Core\Session;

view('notes/create.view.php', [
    'page' => 'Create Note',
    'errors' => Session::get('errors') ?? []
]);
