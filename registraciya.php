<?php
// Страница регистрации
// Подключения модуля соединения с БД 
require_once "podklyuchenie_k_bd.php";
session_start();
    // Функция для генерации случайной строки необходимой для формирования хеша
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
    //Код работает
    // Переменные длины почты
    $min_dlina_email = 8; //Минимум
    $max_dlina_email = 40; //Максимум
    // Переменные длины пароля
    $min_dlina_parolya = 8; //Минимум
    $max_dlina_parolya = 30; //Максимум
    //В переменную почты записываются данные из поля формы регистрации
    $email = $_REQUEST["email"]; //почта
    $parol = $_REQUEST["parol"]; //пароль
    $povtor_parol = $_REQUEST["povtor_parol"]; //повтор пароля
    $phone = $_REQUEST["phone"]; //номер телефона
    $zapomnit;
    // Переменная статуса - 0, обычный пользователь
    $status = 0;
    //Удаляем из номера всё, кроме цифр
    $phone = preg_replace('~[^0-9]+~','', $phone);
    // Массив для ошибок
    $err = array();
    // Если была нажата кнопка формы
    if(isset($_REQUEST["submit"])) {
        // Сделать галочку при которой поле становится неактивным
    //Проверка заполненности почты или номера
	if(!$email && !$phone) {
        $err[] = "Введите почту либо номер телефона для дальнейшей регистрации";
    }

    // Проверка почты
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
    
    //Проверка номера
    $phone_bd = mysqli_query($link, "SELECT user_id FROM users WHERE user_phone='".mysqli_real_escape_string($link, $phone)."'");
    // Если число рядов идентичных user в базе больше 0, то такой юзер уже существует
    if(mysqli_num_rows($phone_bd) > 0) {
        $err[] = "Пользователь с таким номером уже существует в базе данных";
    }

    //Проверка пароля
    if(!$parol){
         $err[] = "Введите пароль!";
    }
    // Сделать аяксом без перезагрузки
    if($parol != $povtor_parol){
        $err[] = "Пароли не совпадают";
    }
    if(strlen($parol) < $min_dlina_parolya or strlen($parol) > $max_dlina_parolya) {
        $err[] = "Пароль должен быть не меньше $min_dlina_parolya символов и не больше $max_dlina_parolya";
    }

    // Добавить серверную валидацию пароля с регулярками
    // Модуль проверки капчи
	//require_once "proverka_kapchi.php";

    // Если ошибок нет
    if(count($err) === 0) {
        // Пишется дата и время регистрации
        $date = date("Y-m-d H:i:s");
        //Генерируется хеш
        $hash = md5(generateHash(10));
        // Окончательный пароль, состоящий из пароля+хеша
        $hashparol = md5($parol.$hash);
        //Добавить в таблицу с юзерами шифрованный пароль, почту и хеш для дальнейшей расшифровки
        mysqli_query($link," INSERT INTO users SET user_email='".$email."', user_phone='".$phone."', user_parol='".$hashparol."', user_hash='".$hash."', user_date='".$date."', user_status='".$status."' " );
        if(!empty($email)){
        //Отравить письмо с подтверждением почты
        require_once "mail_register.php";
        echo "<p> Вам на почту было отправлено письмо со ссылкой подтверждения аккаунта </p>";
        } else if (!empty($phone)){
            // Отправить смс с подтверждением телефона
            header("Location: vhod.php"); exit();
        }
    }
    //Либо вывести ошибку
    else
    {
       echo "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error) {
            echo $error."<br>";
        }
    }
}
?>
