<?php 
session_start();
require_once "podklyuchenie_k_BD.php";
require_once "vhod_proverka.php";
require_once "proverka_email.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="author" content="goravtobaza.ru">
<meta name="description" content="Автотранспорт и спецтехника. Продажа, аренда, запчасти."> 
<meta name="Keywords" content="аренда автотранспорта, аренда спецтехники, аренда грузовиков, аренда автовышки, аренда автомобиля, аренда микроавтобуса, аренда автобуса, аренда самосвала, аренда эвакуатора, аренда автокрана, аренда автомобильного крана, аренда гусеничного крана, аренда башенного крана, аренда манипулятора, аренда автоподъёмника, аренда компрессора, аренда автокомпрессора, аренда бетоносмесителя, аренда автобетоносмесителя, аренда бетононасоса, аренда автобетононасоса, аренда экскаватора, аренда экскаватора погрузчика, аренда гидромолота, аренда бульдозера, аренда погрузчика, аренда трубоукладчика, аренда сваебоя, аренда ГНБ, аренда автогрейдера, аренда асфальтоукладчика, аренда катка, аренда ямобура, аренда бары, аренда трактора, аренда мусоровоза, аренда поливомоечной машины, аренда ассенизатора, аренда илососа, аренда сельхоз техники, аренда бытовок, аренда леса строительные, аренда вышки тура, аренда опалубки, аренда оборудования, продажа автотранспорта, продажа спецтехники, продажа грузовиков, продажа автовышки, продажа автомобиля, продажа микроавтобуса, продажа автобуса, продажа самосвала, продажа эвакуатора, продажа автокрана, продажа автомобильного крана, продажа гусеничного крана, продажа башенного крана, продажа манипулятора, продажа автоподъёмника, продажа компрессора, продажа автокомпрессора, продажа бетоносмесителя, продажа автобетоносмесителя, продажа бетононасоса, продажа автобетононасоса, продажа экскаватора, продажа экскаватора погрузчика, продажа гидромолота, продажа бульдозера, продажа погрузчика, продажа трубоукладчика, продажа сваебоя, продажа ГНБ, продажа автогрейдера, продажа асфальтоукладчика, продажа катка, продажа ямобура, продажа бары, продажа трактора, продажа мусоровоза, продажа поливомоечной машины, продажа ассенизатора, продажа илососа, продажа сельхоз техники, продажа бытовок, продажа леса строительные, продажа вышки тура, продажа опалубки, продажа оборудования, запчасти для автотранспорта, запчасти для спецтехники, запчасти для грузовиков, запчасти для автовышки, запчасти для автомобиля, запчасти для микроавтобуса, запчасти для автобуса, запчасти для самосвала, запчасти для эвакуатора, запчасти для автокрана, запчасти для автомобильного крана, запчасти для гусеничного крана, запчасти для башенного крана, запчасти для манипулятора, запчасти для автоподъёмника, запчасти для компрессора, запчасти для автокомпрессора, запчасти для бетоносмесителя, запчасти для автобетоносмесителя, запчасти для бетононасоса, запчасти для автобетононасоса, запчасти для экскаватора, запчасти для экскаватора погрузчика, запчасти для гидромолота, запчасти для бульдозера, запчасти для погрузчика, запчасти для трубоукладчика, запчасти для сваебоя, запчасти для ГНБ, запчасти для автогрейдера, запчасти для асфальтоукладчика, запчасти для катка, запчасти для ямобура, запчасти для бары, запчасти для трактора, запчасти для мусоровоза, запчасти для поливомоечной машины, запчасти для ассенизатора, запчасти для илососа, запчасти для сельхоз техники, запчасти для бытовок, запчасти для леса строительные, запчасти для вышки тура, запчасти для опалубки, запчасти для оборудования, запасные части для автотранспорта, запасные части для спецтехники, запасные части для грузовиков, запасные части для автовышки, запасные части для автомобиля, запасные части для микроавтобуса, запасные части для автобуса, запасные части для самосвала, запасные части для эвакуатора, запасные части для автокрана, запасные части для автомобильного крана, запасные части для гусеничного крана, запасные части для башенного крана, запасные части для манипулятора, запасные части для автоподъёмника, запасные части для компрессора, запасные части для автокомпрессора, запасные части для бетоносмесителя, запасные части для автобетоносмесителя, запасные части для бетононасоса, запасные части для автобетононасоса, запасные части для экскаватора, запасные части для экскаватора погрузчика, запасные части для гидромолота, запасные части для бульдозера, запасные части для погрузчика, запасные части для трубоукладчика, запасные части для сваебоя, запасные части для ГНБ, запасные части для автогрейдера, запасные части для асфальтоукладчика, запасные части для катка, запасные части для ямобура, запасные части для бары, запасные части для трактора, запасные части для мусоровоза, запасные части для поливомоечной машины, запасные части для ассенизатора, запасные части для илососа, запасные части для сельхоз техники, запасные части для бытовок, запасные части для леса строительные, запасные части для вышки тура, запасные части для опалубки, запасные части для оборудования">
<title>ГОРАВТОБАЗА | Автотранспорт и спецтехника | Продажа, аренда, запчасти</title>
	  <link href="css/css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/css/index.css" rel="stylesheet" type="text/css" >
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Навигация -->
	<?php require_once "nav.php"; ?>
	
	<!--Заголовки -->
	<header>
		<div class="container">
			<div class="row">
				<h1 class="col-md-10">Аренда спецтехники и автотранспорта, пассажирские и грузоперевозки.</h1>
				<h2 class="col-md-10">ГОРАВТОБАЗА - сайт бесплатных объявлений частных лиц, предпринимателей и компаний
