<?php

namespace Core;

//child class : ValidationException , parent class : \Exception
class ValidationException extends \Exception{
    //it can only assign one time
    public array $errors = [];
    public array $old = [];
    /*
    need php version 8.1 support:

    public readonly array $errors;
    public readonly array $old;
    */

    //when login form throw an exception , it will passing the errors & old data

    //2.8 execute the thorw 

    //是一個工廠方法，會 new static 建立一個物件來裝錯誤
    public static function throw($errors, $old){

       
        //new static	根據「誰呼叫這個方法」來建立物件，不一定是 ValidationException 本身（支援繼承）
        $instance = new static;

         /*
            $instance->errors = $errors; // ['email' => 'Please provide a valid email address.']
            $instance->old = $old;       // ['email' => 'abc123', 'password' => 'validPassword123']
        */
        $instance->errors = $errors;
        $instance->old = $old;

        //2.9 回到 index.php 的 try-catch：

        throw $instance;
    }
    /*
    A option that let outside access the $errors
    public function errors(){
        return $this->errors;
    }
        */

        /*

小建議（加強安全性 / 好習慣）
你可以把 $errors 和 $old 設成 protected + 加上 getter：

protected array $errors = [];
protected array $old = [];

public function getErrors() {
    return $this->errors;
}

public function getOld() {
    return $this->old;
}


        */
}