<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
?>
<html>
<head>
<title>Авторизация</title>
</head>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<body>
<div>
<div>
<Center>
<a href="/" title="" class="logo"><img src="images/km1.png" alt="Капитал-М" /></a>
<h1>Вход:</h1>
<form action="testreg.php" method="post" name="login">
<p><label>Введите логин:<br>
<input name="login" size="25" type="text" placeholder="Логин"></label></p>
<p><label>Введите пароль:<br>
<input name="password" size="25" type="password" placeholder="Пароль"></label></p>
<p><input type="submit" name="submit" value="Войти"></p>
<p>Еще не зарегистрированы? </br><a href= "/registr.php">Зарегистрируйтесь!</a></p>
<br>
<p><a href='/index.php'>На главную</a></p>
</form>
</Center>

</div>
</div>
</body>
</html>