<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");//подключение к бд
?>

<html>
<head>
<title>Консультация</title>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
</head>

<body>
<center>
<a href="/" title="Капитал-М" class="logo"><img src="images/km1.png" alt="Капитал-М" /></a>
<br><br>


<?php
mysql_query("SET NAMES 'utf8'",$db);
if(isset($_SESSION['login'])) 
    {
        echo "Пользователь:".$_SESSION['login']; // Вывод логина пользователя    
            }
                else echo "Вы не вошли"
?>


<h2>Консультация</h2>
<table border="1">
            <tr>
                <th>№ чата</th>
                <th>№ сообщения</th>
                <th>Пользователь</th>
                <th>Текст сообщения</th>
                <th>Дата сообщения</th>
                <th>Загруженные документы</th>
            </tr>
<?php
$chat_id = $_GET['chat_id'];
$result = mysql_query("SELECT `message_id`,`chat_id`,`message_text`,`message_time`,`uploaded_doc`,`login` FROM `messages` LEFT JOIN `users` USING (`user_id`) WHERE chat_id='$chat_id' ORDER By `message_time` DESC LIMIT 30",$db)or die(mysql_error());                 
    while($myrow = mysql_fetch_array($result))
        {
             echo "<tr>
             <td><center>$myrow[chat_id]</center></td>
             <td><center>$myrow[message_id]</center></td>
             <td><center>$myrow[login]</center></td>
             <td><center>$myrow[message_text]</center></td>
             <td><center>$myrow[message_time]</center></td>
             <td><center>$myrow[uploaded_doc]</center></td>
             </tr>";
                            }
    $_SESSION['chat_id']= $chat_id;
    
?>
</table>
</center>
</body>
<center>
<br> 
<form method="POST" action="/sendmess.php">
<textarea class="ChatMessage" name="text" cols="60" rows="12" placeholder="Текст сообщения" required></textarea>
<br><input type="submit" name="enter" value="Отправить"> <input type="reset" value="Очистить">
</form>
<p><a href="/lkcons.php">Назад</a></p>
</center>
</html>






