<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
   <title>ДЭМИ Нальчик | Адреса магазинов ДЭМИ</title> 
	<meta name="Keywords" content="где купить, контакты, дэми Нальчик, парты дэми" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ в г. Нальчик' /> 
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Нальчик
					</div>
					<h1>Пункт выдачи ДЭМИ  Нальчик</h1>
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td class="left" width="35%" vAlign="top">
								<p><b>Транспортная компания "Звезды транспорта"</b><br>
								Нальчик, ул. Ахохова 190<br>
								Тел: +7 (8662) 77-24-22, +7 (967) 417-96-96</p>
								<p>График работы: Пн - Пт с 9 до 18.</p>
								<br>
								<p>Магазин рядом: <a href="/gde_kupit/pyatigorsk.php">Пятигорск</a></p>
							<td class="right" vAlign="top" style="background:#fff;padding:0 20px;border:1px solid #ccc;">
								<p><b>Условия доставки:</b></p>
								<p>Доставка в г. Нальчик осуществляется после 100% предоплаты за товар. Стоимость доставки Вы оплачиваете при получении в транспортной компании.</p> 
								<p>Стоимость доставки смотрите в разделе <a href="/delivery.php#example">Доставка</a><br>
								Срок доставки 3-5 дней после оплаты.</p>
							</td>
						</tr>
					</table>
					<p id="map">Схема проезда по г. Нальчик:</p>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
					<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=J6Vv04HhG_jLmwmIBndayNQ6VkzENCFa&width=100%&height=450&lang=ru_RU&sourceType=constructor"></script>
<?php include '../inc/footer.php'; ?>