об аренде спецтехники и услугах автотранспорта во всех городах России, Украины и Беларуси.</h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 wrapper">
					<input class="col-md-9 form-control text-center" id="city" type="text" name="city" placeholder="Введите город"> 
					<input class="col-md-3 btn btn-warning" type="submit" name="poisk" value="Найти">
				</div>
				<div>
					<img class="img-responsive d-none d-md-block" src="img/index_img.png" alt="img">
				</div>
			</div>
		</div>
</header>

<!-- Блок с городами -->
	<main>
		<div class="container">
			<div class="row subjects" id="subjects">
				<div class="col-md-4">
					<h2 style="color:#808080;">Россия</h2> <br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_adigeya" class="ahover">Адыгея республика</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_altaj" class="ahover">Алтай республика</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=altajskij_kraj" class="ahover">Алтайский край</a>
                        <span class="cvet1"> - 7</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=amurskaya_oblast" class="ahover">Амурская область</a>
                        <span class="cvet1"> - 12</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=arkhangelskaya_oblast" class="ahover">Архангельская область</a>
                        <span class="cvet1"> - 22</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=astrakhanskaya_oblast" class="ahover">Астраханская область</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_bashkortostan" class="ahover">Башкортостан республика</a>
                        <span class="cvet1"> - 89</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=belgorodskaya_oblast" class="ahover">Белгородская область</a>
                        <span class="cvet1"> - 72</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=bryanskaya_oblast" class="ahover">Брянская область</a>
                        <span class="cvet1"> - 33</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_buryatiya" class="ahover">Бурятия республика</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=vladimirskaya_oblast" class="ahover">Владимирская область</a>
                        <span class="cvet1"> - 44</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=volgogradskaya_oblast" class="ahover">Волгоградская область</a>
                        <span class="cvet1"> - 33</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=vologodskaya_oblast" class="ahover">Вологодская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=voronezhskaya_oblast" class="ahover">Воронежская область</a>
                        <span class="cvet1"> - 65</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_dagestan" class="ahover">Дагестан республика</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=evrejskaya_avtonomnaya_oblast" class="ahover">Еврейская автономная обл.</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=zabajkalskij_kraj" class="ahover">Забайкальский край</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=ivanovskaya_oblast" class="ahover">Ивановская область</a>
                        <span class="cvet1"> - 9</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_ingushskaya" class="ahover">Ингушская республика</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=irkutskaya_oblast" class="ahover">Иркутская область</a>
                        <span class="cvet1"> - 6</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_kabardino_balkarskaya" class="ahover">Кабардино-Балкарская респ.</a>
                        <span class="cvet1"> - 4</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kaliningradskaya_oblast" class="ahover">Калининградская область</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_kalmykiya" class="ahover">Калмыкия республика</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kaluzhskaya_oblast" class="ahover">Калужская область</a>
                        <span class="cvet1"> - 7</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kamchatskij_kraj" class="ahover">Камчатский край</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=karachaevo_cherkesskaya_respublika" class="ahover">Карачаево-Черкесская респ.</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_kareliya" class="ahover">Карелия республика</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kemerovskaya_oblast" class="ahover">Кемеровская область</a>
                        <span class="cvet1"> - 7</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kirovskaya_oblast" class="ahover">Кировская область</a>
                        <span class="cvet1"> - 15</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_komi" class="ahover">Коми республика</a>
                        <span class="cvet1"> - 3</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kostromskaya_oblast" class="ahover">Костромская область</a>
                        <span class="cvet1"> - 6</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=krasnodarskij_kraj" class="ahover">Краснодарский край</a>
                        <span class="cvet1"> - 69</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=krasnoyarskij_kraj" class="ahover">Красноярский край</a>
                        <span class="cvet1"> - 8</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=avtonomnaya_respublika_krym" class="ahover"><b>Крым автономная респуб.</b></a>
                        <span class="cvet1"> - 53</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kurganskaya_oblast" class="ahover">Курганская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kurskaya_oblast" class="ahover">Курская область</a>
                        <span class="cvet1"> - 8</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=leningradskaya_oblast" class="ahover">Ленинградская область</a>
                        <span class="cvet1"> - 13</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=lipetskaya_oblast" class="ahover">Липецкая область</a>
                        <span class="cvet1"> - 72</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=magadanskaya_oblast" class="ahover">Магаданская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_marij_el" class="ahover">Марий эл республика</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_mordoviya" class="ahover">Мордовия республика</a>
                        <span class="cvet1"> - 2</span><br>
				</div>

				<div class="col-md-4">
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=moskva" class="ahover"><span style="font-size:20px;"><b>Москва</b></span></a>
                        <span class="cvet1"> - 569</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=moskovskaya_oblast" class="ahover">Московская область</a>
                        <span class="cvet1"> - 162</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=murmanskaya_oblast" class="ahover">Мурманская область</a>
                        <span class="cvet1"> - 8</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=nenetskij_avtonomnyj_okrug" class="ahover">Ненецкий автономный округ</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=nizhegorodskaya_oblast" class="ahover">Нижегородская область</a>
                        <span class="cvet1"> - 88</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=novgorodskaya_oblast" class="ahover">Новгородская область</a>
                        <span class="cvet1"> - 11</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=novosibirskaya_oblast" class="ahover">Новосибирская область</a>
                        <span class="cvet1"> - 30</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=omskaya_oblast" class="ahover">Омская область</a>
                        <span class="cvet1"> - 12</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=orenburgskaya_oblast" class="ahover">Оренбургская область</a>
                        <span class="cvet1"> - 9</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=orlovskaya_oblast" class="ahover">Орловская область</a>
                        <span class="cvet1"> - 6</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=penzenskaya_oblast" class="ahover">Пензенская область</a>
                        <span class="cvet1"> - 3</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=permskij_kraj" class="ahover">Пермский край</a>
                        <span class="cvet1"> - 17</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=primorskij_kraj" class="ahover">Приморский край</a>
                        <span class="cvet1"> - 10</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=pskovskaya_oblast" class="ahover">Псковская область</a>
                        <span class="cvet1"> - 8</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=rostovskaya_oblast" class="ahover">Ростовская область</a>
                        <span class="cvet1"> - 50</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=ryazanskaya_oblast" class="ahover">Рязанская область</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=samarskaya_oblast" class="ahover">Самарская область</a>
                        <span class="cvet1"> - 33</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=sankt_peterburg" class="ahover"><span style="font-size:20px;"><b>Санкт-Петербург</b></span></a>
                        <span class="cvet1"> - 355</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=saratovskaya_oblast" class="ahover">Саратовская область</a>
                        <span class="cvet1"> - 20</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=sakhalinskaya_oblast" class="ahover">Сахалинская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=sverdlovskaya_oblast" class="ahover">Свердловская область</a>
                        <span class="cvet1"> - 188</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=sevastopol" class="ahover"><b>Севастополь</b></a>
                        <span class="cvet1"> - 7</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_severnaya_osetiya_alaniya" class="ahover">Северная Осетия-Алания</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=smolenskaya_oblast" class="ahover">Смоленская область</a>
                        <span class="cvet1"> - 10</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=stavropolskij_kraj" class="ahover">Ставропольский край</a>
                        <span class="cvet1"> - 8</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=tambovskaya_oblast" class="ahover">Тамбовская область</a>
                        <span class="cvet1"> - 10</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_tatarstan" class="ahover">Татарстан республика</a>
                        <span class="cvet1"> - 34</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=tverskaya_oblast" class="ahover">Тверская область</a>
                        <span class="cvet1"> - 53</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=tomskaya_oblast" class="ahover">Томская область</a>
                        <span class="cvet1"> - 7</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=tulskaya_oblast" class="ahover">Тульская область</a>
                        <span class="cvet1"> - 27</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_tyva" class="ahover">Тыва республика</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=tyumenskaya_oblast" class="ahover">Тюменская область</a>
                        <span class="cvet1"> - 16</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=udmurtskaya_respublika" class="ahover">Удмуртская республика</a>
                        <span class="cvet1"> - 5</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=ulyanovskaya_oblast" class="ahover">Ульяновская область</a>
                        <span class="cvet1"> - 5</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=khabarovskij_kraj" class="ahover">Хабаровский край</a>
                        <span class="cvet1"> - 3</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_khakasiya" class="ahover">Хакасия республика</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=khanty_mansijskij_avtonomnyj_okrug" class="ahover">Ханты-Мансийский АО</a>
                        <span class="cvet1"> - 22</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=chelyabinskaya_oblast" class="ahover">Челябинская область</a>
                        <span class="cvet1"> - 40</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=chechenskaya_respublika" class="ahover">Чеченская республика</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=chuvashskaya_respublika" class="ahover">Чувашская республика</a>
                        <span class="cvet1"> - 8</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=chukotskij_avtonomnyj_okrug" class="ahover">Чукотский автон. округ</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=respublika_sakha" class="ahover">Якутия респ. Саха</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=yamalo_nenetskij_avtonomnyj_okrug" class="ahover">Ямало-Ненецкий АО</a>
                        <span class="cvet1"> - 6</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=yaroslavskaya_oblast" class="ahover">Ярославская область</a>
                        <span class="cvet1"> - 66</span><br>
				</div>

				<div class="col-md-4">
					<h2 style="color:#808080;">Украина</h2><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=vinnitskaya_oblast" class="ahover">Винницкая область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=volynskaya_oblast" class="ahover">Волынская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=dnepropetrovskaya_oblast" class="ahover">Днепропетровская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=donetskaya_oblast" class="ahover">Донецкая область</a>
                        <span class="cvet1"> - 4</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=zhitomirskaya_oblast" class="ahover">Житомирская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=zakarpatskaya_oblast" class="ahover">Закарпатская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=zaporozhskaya_oblast" class="ahover">Запорожская область</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=ivano_frankovskaya_oblast" class="ahover">Ивано-Франковская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kievskaya_oblast" class="ahover"><span style="font-size:20px;"><b>Киевская область</b></span></a>
                        <span class="cvet1"> - 17</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kirovogradskaya_oblast" class="ahover">Кировоградская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=luganskaya_oblast" class="ahover">Луганская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=lvovskaya_oblast" class="ahover">Львовская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=nikolaevskaya_oblast" class="ahover">Николаевская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=odesskaya_oblast" class="ahover">Одесская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=poltavskaya_oblast" class="ahover">Полтавская область</a>
                        <span class="cvet1"> - 13</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=rovnenskaya_oblast" class="ahover">Ровненская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=sumskaya_oblast" class="ahover">Сумская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=ternopolskaya_oblast" class="ahover">Тернопольская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=kharkovskaya_oblast" class="ahover">Харьковская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=khersonskaya_oblast" class="ahover">Херсонская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=khmelnitskaya_oblast" class="ahover">Хмельницкая область</a>
                        <span class="cvet1"> - 2</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=cherkasskaya_oblast" class="ahover">Черкасская область</a>
						<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=chernigovskaya_oblast" class="ahover">Черниговская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=chernovickaya_oblast" class="ahover">Черновицкая область</a>
                        <span class="cvet1"> - 1</span><br>
					<br><br>
					<h2 style="color:#808080;">Беларусь</h2>
					<br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=brestskaya_oblast" class="ahover">Брестская область</a>
                        <span class="cvet1"> - 1</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=vitebskaya_oblast" class="ahover">Витебская область</a>
                        <span class="cvet1"> - 6</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=gomelskaya_oblast" class="ahover">Гомельская область</a>
                        <span class="cvet1"> - 8</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=grodnenskaya_oblast" class="ahover">Гродненская область</a>
                        <span class="cvet1"> - 36</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=minskaya_oblast" class="ahover"><span style="font-size:20px;"><b>Минская область</b></span></a>
                        <span class="cvet1"> - 22</span><br>
                        &nbsp;<a href="http://goravtobaza.ru/tip_ob.php?name=mogilyevskaya_oblast" class="ahover">Могилёвская область</a>
                        <span class="cvet1"> - 1</span><br>
				</div>
			</div>
		</div>
	</main>

