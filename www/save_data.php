<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");
mysql_query("SET NAMES 'utf8'",$db);
    if (isset($_POST['fio'])) { $fio = $_POST['fio']; if ($fio == '') { unset($fio);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['phone'])) { $phone=$_POST['phone']; if ($phone =='') { unset($phone);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($fio) or empty($phone)) //если пользователь не ввел логин,пароль или email то выдаем ошибку и останавливаем скрипт
    {
    echo "<script>alert('Вы ввели не всю информацию! Заполните все поля!');location.href='/data.php';</script>";
    }
    else
 // проверка на существование пользователя с таким же логином
 // если такого нет, то сохраняем данные
    $result = mysql_query ("INSERT INTO users (fio,phone) VALUES('$fio','$phone')");{
    echo "Ваши данные сохранены!<a href='/lk.php'>Личный кабинет</a>";
    } 
    
    // Проверяем, есть ли ошибки
    ?>