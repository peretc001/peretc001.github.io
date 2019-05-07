<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ГАРАНТИЯ на парты Дэми</title> 
	<meta name="Keywords" content="гарантия дэми" /> 
	<meta name="Description" content="Условия гарантии производителя и поставщика парт ДЭМИ" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Гарантия
		</div>
	</div>
	<div id="section">
		<h1>Гарантия</h1>
		<div class="row garanty">
			<div class="four columns">
				<p class="name"><i class="fa fa-shield" aria-hidden="true"></i><br>
				<b>Гарантия на мебель</b></p>
				<p><b>Гарантия ПРОИЗВОДИТЕЛЯ:</b></p>
				<ul>
					<li>Гарантия на СТОЛ - 18 месяцев.</li>
					<li>Гарантия на СТУЛ - 12 месяцев.</li>
				</ul>
				<p><b>Гарантия ПРОДАВЦА:</b></p>
				<ul>
					<li>Гарантия на СТОЛ - 60 месяцев.</li>
					<li>Гарантия на СТУЛ - 12 месяцев.</li>
				</ul>
				<p><small>* Только для розничных покупателей</small></p>
			</div>
			<div class="four columns">
				<p class="name"><i class="fa fa-random" aria-hidden="true"></i><br>
				<b>Обмен и возврат</b></p>
				<p>Вы можете поменять товар надлежащего качества в течение 30 дней на любой другой товар, равный по стоимости, либо дороже с доплатой либо вернуть товар.</p> 
				<p>При условии:</p>
				<ul>
					<li>Имеется целая оригинальная упаковка</li>
					<li>Товар НЕ имеет следов использования</li>
					<li>Покупатель НЕ является юр. лицом</li>
				</ul>
			</div>
			<div class="four columns">
				<p class="name"><i class="fa fa-wrench" aria-hidden="true"></i><br>
				<b>Доставка, сборка</b></p>
				<p>В дополнение мы предлагаем:</p>
				<p class="delivery"><b><a href="/delivery.php">Доставка от 500 руб.</a></b><br><span>В зависимости от модели.</span></p>
				<p class="setting"><b><a href="/settingup.php">Сборка от 500 руб.</a></b><br><span>В зависимости от модели.</span></p>
			</div>
		</div>
		<div class="row garanty">
			<div class="four columns">
				<p class="name"><i class="fa fa-refresh" aria-hidden="true"></i><br>
				<b>Замена брака</b></p>
				<p>В случае обнаружения брака или отсутствия детали - мы без проблем заменим бракованную деталь на новую или выдадим недостающую.</p>
			</div>
			<div class="four columns">
				<p class="name"><i class="fa fa-rub" aria-hidden="true"></i><br>
				<b>Возврат денег</b></p>
				<p>Если Вы оплатили заказ и передумали - мы вернем вам деньги.</p>
			</div>
			<div class="four columns">
				<p class="name"><i class="fa fa-comments-o" aria-hidden="true"></i><br>
				<b>Отзывы</b></p>
				<p>Остались сомнения?</p>
				<p>Вот тут есть <b><a href="/otziv.php">отзывы</a></b> покупателей.</p>
			</div>
		</div>
	</div>		
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>