<?php

namespace Core;
use Core\Session;


class Authenticator{
    public function attempt($email , $password){
        //Container
        //fixed the ; // 這行結束了
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email' , [
            'email' => $email
        ])->find();

        //var_dump();

        if($user){
            //using the user's typing to compare with the database hashed password
            if(password_verify($password , $user['password'])){
                $this->login([
                    'email' => $email,
                    'id' => $user['id']
                 ]);
                return true;

                //header('location: /');  now is controller the responsible to do that thing
                //exit();
            }
        }
        return false;
    }
    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id']
        ];
    
        //建立新的 session ID , 並 銷毀舊的 session , 可防止 session fixation 攻擊（例如黑客預設 session ID 再讓你使用）
        session_regenerate_id(true);
    }
    
    public function logout(){
        //log the user out
    
       Session::destroy();
    
    }
    
}