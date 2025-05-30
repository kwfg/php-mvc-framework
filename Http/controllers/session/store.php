<?php 

//log in the user if the credentials match.

//use Core\App;
//use Core\Database;

//fixed , missing the use Core\Authenticator
use Core\Authenticator;
use Http\Forms\LoginForm;


//1.process the LoginForm validate , also passing the email , password into
$form = LoginForm::validate($attributes = [
    'email'=>$_POST['email'],
    'password'=>$_POST['password']
]);

$signedIn = (new Authenticator)->attempt($attributes['email'],$attributes['password']);


//if((new Authenticator)->attempt($attributes['email'],$attributes['password']))
if(!$signedIn){
    $form->error('email','No matching account found for that email address and password.')->throw();
}
redirect('/');

 
    






 


