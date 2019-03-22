<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ДЭМИ Анапа | Адреса магазинов ДЭМИ</title> 
	<meta name="Keywords" content="где купить, контакты, дэми анапа, парты дэми" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ в г. Анапа' /> 
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Анапа
					</div>
					<h2>ДЭМИ Анапа</h2>
					<table cellspacing="0" cellpadding="0" border="0">
					<tr>
						<td vAlign="top">
							<a class="img" href="/gde_kupit/img/anapa1.jpg"><img src="/gde_kupit/img/anapa1_small.jpg" style="border:4px solid #fff;margin:0 5px;"></a>
							<p><b>Салон мебели "Мебель Лео"</b><br>
							353450, г. Анапа, ул. Омелькова, 32.<br>
							353450, г. Анапа, ул. Солдатских матерей 17/6.<br>
							Тел: +7 (918) 43-60-805</p>
						</td>
						<td width="100px"></td>
						<td vAlign="bottom">
							
						</td>
					</tr>
				</table>
				<p id="map">Схема проезда по г. Анапа:</p>
				<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
				<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=FxwXbE1QSllXXTRwGeGdp5Ma4bwXduji&width=600&height=450"></script>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php include '../inc/footer.php'; ?>