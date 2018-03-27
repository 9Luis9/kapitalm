<?php
include ("bd.php");
$login = $_POST['login'];
$result =  mysql_query("SELECT `user_id` FROM `users` WHERE `login`='$login'");
$myrow = mysql_fetch_array($result);
$len = strlen($login);
sleep(1);
    if (!empty($myrow['user_id'])) 
{
    echo "Логин занят!";
}
    else if ($len < 5 or empty($login)) 
{
    echo "Слишком короткий логин!";
} 	
    else 
{
    echo "Логин свободен!";
}
?>