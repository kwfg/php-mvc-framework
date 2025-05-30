<?php 

namespace Core;

class Session{
    public static function has($key){
        //covert to accept bool
        return (bool) static::get($key);
    }

    public static function put($key , $value){
        $_SESSION[$key] = $value;
    }
    
    public static function get($key , $default = null){
        if(isset($_SESSION['_flash'][$key])){
            return $_SESSION['_flash'][$key];
        }

        return $_SESSION[$key] ?? $default; 
        /*
        way 2: to implementaion :
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;  
        if write like that , we don't need above if else condition
        */
    }

    public static function flash($key, $value){
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash(){
        unset($_SESSION['_flash']);
    }

    public static function flush(){
        $_SESSION = [];
    }

    public static function destroy(){

         // 清空 $_SESSION array（登出）

         //calling this class function
         static::flush();
    
         // 銷毀 session file（從 server 上消失） 刪除伺服器端 Session 記錄（例如：/tmp/sess_xxx）
         session_destroy();
     
         // 取得 session cookie 的參數（例如 path/domain） // 拎番 cookie 設定
         $params = session_get_cookie_params(); 
         /*
             [
             'lifetime' => 0,
             'path' => '/',
             'domain' => '',
             'secure' => false,
             'httponly' => true
             ]
         */
     
         //f12 to see , 60*60 = 3600
         //刪除 client 端的 session cookie（瀏覽器儲存的 PHPSESSID）
          // 讓瀏覽器刪除 session cookie , 要刪掉 cookie，你只需要設一個「過期時間」在過去 , time() - 3600 = 設為一小時前 → 瀏覽器會立即刪除它
          setcookie('PHPSESSID', '', time() - 3600, 
          $params['path'], 
          $params['domain'], 
          $params['secure'], 
          $params['httponly']
      );
    }
}