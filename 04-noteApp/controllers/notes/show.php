<?php

$config = require basePath('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->get();

if (!$note) {
    abort();
}

if ($note['user_id'] != $current_user_id) {
    abort(Response::FORBIDDEN);
}

view('notes/show.view.php', [
    'page' => 'Note',
    'note' => $note
]);
