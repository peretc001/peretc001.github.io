<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ДЭМИ Астрахань</title> 
	<meta name="Keywords" content="где купить, контакты, дэми астрахань, пункт выдачи" /> 
	<meta name="Description" content='Магазин ДЭМИ в г. Астрахань' /> 
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
		<table cellspacing="0" cellpadding="0" border="0" width="100%">
			<tr>
				<td valign="top">
					<div id="menuid">
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Астрахань
					</div>
					<h1>ДЭМИ Астрахань</h1>
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td class="left" width="40%" vAlign="top">
								<p><b>ООО "ДЭМИ-Астрахань"</b><br>
								Адрес: г. Астрахань, ул. Боевая 132/6.  "ТЦ ДОМАШНИЙ"<br>
								Тел: +7 (927) 552-68-11,+7 (917) 092-59-95</p>
								<p>График работы: Пн - Пт с 9 до 18, Сб с 10 до 16.</p>
						
							<td class="right" width="60%" vAlign="top" align="center">
								<a class="img" rel="example_group"  href="/gde_kupit/img/astrakhan2.jpg"><img src="/gde_kupit/img/astrakhan2_small.jpg" style="border:4px solid #fff;margin:0 5px;"></a>
								<a class="img" rel="example_group"  href="/gde_kupit/img/astrakhan1.jpg"><img src="/gde_kupit/img/astrakhan1_small.jpg" style="border:4px solid #fff;margin:0 5px;"></a>
							</td>
						</tr>
					</table>
					<p id="map">Схема проезда по г. Астрахань:</p>
					<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
					<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=gx4j5d0wXLUZocSQ9oOZdVg69INXCLm2&width=600&height=450"></script>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php include '../inc/footer.php'; ?>