<?php


//if (! Validator::email('asdasdsad')){
    //dd('that is not a valid email');
//}



//we don't wee to connect the db on view , so only passing the thing that view will be in need
view("notes/create.view.php",[
    'heading' => "Create Note",
    'errors' => []
]);