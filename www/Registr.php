<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Регистрация</title>
<SCRIPT type="text/javascript">
<!--

function validate_form ( )
{
	valid = true;
    
        if ( document.Registr.login.value.length < 5)
        {
                alert ( "Логин должен быть не короче 5 символов!" );
                valid = false;
        }

        return valid;

        if ( document.Registr.login.value == "")
        {
                alert ( "Введите логин!" );
                valid = false;
        }

        return valid;
    
        if ( document.Registr.email.value == "")
        {
                alert ( "Введите email!" );
                valid = false;
        }

        return valid;
       
        if ( document.Registr.password.value == "")
        {
                alert ( "Введите пароль!" );
                valid = false;
        }

        return valid;
        if ( document.Registr.password.value.length < 5)
        {
                alert ( "Пароль должен быть не короче 5 символов!" );
                valid = false;
        }

        return valid;
       if ( document.Registr.password.value != document.Registr.password_2.value);
        {
                alert ( "Пароли не совпадают!" );
                valid = false;
        }

        return valid;
}

//-->

</SCRIPT>
</head>
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
<body>
<div>
<div>
<Center>
<a href="/" title="Капитал-М" class="logo"><img src="images/km1.png" alt="Капитал-М" /></a>
<h1>Зарегистрируйтесь</h1>
<form name="Registr" action="save_user.php" method="post" onsubmit="return validate_form( );" >
<p><label>Введите логин:<br>
<input name="login" size="30" type="text" placeholder="Логин"></label></p>
<p><label>Введите email:<br>
<input name="email" size="30" type="email" placeholder="mail@mail.ru"></label></p>
<p><label>Введите пароль:<br>
<input name="password" size="30" type="password" placeholder="Пароль"></label></p>
<p><input name="Registr" type="submit" value="Регистрация"></p>
<p><a href='/auto.php'>Уже зарегистрированы?</a></p>
<br>
<p><a href='/index.php'>На главную</a></p>
</form>
</Center>
</div>
</div>
</body>
</html>
