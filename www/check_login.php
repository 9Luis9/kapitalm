<?php
include ("bd.php");
$login = $_POST['login'];
$result =  mysql_query("SELECT `user_id` FROM `users` WHERE `login`='$login'");
$myrow = mysql_fetch_array($result);
    if (!empty($myrow['user_id'])) {
    echo "Логин занят";
}
else
    {
    echo "Логин свободен";
} 	
?>