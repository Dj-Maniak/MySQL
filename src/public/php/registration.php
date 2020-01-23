<?php

$registration_name = $_POST['registration_name'];
$registration_surname = $_POST['registration_surname'];       // Получаем данные из формы регистрации
$registration_login = $_POST['registration_login'];
$registration_password = $_POST['registration_password'];
//var_dump($registration_name);die;*/

if (isset($registration_name) and isset($registration_surname)      // Проверяем
    and isset($registration_login) and isset($registration_password)
    and !empty($registration_name) and !empty($registration_surname)
    and !empty($registration_login) and !empty($registration_password)) {
    $con = mysqli_connect('mysql', 'root', 'rootpass', 'registration_mysql');
    mysqli_set_charset($con, 'utf8');
    if (mysqli_connect_error()) {
        echo "Нет подключения до БД" . mysqli_connect_errno();
    } else {
        var_dump($con);
        $qwery = 'SELECT `id`, `name`, `surname`, `login`, `password` FROM `users` WHERE id = 1';
        $echo = mysqli_query($con, $qwery);
        while ($row = mysqli_fetch_array($echo)) {
            echo "Имя: " . $row['name'] . "<br>\n";
            echo "Фамилия: " . $row['surname'] . "<br>\n";
            echo "Логин: " . $row['login'] . "<br>\n";
            echo "Password: " . $row['password'] . "<br>\n";
        }
    }
} else {
   header( "Location: /html/registration.html");

}

