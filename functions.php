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
         function checkEmail($email) {
            //Проверка заполненности
         require "podklyuchenie_k_bd.php";
            if(!$email) {
            $err[] = "Введите почту для дальнейшей регистрации";
                }
             // Проверка длины
            if(strlen($email) < $min_dlina_email or strlen($email) > $max_dlina_email) {
            $err[] = "Почта должна быть не меньше $min_dlina_email символов и не больше $max_dlina_email";
                } 
            // Присваиваем переменной количество юзеров с указанной в форме почтой
            // Сделать такую же проверку для номера телефона
            $email_bd = mysqli_query($link, "SELECT user_id FROM users WHERE user_email='".mysqli_real_escape_string($link, $email)."'");
            // Если число рядов идентичных user в базе больше 0, то такой юзер уже существует
            if(mysqli_num_rows($email_bd) > 0) {
            $err[] = "Пользователь с такой почтой уже существует в базе данных";            
            }
             return $err;
        }
 
 	function checkPhone($phone) {
 		require "podklyuchenie_k_bd.php";
            //Проверка заполненности
            if(!$phone) {
            $err[] = "Введите почту либо номер телефона для дальнейшей регистрации";
                }
    //Проверка номера
    $phone_bd = mysqli_query($link, "SELECT user_id FROM users WHERE user_phone='".mysqli_real_escape_string($link, $phone)."'");
    // Если число рядов идентичных user в базе больше 0, то такой юзер уже существует
    if(mysqli_num_rows($phone_bd) > 0) {
        $err[] = "Пользователь с таким номером уже существует в базе данных";
		 }
		return $err;
     }

         function checkParol($parol) {
         	require "podklyuchenie_k_bd.php";
            //Проверка пароля
    if(!$parol){
         $err[] = "Введите пароль!";
    }
    // Сделать аяксом без перезагрузки
    if($parol !== $povtor_parol){
        $err[] = "Пароли не совпадают";
    }
    if(strlen($parol) < $min_dlina_parolya or strlen($parol) > $max_dlina_parolya) {
        $err[] = "Пароль должен быть не меньше $min_dlina_parolya символов и не больше $max_dlina_parolya";
 			} 
                return $err;
            }
 ?>