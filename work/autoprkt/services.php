<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';


	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Услуги проката от @autoprkt</title> 
	<meta name="Keywords" content="подача / возврат авто, подача в аэропорт, помощь на дороге" /> 
	<meta name="Description" content="Услуги проката авто от @autoprkt - подача / возврат авто, подача в аэропорт, помощь на дороге." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>	
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
<nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> / Услуги
	</div>	
</nav>
<article id="services">
	<div class="row">
		<div class="introHolder">
			<h2>Услуги</h2>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="four columns">
			<p><b>Подача / возврат по адресу *</b></p>
			<ul>
				<li>с 10<sup>00</sup> до 20<sup>00</sup></li>
				<li class="grey">1000 руб.</li>
			</ul>
			<ul>
				<li>с 20<sup>00</sup> до 10<sup>00</sup></li>
				<li class="grey">1000 руб.</li>
			</ul>
		</div>
		<div class="four columns">
			<p><b>Доп. услуги</b></p>
			<ul>
				<li>Навигатор</li>
				<li class="grey">200 руб.</li>
			</ul>
			<ul>
				<li>Детское кресло</li>
				<li class="grey">500 руб.</li>
			</ul>
		</div>
		<div class="four columns">
			<p><b>Помощь на дороге *</b></p>
			<ul>
				<li>Выезд</li>
				<li class="grey">500 руб.</li>
			</ul>
			<ul>
				<li>Замена колеса</li>
				<li class="grey">500 руб.</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<p><small>* "Подача / возврат" и "Помощь на дороге" - указана цена по городу Краснодар. За выезд в другой город см. тариф "Подача / возврат по Краснодарскому краю".</small></p>
		<br>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="twelve columns">
			<p><b>Подача / возврат по Краснодарскому краю</b></p>
			<ul>
				<li>Анапа</li>
				<li class="grey">3000 руб.</li>
			</ul>
			<ul>
				<li>Армавир</li>
				<li class="grey">3500 руб.</li>
			</ul>
			<ul>
				<li>Геленджик</li>
				<li class="grey">3000 руб.</li>
			</ul>
			<ul>
				<li>Новороссийск</li>
				<li class="grey">3000 руб.</li>
			</ul>
			<ul>
				<li>Сочи</li>
				<li class="grey">5000 руб.</li>
			</ul>
			<ul>
				<li>Адлер</li>
				<li class="grey">7000 руб.</li>
			</ul>
		</div>
	</div>
	<div class="row">
		<p><small>* Подача / возврат в другие города согласовывается отдельно.</small></p>
		<br>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="twelve columns">
			<p><b>Аренда с водителем, цена за час</b></p>
			<ul>
				<li>< 3</li>
				<li class="grey">1000 руб.</li>
			</ul>
			<ul>
				<li>3-5</li>
				<li class="grey">900 руб.</li>
			</ul>
			<ul>
				<li>5-10</li>
				<li class="grey">800 руб.</li>
			</ul>
			<ul>
				<li>> 10</li>
				<li class="grey">700 руб.</li>
			</ul>
		</div>
	</div>
	</div>
	<div class="row">
		<p><small>* Минимальный срок аренды автомобиля с водителем - 3 часа.</small></p>
		<br>
	</div>
	<div class="clear"></div>
	
	<br>
	<div class="clear"></div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/car.php'; ?>



<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/map.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>