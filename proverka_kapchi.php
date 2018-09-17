<?php
//Проверка капчи
	session_start();
	if ($_POST["captcha"] == $_SESSION["rand"])	{ 
		$test;
	}	else {  
			$err[] = "Ошибка ввода капчи";
	}
?>