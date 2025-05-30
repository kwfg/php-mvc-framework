<?php

//This page will execute first no matter what , Because no condition

// return [
//     '/' => 'controllers/index.php',
//     '/about' => 'controllers/about.php',
//     '/notes' => 'controllers/notes/index.php',
//     '/note' => 'controllers/notes/show.php',
//     '/notes/create' => 'controllers/notes/create.php',
//     '/contact' => 'controllers/contact.php',
// ];

//build a better router

//show the index page
$router->get('/', 'index.php');

//show the about page
$router->get('/about','about.php');

//show contact page
$router->get('/contact','contact.php');

//show the notes page
$router->get('/notes' , 'notes/index.php')->only('auth');

//show the note (content) page
$router->get('/note' , 'notes/show.php');

//show the create note page
//show using post not get
//$router->get('/notes/create','controller/notes/create.php');
$router->get('/notes/create','notes/create.php');

//create a new note
$router->post('/notes','notes/store.php');


//update the edited note 
$router->patch('/note', 'notes/update.php');

//to edit the note
$router->get('/note/edit', 'notes/edit.php');

//register page
$router->get('/register','registration/create.php')->only('guest');

//add a new user 
$router->post('/register','registration/store.php')->only('guest');


//process the delete options
$router->delete('/note' , 'notes/destroy.php');

//show a login page
//<a href="/login"
$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');

//destroy the session (Logout)
//it should be delete
$router->delete('/session', 'session/destroy.php')->only('auth');