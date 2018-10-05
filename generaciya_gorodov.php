<?php
require_once "podklyuchenie_k_bd.php";
// Имя субъекта из гет-запроса
$nameSubject_GET = $_GET["name"];
// Перевод кодировки 
	if (!preg_match('//u', $nameSubject_GET)) {
    	$nameSubject_GET = iconv("cp1251","UTF-8",$nameSubject_GET);
	}
// Берем из базы данные субъетка, где имя субъекта совпадает с именем субъета из гет-запроса
$Subject_bd = mysqli_query($link, "SELECT id_subject, subject_name FROM subjects WHERE subject_nameGET='".mysqli_real_escape_string($link, $nameSubject_GET)."'");
$Subject_arr = mysqli_fetch_assoc($Subject_bd);
$idSubject = $Subject_arr["id_subject"];
$nameSubject = $Subject_arr["subject_name"];

// Берем из базы имя города, где совпадает айди субъекта
$gorod_zapros = mysqli_query($link, "SELECT gorod_name FROM goroda WHERE id_subject='".mysqli_real_escape_string($link, $idSubject)."'");

	//Пока массив не возвращается пустым
	while($row = mysqli_fetch_assoc($gorod_zapros)) {
	
		//Выводятся данные
		//echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		foreach ($row as $value) {
			$url_ob = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."/".$value;
			echo "<a href=".$url_ob.">"."<li>".$value."</li>"."</a>"."<br>";
	}
}
?>