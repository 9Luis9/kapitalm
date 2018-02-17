<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаю переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаю переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
        {
        echo "<script>alert('Вы ввели не всю информацию!Заполните все поля!');location.href='/auto.php';</script>";
        }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    // подключаемся к базе
    include ("bd.php");
$password = md5($password);//шифруем пароль          
$password = strrev($password);// для надежности добавил реверс 
$result = mysql_query("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'",$db); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
    if ($myrow['activated']=='0') {
        echo "<script>alert('Извините,аккаунт не активирован!');location.href='/auto.php';</script>";
        }
    if (empty($myrow['user_id']))
        {
    //если пользователя с введенным логином не существует
        echo "<script>alert('Извините,введенный вами логин или пароль неверный!');location.href='/registr.php';</script>";
        } 
    else 
        {
    //если существует, то сверяем пароли
    //если пароли совпадают, то запускаем пользователю сессию! Пользователь вошел!
        $_SESSION['password']=$myrow['password'];
        $_SESSION['login']=$myrow['login']; 
        $_SESSION['user_id']=$myrow['user_id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
        $_SESSION['login']= $login;
        echo "<html><head><meta http-equiv='Refresh' content='0; URL=lk.php'></head></html>"; }
        

    ?>