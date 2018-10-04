<?php
require_once "podklyuchenie_k_bd.php";
$id_GET = mysqli_real_escape_string($link, $_GET["id"]);
$user_zapros = mysqli_query($link, "SELECT user_id, user_email, user_status FROM users WHERE user_id='".mysqli_real_escape_string($link, $id)."'");
$user_bd = mysqli_fetch_assoc($user_zapros); 
$id_bd = $user_bd["user_id"];
$status_bd = $user_bd["user_status"]; 
if($status_bd === 0){
        echo "Подтвердите свой аккаунт!</br>
        Хотите получить код повторно?";
    } else if ($id_GET !== $_SESSION["id"]){
    	echo "Нет доступа";
    	exit();
    } else {
    	header("http://".$_SERVER['SERVER_NAME']."/lichnyj_kabinet.php?&id=".$user_id.""); 
    }
 ?>