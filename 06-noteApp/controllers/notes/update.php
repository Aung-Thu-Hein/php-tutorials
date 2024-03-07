<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$page = 'Note Update';
$current_user_id = 1;

$errors = [];

$note = $db->query("select * from notes where id = :id", [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] == $current_user_id);

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is  required';
}

if (!empty($errors)) {
    view('notes/edit.view.php', [
        'page' => 'Note Edit',
        'errors' => $errors,
        'note' => $note
    ]);
}

if (count($note)) {
    $db->query("update notes set body = :body where id = :id", [
        'body' => $_POST['body'],
        'id' => $_POST['id'],
    ]);

    header('location: /notes');
    exit();
}
