<?php

use Core\App;
use Core\Database;
use Core\Session;
use Http\Forms\RegisterationForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new RegisterationForm();

if (!$form->validate($email, $password)) {

    Session::flash('errors', $form->getError());
    Session::flash('old', ['email' => $email]);
    
    return redirect('/user');

}

$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", [
    'email' => $email
])->find();

if ($user) {
    redirect('/');
}

$db->query("insert into users(email, password) values(:email, :password)", [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
]);

Session::put('user', ['email' => $email]);

redirect('/');
