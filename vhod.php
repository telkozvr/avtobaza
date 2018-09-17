<?
// Страница авторизации
// Подключения модуля соединения с БД
require_once "podklyuchenie_k_bd.php";

if (isset($_REQUEST["submit"])) {
    // Получаем пароль из формы
    $form_parol = $_REQUEST["parol"];
    // Вытаскиваем из БД айди и пароль, где почта равна введённой в форму авторизации
    $user_login = mysqli_query($link,"SELECT user_id, user_parol, user_hash FROM users WHERE user_email='".mysqli_real_escape_string($link,$_REQUEST["email"])."' ");
    // Данные из БД переводятся в массив
    $dannye = mysqli_fetch_assoc($user_login);
    // Достаём хеш для шифрования текущего пароля
    $hash = $dannye["user_hash"];
    $user_parol = $dannye["user_parol"];
    $hashparol = md5($form_parol.$hash);
    // Сравниваем пароли из БД и из формы авторизации
    if ($user_parol === $hashparol) { 
        // Сохраняем пользователя в куках
        setcookie("id", $_REQUEST["parol"].$_REQUEST["email"], time()+60*60*24*30*12);
        //Надо привязать куку к айпи
        // Переводим в личный кабинет
        header("Location: html/lichnyj_kabinet.html/".$dannye["user_id"]); exit();
    }
    else
    {
        echo "Вы ввели неправильный логин/пароль";
    }
}
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

	<form class="row" method="POST">
        <div class="form-group, col-sm-2, offset-md-5">
    		<p> <label for="email"> Email: </p> </label>  <input class="form-control" name="email" type="email" id="email" required><br>
    		<p> <label for="parol">  Пароль: </p> </label> <input class="form-control" name="parol" type="password" id="parol" required><br>
    		<input class="btn btn-warning" name="submit" type="submit" value="Войти">
        </div>
	</form>

</body>
</html>