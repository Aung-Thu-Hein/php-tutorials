<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if(!Validator::email($email)) {
    $errors['email'] = "Please enter a valid email";
}

if(!Validator::string($password, 6, 100)) {
    $errors['password'] = "Please provide a password of at least 6 characters";
}

if(!empty($errors)) {
    return view('user/register.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if($user) {
   redirect('/');
} else {
    $db->query("insert into users(email, password) values(:email, :password)", [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];
    
    redirect('/');
}
