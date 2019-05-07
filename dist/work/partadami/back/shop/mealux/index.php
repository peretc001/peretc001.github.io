<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Детские кресла Mealux. Каталог, цены, фото. Официальный магазин</title> 
	<meta name="Keywords" content="детское кресло, эргономичное кресло" /> 
	<meta name="Description" content="Независимая регулировка высоты спинки и сиденья позволит правильно отрегулировать детское кресло под фигуру ребенка" /> 
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
<?php include '../../inc/footer.php'; ?>	