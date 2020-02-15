<?php

namespace application\core;

class Views
{

    public $layout = 'default';
    public $route;
    public $path;

    public function __construct(array $route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['account'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        if (file_exists('application/views/' . $this->path . '.php')) {
            ob_start();
            require 'application/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'application/views/layout/' . $this->layout . '.php';

        } else {
            echo 'Путь не найден:' . $this->path;
        }

    }


    public function redirect($url)
    {
        header('Location:' . $url);
        die;
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'application/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
            die;
        } else {
            Views::errorCode(404);
        }
    }


}
