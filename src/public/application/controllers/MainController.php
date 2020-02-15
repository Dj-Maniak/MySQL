<?php


namespace application\controllers;

use application\core\Controller;


class MainController extends Controller
{
    public function indexActions()
    {
                $this->view->render('Главная страница');
    }

}