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
    <title>Страница не найдена</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>	
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
<nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> / Ошибка 404
	</div>	
</nav>
<article id="error404">
	<div class="row">
		<h1>Ошибка 404</h1>
		<p>Запрашиваемая страница не найдена. Вернуться на <a href="/">главную</a></p>
		<p><img src="/img/404.svg"></p>
	</div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>