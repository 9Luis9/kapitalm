<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");//подключение к бд
?>


<html>
<head>
<title>Отчеты</title>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
</head>
<body>
<center>
<a href="/" title="Капитал-М" class="logo"><img src="images/km1.png" alt="Капитал-М" /></a>
  <br>
  
  <?php
mysql_query("SET NAMES 'utf8'",$db);
if(isset($_SESSION['login'])) 
    {
        echo "Пользователь:".$_SESSION['login']; // Вывод логина пользователя    
            }
                else echo "Вы не вошли"
?>
<br>
<h2>Отчет по консультантам</h2>
  <table border="1">
            <tr>
                <th>№ консультанта</th>
                <th>Логин</th>
                <th>Дата регистрации</th>
                <th>ФИО</th>
                <th>Номер телефона</th>
            </tr>
  <?php
 $result = mysql_query("SELECT `user_id`,`login`,`role_id`,`time_reg`,`fio`,`phone` FROM `users`",$db)or die(mysql_error());
 while($myrow = mysql_fetch_array($result))
 {
     if ($myrow['role_id'] == 'consultant')
     {
    echo "<tr>
         <td><center>$myrow[user_id]</center></td>
         <td><center>$myrow[login]</center></td>
         <td><center>$myrow[time_reg]</center></td>
         <td><center>$myrow[fio]</center></td>
         <td><center>$myrow[phone]</center></td>
         </tr>";
     }
       
     
 }                  
?>
</table>

<p><a href="/admin.php">Выйти</a></p>
</center>
</body>
</html>