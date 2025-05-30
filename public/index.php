<?php



use Core\ValidationException;
use Core\Session;

const BASE_PATH = __DIR__ .  '/../';

require BASE_PATH . 'vendor/autoload.php';

session_start();

//var_dump(BASE_PATH);
//string(45) "C:\xampp\htdocs\laracasts_beg-main\public/../"

//we can using base_path() to function.php , because we have to require after using base_path() function
require BASE_PATH . 'Core/function.php';


require base_path('bootstrap.php');


$router = new \Core\Router();

$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//  $uri = /  /about /notes


$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];



try{
   $router->route($uri, $method);
}catch(ValidationException $exception){
   //3.0 將錯誤 flash 到 session：
   /*
      $_SESSION['errors'] = ['email' => 'Please provide a valid email address.'];
      $_SESSION['old'] = ['email' => 'abc123', 'password' => 'validPassword123'];
   */
     Session::flash('errors',$exception->errors);
     Session::flash('old',$exception->old);

     //3.1 然後導回上一頁 /login
     
     return redirect($router->previousUrl());
}
 

Session::unflash();
