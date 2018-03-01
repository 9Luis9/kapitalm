<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");//подключение к бд
include ("config.php");//файл с ссылкой на сайт
?>



<html>
<head>
<title>Личный кабинет</title>
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


    
    
    
<h2>Главное меню</h2>
<form action="/data.php">
    <button type="submit">Личные данные</button>
</form>
<table border="1">
            <tr>
                <th>№ клиента</th>
                <th>Логин</th>
                <th>ФИО</th>
                <th>№ чата</th>
                <th>Ссылка</th>
            </tr>
<?php
 $result = mysql_query("SELECT `user_id`,`login`,`fio`,`chat_id` FROM `users` LEFT JOIN `chats` USING (`user_id`) WHERE role_id='client'",$db)or die(mysql_error());                 
 while($myrow = mysql_fetch_array($result))
 {
    //echo $myrow['user_id'].")&nbsp;".' '.$myrow['login'].' '.$myrow['fio'].' '.$myrow['chat_id']."<br/><hr/>"; 
 
    echo "<tr>
         <td><center>$myrow[user_id]</center></td>
         <td><center>$myrow[login]</center></td>
         <td><center>$myrow[fio]</center></td>
         <td><center>$myrow[chat_id]</center></td>
         <td><center><a href='$site_server_name/messages.php?chat_id=$myrow[chat_id]'>Перейти к чату</a></center></td>
         </tr>";
                    }
    //echo "<a href='$site_server_name/messages.php?chat_id=$myrow[chat_id]'>Перейти к чату</a>";                   
?>

</table>

<p><a href="/logout.php">Выйти</a></p>
</center>
</body>
</html>