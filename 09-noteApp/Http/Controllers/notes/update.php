<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\Forms\NoteForm;

$db = App::resolve(Database::class);

$page = 'Note Update';
$current_user_id = 1;

$note = $db->query("select * from notes where id = :id", [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] == $current_user_id);

$form = new NoteForm();

if(!$form->validate($_POST['body'])) {

    Session::flash('errors', $form->getError());
    Session::flash('old', ['body' => $_POST['body']]);

    return redirect("/note/edit?id={$_POST['id']}");
}

$db->query("update notes set body = :body where id = :id", [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

redirect('/notes');
