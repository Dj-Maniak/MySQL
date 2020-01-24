<?php
$treatment_login = $_POST['login'];
$treatment_password = $_POST['password'];


if (isset($treatment_login) and isset($treatment_password)      // Проверяем существуют ли все данные
    and !empty($treatment_login) and !empty($treatment_password)) {
    $con = mysqli_connect('mysql', 'root', 'rootpass', 'registration_mysql');
    mysqli_set_charset($con, 'utf8');
} else {
    header("Location: /html/form.html");
    die;
}

if (mysqli_connect_error()) {
    echo "Нет подключения до БД" . mysqli_connect_errno();
} else {
    $entry = "SELECT `login`, `password`, `name`, `surname` FROM `users` WHERE login='$treatment_login'";
    $echo = mysqli_query($con, $entry);
    while ($row = mysqli_fetch_array($echo)) {
        if (trim($treatment_login) === trim($row['login']) and trim($treatment_password) === trim($row['password'])) {
            setcookie('login', $row['login']);
            setcookie('password', $row['password']);
            setcookie('name', $row['name']);
            setcookie('surname', $row['surname']);
            header("Location: /php/home_page.php");
        }

    }
}
echo '<h1>Неправильный логин или пароль</h1>'; ?>
<form action="/php/treatment.php" method="post">
    <label>Логин: <input type="text" name="login" size="30" maxlength="20"></label><br>
    <br>
    <label>Пароль:<input type="password" name="password" size="30" maxlength="20"></label><br>
    <br>
    <label><input name="remember" type="checkbox" value="yes">Запомить </label><input type="submit"
                                                                                      value="Вход"><br>