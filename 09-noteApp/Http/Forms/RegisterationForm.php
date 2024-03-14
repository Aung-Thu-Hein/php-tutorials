<?php

namespace Http\Forms;

use Core\Validator;

class RegisterationForm
{
    protected $errors = [];

    public function validate($email, $password)
    {
        if(!Validator::email($email)) {
            $this->errors['email'] = "Please enter a valid email";
        }
        
        if(!Validator::string($password, 6, 100)) {
            $this->errors['password'] = "Please provide a password of at least 6 characters";
        }

        return empty($this->errors);
    }

    public function getError()
    {
        return $this->errors;
    }

    public function setError($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
