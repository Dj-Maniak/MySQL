<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
<form action="/php/registration.php" method="post">
    <input type="text" name="registration_name" placeholder="Имя" size="10" maxlength="25">
    <input type="text" name="registration_surname" placeholder="Фамилия" size="18" maxlength="30"><br>
    <br>
    <input type="text" name="registration_login" placeholder="Логин" size="30" maxlength="25"><br>
    <br>
    <input type="password" name="registration_password" placeholder="Пароль" size="30" maxlength="25"><br>
    <br>
    <input type="submit" value="Регистрация">
</form>

<style>
    .btn {
        display: inline-block; /* Строчно-блочный элемент */
        background: #8C959D; /* Серый цвет фона */
        color: #fff; /* Белый цвет текста */
        padding: 0.2rem 1rem; /* Поля вокруг текста */
        text-decoration: none; /* Убираем подчёркивание */
        border-radius: 3px; /* Скругляем уголки */
    }
</style>

<a href="html/form.html" class="btn">Вы уже зарегистрированы?</a>
</body>
</html>