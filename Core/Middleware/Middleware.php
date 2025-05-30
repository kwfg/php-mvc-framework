<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'guest' => Guest::class,     // 'Core\Middleware\Guest'
        'auth'  => Authenticated::class       // 'Core\Middleware\Auth'
    ];

    public static function resolve($key){
        if(!$key){
            return;
        }
        $middleware = static::MAP[$key] ?? false;

        //如果用左一個無set好的middleware['value'] 
        //dd($middleware); 會undefined

        if(!$middleware){
            throw new \Exception("No matching middleware found for key . '{$key}'." );
        }

        (new $middleware)->handle();
    }

}