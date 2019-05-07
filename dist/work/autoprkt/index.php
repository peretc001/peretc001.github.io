<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';


	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Прокат премиум авто без водителя в Краснодаре | @autoprkt</title> 
	<meta name="Keywords" content="прокат авто краснодар, аренда авто краснодар, прокат авто без водителя" />
	<meta name="Description" content="Autoprkt - прокат автомобилей марки Infiniti без водителя в Краснодаре. Подача/возврат по Краснодару и краю." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
<header>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
<article id="home_page">
	<div class="row center">
		<img src="/img/home.jpg" alt="Прокат / аренда премиум авто в Краснодаре">
		<h1>Аренда премиум авто в Краснодаре</h1>
		<p>Аренда премиум авто, сочетающих в себе высокое качество, мощный двигатель и комфорт.<br>Подача и возврат по Краснодару и краю.</p>
	</div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/car.php'; ?>   
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/require.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/howitwork.php'; ?>



<article id="section">
	<Div class="widget w5_title_widget">
		<div class="introHolder">
			<h2>8 причин взять авто на прокат</h2>
			<p>Самые частые причины аренды премиум авто в Краснодаре.</p>
		</div>
		<div class="blocksHolder clearfix">
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/1.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">на море</span>
				<img src="http://autoprkt.ru/img/blocksHolder/1.jpg" alt="Shop for Mid Century Modern Sofas"/>
			</a>
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/2.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">в горы</span>
				<img src="http://autoprkt.ru/img/blocksHolder/2.jpg" alt="Shop for Mid Century Modern Chairs"/>
			</a>
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/3.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">в командировку</span>
				<img src="http://autoprkt.ru/img/blocksHolder/3.jpg" alt="Shop for Mid Century Modern Sectionals"/>
			</a>	
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/4.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">на свидание</span>
				<img src="http://autoprkt.ru/img/blocksHolder/4.jpg" alt="Shop for Mid Century Modern Storage Furniture"/>
			</a>
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/5.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">на время тюнинга / ремонта</span>
				<img src="http://autoprkt.ru/img/blocksHolder/5.jpg" alt="Shop for Mid Century Modern Beds"/>
			</a>
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/6.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">в путешествие</span>
				<img src="http://autoprkt.ru/img/blocksHolder/6.jpg" alt="Shop for Mid Century Modern Sectionals"/>
			</a>	
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/7.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">в аэропорт</span>
				<img src="http://autoprkt.ru/img/blocksHolder/7.jpg" alt="Shop for Mid Century Modern Storage Furniture"/>
			</a>
			<a class="block" style="background-image:url(http://autoprkt.ru/img/blocksHolder/8.jpg)">
				<span class="block_overlay"></span>
				<span class="block_title">на тест-драйв</span>
				<img src="http://autoprkt.ru/img/blocksHolder/5.jpg" alt="Shop for Mid Century Modern Beds"/>
			</a>
		</div>
	</div>
	<div class="clear"></div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/map.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>

<script src="/js/bootstrap/dist/js/bootstrap.offcanvas.min.js"></script>
  