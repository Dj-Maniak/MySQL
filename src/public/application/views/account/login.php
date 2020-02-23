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
<?php
if (!empty($_SESSION['count'])) {
    ?>

    <h1><?php echo $_SESSION['count'] ?></h1>

<?php } else
    session_destroy();
?>

<form action="/account/login" method="post">
    <label>Логин: <input type="text" name="login" size="30" maxlength="20"></label><br>
    <br>
    <label>Пароль:<input type="password" name="password" size="30" maxlength="20"></label><br>
    <br>
    <label><input name="remember" type="checkbox" value="yes">Запомить </label><input type="submit" value="Вход"><br>
</form>
<br>


</body>
</html>