<?php
ob_start();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php"); //подключение к бд
$user_id = $_SESSION['user_id'];
if (isset($_POST['text'])) { $message_text = $_POST['text']; if ($message_text == '') { unset($message_text);} } 
//заносим введенный пользователем текст сообщения в переменную $message_text, если текстовое поле пустое, то уничтожаем переменную
 $result = mysql_query("SELECT `chat_id` FROM `chats` WHERE `user_id`='$user_id'",$db)or die(mysql_error()); //проверка на существование чата
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['chat_id'])) 
        {
            mysql_query("INSERT INTO `chats` (`user_id`) VALUES('$user_id')")or die(mysql_error()); // если чат не существует,то добавляем данные
            }
if ($_POST['enter'] && $_POST['text'] && !empty($myrow['chat_id'])) //если нажата кнопка "отправить", текстовое поле не пустое,то добавляем данные в базу
    {
        $result2 = mysql_query ("INSERT INTO `messages` (`user_id`,`chat_id`,`message_id`,`message_text`,`message_time`) VALUES('$user_id','$myrow[chat_id]','$message_id','$message_text',NOW())") or die(mysql_error()); // добавление данных о чате в базу
            header("Location:/chat.php?");
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

<body>
<div class="ChatBox" style="word-wrap:break-word;">
<?php 
    $Query = mysql_query("SELECT `user_id`,`message_time`,`message_text`,`login`,`role_id` FROM `messages` LEFT JOIN `users` USING (`user_id`) WHERE `chat_id` = '$myrow[chat_id]' ORDER By `message_time` DESC LIMIT 30");
       while($myrow = mysql_fetch_array($Query));
            if ($myrow['role_id']=='client'){
              echo '<div class="ChatBlock"><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'</div>';   
            }
            if ($myrow['role_id']=='consultant'){
                echo '<div class="Consultant"><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'</div>';  
            }
               
?>
</div>
</body>  
<center>
<br> 
<form method="POST" action="/chat.php">
<textarea class="ChatMessage" name="text" cols="50" rows="4" placeholder="Текст сообщения" required></textarea>
<br><input type="submit" name="enter" value="Отправить"> <input type="reset" value="Очистить">
</form>
<form method="POST" action="/upload.php" enctype="multipart/form-data">
      <input type="file" name="image"><br><br> 
      <input type="submit" value="Загрузить"><br><br>
      </form>
<p><a href='/lk.php'>Назад</a></p>
</center>
</html>







