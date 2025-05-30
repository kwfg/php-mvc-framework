<?php 

use Core\Validator;
use Core\App;
use Core\Database;


$db = App::resolve(\Core\Database::class);

$errors = [];


    //strlen — Get string length

    //if pure function , added static , it's no need to new anymore $validator = new Validator();

    //avoid typing nothing text
    if(!Validator::string($_POST['body'] , 1 , 1000)){
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    if(!empty($errors)){
        return view("notes/create.view.php",[
            'heading' => "Create Note",
            'errors' => $errors
        ]);
    }


    if(empty($errors)){
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => $_SESSION['user']['id'],
            //'user_id' => '1', //because we haven't reviewed the session , so hard code 1
        ]);
        header('location: /notes');
        die();
    }

