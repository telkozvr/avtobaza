<?php
	//Функция генерации хеша
function generateHash($length=6) {
    // Символы для формирования строки
    $simvoly = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    // Пустая строка для записи сгенерированных символов
    $code = "";
    //Предел выбираемых символов
    $kolichestvo_simvolov = strlen($simvoly) - 1;
    // Цикл генерации строки
    while (strlen($code) < $length) {
            $code .= $simvoly[mt_rand(0, $kolichestvo_simvolov)];
    }
    return $code;
}
		//функция проверки почты
function checkEmail(){
	require "podklyuchenie_k_bd.php";
    $min_dlina_email = 8; //Минимум длина почты
    $max_dlina_email = 40; //Максимум длина почты
    $email = $_REQUEST["email"]; //почта из формы
	$err = array(); // Массив для ошибок

	//Проверка заполненности почты
	if(!$email) {
		$err[] = "Введите почту для дальнейшей регистрации";
	}
	 // Проверка длины почты
	if(strlen($email) < $min_dlina_email or strlen($email) > $max_dlina_email) {
		$err[] = "Почта должна быть не меньше $min_dlina_email символов и не больше $max_dlina_email";
	} 
	// Присваиваем переменной количество юзеров с указанной в форме почтой
	$email_bd = mysqli_query($link, "SELECT user_id FROM users WHERE user_email='".mysqli_real_escape_string($link, $email)."'");
	// Если число рядов идентичных user в базе больше 0, то такой юзер уже существует
	if(mysqli_num_rows($email_bd) > 0) {
		$err[] = "Пользователь с такой почтой уже существует в базе данных";            
	}
		return $err;
}
 
function checkPhone(){
	require "podklyuchenie_k_bd.php";
	$phone = $_REQUEST["phone"]; //номер телефона из формы
    $phone = preg_replace('~[^0-9]+~','', $phone); //Удаляем из номера всё, кроме цифр
    $err = array(); // Массив для ошибок
    $min_dlina_nomera = 10;
    $max_dlina_nomera = 15;
	//Проверка заполненности номера
	if(!$phone) {
		$err[] = "Введите номер телефона для дальнейшей регистрации";
	}
	//Проверка номера в БД
	$phone_bd = mysqli_query($link, "SELECT user_id FROM users WHERE user_phone='".mysqli_real_escape_string($link, $phone)."'");
	// Если число рядов идентичных user в базе больше 0, то такой юзер уже существует
	if(mysqli_num_rows($phone_bd) > 0) {
		$err[] = "Пользователь с таким номером уже существует в базе данных";
	}
	if(strlen($phone) < $min_dlina_nomera or strlen($phone) > $max_dlina_nomera){
		$err[] = "Номер телефона должен быть не менее 10 и не более 15 символов";
	}
	return $err;
}

	function checkParol(){
	require "podklyuchenie_k_bd.php";
    $min_dlina_parolya = 8; //Минимум
    $max_dlina_parolya = 30; //Максимум
    //В переменную почты записываются данные из поля формы регистрации
    $parol = $_REQUEST["parol"]; //пароль
    $povtor_parol = $_REQUEST["povtor_parol"]; //повтор пароля
    $err = array(); // Массив для ошибок

	//Проверка заполненности
	if(!$parol){
		$err[] = "Введите пароль!";
	} 
	// Проверка совпадения паролей
	if($parol !== $povtor_parol){
		$err[] = "Пароли не совпадают";
	}
	//Проверка длины пароля
	if(strlen($parol) < $min_dlina_parolya or strlen($parol) > $max_dlina_parolya){
		$err[] = "Пароль должен быть не меньше $min_dlina_parolya символов и не больше $max_dlina_parolya";
	} 
	return $err;
}
 ?>