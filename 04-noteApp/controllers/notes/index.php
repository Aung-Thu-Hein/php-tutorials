<?php

$config = require basePath('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

$notes = $db->query("select * from notes")->getAll();

view('notes/index.view.php', [
    'page' => 'My Notes',
    'notes' => $notes
]);
