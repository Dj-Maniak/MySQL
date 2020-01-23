<?php

$registration_name = $_POST['registration_name'];
$registration_surname = $_POST['registration_surname'];       // Получаем данные из формы регистрации
$registration_login = $_POST['registration_login'];
$registration_password = $_POST['registration_password'];

$registration_name = trim($registration_name);
$registration_surname = trim($registration_surname);            //Убираем все отступы
$registration_login = trim($registration_login);
$registration_password = trim($registration_password);


if (isset($registration_name) and isset($registration_surname)      // Проверяем существуют ли все данные
    and isset($registration_login) and isset($registration_password)
    and !empty($registration_name) and !empty($registration_surname)
    and !empty($registration_login) and !empty($registration_password)) {
    //  var_dump($registration_name, $registration_surname, $registration_login, $registration_password);die;
    $con = mysqli_connect('mysql', 'root', 'rootpass', 'registration_mysql');
    mysqli_set_charset($con, 'utf8');
    if (mysqli_connect_error()) {
        echo "Нет подключения до БД" . mysqli_connect_errno();
    } else {
        $take_away = "SELECT `login` FROM `users` WHERE login = '$registration_login'";
        $vaw = mysqli_query($con, $take_away);
        while ($row_login = mysqli_fetch_array($vaw)) {
            // var_dump($row_login['login']);
            // var_dump($registration_login);
            if ($row_login['login'] === $registration_login) {
                header("Location: /html/there_is_such.html");
                die;
            } else {
                header("Location: /html/registration.html");
                die;
            }
        }
        $adding_qwery = "INSERT INTO `users`(`name`, `surname`, `login`, `password`) 
    VALUES ('$registration_name','$registration_surname','$registration_login','$registration_password')";
        mysqli_query($con, $adding_qwery);
        header("Location: /html/successfully.html");
    }
}


