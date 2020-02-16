<?php


namespace application\controllers;

use application\core\Controller;
use application\core\Models;


class MainController extends Controller
{
    public function indexActions()
    {

        $result = $this->model->getNew();


        $this->view->render('Главная страница');
    }

}