<!-- Блок контента -->
	<div class="container" id="content">
		<article>
			<h3>Роль спецтехники и автотранспорта в современном мире.</h3>
	<p>&nbsp;&nbsp;С момента изобретения двигателя внутреннего сгорания и до сегодняшних дней развитие
	 автомобильного транспорта шагнуло далеко вперёд и достигло неимоверных высот. В настоящее время
	  ни одно крупное или мелкое строительство, ни одна отрасль промышленности и сельского хозяйства не обходится без использования спецтехники и автотранспорта. 
	<br>
	&nbsp;&nbsp;Стремительный темп современной жизни требует от всех быстрейших реакций и действий. 
	Особенно наглядно это утверждение проявляется в строительной области. 
	На участках, пустовавших десятилетиями, сегодня вырастают здания, возводимые по самым новым и скоростным технологическим принципам. 
	Соответственно, многочисленным строительным и дорожным организациям требуется огромное количество разнообразной техники, 
	как общего профиля, так и узкоспециализированной. 
	<br>
	Если крупные компании могут позволить себе покупать новую технику и оборудование, то мелкие и средние застройщики такой возможности не имеют. Для них оптимальным решением является аренда спецтехники. 
	<br>
	Наиболее часто арендуемыми видами строительных машин являются нижеследующие образцы: 
	<br>
	• Строительные грузовики, тягачи, самосвалы. Данным видам спецтехники трудно найти равноценную замену, когда необходимо осуществить: 
	<br>
	- перевозку сыпучих грузов; <br>
	- буксировку тяжелой техники; <br>
	- транспортировку больших объемов строительной продукции; <br>
	- доставку грузов в труднодоступные местности и пр. <br>

	• Бульдозеры. Любым строительным и дорожным работам всегда предшествует зачистка необходимого участка территории от самого разного мусора. Для этого чаще всего и требуется аренда бульдозера. 
	<br>
	• Фронтальные погрузчики. Эти многофункциональные самоходные машины предназначены для погрузки самых разных кусковых и сыпучих материалов. 
	<br>
	• Ямобуры используются для бурения отверстий под фундаменты, бурения скважин в земле, разбивки парковых зон, устройства заборов и ограждений, для других видов специализированных строительных работ. 
	<br>
	• Экскаваторы-погрузчики. Широко эксплуатируемые механизмы, незаменимые для перемещения и загрузки различных материалов при строительстве и ремонте дорог, например при отсыпке грунта. 
	<br>
	• Гидромолот – ударный механизм, используемый при работах с мерзлым грунтом и твердыми покрытиями. Наиболее часто эксплуатируется при вскрытии ненужных дорожных поверхностей, демонтаже бетонных и железобетонных конструкций. Это специальный вид сменного оборудования для экскаваторов. 
	<br>
	• Автокраны и краны-манипуляторы, которые задействуются для выполнения высотных и других видов работ на стройке. 
	<br>
	Оформление договора аренды строительной техники, как правило, производится оперативно и с минимумом формальностей. Сам подрядчик избавляется от многочисленных забот и расходов, связанных с приобретением строительной техники в собственность застройщика.
			</article>
			<article
			><h3>Что такое аренда спецтехники и автотранспорта?</h3>
	<p>&nbsp;&nbsp;Аренда спецтехники и автотранспорта - это услуги  по грузоперевозкам, по доставке бетона,
	 щебня, песка, кирпича, газосиликата, железобетонных изделий и других стройматериалов, услуги крана и экскаватора,
	  аренда манипулятора и автовышки, аренда специальной, дорожной, строительной и автомобильной техники. 
	  Специалист приезжает к Вам на объект и выполняет необходимый спектр и объём работ. 
	  Обычно используются два варианта оплаты: за фактически потраченное время (чаще почасовая оплата) и за фактически выполненные работы.
	Как правило, услугами спецтехники и автотранспорта пользуются организации и частные лица, 
	осуществляющие деятельность в той или иной общественной сфере: от пассажирских перевозок 
	(к святым местам, в курортные зоны, заказ автомобиля на свадьбу, в аэропорт) до строительства жилых домов 
	и крупных торговых центров. Ведь бывают периоды, когда даже у солидных компаний возникают проблемы с нехваткой 
	различных транспортных средств и спецтехники,  и они вынуждены обращаться к сторонним фирмам.  Но, как и где их найти, если время ограничено?  </p>
		</article>
			<article>
				<h3>Инструменты поиска спецтехники и автотранспорта.</h3>
				<p>&nbsp;&nbsp;В век информационных технологий основным источником поиска является Интернет. 
	Однако, не смотря на то, что рынок достаточно велик, в сети очень мало ёмких узконаправленных ресурсов, 
	где были бы собраны все предложения по аренде и услугам автотранспорта и спецтехники во всех регионах России. 
	Но человеку, которому нужна аренда, а не покупка, легко запутаться во множестве вкладок, и в итоге, 
	потратив время, не найти то, что он искал. Помимо Интернет ресурсов не теряет популярность поиск объявлений в печатных изданиях, таких как газета «Из рук в руки».</p>
			</article>
			<article>
				<h3>Куда подать объявление об аренде спецтехники и автотранспорта?</h3>
	<p>&nbsp;&nbsp;Портал Горавтобаза призван помочь не только нанимателям,  в первую очередь он облегчит поиск потенциальных
	 клиентов арендодателям. Представьте, что Вы лично или Ваша компания купили экскаватор или автокран, автовышку, бульдозер и хотели бы использовать его без простоя
	 не только на своих объектах, но и сдавать в аренду. Или быть может, Вы решили открыть собственный бизнес по сдаче в аренду спецтехники! 
	 С чего начать, где поместить информацию о своих услугах? Конечно же, на Гор автобаза! Ресурс частные объявления грузоперевозки и спецтехника.
	 Запоминающееся с первого раза название, простая и понятная структура сайта – всё это будет способствовать привлечению новых клиентов, и Вы не останетесь без дохода.</p>
	<p>&nbsp;&nbsp;Гор автобаза – сайт объявлений в два клика! Что это значит? 
	Зайдя на главную страницу, выберите город, затем выбрав транспортное средство и кликнув по нему один раз, 
	Вы увидите все предложения аренды автотранспорта и спецтехники в Вашем городе.</p>
	<br>
	<h3>GorAvtoBaza.ru:  авто, спецтехника – всё тут!</h3>
		</article>
			<div class="col row statistic">
				<?php $kol_vo_regionov_bd = mysqli_query($link, " SELECT COUNT(id_subject) FROM subjects ");
					$kol_vo_regionov_arr =  mysqli_fetch_assoc($kol_vo_regionov_bd);
				 ?>
		<p>Всего объявлений на сайте - $kol-vo_obyavlenij, в <?php echo $kol_vo_regionov_arr["COUNT(id_subject)"]  ?> регионах. </p>
		</div>
	</div>

<!-- Подвал -->
<?php require_once "footer.php"; ?>
</body>
</html>