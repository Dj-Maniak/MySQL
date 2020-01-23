<?php
$treatment_login = $_POST['login'];
$treatment_password = $_POST['password'];


if (isset($treatment_login) and isset($treatment_password)      // Проверяем существуют ли все данные
    and !empty($treatment_login) and !empty($treatment_password)) {
    $con = mysqli_connect('mysql', 'root', 'rootpass', 'registration_mysql');
    mysqli_set_charset($con, 'utf8');
    $entry = "SELECT `login`, `password` FROM `users` WHERE login='djmaniak'";
    $echo = mysqli_query($con, $entry);
    while ($row = mysqli_fetch_array($echo)) {
        if (mysqli_connect_error()) {
            echo "Нет подключения до БД" . mysqli_connect_errno();
        } else {
            if (trim($treatment_login) === trim($row['login']) and trim($treatment_password) === trim($row['password'])) {
                var_dump($row['login']);
                var_dump($row['password']);
                die;
            }
        }
        var_dump($treatment_login);
        die;
    }

} else {
    header("Location: /index.php");
}



