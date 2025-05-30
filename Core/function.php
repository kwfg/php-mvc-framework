<?php

use Core\Response;
use Core\Session;

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value){
    return $_SERVER['REQUEST_URI'] == $value;
}

function abort($code = 404){

    http_response_code($code);
        
    require base_path("views/{$code}.php");

    die();
}

function authorize($condition , $status = RESPONSE::FORBIDDEN){
    if(! $condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH . $path;
}

function view($path , $attributes = []){
    //extract array's variables from attributes , and allow to in the same scope
    extract($attributes);
    require base_path('views/' . $path); // /views/index.view.php
}

function redirect($path){
    header("location: {$path}");
    exit();
}

function old($key, $default = ''){
    return Core\Session::get('old')['email'] ?? $default ;
}
