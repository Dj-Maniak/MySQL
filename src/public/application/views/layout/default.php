<?php

use application\core\Views;
use application\controllers\AccountController;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/jquery.js"></script>
</head>
<br>
<?php echo $content;

if (!empty($_COOKIE['login'])) { ?>

    <h1><?php echo $_COOKIE['login'] ?> добро подаловать на наш сайт.</h1>
<?php
}


?>


<h2><a href="/account/login">LOGIN</a></h2><br>
<h2><a href="/account/register">REGISTER</a></h2>


</body>
</html>
