<?php
ob_start();
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');
session_start();
include ("bd.php"); //подключение к бд
//$uploaddir = 'doc/';
//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

//echo '<pre>';
//if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    //echo "Файл корректен и был успешно загружен.\n";
//} else {
    //echo "Возможная атака с помощью файловой загрузки!\n";
//}

//echo 'Некоторая отладочная информация:';
//print_r($_FILES);

//print "</pre>";


if (isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_name1 = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
    $expensions = array("jpeg","jpg","png");
    
    if($file_size > 2097152){
        $errors[] = 'Файл должен быть не больше 2 мегабайт';
    }
    if(empty($errors) == true){
        move_uploaded_file($file_tmp,"doc/".$file_name);
        echo "Успех!";
    }
    else {
        print $errors;
    }
}
?>
<html>
<ul>
<li>Имя файла:<?php echo $_FILES['image']['name'];?></li>
<li>Размер файла:<?php echo $_FILES['image']['size'];?></li>  
<li>Тип файла:<?php echo $_FILES['image']['type'];?></li>      
</ul>    
</html>






