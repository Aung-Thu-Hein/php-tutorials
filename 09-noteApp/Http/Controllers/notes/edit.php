<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] == $current_user_id);

view('notes/edit.view.php', [
    'page' => 'Note Edit',
    'note' => $note,
    'errors' => Session::get('errors') ?? []
]);
