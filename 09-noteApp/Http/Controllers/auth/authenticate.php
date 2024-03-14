<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {

    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    } else {
        $form->setError('email', 'No matching account for that email address and password');
    }
}

Session::flash('errors', $form->getError());
Session::flash('old', ['email' => $email ]);

redirect('/login');
