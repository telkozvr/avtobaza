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

// Переменные длины почты
    $min_dlina_email = 8; //Минимум
    $max_dlina_email = 30; //Максимум
    // Переменные длины пароля
    $min_dlina_parolya = 8;
    $max_dlina_parolya = 30;

// Если была нажата кнопка формы
if(isset($_POST["submit"])) {
	// Массив для ошибок
	$err = array();
    // Валидация почты на длину символов
    if(strlen($_POST["email"]) < $min_dlina_email or strlen($_POST["email"]) > $max_dlina_email) {
        $err[] = "Почта должна быть не меньше $min_dlina_email символов и не больше $max_dlina_email";
    } 
    if(strlen($_POST["parol"]) < $min_dlina_parolya or strlen($_POST["parol"]) > $max_dlina_parolya) {
        $err[] = "Пароль должен быть не меньше $min_dlina_parolya символов и не больше $max_dlina_parolya";
    }
    // Присваиваем переменной количество юзеров с указанной в форме почтой
    $user = mysqli_query($link, "SELECT user_id FROM users WHERE user_email='".mysqli_real_escape_string($link, $_POST["email"])."'");
    // Если число рядов идентичных user в базе больше 0, то такой юзер уже существует
    if(mysqli_num_rows($user) > 0) {
        $err[] = "Пользователь с такой почтой уже существует в базе данных";
    }

    // Добавить серверную валидацию пароля
    // Модуль проверки капчи
	//require_once "proverka_kapchi.php";

    // Если ошибок нет
    if(count($err) === 0) {
        //В переменную почты записываются данные из поля формы email
        $email = $_POST["email"];
        //Генерируется хеш
        $hash = md5(generateHash(10));
        //Пароль из формы записывается в переменную
        $parol = trim($_POST["parol"]);
        // Окончательный пароль, состоящий из пароля+хеша
        $hashparol = md5($parol.$hash);
        //Добавить в таблицу с юзерами шифрованный пароль, почту и хеш для дальнейшей расшифровки
        mysqli_query($link," INSERT INTO users SET user_email='".$email."', user_parol='".$hashparol."', user_hash='".$hash."' " );
        //Отравить письмо об успешной регистрации
        require_once "mail_register.php";
        //Перейти на страницу с логином
        header("Location: login.php"); exit();
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<form method="POST" class="row">
	<div class="form-group, col-sm-2, offset-md-5">
    		<p> <label for="email"> Email: </p> </label>  <input class="form-control" name="email" type="email" id="email" required><br>
    		<p> <label for="parol">  Пароль: </p> </label> <input class="form-control" name="parol" type="password" id="parol" required><br>
    	  <!--  <p> <label for="captcha"> Введите капчу: </label> </p>
    		<p> <img src="captcha.php" alt="Капча"/> </p> 
    		<p> <input type="text" name="captcha" id="captcha" placeholder="Проверочный код" required> </p> -->
            <input type="checkbox" name="zapomnit">
    		<p> <input class="btn btn-primary" name="submit" type="submit" value="Зарегистрироваться"> </p>
	</div>
</form>

</body>
</html>