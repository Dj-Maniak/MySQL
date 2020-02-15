<?php

namespace application\core;

use application\core\Views;

abstract class Controller
{

    public $route;
    public $view;


    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new Views($route);
    }


}