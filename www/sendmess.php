<?php
ob_start();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");//подключение к бд
include ("config.php");//файл с ссылкой на сайт
$user_id = $_SESSION['user_id'];
$chat_id1 = $_SESSION['chat_id'];
echo $chat_id1;
if (isset($_POST['text'])) { $message_text = $_POST['text']; if ($message_text == '') { unset($message_text);} } 
//заносим введенный пользователем текст сообщения в переменную $message_text, если текстовое поле пустое, то уничтожаем переменную
if ($_POST['enter'] && $_POST['text']) //если нажата кнопка "отправить", текстовое поле не пустое,то добавляем данные в базу
    {
        $result2 = mysql_query ("INSERT INTO `messages` (`user_id`,`chat_id`,`message_id`,`message_text`,`message_time`) VALUES('$user_id','$chat_id1','$message_id','$message_text',NOW())") or die(mysql_error()); // добавление данных о чате в базу
        header("Location:/messages.php?chat_id=$chat_id1");
                }
?>