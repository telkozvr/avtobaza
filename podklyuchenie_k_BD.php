<?php
//Соединямся с БД - "имя хоста", "имя пользователя", "пароль пользователя", "название БД"
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$param = array();
$param['server'] = 'localhost'; //имя сервера
$param['login'] = 'root'; //имя пользователя
$param['pass'] = ''; //пароль
$param['name_db'] = 'goravtobaza'; //название базы данных
$link = mysqli_connect($param['server'], $param['login'], $param['pass'], $param['name_db']) or die('Error!');
?>