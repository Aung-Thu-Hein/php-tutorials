<?php

namespace Core;

class Authenticator
{

    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query("select * from users where email = :email", [
            'email' => $email
        ])->find();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
