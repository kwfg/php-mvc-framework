<?php

use Core\Authenticator;

it('stores email in session after login',function(){
    session_start();
    $auth = new Authenticator();
    $auth->login(['email'=>'abc@gmail.com']);
    expect($_SESSION['user']['email'])->toBe('abc@gmail.com');
});