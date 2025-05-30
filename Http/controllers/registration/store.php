<?php 

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form inputs.
$errors = [];

//「如果 $email 唔係 一個 valid 嘅 email，就執行入面嘅 code」

//if (Validator::xxx(...) != true)
if(!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address.';
}

//if (Validator::xxx(...) != true)
if(!Validator::string($password , 7, 255)){
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if(! empty($errors)){
    return view('registration/create.view.php',[
        'errors' => $errors
    ]);
}

//check if the account already exists
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email',[
    'email' => $email
])->find();

if($user){
    //then someone with that email already exists and has an account.
    //If yes, redirect to a login page.
    header('location: /');
}else{
    //只有在 $user 是 null 時才會執行這裡

    //If not, save one to the database, and then log the user in, and redirect.
    $user = $db->query('INSERT INTO users(email, password) VALUES (:email, :password)',[
        'email' => $email,
        //將用戶輸入嘅密碼加密（Hash）成安全格式 , 代表使用 BCRYPT 雜湊演算法 , BCRYPT 會自動加入 salt（即防止 rainbow table 攻擊）
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // 直接用 email 再查一次，取得 id
    $userID = $db->query('SELECT * FROM users WHERE email = :email', [
        'email' => $email
    ])->find();

    (new Authenticator)->login([
        'email' => $userID['email'],
        'id'=>$userID['id']
    ]);
    /* move to Core/function.php
    $_SESSION['user'] = [
        'email' => $email
    ];
    */

    header('location: /');
    exit();
}
     