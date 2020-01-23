<?php


if(isset($_POST['login']) and isset($_POST['login']) and (!empty($_POST['login'])) and (!empty($_POST['password']))){
    var_dump();
}else{
    header("Location: /index.php");
}
