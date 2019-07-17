<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Эргономичные стулья ДЭМИ - Официальный интернет-магазин</title> 
	<meta name="Keywords" content="стул дэми, эргономичный стул, растущий стул" /> 
	<meta name="Description" content="Растущий стул «ДЭМИ» со склада в Краснодаре. Доставка. Сборка. Гарантия 5 лет. Официальный дилер." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Стулья и кресла
		</div>
	</div>
	<div id="product">
		<h1>Стулья и кресла</h1>

		<?php $cyt14 = mysql_query("SELECT * FROM `ergonomichnyj_stul` WHERE id = '96' "); 
			$row = mysql_fetch_array($cyt14)?>
		<div class="row product-list-all">
			<div class="one-third column  product-list-img center">
				<a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
			</div>
			
			<div class="two-thirds column  product-list">
				<div itemscope itemtype="http://schema.org/Product">
					<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
					<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
					<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
					<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
					<ul class="color">
						<li><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php"><i class="fa fa-square white" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php?color=cyt_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php?color=cyt_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php?color=cyt_pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php?color=cyt_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php?color=cyt_green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php?color=cyt_orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="product" class="grey">
		<div class="row">
		<?php 	$cyt14 = mysql_query("SELECT * FROM `ergonomichnyj_stul` WHERE id = '97' "); 
				$row = mysql_fetch_array($cyt14) ?>
			<div class="one-half column">								
				<div class="one-third column  product-list-img center">
					<a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php"><img class="product-img" src="/shop/img/cyt02/oxford.png" alt="<?php echo $row['desc']; ?>"></a>
				</div>
				<div class="two-thirds column  product-list">
					<div itemscope itemtype="http://schema.org/Product">
						<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
						<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
						<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
						<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
						<ul class="color">
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php?color=cyt_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php?color=cyt_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php?color=cyt_pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php?color=cyt_red"><i class="fa fa-square red" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php?color=cyt_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php?color=cyt_green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php?color=cyt_orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
						</ul>
						<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<ul>
								<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
								<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_oxford.php">подробнее</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<?php 	$cyt14 = mysql_query("SELECT * FROM `ergonomichnyj_stul` WHERE id = '98' "); 
					$row = mysql_fetch_array($cyt14) ?>
			<div class="one-half column">								
				<div class="one-third column  product-list-img center">
					<a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php"><img class="product-img" src="http://www.partadami.ru/shop/img/cyt02/zamsha.png" alt="<?php echo $row['desc']; ?>"></a>
				</div>
				<div class="two-thirds column  product-list">
					<div itemscope itemtype="http://schema.org/Product">
						<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
						<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
						<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
						<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
						<ul class="color">
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php?color=cyt_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php?color=cyt_pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php?color=cyt_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php?color=cyt_green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php?color=cyt_orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
						</ul>
						<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<ul>
								<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
								<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/chehol_na_stul_zamsha.php">подробнее</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>		