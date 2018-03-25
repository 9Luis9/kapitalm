<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Консультанты</title>
<SCRIPT type="text/javascript">

function validate_form ( )
{
	valid = true;
    
        if ( document.Registr.login.value.length < 5 )
        {
                alert ( "Логин должен быть не короче 5 символов!" );
                valid = false;
        }
    
        if ( document.Registr.login.value.length > 15 )
        {
                alert ( "Логин не должен быть длиннее 10 символов!" );
                valid = false;
        }
        
    
        if ( document.Registr.login.value == "")
        {
                alert ( "Введите логин!" );
                valid = false;
        }
        
        if ( document.Registr.email.value == "")
        {
                alert ( "Введите email!" );
                valid = false;
        }
        
        if ( document.Registr.password.value == "")
        {
                alert ( "Введите пароль!" );
                valid = false;
        }
    
        if ( document.Registr.password.value.length < 5)
        {
                alert ( "Пароль должен быть не короче 5 символов!" );
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
<a href="/" title="Капитал-М" class="logo"><img src="images/km1.png" alt="Капитал-М" /></a>
<h1>Введите данные консультанта</h1>
<form name="Registr" action="save_cons.php" method="post" onsubmit="return validate_form( );" >
<p><label>Введите логин:<br>
<input name="login" size="30" type="text" placeholder="Логин"></label></p>
<p><label>Введите email:<br>
<input name="email" size="30" type="email" placeholder="mail@mail.ru"></label></p>
<p><label>Введите пароль:<br>
<input name="password" size="30" type="password" placeholder="Пароль"></label></p>
<p><input name="Registr" type="submit" value="Добавить"></p>
<br>
<p><a href='/list_cons.php'>Назад</a></p>
</form>
</Center>
</div>
</div>
</body>
</html>