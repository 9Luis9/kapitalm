<?php
header('Content-Type: text/html; charset=utf-8');
include ("bd.php");
mysql_query("SET NAMES 'utf8'",$db);
$activation_code = $_GET['activation_code'];
$login = $_GET['login'];
    $result = mysql_query("SELECT `user_id`,`login`,`activation_code` FROM `users` WHERE `login`='$login'",$db); // извлекаем идентификатор пользователя с данным логином
	$myrow = mysql_fetch_array($result); 
	$activation_code1 = $myrow['activation_code']; // создаем такой же код подтверждения

	if ($activation_code == $activation_code1) // сравниваем полученный из url и сгенерированный код 
		{
			mysql_query("UPDATE  `users` SET `activated`='1' WHERE `login`='$login'",$db); // если равны, то активируем пользователя
			echo "Ваш Email подтвержден! Теперь вы можете зайти на сайт под своим логином! <a href='http://kapitalm.com.xn--80aauktf0a4f.xn--80aswg/auto.php'>Авторизация</a>";
		}
	else
		{
			echo "Ошибка! Ваш Email не подтвержден! <a href='index.php'>Главная страница</a>";
			// если же полученный из url и сгенерированный код не равны, то выдаем ошибку
		}
?>