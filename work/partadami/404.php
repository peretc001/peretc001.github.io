<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Страница не найдена</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Ошибка 404
		</div>
	</div>
	<div id="section">
		<div class="row error404">
			<h1>Ошибка 404. Страница не найдена.</h1>
			<p>Запрашиваемая страница не найдена. Вернуться на <a href="/">главную</a></p>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/popular.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>