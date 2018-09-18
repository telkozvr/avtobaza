<?php
// Страница регистрации
// Подключения модуля соединения с БД 
require_once "podklyuchenie_k_bd.php";

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
    $min_dlina_parolya = 8;
    $max_dlina_parolya = 30;
    //В переменную почты записываются данные из поля формы email
    $email = $_REQUEST["email"];
    $parol = $_REQUEST["parol"];
    $povtor_parol = $_REQUEST["povtor_parol"];
    $phone = $_REQUEST["phone"];
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

    // Добавить серверную валидацию пароля
    // Модуль проверки капчи
	//require_once "proverka_kapchi.php";

    // Если ошибок нет
    if(count($err) === 0) {
        $date = date("Y-m-d H:i:s");
        //Генерируется хеш
        $hash = md5(generateHash(10));
        // Окончательный пароль, состоящий из пароля+хеша
        $hashparol = md5($parol.$hash);
        //Добавить в таблицу с юзерами шифрованный пароль, почту и хеш для дальнейшей расшифровки
        mysqli_query($link," INSERT INTO users SET user_email='".$email."', user_phone='".$phone."', user_parol='".$hashparol."', user_hash='".$hash."', user_date='".$date."' " );
        //Отравить письмо об успешной регистрации
        require_once "mail_register.php";
        //Перейти на страницу с логином
        header("Location: vhod.php"); exit();
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
<!DOCTYPE html>
<html>
<head>
	<title>Регистрация на сайте goravtobaza</title>

		<!-- Bootstrap CSS -->
      <link href="css/css/bootstrap.min.css" rel="stylesheet">
      <!-- Users CSS -->
      <link rel="stylesheet" type="text/css" href="css/css/registraciya.css">
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
    

<form method="POST" class="row">
	<div class="form-group, col-sm-2, offset-md-5">
    		<p> <label for="email"> Email: </p> </label>  <input class="form-control" name="email" type="email" id="email" required><br>
            <p> <label for="phone"> Номер телефона </p> </label>  <input class="form-control" name="phone" type="tel" id="phone" required><br>
    		<p> <label for="parol">  Пароль: </p> </label> <input class="form-control" name="parol" type="password" id="parol" required><br>
            <p> <label for="povtor_parol"> Повторите ваш пароль: </p> </label> <input class="form-control" name="povtor_parol" type="password" id="povtor_parol" required><br>
    	<!--    <p> <label for="captcha"> Введите капчу: </label> </p>
    		<p> <img src="captcha.php" alt="Капча"/> </p> 
    		<p> <input type="text" name="captcha" id="captcha" placeholder="Проверочный код" required> </p> 
           <input type="checkbox" name="zapomnit"> -->
    		<p> <input class="btn btn-warning" name="submit" type="submit" value="Зарегистрироваться"> </p>
	</div>
</form>

</body>
</html>