<?php

use application\core\Router;
use application\lib\Database;



spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();



$route = new Router();
$route->run();





