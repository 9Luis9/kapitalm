<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Регистрация</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    function funcBefore () {
        $("#information").text ("Ожидание данных...");
    }
    function funcSuccess (data){
        $("#information").text (data);
    }
    $(document).ready (function() {
        $("#done").bind("click", function() {
            $.ajax({
                url: "check_login.php",
                data: ({login: $("#login").val()}),
                datatype: "html",
                beforeSend: function () {
                    $("#information").text ("Ожидание данных...");
                },
                success: function (data){
                    if(data == "Логин занят")
                        alert("Логин занят");
                    else 
                        $("#information").text (data);
                }
                });
            });
        });
        
    
    </script>
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
<h1>Зарегистрируйтесь</h1>
<form name="Registr" action="save_user.php" method="post" onsubmit="return validate_form( );" >
<p><label>Введите логин:<br>
<input name="login" id="login" size="30" type="text" placeholder="Логин"></label></p>
<p><label>Введите email:<br>
<input name="email" size="30" type="email" placeholder="mail@mail.ru"></label></p>
<p><label>Введите пароль:<br>
<input name="password" size="30" type="password" placeholder="Пароль"></label></p>
<p><input name="Registr" type="submit" id="done" value="Регистрация"></p>
<p><a href='/auto.php'>Уже зарегистрированы?</a></p>
<br>
<div id="information"></div> 
<p><a href='/index.php'>На главную</a></p>
</form>
</Center>
</div>
</div>
</body>
</html>