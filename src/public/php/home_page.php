<?php

if (isset($_COOKIE['login']) and isset($_COOKIE['password'])      // Проверяем существуют ли все данные
and isset($_COOKIE['name']) and isset($_COOKIE['surname'])
and !empty($_COOKIE['login']) and !empty($_COOKIE['password'])
and !empty($_COOKIE['name']) and !empty($_COOKIE['surname'])) {

    $login = $_COOKIE['login'];
    $password = $_COOKIE['password'];
    $name = $_COOKIE['name'];
    $surname = $_COOKIE['surname'];
    echo '</br>';
    echo '</br>';
    echo "<h1 align='center' >$name $surname добро пожаловать на сайт.</h1>"; ?>
    <style>
        body {
            background-image: url(http://tabwork.ru/wp-content/uploads/2016/05/page_created.jpg); /* Путь к фоновому изображению */
            background-color: #c7b39b; /* Цвет фона */
        }
    </style>
    <?php
} else{
header("Location: /html/form.html");
die;
}

?>
