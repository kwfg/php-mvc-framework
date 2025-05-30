<?php

use Core\App;
use Core\Database;


$db = App::resolve(\Core\Database::class);


$user_id = $_SESSION['user']['id'];
$notes = $db->query("select * from notes where user_id = $user_id")->get();


//we don't wee to connect the db on view , so only passing the thing that view will be in need
view("notes/index.view.php",[
    'heading' => "My Notes",
    'notes' => $notes
]);