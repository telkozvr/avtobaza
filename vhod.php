<?
// Страница авторизации
// Подключения модуля соединения с БД
require_once "podklyuchenie_k_bd.php";
require_once "functions.php";
//Авторизация по почте

if (isset($_REQUEST["submit"]) && $_REQUEST["login"]) {
    // Получаем пароль из формы
    $parol_form = $_REQUEST["parol"];
    // Логин из формы
    $login_form = $_REQUEST["login"];

    // Запрос айди, пароля, хеша и почты по логину
    $zapros_poemail = "SELECT user_id, user_parol, user_hash, user_email, user_phone, user_status FROM users WHERE user_email='".mysqli_real_escape_string($link,$login_form)."' OR user_phone='".mysqli_real_escape_string($link,$login_form)."' ";
        //echo $zapros_poemail;
    //Переменная с результатом выборки
    $user_login = mysqli_query($link, $zapros_poemail);
    // Данные из БД переводятся в массив
    $dannye = mysqli_fetch_assoc($user_login);
   // var_dump($dannye);
    //Айди из базы
    $id_bd = $dannye["user_id"];
    //Статус из базы
    $status_bd = $dannye["user_status"];
    // Почта из бд 
    $email_bd = $dannye["user_email"];
    // Номер из БД
    $phone_bd = $dannye["user_phone"];
    // Достаём хеш для шифрования текущего пароля
    $hash_bd = $dannye["user_hash"];
    //Хешированный пароль из базы
    $hashparol_bd = $dannye["user_parol"];
    //Хешируем пароль из формы\
    $hashparol_form = md5($parol_form.$hash_bd);
    // Сравниваем пароли из БД и из формы авторизации
        if($status_bd == 0){
        echo "Подтвердите свой аккаунт!</br>
        Хотите получить код повторно?";
        exit();
    }
    if ($hashparol_bd === $hashparol_form) { 
        session_start();
        //Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION["auth"] = true;
        // Пишем в сессию логин и id пользователя
        $_SESSION["login"] = $login_form;
        $_SESSION["id"] = $id_bd;

        if(!empty($_REQUEST["zapomnit"])) {
            $random = mt_rand(6,10);
            $key = md5(generateHash($random));
            setcookie("login", $login_form, time()+60*60*24*30*12); //Логин
            setcookie("key", $key, time()+60*60*24*30*12);
            $izmenit_coockie = 'UPDATE users SET cookie="'.$key.'" WHERE user_email or user_phone="'.$login_form.'"';
            mysqli_query($link, $izmenit_coockie);
        }

    }
        //Переводим в личный кабинет
      header("Location: http://".$_SERVER['SERVER_NAME']."/lichnyj_kabinet.php?&id=".$_SESSION["id"]); exit();
    }
    else
    {
        echo "Вы ввели неправильную почту/пароль";
    }

?>