<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id'] ?? null])->findOrFail();

authorize($note['user_id'] == $current_user_id);

view('notes/show.view.php', [
    'page' => 'Note Detail',
    'note' => $note
]);
