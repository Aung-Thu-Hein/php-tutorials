<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\Forms\NoteForm;

$db = App::resolve(Database::class);

$current_user_id = 1;

$form = new NoteForm();

if (!$form->validate($_POST['body'])) {

    Session::flash('errors', $form->getError());
    Session::flash('old', ['body' => $_POST['body']]);

    return redirect('/notes/create');
}

$db->query("insert into notes(body, user_id) values(:body, :user_id)", [
    'body' => $_POST['body'],
    'user_id' => $current_user_id,
]);

return redirect('/notes');
