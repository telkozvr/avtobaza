<?php 
//Модуль отправки регистрационного письма
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$subject = "Регистрация"; //Заголовок
$message = "<p> Вы успешно зарегистрировались на сайте </p> </br>";
				
mail($email, $subject, $message, $headers);
?>