<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ДЭМИ Ставрополь | Адреса магазинов ДЭМИ</title> 
	<meta name="Keywords" content="где купить, контакты, дэми Ставрополь, парты дэми" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ в г. Ставрополь' /> 
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Ставрополь
					</div>
					<h2>ДЭМИ Ставрополь</h2>
					<table width="100%">
						<tr>
							<td style="padding:0 20px 0 0;">
								<p><b>Магазин канцелярских товаров "ПИОНЕР"</b><br>
								355002, г. Ставрополь, ул. Пушкина, 42.
								<br>Торговое место 1<br>
								Тел: +7 (905) 461-48-37</p>
								<p>График работы:</p>
								<ul style="list-style:none;">
									<li>Понедельник: с 9-00 до 16-00.</li>
									<li>Вторник - Воскресенье: с 9-00 до 18-00.</li>
								</ul>
							</td>
							<td><a class="img" href="/gde_kupit/img/stavropol1.jpg"><img src="/gde_kupit/img/stavropol1_small.jpg" style="border:4px solid #fff;margin:0 5px;"></a></td>
							<td><a class="img" href="/gde_kupit/img/stavropol2.jpg"><img src="/gde_kupit/img/stavropol2_small.jpg" style="border:4px solid #fff;margin:0 5px;"></a></td>
						</tr>
					</table>
					<p id="map">Схема проезда по г. Ставрополь:</p>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=cKbRF9co6Gde28x28wzPxzkhbqHyArRR&width=100%&height=450&lang=ru_RU&sourceType=constructor&scroll=false"></script>
<?php include '../inc/footer.php'; ?>