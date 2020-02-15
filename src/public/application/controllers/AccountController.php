<?php


namespace application\controllers;

use application\core\Controller;
use application\core\Views;


class AccountController extends Controller
{
    public function loginActions()
    {
      //  $this->view->redirect('/');
        $this->view->render('Вход');

    }

    public function registerActions()
    {
        $this->view->render('Регистрация');

    }
}