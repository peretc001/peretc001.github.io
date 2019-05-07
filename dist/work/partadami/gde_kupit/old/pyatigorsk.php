<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
   <title>ДЭМИ Пятигорск | Адреса магазинов ДЭМИ</title> 
	<meta name="Keywords" content="где купить, контакты, дэми Пятигорск, парты дэми" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ в г. Пятигорск' /> 
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Пятигорск
					</div>
					<h1>ДЭМИ Пятигорск</h1>
					<table>
						<tr>
							<td><a class="img" rel="example_group"  href="/gde_kupit/img/pyatigorsk.jpg"><img src="/gde_kupit/img/pyatigorsk.png" style="border:4px solid #fff;margin:0 5px;"></a></td>
							<td><a class="img" rel="example_group"  href="/gde_kupit/img/pyatigorsk2.jpg"><img src="/gde_kupit/img/pyatigorsk2.png" style="border:4px solid #fff;margin:0 5px;"></a></td>
						</tr>
					</table>
					<p><b>Салон мебели "Мебель Авангард"</b><br>
					357502, Ставропольский край, г. Пятигорск, Черкесское шоссе, 23<br>
					Тел: +7 (928) 955-60-45<br>
					График работы: Пн - Вс с 9-00 до 18-00</p>
					<p id="map">Схема проезда по г. Пятигорск:</p>
					<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
					<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=OgEZrRxpBi68YfPfQVbsIe5WmglBahnp&width=600&height=450"></script>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php include '../inc/footer.php'; ?>