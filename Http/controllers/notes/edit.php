<?php

//to use container , like the Database
use Core\App;
use Core\Database;

//because the static so that we can using ::
$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$note = $db->query('select * from notes where id = :id',[
    'id' => $_GET['id']
])->findOrFail();


/*
echo "<pre>";
var_dump($note);
echo "</pre>";

if i get note id = 15 : 
(result):

array(3) {
  ["id"]=>
  string(2) "15"
  ["body"]=>
  string(9) "tEST NOTE"
  ["user_id"]=>
  string(1) "1"
}

*/

//check is that the note is that belong the user
authorize($note['user_id'] == $currentUserId);

//load the page of edit
view("notes/edit.view.php",[
    'heading' => "Edit Note",
    'errors' => [],
    'note' => $note
]);