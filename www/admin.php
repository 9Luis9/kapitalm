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
<form action="/dataadmin.php">
    <button type="submit">Личные данные</button>
</form>
<form action="/list_cl.php">
    <button type="submit">Клиенты</button>
</form>
<form action="/list_cons.php">
    <button type="submit">Консультанты</button>
</form>
<p><a href="/logout.php">Выйти</a></p>
</center>
</body>
</html>











