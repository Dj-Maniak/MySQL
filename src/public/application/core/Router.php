<?php

namespace application\core;

use application\core\Views;


class Router
{
    protected $routers = [];
    protected $params = [];


    public function __construct()
    {
        $array = require '../public/application/config/routes.php';
        foreach ($array as $key => $value) {
            $this->add($key, $value);

        }
    }

    public function add(string $route, array $params)
    {
        $route = '#^' . $route . '$#';
        $this->routers[$route] = $params;

    }


    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routers as $route => $params) {
            if (preg_match($route, $url)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }


    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $actions = $this->params['account'] . 'Actions';
                if (method_exists($path, $actions)) {
                    $controller = new $path($this->params);
                    $controller->$actions();

                } else {

                    Views::errorCode(404);
                }
            } else {

                Views::errorCode(404);
            }
        } else {

            Views::errorCode(404);
        }


    }
}