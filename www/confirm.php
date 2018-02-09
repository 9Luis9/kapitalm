<?php
header('Content-Type: text/html; charset=utf-8');
include ("bd.php");
mysql_query("SET NAMES 'utf8'",$db);
$registration_code = $_GET['registration_code'];
$login = $_GET['login'];
    $result = mysql_query("SELECT `user_id`,`login`,`registration_code` FROM `users` WHERE `login`='$login'",$db); // извлекаем идентификатор пользователя с данным логином
	$myrow = mysql_fetch_array($result); 
	$registration_code1 = $myrow['registration_code']; // создаем такой же код подтверждения

	if ($registration_code == $registration_code1) // сравниваем полученный из url и сгенерированный код 
		{
			mysql_query("UPDATE  `users` SET `activation`='1' WHERE `login`='$login'",$db); // если равны, то активируем пользователя
			echo "Ваш Email подтвержден! Теперь вы можете зайти на сайт под своим логином! <a href='http://kapitalm.com.xn--80aauktf0a4f.xn--80aswg/Auto.php'>Авторизация</a>";
		}
	else
		{
			echo "Ошибка! Ваш Email не подтвержден! <a href='index.php'>Главная страница</a>";
			// если же полученный из url и сгенерированный код не равны, то выдаем ошибку
		}
?>