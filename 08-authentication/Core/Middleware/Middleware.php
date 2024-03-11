<?php

namespace Core\Middleware;

use Exception;
use Core\Middleware\Auth;
use Core\Middleware\Guest;

class Middleware 
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    public static function resolve($key)
    {

        if(!$key) {
            return;
        }

        if(!array_key_exists($key, static::MAP)) {
            throw new Exception("No matched middleware found for '{$key}'.");
        }

        $middleware = static::MAP[$key];
        (new $middleware)->handle();
    }
}
