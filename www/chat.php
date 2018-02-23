<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");
$user_id = $_SESSION['user_id'];
if (isset($_POST['text'])) { $message_text = $_POST['text']; if ($message_text == '') { unset($message_text);} }

if ($_POST['enter'] and $_POST['text']) 
    {
        mysql_query ("INSERT INTO `messages` (`user_id`,`message_id`,`message_text`,`message_time`) VALUES('$user_id','$message_id','$message_text','NOW()')");
            }
?>
<html>
<head>
<title>Чат</title>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/style1.css" media="screen" />
</head>
<center>
<a href="/" title="Капитал-М" class="logo"><img src="images/km1.png" alt="Капитал-М" /></a>
<br><br>  
<?php  mysql_query("SET NAMES 'utf8'",$db);
if(isset($_SESSION['login'])) 
    {
        echo "Пользователь:".$_SESSION['login']; //вывод логина под которым зашел пользователь   
            }
                else echo "Вы не вошли";
?>
</center>  


    
<center>
<form method="POST" action="/chat.php">
<textarea class="ChatMessage" name="text" cols="60" rows="12" placeholder="Текст сообщения" required></textarea>
<br><input type="submit" name="enter" value="Отправить"> <input type="reset" value="Очистить">
<p><a href='/lk.php'>Назад</a></p>
</form>
</center>
<body>
<div class="ChatBox">
<?php 
    $Query = mysql_query('SELECT * FROM `messages` ORDER By `message_time` DESC LIMIT 30');
        while ($myrow = mysql_fetch_assoc($Query)) echo '<div class="ChatBlock"><span>'.$myrow['user_id'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'</div>';
?>
</div>
</body>
</html>







