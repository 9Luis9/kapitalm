<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");
mysql_query("SET NAMES 'utf8'",$db);
if(isset($_SESSION['login'])) {
echo "Пользователь:".$_SESSION['login'];    
}
else echo "Вы не вошли"








?>









<html>
<head>
<title>Личный кабинет</title>
</head>
<body>
<h2>Главное меню</h2>
 <form action="/message.php">
    <button type="submit">Написать консультанту</button>
</form>
<form action="/data.php">
    <button type="submit">Изменить данные профиля</button>
</form>
<p><a href="/logout.php">Выйти</a></p>
</body>
</html>
