<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Адреса магазинов ДЭМИ | Где купить</title> 
	<meta name="Keywords" content="где купить, контакты, краснодар, новороссийск, сочи, армавир, геленджик" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ' /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Адреса магазинов
		</div>
	</div>
	<div id="gde_kupit">
	<h2>Адреса магазинов ДЭМИ</h2>
	
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
	<div class="row">
		<div class="one-half column partner">
			<p><b>Армавир</b></p>
			<table>
				<tr>
					<td class="adres">Армавир, ул. Шаумяна, 6</td>
					<td>+7 (86137) 2-95-90</td>
				</tr>
			</table>
			<br><p><b>Геленджик</b></p>
			<table>
				<tr>
					<td class="adres">Геленджик, Новороссийская, 163</td>
					<td>+7 (86141) 2‒02‒80</td>
				</tr>
			</table>
			<br><p><b>Новороссийск</b></p>
			<table>
				<tr>
					<td class="adres">Новороссийск, Карамзина, 21</td>
					<td>+7 (8617) 60-70-33</td>
				</tr>
				<tr>
					<td>Новороссийск, Кутузовская, 13</td>
					<td>+7 (8617) 60-70-33</td>
				</tr>
				<tr>
					<td>Новороссийск, пр-т. Ленина, 33</td>
					<td>+7 (8617) 60-70-33</td>
				</tr>
			</table>
		</div>
		<div class="one-half column partner">
			<p><b>Сочи</b></p>
			<table>
				<tr>
					<td class="adres">Сочи, Красноармейская, 38, стр. 2</td>
					<td>+7 (988) 237-09-15</td>
				</tr>
			</table>
			<br><p><b>Тихорецк</b></p>
			<table>
				<tr>
					<td class="adres">Тихорецк, ул. Подвойского, 119А</td>
					<td>+7 (86196) 5-46-78</td>
				</tr>
				<tr>
					<td>Тихорецк, ул. Меньшикова, 81</td>
					<td>+7 (928) 28-28-515</td>
				</tr>
			</table>
			<br><p><b>Крым</b></p>
			<table>
				<tr>
					<td class="adres">Симферополь, ул. Кечкеметская, 8</td>
					<td>+7 (978) 751-02-94 <br><a href="http://berezka-mebelny.ru" target="_blank">berezka-mebelny.ru</a></td>
				</tr>
			</table>
		</div>
	</div>
		
	<!-- div class="row">	
		<div class="one-third column adres">
			<h3>ДЭМИ Краснодар</h3>
		</div>
		
		
	</div>
	<div class="row">
		<div class="one-third column adres">
			<h3>ДЭМИ Армавир</h3>
		</div>
		
		<div class="one-third column adres">
			<img src="/gde_kupit/img/armawir.jpg">
			<p>г. Армавир,</p>
			<p>ул. Шаумяна, 6</p>
			<p>+7 (86137) 2-95-90</p>
			<p><a class="button" href="/gde_kupit/armawir.php">Подробнее</a></p>
		</div>			
	</div-->
</div>	
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>