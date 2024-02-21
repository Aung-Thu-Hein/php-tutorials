<?php

$config = require('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

$page = 'Note';
$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->fetch();

if (!$note) {
    abort();
}

if ($note['user_id'] != $current_user_id) {
    abort(Response::FORBIDDEN);
}

require('./views/note.view.php');
