<?php
//Отравить письмо с подтверждением почты
$md5_mail = md5("!@#".$email."#@!");
$url_mail = "http://".$_SERVER['SERVER_NAME']."/index.php?page=users&id=".$user_id."&register=".$md5_mail;
	//$url_mail =	"http://".$_SERVER['SERVER_NAME']."/lichnyj_kabinet.php?page=users&id=".$user_id;
$message = "Для подтверждения регистрации пройдите по ссылке ниже:\r\n".$url_mail;
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
mail($email, "Подтверждение регистрации", $url_mail, $headers);   
?>