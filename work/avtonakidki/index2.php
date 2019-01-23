<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>АВТОНАКИДКИ.НЕТ - купить накидки на сиденья в Краснодаре</title> 
	<meta name="Keywords" content="купить накидки на сиденья, накидки на сиденья автомобиля" /> 
	<meta name="Description" content="Купить накидки на сидения автомобиля в Краснодаре. Автомобильный накидки из овчины, шерсти, алькантары - в наличии." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>

	<div class="header">
		<div class="header__block">
			<div class="four columns first">
				<img src="http://avtonakidki.net/img/catalog/mex/1.jpg" alt="Автомобильные накидки из Меха">
				<p>
					Автомобильные накидки из 
				</p>
			</div>
			<div class="four columns second">
				<img src="http://avtonakidki.net/img/catalog/sheep/2.jpg" alt="Автомобильные накидки из Овчины">
				123
			</div>
			<div class="four columns third">
				<img src="http://avtonakidki.net/img/catalog/alcantara/3.jpg" alt="Автомобильные накидки из Алькантары">
				123
			</div>
		</div>
	</div>
	
	<br>
	<div class="top_products white">
		<div class="introHolder">
			<h1>Автомобильные накидки</h1>
		</div>
		<div class="row">
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "mex" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Меха</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" alt="Накидки из Меха"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "sheep" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Овчины</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" alt="Накидки из Овчины"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "alcantara" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Алькантары</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" alt="Накидки из Алькантары"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
		</div>
		<div class="row">
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "len" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Льна</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" alt="Накидки из Льна"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "velure" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки из Велюра</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" alt="Накидки из Велюра"></a>
				<p class="price">от <span><?php echo $row['price']; ?></span> за шт</p>
			</div>
			<?php $row = $db->getRow('SELECT * FROM products WHERE category = "kids" '); ?>
			<div class="four columns">
				<h3><a href="/catalog/<?php echo $row['category']; ?>/">Накидки Детские</a></h3>
				<a href="/catalog/<?php echo $row['category']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" alt="Накидки Детские"></a>
				<p class="price"><span><?php echo $row['price']; ?></span> за шт</p>
			</div>
		</div>
		<div class="row text">
			<p>Известно, что в процессе эксплуатации автомобиля сиденья пачкаются довольно сильно, а это приводит к ухудшению их внешней привлекательности и функциональности. Поэтому автовладельцы всегда стараются найти оптимальный способ решения данной проблемы: приобрести накидки на сиденья автомобиля из меха или овчины.</p>
			<p>Автомобильные накидки позволяют сохранить внешнюю привлекательность автомобильных сидений и предотвратить возникновение на их поверхности потёртостей и различных несмываемых пятен. Для каждой модели транспортного средства в настоящее время можно выбрать отличные накидки для сидений, учитывая особенности сезона и предпочтения автовладельца. Так как они имеют универсальные крепления и подходя для любого авто.</p>
			<p>В нашем интернет-магазине представлено множество вариантов накидок из овчины, меха, шерсти, алькантары, предназначенных для защиты автомобильных кресел от внешнего воздействия. К примеру, накидки из меха или овчины отлично подходят в зимний период. Они позволят вам комфортно чувствовать себя в салоне.</p>
			<p>Нужно отметить, что накидки значительно увеличивают срок использования автомобильных кресел, способствуя снижению расходов автовладельца на их обслуживание.  Эти изделия легко надеваются на сиденья и снимаются, а также их можно почистить или постирать.</p>
		</div>
	</div>

<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php');	?>
</body>
</html>
