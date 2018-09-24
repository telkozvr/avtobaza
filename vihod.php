<?php  
if(isset($_REQUEST["vihod"])){
	header("Location: /index.php"/*.$dannye["user_id"]*/);
	session_start();
		$_SESSION = array();
		//Удаляем куки авторизации путем установления времени их жизни на текущий момент:
		setcookie('login', '', time()); //удаляем логин
		setcookie('key', '', time()); //удаляем ключ
		session_destroy(); //разрушаем сессию для пользователя
}
?>