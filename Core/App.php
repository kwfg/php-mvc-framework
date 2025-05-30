<?php

namespace Core;

class App{
    //全局變量
    //$container：係個裝住「db 實例（或者 function）」嘅工具箱
    protected static $container;

    //將外面傳入嘅 Container 實例（你自己寫嗰個 Container.php）放入 App 裏面
    public static function setContainer($container){
        static::$container = $container;
    }

    //public static function getContainer($container){
    public static function container(){
        return static::$container;
    }
    //入面係咪 db connection？視乎你 bind 嗰陣放咩落去（而家就係放咗 new Database(...)）
    public static function bind($key , $resolver){
        static::container()->bind($key, $resolver);
    }

    //resolve()：幫你打開 toolbox 拎番出嚟
    public static function resolve($key){
        return static::container()->resolve($key);
    }
}

/*

**
即係container係pass番出果個野  
我唔可以直接resolve pass出去 
因為resolve係container入面的
**

點解唔可以直接 App::resolve() 唔經 container？
因為 resolve() 呢個方法原本係寫喺 Container 入面。

而 App::resolve() 嘅實際做法，只係「轉手叫 container 去 resolve」：

**
即係話：App 只係一個門口，真正 resolve 果個 function 係 container 入面！

*/