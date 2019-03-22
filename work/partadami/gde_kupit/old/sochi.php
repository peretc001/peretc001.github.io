<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
   <title>ДЭМИ Сочи | Адреса магазинов ДЭМИ</title> 
	<meta name="Keywords" content="где купить, контакты, дэми Сочи, парты дэми" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ в г. Сочи' /> 
	<?php include '../inc/header.php'; ?>
	<?php include '../inc/config.php'; ?>
	<script type="text/javascript" src="/js/fancybox/code.js"></script>
</head>
<body>
<?php include '../inc/top.php'; ?>
<?php include '../inc/menu.php'; ?>
<?php include '../inc/leftmenu_nav.php'; ?>
<div id="head">
	<div id="page">	
		<table cellspacing="0" cellpadding="0" border="0">
			<tr>
				<td valign="top">
					<div id="menuid">
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Сочи
					</div>
					<h1>Официальный магазин ДЭМИ Сочи</h1>
					<p>354000, г. Сочи, ул. Красноармейская, 38, стр. 2<br>
					Тел: +7 (988) 237-09-15</p>
					<p id="map">Схема проезда по г. Сочи:</p>
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=xhqN16IpIGLejbODHzFYiPhRROdmtLPd&width=100%&height=450&lang=ru_RU&sourceType=constructor&scroll=false"></script>
<?php include '../inc/footer.php'; ?>