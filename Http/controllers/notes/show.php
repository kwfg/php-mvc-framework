<?php

use Core\App;
use Core\Database;

$db = App::resolve(\Core\Database::class);


//avoid after 6 month later coming back to see , didn't know what is 1 mean , so assign to variable
$currentUserId = $_SESSION['user']['id'];

//get the correct note's text
//http://localhost:8888/note?id=3   $_GET['id'] = get the url ?id=3  , get the 3



    //再撈一次筆記：同樣用安全的參數化查詢。
    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    //check the permission is that belong the user
    authorize($note['user_id'] == $currentUserId);

    //pass select return d data出來用 $note
    //we don't need to connect the db on view , so only passing the thing that view will be in need
    view("notes/show.view.php",[
        'heading' => "Note",
        'note' => $note
    ]);

 



 