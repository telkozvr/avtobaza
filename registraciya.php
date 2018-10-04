<?php
session_start();
require_once "podklyuchenie_k_bd.php";
require_once "functions.php";
//В переменную почты записываются данные из поля формы регистрации
$email = $_REQUEST["email"]; //почта
$parol = $_REQUEST["parol"]; //пароль
$phone = $_REQUEST["phone"]; //номер телефона
// Переменная статуса - 0, обычный пользователь
$status = 0;
//Удаляем из номера всё, кроме цифр
$phone = preg_replace('~[^0-9]+~','', $phone);
    // Если была нажата кнопка формы
    if(isset($_REQUEST["submit"])) {
        // Если введена только почта
         if (!empty($email) && empty($phone)) {
            $check_email = checkEmail($email);
            $check_parol = checkParol($parol);
            $err = array_merge($check_email, $check_parol);
            // Если в форме заполнен только телефон
        } elseif (empty($email) &&!empty($phone)) {
            $check_phone = checkPhone($phone);
            $check_parol = checkParol($parol);
            $err = array_merge($check_phone, $check_parol);
            // Если пользователь не ввёл ни почту ни номер телефона
        } elseif(empty($email) && empty($phone)){
            $err[] = "Введите почту или номер телефона";
        // Если каким-то образом пользователь смог вбить и почту и номер, то убиваем процесс
        } elseif(!empty($email) && !empty($phone)){
            $check_email = checkEmail($email);
            $check_phone = checkPhone($phone);
            $check_parol = checkParol($parol);
            echo "Заполните или почту или номер телефона";
            exit();
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
        $user_id = mysqli_insert_id($link);
    if(!empty($email)){
    require_once "mail_register.php";  
        echo "<p> Вам на почту было отправлено письмо со ссылкой подтверждения аккаунта </p>";
        } else if (!empty($phone)){
            // Отправить смс с подтверждением телефона
            echo "<p> На ваш номер было отправлено смс с кодом подтверждения аккаунта: </p>
                  <input>";
        }
    }
    //Либо вывести ошибку
    else
    {
       echo "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error) {
            echo "<p>".$error."</p>"."<br>";
        }
    }
}
?>
