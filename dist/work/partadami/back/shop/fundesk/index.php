<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Кресло FunDesk. Каталог, цены, фото. Официальный магазин</title> 
	<meta name="Keywords" content="растущие кресла Fundesk" /> 
	<meta name="Description" content="Детское ортопедическое кресло FunDesk в официальном магазине ДЭМИ. Доставка. Сборка. Гарантия. Официальный дилер." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="section">
		<div class="row error404">
			<h1>Ошибка 404. Страница не найдена.</h1>
			<p>Запрашиваемая страница не найдена. Вернуться на <a href="/">главную</a></p>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/popular.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>		