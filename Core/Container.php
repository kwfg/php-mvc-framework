<?php

namespace Core;

class Container{
    protected $bindings = [];
    //public function add()
    public function bind($key , $resolver){
        $this->bindings[$key] = $resolver;
    }
    //public function remove 
    public function resolve($key){

        if(!array_key_exists($key, $this->bindings)){
            throw new \Exception("No matching binding found for {$key}");
        }

        //because we can throw expection in front of so that we don't have to check again
        //if(array_key_exist($key, $this->bindings)){
            $resolver = $this->bindings[$key];

            //如果execute左resolve() 會即刻execute :
            /*
                $config = require base_path('config.php');
                return new Database($config['database']);

                ****call_user_func() 就係 叫 PHP 幫你「執行」一個 function 或 method，無論佢係咩型式
            */
            return call_user_func($resolver);
        }
    //}
}

