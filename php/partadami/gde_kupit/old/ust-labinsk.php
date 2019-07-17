<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>ДЭМИ Усть-Лабинск | Адреса магазинов ДЭМИ</title> 
	<meta name="Keywords" content="где купить, контакты, дэми Усть-Лабинск, парты дэми" /> 
	<meta name="Description" content='Адреса магазинов ДЭМИ в г. Усть-Лабинск' /> 
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
						<a href="/">Главная</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/gde_kupit/">Где купить</a>&nbsp;&nbsp;|&nbsp;&nbsp;Усть-Лабинск
					</div>
					<h2>ДЭМИ Усть-Лабинск</h2>
					<a class="img" rel="example_group"  href="/gde_kupit/img/ust-labinsk.jpg"><img src="/gde_kupit/img/ust-labinsk_small.jpg" style="border:4px solid #fff;margin:0 5px;"></a>
					<p><b>Магазин "ЗЕБРА"</b><br>
					352330, г. Усть-Лабинск, ул. Красная, 221, 2 этаж<br>
					Тел: +7 (918) 465-25-75<br>
					График работы: Пн - Вс с 9 до 18.</p>
					<p id="map">Схема проезда по г. Усть-Лабинск:</p>
					<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
					<script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=oPy-PKLvE-KGJIEZqg1MKPfIoobSbF2o&width=600&height=450"></script>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php include '../inc/footer.php'; ?>