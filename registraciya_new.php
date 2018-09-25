<?php
// Страница регистрации
// Подключения модуля соединения с БД 
require_once "podklyuchenie_k_bd.php";
require_once "functions.php";
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
        checkEmail($email);
        checkPhone($phone);
        checkParol($parol);

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
     /*   if(!empty($email)) {
        //Отравить письмо с подтверждением почты
        require_once "mail_register.php";
        echo "<p> Вам на почту было отправлено письмо со ссылкой подтверждения аккаунта </p>";
        } else if (!empty($phone)) {
            // Отправить смс с подтверждением телефона
            header("Location: vhod.php"); exit();
        } */
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
