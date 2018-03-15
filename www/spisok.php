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
<h2>Отчет по:</h2>
<form method = "POST" action="/spisok.php">
<select name="option" >
      <option value="client">Клиенты </option>
      <option value="consultant">Консультанты </option>
  </select> 
  
  <input type="submit" name="send" value="Показать">   
</form>
  <table style="visibility : hidden;"border="1">
            <tr>
                <th>№ клиента</th>
                <th>Логин</th>
                <th>Роль</th>
                <th>Дата_регистрации</th>
                <th>ФИО</th>
                <th>Номер_телефона</th>
            </tr>
  <?php
 $result = mysql_query("SELECT `user_id`,`login`,`role_id`,`time_reg`,`fio`,`phone` FROM `users`",$db)or die(mysql_error());
 while($myrow = mysql_fetch_array($result))
 {
     if ($_POST['option'] == 'client' && $myrow['role_id'] == 'client')
     {
    //echo $myrow['user_id'].")&nbsp;".' '.$myrow['login'].' '.$myrow['fio'].' '.$myrow['chat_id']."<br/><hr/>"; 
    echo "<tr>
         <td><center>$myrow[user_id]</center></td>
         <td><center>$myrow[login]</center></td>
         <td><center>$myrow[role_id]</center></td>
         <td><center>$myrow[time_reg]</center></td>
         <td><center>$myrow[fio]</center></td>
         <td><center>$myrow[phone]</center></td>
         </tr>";
     }
     else if ($_POST['option'] == 'consultant' && $myrow['role_id'] == 'consultant')
     {
      echo "<tr>
         <td><center>$myrow[user_id]</center></td>
         <td><center>$myrow[login]</center></td>
         <td><center>$myrow[role_id]</center></td>
         <td><center>$myrow[time_reg]</center></td>
         <td><center>$myrow[fio]</center></td>
         <td><center>$myrow[phone]</center></td>
         </tr>";   
     }
 }
    //echo "<a href='$site_server_name/messages.php?chat_id=$myrow[chat_id]'>Перейти к чату</a>";                   
?>
</table>

<p><a href="/admin.php">Выйти</a></p>
</center>
</body>
</html>