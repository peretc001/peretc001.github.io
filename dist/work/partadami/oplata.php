<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Способы оплаты</title> 
	<meta name="Keywords" content="как оплатить мебель" /> 
	<meta name="Description" content="Способы оплаты в интернет магазине парт ДЭМИ" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Способы оплаты
		</div>
	</div>
	<div id="section">
		<h1>Способы оплаты</h1>
		<div class="row">
			<div class="one-half column oplata">
				<p class="name"><i class="fa fa-credit-card" aria-hidden="true"></i><br>
				<b>Банковской картой</b></p>
				<p>Вы можете оплатить покупку с помощью банковской карты международной платежной системы Visa и MasterCard.</p>
			</div>
			<div class="one-half column oplata">
				<p class="name"><i class="fa fa-rub" aria-hidden="true"></i><br>
				<b>Наличными</b></p>
				<p>Вы можете оплатить товар наличными в магазине или при получении по адресу доставки (только для г. Краснодар).</p>
			</div>
		</div>
		<div class="row">
			<div class="one-half column oplata">
				<p class="name"><i class="fa fa-university" aria-hidden="true"></i><br>
				<b>Банковский перевод</b></p>
				<p>Квитанцию можно оплатить в любом отделении любого банка.</p>
			</div>
			<div class="one-half column oplata">
				<p class="name"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><br>
				<b>Счет на оплату</b></p>
				<p>Юридические лица могут оплатить по счету.</p>
			</div>
		</div>
	</div>	
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>