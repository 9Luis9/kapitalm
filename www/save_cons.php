<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
    //заносим введенный пользователем email в переменную $email, если он пустой, то уничтожаем переменную
    if (empty($login) or empty($password)or empty($email)) //если пользователь не ввел логин,пароль или email то выдаем ошибку и останавливаем скрипт
    {
    echo "<script>alert('Вы ввели не всю информацию! Заполните все поля!');location.href='/registr.php';</script>";
    }
    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) //проверка е-mail адреса регулярным выражением на корректность
    {
    echo "<script>alert('Email введен неверно!');location.href='/registr.php';</script>";
    }
    //if (strlen($login) < 5 or strlen($login) > 15) { // проверка логина на количество символов
    //echo "<script>alert('Логин должен состоять не менее чем из 5 символов и не более чем из 15!');location.href='/registr.php';</script>";
    //}
    //if (strlen($password) < 5 or strlen($password) > 15) { // проверка пароля на количество символов
    //echo "<script>alert('Пароль должен состоять не менее чем из 5 символов и не более чем из 15!');location.href='/registr.php';</script>";
    //}  
    // Символы, которые будут использоваться в коде. 
    $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 
    // Количество символов в коде. 
    $max=10; 
    // Определяем количество символов в $chars 
    $size=StrLen($chars)-1; 
    // Определяем пустую переменную, в которую и будем записывать символы. 
    $activation_code=null; 
    // Создаём пароль. 
    while($max--) 
    $activation_code.=$chars[rand(0,$size)]; 
    // Выводим созданный код.
    // если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    // удаляем лишние пробелы
    $email = htmlspecialchars(stripslashes($email));
    $login = trim(htmlspecialchars(stripslashes($login)));
    $password = strrev(md5(htmlspecialchars(stripslashes($password)))); //шифрую пароль, для надежности добавил реверс
    $role_id = "consultant";
 // подключаемся к базе
    include ("bd.php");
    include ("config.php");
 // проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT user_id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['user_id'])) 
    {
    echo "<script>alert('Введенный вами логин уже зарегистрирован! Введите другой логин!');location.href='/registr.php';</script>";
    }
 // если такого нет, то сохраняем данные
    $result2 = mysql_query ("INSERT INTO users (login,password,email,activation_code,role_id,time_reg) VALUES('$login','$password','$email','$activation_code','$role_id',NOW())");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
$subject= " Письмо с сайта kapitalm.com ";
$message= $login.",спасибо за регистрацию на сайте ООО Капитал-М. Чтобы продолжить пройдите по ссылке $site_server_name/confirm.php?activation_code=$activation_code&login=$login";
mail($email,$subject,$message);
        if (empty($myrow['activation_code'])) 
    {
echo "<script>alert('Консультант добавлен! Для продолжения подтвердите аккаунт консультанта на почте!');location.href='/registrcons.php';</script>";
        }
} 
else 
    echo "Ошибка при отправке"
    ?>