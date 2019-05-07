<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';


	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Каталог прокатных автомобилей Infiniti | @autoprkt</title> 
	<meta name="Keywords" content="прокат авто в Краснодаре, аренда авто в Краснодаре" /> 
	<meta name="Description" content="На данной странице представлен наш парк автомобилей Infiniti, сдаваемых в аренду / прокат без водителя в Краснодаре | @autoprkt" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>	
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/car.php'; ?>   
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/require.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/howitwork.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/map.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>