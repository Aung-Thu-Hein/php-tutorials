<?php

namespace Http\Forms;

use Core\Validator;

class NoteForm
{
    protected $errors = [];

    public function validate($note)
    {
        if (!Validator::string($note, 1, 1000)) {
            $this->errors['body'] = 'A body of no more than 1,000 characters is  required';
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
