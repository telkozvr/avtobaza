<?
// Страница авторизации
// Подключения модуля соединения с БД
require_once "podklyuchenie_k_bd.php";

if (isset($_POST["submit"])) {
    // Получаем пароль из формы
    $form_parol = $_POST["parol"];
    // Вытаскиваем из БД айди и пароль, где почта равна введённой в форму авторизации
    $user_login = mysqli_query($link,"SELECT user_id, user_parol, user_hash FROM users WHERE user_email='".mysqli_real_escape_string($link,$_POST["email"])."' ");
    // Данные из БД переводятся в массив
    $dannye = mysqli_fetch_assoc($user_login);
    // Достаём хеш для шифрования текущего пароля
    $hash = $dannye["user_hash"];
    $user_parol = $dannye["user_parol"];
    $hashparol = md5($form_parol.$hash);
    // Сравниваем пароли из БД и из формы авторизации
    if ($user_parol === $hashparol) { 
        // Сохраняем пользователя в куках
        setcookie("id", $_POST["parol"].$_POST["email"], time()+60*60*24*30);
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>

	<form class="row" method="POST">
        <div class="form-group, col-sm-2, offset-md-5">
    		<p> <label for="email"> Email: </p> </label>  <input class="form-control" name="email" type="email" id="email" required><br>
    		<p> <label for="parol">  Пароль: </p> </label> <input class="form-control" name="parol" type="password" id="parol" required><br>
    		<input class="btn btn-primary" name="submit" type="submit" value="Войти">
        </div>
	</form>

</body>
</html>