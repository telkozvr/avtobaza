<?php
   // Если геты не пустые
    if (isset($_GET['id']) && isset($_GET["register"])) {
        // Забираем гет параметры в функции
        $id = mysqli_real_escape_string($link, $_GET["id"]);
        $register = mysqli_real_escape_string($link, $_GET["register"]);
        // Забираем данные из базы по айди
        $user_bd = mysqli_query($link, "SELECT user_id, user_email, user_status FROM users WHERE user_id='".mysqli_real_escape_string($link, $id)."'");
        // Переводим в массив
       $row_user_id = mysqli_fetch_assoc($user_bd);
       // Если почта из гет-запроса не равна солёной почте из БД
        if ($register != md5("!@#".$row_user_id['user_email']."#@!")) {
            // Ошибка
            echo "Неверная ссылка. Почтовый ящик не подтвержден";
            exit();
            // Если почты совпали
        } elseif ($register == md5("!@#".$row_user_id["user_email"]."#@!")) {
            // Переводим статус юзера в подтверждённые
            if ($row_user_id["user_status"] == 0) {
                mysqli_query($link, "UPDATE users SET user_status = '1' WHERE user_id='".mysqli_real_escape_string($link, $id)."' OR user_email ='".mysqli_real_escape_string($link, $register)."' ");
                session_start();
                // Пишем юзера в сессию
            $_SESSION["auth"] = true;
        // Пишем в сессию логин и id пользователя
             $_SESSION["login"] = $register;
             $_SESSION["id"] = $id;
          //  header("Location: /lichnyj_kabinet.php"); exit();
            header("Location: http://".$_SERVER['SERVER_NAME']."/lichnyj_kabinet.php?&id=".$_SESSION["id"]); exit();
            } else {
                echo "Почтовый ящик уже подтвержден";
            }
        } else {
            echo "Что-то пошло не так";
        }
    }
?>