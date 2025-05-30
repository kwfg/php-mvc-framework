<?php 

use Core\Session;

view('session/create.view.php',[
    //if no error , just passing nothing
    'errors' => Session::get('errors')
]);