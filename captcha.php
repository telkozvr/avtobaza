<?php

    session_start();
    // Генерируется случайное число
    $rand = mt_rand(10000, 99999);
    // Сгенерированная строка сохраняется в сессию
    $_SESSION["rand"] = $rand;
    //Создаётся фон
    $fon = imageCreateTrueColor(150,75);
    // Генерируется случайный цвет текста
    $tekst = imageColorAllocate($fon, mt_rand(0,230), mt_rand(0,230), mt_rand(0,230));
    // Записываем полученное случайное число на изображение
    imageTtfText($fon, 20, mt_rand(-10, 25), 20, 50, $tekst, "fonts/verdana.ttf", $rand);
    header("Content-type: image/png");
    // Выводим изображение
    imagePng($fon);
?>
