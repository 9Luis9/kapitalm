<?php 

// Символы, которые будут использоваться в пароле. 

$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP"; 

// Количество символов в пароле. 

$max=8; 

// Определяем количество символов в $chars 

$size=StrLen($chars)-1; 

// Определяем пустую переменную, в которую и будем записывать символы. 

$registration_code=null; 

// Создаём пароль. 

    while($max--) 
    $registration_code.=$chars[rand(0,$size)]; 

// Выводим созданный пароль. 

echo 
"<center> 
Сгенерированный пароль: 
<hr><font face=verdana color=red size=7><b>".$registration_code."</b></font><hr> 
<a href=&#63;>Создать новый пароль.</a></center>"; 
?>