<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Сертификаты на детскую мебель ДЭМИ</title> 
	<meta name="Keywords" content="Сертификаты на детскую мебель ДЭМИ" /> 
	<meta name="Description" content="Сертификаты на детскую мебель ДЭМИ" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php $enable_gallary = 'yes';
		include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Сертификаты на детскую мебель «ДЭМИ»
		</div>
	</div>
	<div id="section" class="gallery">
		<h1>Сертификаты</h1>
		
		<div class="row">
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/1.jpg"><img src="/doc/certificate/1.jpg" alt=""></a>
			</div>
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/2.jpg"><img src="/doc/certificate/2.jpg" alt=""></a>
			</div>
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/3.jpg"><img src="/doc/certificate/3.jpg" alt=""></a>
			</div>
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/4.jpg"><img src="/doc/certificate/4.jpg" alt=""></a>
			</div>
		</div>
		<div class="row bottom">
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/5.jpg"><img src="/doc/certificate/5.jpg" alt=""></a>
			</div>
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/6.jpg"><img src="/doc/certificate/6.jpg" alt=""></a>
			</div>
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/7.jpg"><img src="/doc/certificate/7.jpg" alt=""></a>
			</div>
			<div class="three columns img-col-x4">
				<a href="/doc/certificate/8.jpg"><img src="/doc/certificate/8.jpg" alt=""></a>
			</div>
		</div>
		
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>