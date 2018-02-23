<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");
?>



<html>
<head>
<title>Личный кабинет</title>
</head>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<body>
<center>
<a href="/" title="Капитал-М" class="logo"><img src="images/km1.png" alt="Капитал-М" /></a>
  <br>
   
   
   
   <center>
    <?php
    mysql_query("SET NAMES 'utf8'",$db);
    if(isset($_SESSION['login'])) {
    echo "Пользователь:".$_SESSION['login']; // Вывод логина пользователя    
    }
    else echo "Вы не вошли"
    ?>
    </center>
    
    
    
<h2>Главное меню</h2>
 <form action="/chat.php">
    <button type="submit">Написать консультанту</button>
</form>
<form action="/data.php">
    <button type="submit">Изменить данные профиля</button>
</form>
<p><a href="/logout.php">Выйти</a></p>
</center>
</body>
</html>











