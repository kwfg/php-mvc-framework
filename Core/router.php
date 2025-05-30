<?php

//整咗一個 class，叫做 Router，佢放咗喺 Core 呢個「命名空間」入面。
namespace Core;

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;


//for the router , if the router calling , it will execute these function
class Router{
    protected $routes = [];


    public function add($method, $uri, $controller){
        //$this->route[] = compact('method,'uri','controller');
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri , $controller){
        return $this->add('GET', $uri , $controller);
    }

    public function post($uri , $controller){
        return $this->add('POST', $uri , $controller);
    }

    public function delete($uri , $controller){
        return $this->add('DELETE', $uri , $controller);
    }

    public function patch($uri , $controller){
        return $this->add('PATCH', $uri , $controller);
    }

    public function put($uri , $controller){
        return $this->add('PUT', $uri , $controller);
    }

    public function only($key){
        //array_key_last 鎖定最近一條 route , 寫 code 時最後一行 $router->get(...)

        //所以「最後加入」嘅意思係指 only() 當下執行時，隊尾嗰條剛新增嘅 route
        $this->routes[array_key_last(($this->routes))]['middleware'] = $key;

        return $this;
    }

    public function route($uri , $method){
        foreach($this->routes as $route){
            if($route['uri'] == $uri && $route['method'] == strtoupper($method)){
                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }
        $this->abort();
    }

    public function previousUrl(){
        return $_SERVER['HTTP_REFERER'];
    }


     //abort
     protected function abort($code = 404){

        http_response_code($code);
        
        require base_path("views/{$code}.php");
        
        die();
            }//end abort
}

 