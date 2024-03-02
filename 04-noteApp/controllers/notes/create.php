<?php

$config =  require basePath('config.php');
$db = new Database($config['database'], 'root', 'newpassword');

$page = 'Note Create';
$current_user_id = 1;

$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'A body of no more than 1,000 characters is  required';
    }
    
    if(empty($errors)) {
        $db->query("insert into notes(body, user_id) values(:body, :user_id)", [
            'body' => $_POST['body'],
            'user_id' => 1,
        ]);
    }
}

view('notes/create.view.php', [
    'page' => 'Home',
    'errors' => $errors
]);
