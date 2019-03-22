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
	
	<!--div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Детские кресла Fundesk
		</div>
	</div>
	<div id="product">
		<h1>Детские кресла Fundesk</h1>		
		
		<div class="row  product-list-all">	
		<?php	$cyt14 = mysql_query("SELECT * FROM `fundesk` WHERE id = '281' "); 
				$row = mysql_fetch_array($cyt14) ?>
			<div class="one-third column  product-list-img center">
				<a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_fundesk_<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
			</div>
			<div class="two-thirds column  product-list">
				<div itemscope itemtype="http://schema.org/Product">
					<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_fundesk_<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
					<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
					<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
					<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
					<ul class="color">
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_fundesk_<?php echo $row['url']; ?>.php?color=fundesk_pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_fundesk_<?php echo $row['url']; ?>.php?color=fundesk_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li> 
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_fundesk_<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div-->
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>		