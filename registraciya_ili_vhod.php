<?php 
session_start();
require_once "vhod_proverka.php";
// Если юзер авторизован, перекидываем в личный кабинет
if(!empty($_SESSION["auth"]) && $_SESSION["auth"] == true){
 header("Location: http://".$_SERVER['SERVER_NAME']."/lichnyj_kabinet.php?&id=".$_SESSION["id"]);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>ГОРАВТОБАЗА</title>
      <link href="css/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css/registraciya_ili_vhod.css">
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

  <!-- Навигация -->
  <nav class="col-md-12">
    <div class="container">
      <div class="row">
      <ul class="list-inline col-md-12">
        <a href="http://goravtobaza.ru/index.php"><li "> <img class="offset-lg-0 offset-md-6 offset-sm-4 img-responsive" src="img/logo.png" alt="logo"></li></a>
        <a href="http://goravtobaza.ru/index.php"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">Главная</li></a>
        <a href="#"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">О проекте</li></a>
        <a href="#"><li class="col-xl-2 col-lg-3 col-sm-12 offset-xl-0 offset-lg-5 btn btn-outline-light">Помощь</li></a>
        <a href="http://goravtobaza.ru/registraciya_ili_vhod.php"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">Подать объявление</li></a>
      </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container">
      <div class="row">
        <h2>
          Для размещения объявлений на сайте <br>
необходимо <a href="#" id="modal_reg_on"> зарегистрироваться</a>, если Вы уже зарегистрированы, то <a href="#" id="modal_login_on"> войти</a>.
        </h2>
      </div>
              <div class="errors offset-lg-3 offset-sm-2"> <?php require_once "registraciya.php"?> </div>
      <div class="row">
      <!-- <a href="vhod.php" class="col-xl-5"> <input class="col-xl-12 btn btn-warning" type="button" name="vhod" value="Вход"> </a> -->
            <!-- Button trigger modal -->
<button class="col-xl-5 btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModal">
  Вход
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="vhod.php">
                <div class="form-group, offset-md-1">
                    <p> <label for="login"> Login </p> </label>  <input class="form-control col-xl-11" name="login" type="text" id="login" required><br>
                  <!--  <p> <label for="phone"> Номер телефона: </p> </label>  <input class="form-control col-xl-11" name="phone" type="tel" id="phone" ><br> -->
                    <p> <label for="parol">  Пароль: </p> </label> <input class="form-control col-xl-11" name="parol" type="password" id="parol" required><br>
                   <p> Запомнить меня: <input type="checkbox" name="zapomnit"> </p>
                   <p> <input class="btn btn-warning small col-xl-9 offset-xl-1" name="submit" type="submit" value="Войти"> </p>
                </div>
             </form>
          </div>
      </div>
  </div>
</div>

      <!-- Button trigger modal -->
<button class="col-xl-5 offset-xl-2  btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModalCenter">
  Регистрация
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title offset-xl-1" id="exampleModalLongTitle">Введите почту или номер телефона</h5>
        <!--<select id="select_reg">
          <option>Все данные</option>
          <option value="email_sel">Только с email</option>
          <option value="phone_sel">Только с номером</option>
        </select> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
            <div class="form-group, offset-md-1">

            <div class="row">
           <div id="email_reg" > 
           <p class="offset-xl-1"> <label for="email_label"> Email  </p> </label>  
            <input class="form-control col-xl-10 offset-xl-1" name="email" type="email" id="email_label" required><br>
          </div >

            <div id="phone_reg"> 
              <p class="offset-xl-2"> <label for="phone_label"> Номер телефона </p> </label>  
              <input class="form-control offset-xl-2 col-xl-10" name="phone" type="tel" id="phone_label" minlength="10" maxlength="15" placeholder="" required><br>
              </div>
            </div>

            <p> <label for="parol_reg">  Пароль: </p> </label> <input class="form-control col-xl-11" name="parol" type="password" id="parol_reg" minlength="8" maxlength="30" placeholder="Не менее 8 символов" required><br>
            <p> <label for="povtor_parol_reg"> Повторите ваш пароль: </p> </label> <input class="form-control col-xl-11" name="povtor_parol" type="password" id="povtor_parol_reg" minlength="8" maxlength="30" required><br>
            <span id="message"></span>

        <!--  <p> <label for="captcha"> Введите капчу: </label> </p>
            <p> <img src="captcha.php" alt="Капча"/> </p> 
            <p> <input type="text" name="captcha" id="captcha" placeholder="Проверочный код" required> </p> -->
            <p> <input class="btn btn-warning small col-xl-9 offset-xl-1" name="submit" type="submit" value="Зарегистрироваться"> </p>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

      <!-- <a class="col-xl-5 offset-lg-2"> <input class="col-xl-12 btn btn-warning" type="button" name="registraciya" value="Регистрация"> </a> -->
      </div>
    </div>
  </main>

  <div class="container" id="content">
    <article>
      <h3>Размещение объявлений на сайте ГОРАВТОБАЗА - БЕСПЛАТНОЕ.</h3><br>
<p>После регистрации Вам будет доступен личный кабинет арендодателя, в котором Вы сможете подавать <br>
объявления об аренде и услугах автотранспорта и спецтехники в любом из городов России, Украины и Беларуси.<br>
В личном кабинете предоставлена возможность бесплатного и платного размещения объявлений на первых позициях в городе.<br>
Перед регистрацией необходимо ознакомиться с <a href="http://goravtobaza.ru/soglashenie" class="ahover1">условиями размещения</a> объявлений на сайте ГОРАВТОБАЗА.<br>
По всем возникшим вопросам Вы можете обратиться через форму <a href="http://goravtobaza.ru/kontakty/send" class="ahover1">обратной связи</a>.
</p>
    </article>
  </div>

  <footer>
    <div class="container">
      <p>&nbsp;&nbsp;©&nbsp;&nbsp;&nbsp;Copyright:&nbsp;<a href="http://goravtobaza.ru/" class="ahover1">GorAvtoBaza.ru</a>&nbsp;2014–2016&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span> <a href="http://goravtobaza.ru/kontakty/send" class="ahover1">Контакты</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://goravtobaza.ru/soglashenie" class="ahover1">Условия использования</a>
    </span></p>    
    </div>  
  </footer>

<script type="text/javascript">
  //Если селект меняется
/*$("#select_reg").change(function(){
  //Если выбрана почта
   if($(this).val() == "email_sel"){
    //Удаляем блок с вводом номера телефона
    $("div#phone_reg").remove();
    //Блокируем селект
    $("#select_reg").prop("disabled", true);
    //Если выбираем телефон
   } else if ($(this).val() == "phone_sel"){
    // Удаляем блок с вводом почты
      $("div#email_reg").remove();
     // Блокируем селект
      $("#select_reg").prop("disabled", true);
   }
});*/
// Если введён емэйл
$("#email_label").change(function(){
    //Удаляем блок с вводом номера телефона
    $("div#phone_reg").remove();
    //Разворачиваем во всю длину
    $("div#email_reg").addClass("col-xl-11");
    $("div#email_reg").children().removeClass("offset-xl-1");
    $("div#email_reg").children().removeClass("col-xl-10");
});
// Если введён телефон
$("#phone_label").change(function(){
    //Удаляем блок с вводом номера телефона
    $("div#email_reg").remove();
    //Разворачиваем во всю длину
    $("div#phone_reg").addClass("col-xl-11");
    $("div#phone_reg").children().removeClass("offset-xl-2");
    $("div#phone_reg").children().removeClass("col-xl-10");
});
//Клиентская валидация пароля
$("#parol_reg, #povtor_parol_reg").on("keyup", function () {
  if ($("#parol_reg").val() == $("#povtor_parol_reg").val()) {
    $("#message").html("Пароли совпадают").css("color", "green");
  } else 
    $("#message").html("Пароли не совпадают").css("color", "red");
});
// Раскрытие модального окна регистрации по клику на ссылку
$("#modal_reg_on").on("click", function() {
  $("#exampleModalCenter").modal("show");
})
// Раскрытие модального окна входа по клику на ссылку
$("#modal_login_on").on("click", function() {
  $("#exampleModal").modal("show");
})
</script>

</body>
</html>