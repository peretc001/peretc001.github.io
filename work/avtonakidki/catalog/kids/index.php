<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');
	
	$category = 'kids';

	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Купить накидки на детское кресло в Краснодаре - АВТОНАКИДКИ.НЕТ</title> 
	<meta name="Keywords" content="купить накидки на детское кресло" /> 
	<meta name="Description" content="Детские накидки для автокресла в наличии в Краснодаре" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / Накидки на детское кресло
	</div>
	<div class="product_list">
		<div class="introHolder">
			<h1>Накидки на детское кресло</h1>
		</div>
		<div class="row">
		<?php 	$product = $db->getAll('SELECT * FROM products WHERE category = ?s', $category);
				#Вывод в 3 колонки
				$count = 0;
				foreach($product as $row) {
					if($count != 0 && $count%3 == 0)
						{ ?>
		
		</div>
		<div class="row">
						<?php $count = 0; } ?>	
			<div class="one-third column" itemscope itemtype="http://schema.org/Product">
				<p><a itemprop="url" href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><span itemprop="name"><?php echo $row['name']; ?> <?php echo $row['color']; ?></span></a></p>
				<a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" itemprop="image"></a>
				<p style="display:none;" itemprop="description">Яркие, красочные меховые накидки для детских автокресел сегодня представляет торговая марка «Филиппок». Интересный дизайн и высокое качество изделий не оставят равнодушными ни детей, ни взрослых.</p>
				<p class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span itemprop="price"><?php echo $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />р.</p>
				<p><a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/" class="button button-buy">Купить</a></p>
			</div>
			<?php $count++;  } ?>
		
		</div>
	</div>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/catalog/inc/more_products.php'); ?>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>