<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ООО Капитал-М</title>
	<meta name="description" content="Описание страницы" />
	<meta name="keywords" content="Ключевые слова" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
	</head>
<body>
<div id="page">
<?php include('templates/header_consultation.php'); ?>
	<section id="content">
	<br><br><br>
		<h1>Возникли вопросы? - Задайте их консультанту!</h1>
		<p>Пройдите процесс регистрации или авторизируйтесь, чтобы задать вопрос консультанту.</p>
	</section>
	<center>
 <form action="/registr.php">
    <button type="submit">Регистрация</button>
</form>
 -
<form action="/auto.php">
    <button type="submit">Авторизация</button>
</form>
</center>
<?php include('templates/footer.php'); ?>
	
	</div>
</body>
</html>