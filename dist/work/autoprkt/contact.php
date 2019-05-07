<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
#   Подключение к БД
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');
#   Выбор из БД
$select_car = "SELECT * FROM car";
$result = mysqli_query($link, $select_car);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Контакты | @autoprkt</title> 
	<meta name="Keywords" content="контакты" /> 
	<meta name="Description" content="@autoprkt - Аренда и прокат автомобилей Infiniti в Краснодаре. Краснодар, ул. Буденного, 2. ТЦ Карнавал" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>	
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
<nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> / Контакты
	</div>	
</nav>
<article id="contact">
	<div class="row">
		<div class="introHolder">
			<h2>Контакты</h2>
		</div>
	</div>
	<div class="row">
		<div class="one-half columns">
    		<img class="logo" src="/img/autoprkt_white.svg">
    		<h6>Аренда и прокат премиум автомобилей в Краснодаре</h6>
			<h3><a href="tel:+79282102335">8 (928) 210-23-35</a></h3>
			<h6><small>Краснодар, ул. Тургенева, 56</small></h6>
			<!-- h6 class="insta"><a href="https://www.instagram.com/autoprkt/" target="_blank"><img src="/img/menu/instagram.svg">autoprkt</a></h6 -->
    	</div>
	</div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/map.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>