<?php 
session_start();
if(!empty($_SESSION["auth"]) && $_SESSION["auth"] == true){
 header("Location: /lichnyj_kabinet.php");
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
        <a href="http://goravtobaza.ru/index.php"><li "> <img class="img-responsive" src="img/logo.png" alt="logo"></li></a>
        <a href="http://goravtobaza.ru/index.php"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">Главная</li></a>
        <a href="#"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">О проекте</li></a>
        <a href="#"><li class="col-xl-2 col-lg-3 col-sm-12 offset-xl-0 offset-lg-5 btn btn-outline-light">Помощь</li></a>
        <a href="http://goravtobaza.ru/registraciya_ili_vhod.html"><li class="col-xl-2 col-lg-3 col-sm-12 btn btn-outline-light">Подать объявление</li></a>
      </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container">
      <div class="row">
        <h2>
          Для размещения объявлений на сайте <br>
необходимо <a href="#"> зарегистрироваться</a>, если Вы уже зарегистрированы, то <a href="#"> войти</a>.
        </h2>
      </div>
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
                    <p> <label for="email"> Email: </p> </label>  <input class="form-control col-xl-11" name="email" type="email" id="email"><br>
                    <p> <label for="phone"> Номер телефона: </p> </label>  <input class="form-control col-xl-11" name="phone" type="tel" id="phone" ><br>
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
<button class="col-xl-5 offset-lg-2 btn btn-warning" type="button" data-toggle="modal" data-target="#exampleModalCenter">
  Регистрация
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Выберите способ регистрации:</h5>
        <select id="select_reg">
          <option>Все данные</option>
          <option value="email_sel">Только с email</option>
          <option value="phone_sel">Только с номером</option>
        </select>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="registraciya_new.php">
            <div class="form-group, offset-md-1">

           <div id="email_reg"> 
           <p> <label for="email_label"> Email: </p> </label>  
            <input class="form-control col-xl-11" name="email" type="email" id="email_label"><br>
          </div>

            <div id="phone_reg"> 
              <p> <label for="phone_label"> Номер телефона </p> </label>  
              <input class="form-control col-xl-11" name="phone" type="tel" id="phone_label"><br>
              </div>

            <p> <label for="parol_reg">  Пароль: </p> </label> <input class="form-control col-xl-11" name="parol" type="password" id="parol_reg" required><br>
            <p> <label for="povtor_parol_reg"> Повторите ваш пароль: </p> </label> <input class="form-control col-xl-11" name="povtor_parol" type="password" id="povtor_parol_reg" required><br>
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

$("#select_reg").change(function(){
   if($(this).val() == "email_sel"){
    $("div#phone_reg").remove();
    $("#select_reg").prop("disabled", true);
   } else if ($(this).val() == "phone_sel"){
      $("div#email_reg").remove();
      $("#select_reg").prop("disabled", true);
   }
});

</script>
</body>
</html>