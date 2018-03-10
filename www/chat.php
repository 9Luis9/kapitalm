<?php
ob_start();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php"); //подключение к бд
$user_id = $_SESSION['user_id'];
if (isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
    $expensions = array("jpeg","jpg","png");
    
    if($file_size > 2097152){
        $errors[] = 'Файл должен быть не больше 2 мегабайт';
    }
    if(empty($errors) == true){
        move_uploaded_file($file_tmp,"doc/".$file_name);
    }
    else {
        print $errors;
    }
}

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
        $result2 = mysql_query ("INSERT INTO `messages` (`user_id`,`chat_id`,`message_id`,`message_text`,`uploaded_doc`,`message_time`) VALUES('$user_id','$myrow[chat_id]','$message_id','$message_text','$file_name',NOW())") or die(mysql_error()); // добавление данных о чате в базу
            header("Location:/chat.php?");
                }
?>
<html>
<head>
<title>Чат</title>
<link rel="stylesheet" type="text/css" href="style1.css" media="screen" />
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
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
    $Query = mysql_query("SELECT `user_id`,`message_time`,`message_text`,`login`,`role_id`,`uploaded_doc` FROM `messages` LEFT JOIN `users` USING (`user_id`) WHERE `chat_id` = '$myrow[chat_id]' ORDER By `message_time` DESC LIMIT 30");
    while ($myrow = mysql_fetch_array($Query))
            {
            if ($myrow['role_id']=='client' && (!empty($myrow['uploaded_doc'])))
            {
              echo '<div class="ChatBlock"><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'&nbsp<a href="doc/'.$myrow['uploaded_doc'].'">Документ</a></div>';   
            }
            elseif ($myrow['role_id']=='client' && (empty($myrow['uploaded_doc'])))
            {
                echo '<div class="ChatBlock"><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'</div>';  
            } 
            if ($myrow['role_id']=='consultant'){
                echo '<div class="Consultant"><span>'.$myrow['login'].' | '.$myrow['message_time'].'</span>'.$myrow['message_text'].'</div>';  
            } 
            }
?>
</div>
</body>  
<center>
<br> 
<form method="POST" action="/chat.php" enctype="multipart/form-data">
<textarea class="ChatMessage" name="text" cols="50" rows="4" placeholder="Текст сообщения" required></textarea><br><br>
      <input type="file" name="image"><br><br>
      <br><input type="submit" name="enter" value="Отправить"> <input type="reset" value="Очистить"> 
      </form>
<p><a href='/lk.php'>Назад</a></p>
</center>
</html>







