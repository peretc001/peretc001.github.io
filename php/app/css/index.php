<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');
	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Страница не найден | АВТОНАКИДКИ.НЕТ</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>

	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <span itemprop="title">Страница не найден</span>
	</div>
	
	<div class="error_404">
		<div class="introHolder">
			<h2>Ошибка 404</h2>
			<p>Страница не найдена</p>
		</div>
		<img src="/img/404.svg">
	</div>

	<div class="top_products white">
		<div class="introHolder">
			<h1>Каталог</h1>
		</div>
		<div class="row">
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "mex" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Меха</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "sheep" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Овчины</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "alcantara" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Алькантары</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
		</div>
		<div class="row">
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "len" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Льна</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "velure" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Велюра</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "kids" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки Детские</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
		</div>
	</div>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php');	?>
</body>
</html>