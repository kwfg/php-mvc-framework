<?php

use Core\App;
use Core\Container;
use Core\Database;

// 1. 建立 container
$container = new Container();

// 2. 綁定需要用嘅 class（例如 database）
$container->bind('Core\Database', function (){

    $config = require base_path('config.php');

    return new Database($config['database']);
});

//$db = $container->resolve('Core\Database');

//for testing the throw Exception
//$container->resolve('sadasdsadsa');

//because the setContainer is static function

// 3. 存入 App 全局
App::setContainer($container);

//喺你嘅入口檔（例如 public/index.php）入面：
//require base_path('bootstrap.php'); // 開機！
