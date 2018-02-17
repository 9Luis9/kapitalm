<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php");
mysql_query("SET NAMES 'utf8'",$db);
if(isset($_SESSION['login'])) {
echo "Аккаунт:".$_SESSION['login'];    
}
else echo "Вы не вошли"
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Данные</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>   
<script src="js/jquery.maskedinput.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#phone").mask("+7 (999) 99-99-999");
      });
    </script>
    




<SCRIPT type="text/javascript">    
function validate_form ( )
{
	valid = true;
    
        if ( document.data.fio.value == /^[А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+$/)
        {
                alert ( "Данные введены не верно" );
                valid = false;
        }

        return valid;
}
</SCRIPT>


</head>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<body>
<div>
<div>
<Center>
<h2>Введите данные</h2>
<form name="data" action="save_data.php" method="post" onsubmit="return validate_form( );" >
<p><label>Введите ФИО:<br>
<input name="fio" size="50" type="text" id="fio" placeholder="Например,Иванов Иван Иванович"></label></p>
<p><label>Введите ваш номер телефона:<br>
<input name="phone" size="30" type="text" id="phone" placeholder="+7 (999) 99 99 999"></label></p>
<p><input type="submit" name="submit" value="Готово"></p>
<p><a href='/lk.php'>Назад</a></p>
</form>
</Center>
</div>
</div>
</body>
</html>
