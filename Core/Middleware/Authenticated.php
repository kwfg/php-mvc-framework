<?php

//because inside of the Core
namespace Core\Middleware;

Class Authenticated
{
    public function handle()
    {//如果無user唔比入notes
        if (!$_SESSION['user'] ?? false){
            header('location: /');
            exit();
        }
    }
}