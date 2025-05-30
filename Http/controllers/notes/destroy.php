<?php

use Core\App;
use Core\Database;

//replaced by container:
//$config = require base_path('config.php');
//$db = new Database($config['database']);

//$db = App::container()->resolve('Core\Database');
//PHP 會幫你變成：'Core\Database'
//用 ::class 比較好

$db = App::resolve(\Core\Database::class);
//$db = App::container()->resolve(\Core\Database::class); <-FULL PATH




//avoid after 6 month later coming back to see , didn't know what is 1 mean , so assign to variable
$currentUserId = $_SESSION['user']['id'];

//get the correct note's text
//http://localhost:8888/note?id=3   $_GET['id'] = get the url ?id=3  , get the 3




    //avoid the SQL injection
    $note = $db->query('select * from notes where id = :id',[
        'id' => $_POST['id']
    ])->findOrFail();


    //var_dump($note['user_id']); <- string

    //var_dump($currentUserId); <- int 

    //if we using === will error

    //check is that the note is belong the user , noteID belong to userID
    authorize($note['user_id'] == $currentUserId);

    $db->query('delete from notes where id = :id',[
        'id' => $_POST['id']
    ]);

    //if delete is executed , process following redirect the page
    //back to notes list
    header('location: /notes');
    //stop this process
    exit();


 



 