<?php

namespace Http\Forms;

use Core\Validator;

use Core\ValidationException;

class LoginForm{
    /*
    只給這個class用 , 保護資料，不讓外部直接亂改
    (X) 如果用 public，別人可以直接改 $form->errors = 'hacked'，會有風險
    */
    protected $errors = [];

    //require $attributes should be array 
    //2.2 process the __constructor
    public function __construct(public array $attributes){
        //2.3 because the email input is abc123 , so that will assign a error into $errors[]
        if(!Validator::email($attributes['email'])){
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        
        //if (Validator::xxx(...) != true)
        if(!Validator::string($attributes['password'])){
            $this->errors['password'] = 'Please provide a valid password.';
        }
    }

    //2. process the validate function
    public static function validate($attributes){
        //$instance = new static($attributes); 就是「建立一個 LoginForm 的物件，並把 $attributes 傳進去讓它執行 __construct() 裡的驗證」。

        //2.1 excute the new static that mean new LoginForm($attributes) ,it will going to __construct
        $instance = new static($attributes);
        /*
        2.4 finished the __constructor , now the $instance contain:

        $instance->attributes = ['email' => 'abc123', 'password' => 'validPassword123'];
        $instance->errors = ['email' => 'Please provide a valid email address.'];

        */

        //2.5 call the failed() , if error>0 = return true(即有error)

        /*
            if ($instance->failed()) {
            //直接 throw Exception，不會 return
                return $instance->throw();
            } else {
                return $instance;
            }

        */
        return $instance->failed() ? $instance->throw() : $instance;

        //2.6 有error 入到if 做$instance->throw();
        if($instance->failed()){
            $instance->throw();
        }
        //如果沒error 直接return instance

        return $instance;
        

    }
    //2.7 跳去 ValidationException::throw(...)
    public function throw(){
        ValidationException::throw($this->errors(), $this->attributes);
    }


    public function failed(){
        return count($this->errors);
    }

    //提供安全方式從外部讀取錯誤內容 比Http>controllers>session>store.php call $form->errors();
    public function errors(){
        return $this->errors;
    }

    public function error($field, $message){
        $this->errors[$field] = $message;

        return $this;
    }
}