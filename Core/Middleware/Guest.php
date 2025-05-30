<?php

namespace Core\Middleware;

class Guest{
    public function handle()
    {//如果有user唔比入register
        if ($_SESSION['user'] ?? false){
            header('location: /');
            exit();
        }
    }
}