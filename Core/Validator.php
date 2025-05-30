<?php

namespace Core;

class Validator{
//如果 $password 嘅長度唔符合 7 至 255 字元，咁就出 error。
    public static function string($value , $min = 1 , $max = INF){
        //remove empty string
        $value = trim($value);
        //check the text length and is that empty
        return strlen($value) >= $min && strlen($value) <= $max;
    }
/*
如果 $value 是 valid email，就 return true
如果 $value 唔 valid，就 return false

var_dump(Validator::email('abc@example.com'));  // true
var_dump(Validator::email('notanemail'));       // false
*/

    //你想攞返合法 email
    /*

     public static function email(string $value): string|false {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
     */

    public static function email(string $value){
        //we can use regular expression , but current use built-in function
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $value, int $graterThan): bool{
        return $value > $graterThan;
    }
}