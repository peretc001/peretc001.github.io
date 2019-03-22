<?php session_start(); 
echo '<script language="JavaScript">window.location.href = "/gde_kupit/volgograd.php"</script>';?>
<!DOCTYPE html>
<html>
<head>
    <title>ДЭМИ Волжский | Пунт выдачи ДЭМИ</title> 
	<meta name="Keywords" content="где купить, контакты, дэми Волжский, пункт выдачи" /> 
	<meta name="Description" content='Пункт выдачи ДЭМИ в г. Волжский' /> 
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Волжский
					</div>
					<h1>Пункт выдачи ДЭМИ Волжский</h1>
					<table cellspacing="0" cellpadding="0" border="0" width="100%">
						<tr>
							<td class="left" width="35%" vAlign="top">
								<p><b>Транспортная компания "ПЭК"</b><br>
								404130, Волжский, ул. 6-я Автодорога, 31В<br>
								Тел: +7 (8443) 21-01-10</p>
								<p>График работы: Пн - Пт с 9 до 18, Сб с 10 до 16.</p>
							<td class="right" vAlign="top" style="background:#fff;padding:0 20px;border:1px solid #ccc;">
								<p><b>Условия доставки:</b></p>
								<p>Доставка в г. Волжский осуществляется после 100% предоплаты за товар. Стоимость доставки Вы оплачиваете при получении в транспортной компании.</p> 
								<p>Стоимость доставки смотрите в разделе <a href="/delivery.php">Доставка</a><br>
								Срок доставки 2-3 дня после оплаты.</p>
							</td>
						</tr>
					</table>
					<p id="map">Схема проезда по г. Волжский:</p>
					<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=6yXYB5MugnypfcYSXg5GpgcZ2msvYpRY&width=600&height=450"></script>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php include '../inc/footer.php'; ?>