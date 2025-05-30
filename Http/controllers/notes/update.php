<?php


use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];



/*

echo "<pre>";
var_dump($_POST);
echo "</pre>";
exit();


array(3) {
  ["_method"]=>
  string(5) "PATCH"
  ["id"]=>
  string(2) "15"
  ["body"]=>
  string(28) "Test note have been updated!"
}

*/


// find the corresponding(相應的) note 
$note = $db->query('select * from notes where id = :id',[
    //$_POST['id'] <-passing from the edit.view.php
    'id' => $_POST['id']
])->findOrFail();


// authorize that the current user can edit the note
authorize($note['user_id']==$currentUserId);



// validate the form

$errors = [];

if(!Validator::string($_POST['body'] , 1 , 1000)){
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}


// if no validation errors, update the record in the notes database table

//have error:
if(count($errors)){
    return view('notes/edit.view.php',[
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}


//if no error process the update
$db->query('update notes set body = :body where id = :id',[
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

//redirect the user
header('location: /notes');
die();