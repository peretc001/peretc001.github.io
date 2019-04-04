<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';


	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Условия проката авто в Краснодаре и крае - @autoprkt</title> 
	<meta name="Keywords" content="условия прокат авто в Краснодаре, условия аренды авто в Краснодаре" /> 
	<meta name="Description" content="Условия проката авто от @autoprkt" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>	
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
<nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> / Условия проката
	</div>	
</nav>
<article id="services">
	<div class="row">
		<div class="introHolder">
			<h2>Условия</h2>
			<p>Автомобиль необходимо вернуть в назначенное время в надлежащем виде и с тем же количетсвом бензина. Автомобиль осматривается только в чистом виде</p>
			<p>Стоимость услуги Мойка - 600 руб, стоимость недостающего количества бензина определяется из расчета 50 рублей за литр.</p>
			<p>В случае задержки сдачи автомобиля до 3-х часов взымается плата 500 руб/час. При задержке более 3-х часов взымается оплата за полные сутки аренды.</p>
			<p>Ответственность за штрафы, полученные в период аренды, возлагаются на Арендатора.</p>
		</div>
	</div>
	<div class="clear"></div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/require.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/howitwork.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/car.php'; ?>




<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/map.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>