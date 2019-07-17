<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Магазин ДЭМИ Краснодар | Где купить</title> 
	<meta name="Keywords" content="где купить, контакты, краснодар" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ' /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> ДЭМИ Краснодар
		</div>
	</div>
	<div id="gde_kupit">
	<h2>Контакты</h2>
	<div style="color: #fff;background: red;padding: 10px 20px; text-align: center;">В связи с переездом, магазин на Тургенева закрыт, просьба звонить по телефону 8-988-242-81-05</div>
	<div class="row">
		<div class="one-half column krd">
			<img src="/gde_kupit/img/krasnodar.jpg">
		</div>
		
		<div class="one-half column krd">
			<ul class="top">
				<li class="name">Название:</li>
				<li>ООО "КрасГрупп"</li>
				<li class="name">Адрес:</li>
				<li>Краснодар, ул. Тургенева, 56</li>
				<li class="name">Телефон:</li>
				<li>+7 (861) 242-81-05</li>
			</ul>
			<p class="work">График:</p>
			<ul>
				<li class="name">Пн:</li>
				<li>выходной</li>
				<li class="name">Вт:</li>
				<li>с 10 до 17-00</li>
				<li class="name">Ср:</li>
				<li>с 10 до 17-00</li>
				<li class="name">Чт:</li>
				<li>с 10 до 17-00</li>
				<li class="name">Пт:</li>
				<li>с 10 до 17-00</li>
				<li class="name">Сб:</li>
				<li>с 10 до 16-00</li>
				<li class="name">Вс:</li>
				<li>выходной</li>
			</ul>
		</div>
	</div>
</div>	
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>