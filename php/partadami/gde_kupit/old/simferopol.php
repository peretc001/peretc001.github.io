<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
   <title>ДЭМИ Симферополь | Магазин Березка</title> 
	<meta name="Keywords" content="где купить, контакты, дэми симферополь" /> 
	<meta name="Description" content='Магазин ДЭМИ в г. Симферополь' />  
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Симферополь
					</div>
					<h1>ДЭМИ Симферополь</h1>
					<table class="contact" cellspacing="0" cellpadding="0" border="0" width="100%">
					<tr>
						<td class="left" vAlign="top">
						<p><b>Мебельный салон "Берёзка"</b>
							<p>Республика Крым, г. Симферополь, ул. Кечкеметская, 8<br>
							Тел: +7 (978) 751-02-94; +7 (3652) 52-90-60<br>
							Адрес сайта: <a href="http://berezka-mebelny.ru" target="_blank">berezka-mebelny.ru</a></p>
							<p>График работы:</p>
							<ul>
								<li>Понедельник - Пятница, с 9 до 18.</li>
								<li>Суббота, Воскресенье - с 10 до 17.</li>
							</ul>
						</td>
						<td class="right" vAlign="top" align="center">
							<a class="img" rel="example_group"  href="/gde_kupit/img/simferopol.jpg"><img src="/gde_kupit/img/simferopol.jpg" style="border:4px solid #fff;margin:0 0 0 15px;"></a>
						</td>
					</tr>
				</table>
				<p id="map">Схема проезда по г. Симферополь:</p>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=hNe_5M5FODgTn53gieLivF69kr2h0GPY&width=100%&height=450&lang=ru_RU&sourceType=constructor"></script>
<?php include '../inc/footer.php'; ?>