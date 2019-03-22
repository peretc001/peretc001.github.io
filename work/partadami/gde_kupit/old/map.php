<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Адреса магазинов ДЭМИ на карте</title> 
	<meta name="Keywords" content="контакты, краснодар, новороссийск, сочи, армавир, геленджик" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ на карте' /> 
	<?php include '../inc/header.php'; ?>
	<?php include '../inc/config.php'; ?><script type="text/javascript" src="/js/fancybox/code.js"></script>
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;Где купить
					</div>
					<h2>Адреса магазинов «ДЭМИ»:</h2>
					<ul class="map">
						<li><a href="/gde_kupit/">Список</a></li>
						<li class="active">Карта</li>
					</ul>
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=x76Kourste0cu0eoOhe5ad3B0HtNTDLB&width=100%&height=600"></script>
<?php include '../inc/footer.php'; ?>