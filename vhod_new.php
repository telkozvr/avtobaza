<?
// Страница авторизации
// Подключения модуля соединения с БД
require_once "podklyuchenie_k_bd.php";
require_once "functions.php";
//Авторизация по почте
if (isset($_REQUEST["submit"]) && $_REQUEST["email"]) {
    // Получаем пароль из формы
    $parol_form = $_REQUEST["parol"];
    // Запрос айди, пароля, хеша и почты, почта которых равна введённой в форму
    $zapros_poemail = "SELECT user_id, user_parol, user_hash, user_email FROM users WHERE user_email='".mysqli_real_escape_string($link,$_REQUEST["email"])."' ";
    //Переменная с результатом выборки
    $user_login = mysqli_query($link, $zapros_poemail);
    // Данные из БД переводятся в массив
    $dannye = mysqli_fetch_assoc($user_login);
    //Айди из базы
    $id_bd = $dannye["user_id"];
    // Почта из бд 
    $email_bd = $dannye["user_email"];
    // Достаём хеш для шифрования текущего пароля
    $hash_bd = $dannye["user_hash"];
    //Хешированный пароль из базы
    $hashparol_bd = $dannye["user_parol"];
    //Хешируем пароль из формы
    $hashparol_form = md5($parol_form.$hash_bd);
    // Сравниваем пароли из БД и из формы авторизации
    if ($hashparol_bd === $hashparol_form) { 
        session_start();
        //Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION["auth"] = true;
        // Пишем в сессию логин и id пользователя
        $_SESSION["email"] = $email_bd;
        $_SESSION["id"] = $id_bd;

        if(!empty($_REQUEST["zapomnit"])) {
            $random = mt_rand(6,10);
            $key = md5(generateHash($random));
            setcookie("email", $email_bd, time()+60*60*24*30*12); //Логин
            setcookie("key", $key, time()+60*60*24*30*12);
            $izmenit_coockie = 'UPDATE users SET cookie="'.$key.'" WHERE user_email="'.$email_bd.'"';
            mysqli_query($link, $izmenit_coockie);
        }
        // Переводим в личный кабинет
      header("Location: /lichnyj_kabinet.php"/*.$dannye["user_id"]*/); exit();
    }
    else
    {
        echo "Вы ввели неправильную почту/пароль";
    }
}

//Авторизация по номеру телефона
if (isset($_REQUEST["submit"]) && $_REQUEST["phone"]) {
    // Получаем пароль из формы
    $parol_form = $_REQUEST["parol"];
    // Вытаскиваем из БД айди и пароль, где номер равен введённому в форму авторизации
    $zapros_pophone_number = "SELECT user_id, user_parol, user_hash FROM users WHERE user_phone='".mysqli_real_escape_string($link,$_REQUEST["phone"])."' "
    //Переменная с результатом выборки
    $user_login = mysqli_query($link,$zapros_pophone_number);
    // Данные из БД переводятся в массив
    $dannye = mysqli_fetch_assoc($user_login);
    //Айди из БД
    $id_bd = $dannye["user_id";]
    //Телефон из БД
    $phone_bd = $dannye["user_phone"];
    //Хеш из БД
    $hash_bd = $dannye["user_hash"];
    //Хешированный пароль из базы
    $hashparol_bd = $dannye["user_parol"];
    // Достаём хеш для шифрования текущего пароля
    $hash = $dannye["user_hash"];
    $user_parol = $dannye["user_parol"];
    $hashparol = md5($parol_form.$hash);
    // Сравниваем пароли из БД и из формы авторизации
    if ($user_parol === $hashparol) { 
        // Сохраняем пользователя в куках
        setcookie("id", $_REQUEST["parol"].$_REQUEST["phone"], time()+60*60*24*30*12);
        //Надо привязать куку к айпи
        // Переводим в личный кабинет
        header("Location: /index.html".$dannye["user_id"]); exit();
    }
    else
    {
        echo "Вы ввели неправильный номер телефона/пароль";
    }
}*/
?>
<!DOCTYPE html>
<html>
<head>
    <title>Войти на сайт goravtobaza</title>
        <!-- Bootstrap CSS -->
      <link href="css/css/bootstrap.min.css" rel="stylesheet">
      <!-- Users CSS -->
      <link rel="stylesheet" type="text/css" href="css/css/vhod.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Навигация -->
    <nav class="col-md-12 ">
        <div class="container">
            <div class="row">
            <ul class="list-inline col-md-12">
                <a href="http://goravtobaza.ru/index.html"><li "> <img class="img-responsive" src="img/logo.png" alt="logo"></li></a>
                <a href="http://goravtobaza.ru/index.html"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">Главная</li></a>
                <a href="#"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">О проекте</li></a>
                <a href="#"><li class="col-xl-2 col-lg-3 col-sm-12 offset-xl-0 offset-lg-5 btn btn-outline-light">Помощь</li></a>
                <a href="http://goravtobaza.ru/registraciya_ili_vhod.html"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">Подать объявление</li></a>
            </ul>
            </div>
        </div>
    </nav>
<?php 
echo "<p> Вам на почту было отправлено письмо со ссылкой подтверждения аккаунта </p>";
 ?>
            <form method="POST" action="vhod.php">
                <div class="form-group, offset-md-1">
                    <p> <label for="email"> Email: </p> </label>  <input class="form-control col-xl-11" name="email" type="email" id="email"><br>
                    <p> <label for="phone"> Номер телефона: </p> </label>  <input class="form-control col-xl-11" name="phone" type="tel" id="phone" ><br>
                    <p> <label for="parol">  Пароль: </p> </label> <input class="form-control col-xl-11" name="parol" type="password" id="parol" required><br>
                   <p> Запомнить меня: <input type="checkbox" name="zapomnit"> </p>
                   <p> <input class="btn btn-warning small col-xl-9 offset-xl-1" name="submit" type="submit" value="Войти"> </p>
                </div>
             </form>

</body>
</html>