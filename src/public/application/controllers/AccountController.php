<?php


namespace application\controllers;

use application\core\Controller;
use application\lib\Database;


class AccountController extends Controller
{
    public function loginActions()
    {
        $db = new Database();


        if (!empty($_POST['login']) and !empty($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $params = [
                'login' => $login
            ];
            $databases = $db->row('SELECT `login`, `password` FROM `users` WHERE login = :login', $params);
            foreach ($databases as $database) {
                if (trim($database['login']) === trim($login) and trim($database['password']) === trim($password)) {
                    setcookie('login', $login, time() + 36000, '/');
                    $url = '/';
                    $this->view->redirect($url);
                }
            }
        }
        $this->view->render('Вход');
    }


    public function registerActions()
    {

        $db = new Database();

        if (!empty($_POST['registration_name'])
            and !empty($_POST['registration_surname'])
            and !empty($_POST['registration_login'])
            and $_POST['registration_password']) {

            $registration_name = trim($_POST['registration_name']);
            $registration_surname = trim($_POST['registration_surname']);
            $registration_login = trim($_POST['registration_login']);
            $registration_password = trim($_POST['registration_password']);

            if ($registration_login < 6 and $registration_password < 6) {

                $params = [
                    'login' => $registration_login

                ];

                $selection = $db->row("SELECT * FROM `users` WHERE login = :login", $params);
                foreach ($selection as $item) {
                    if (trim($item['login']) === $registration_login) {

                        echo '<h2>This username is already in use </h2></br>';
                    }
                }

                $db->column2("INSERT INTO `users`(`name`, `surname`, `login`, `password`)
    VALUES ('$registration_name',
    '$registration_surname',
    '$registration_login',
    '$registration_password')");

                $_SESSION['count'] = $registration_name . ' ' . $registration_surname . ' вы успешно зарегистрировались';
                $url = '/account/login';
                $this->view->redirect($url);
            }

        }

        $this->view->render('Регистрация');
    }
}
