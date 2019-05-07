<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
	$package = htmlspecialchars(trim($_GET['package']));
	if ($package == '') {$package = 'tumby_i_stellazhi'; }
	?>
<!DOCTYPE html>
<html>
<head>
    <title>Тумбы и Стеллажи ДЭМИ - Официальный интернет-магазин</title> 
	<meta name="Keywords" content="тумба дэми, выкатная тумба, тумба с ящиками" /> 
	<meta name="Description" content="Тумбы и Стеллажи «ДЭМИ» со склада в Краснодаре. Доставка. Сборка. Гарантия 5 лет. Официальный дилер." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Тумбы и Стеллажи ДЭМИ 
		</div>
	</div>
	<div id="product">
		<h1>Тумбы и Стеллажи ДЭМИ </h1>
		<ul class="picture">
			<?php if ($package == '' or $package == 'tumby_i_stellazhi') { ?>
				<li>Без рисунка</li>
				<li>|</li>
				<li class="href"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?package=tumby_i_stellazhi_with_picture">С рисунком</a></li>
			<?php } 
				else { ?>
				<li class="href"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?package=tumby_i_stellazhi">Без рисунка</a></li>
				<li>|</li>
				<li>С рисунком</li>
			<?php } ?>
		</ul>
						
		<?php	$cyt14 = mysql_query("SELECT * FROM ". $package  ." WHERE id <= 79 "); 
				while( $row = mysql_fetch_array($cyt14) ) {  ?>
		<div class="row product-list-all">
			<div class="one-third column  product-list-img center">
				<a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
			</div>
			
			<div class="two-thirds column  product-list">
				<div itemscope itemtype="http://schema.org/Product">
					<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
					<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
					<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
					<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
					<ul class="color">
						<?php if ($package == '' or $package == 'tumby_i_stellazhi') { ?>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_brown"><i class="fa fa-square brown" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_white_grey"><i class="fa fa-square white" aria-hidden="true"></i></a></li>
						<?php } else { ?>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_greyf"><img src="/shop/img/color/color_kfr.png" alt="Клен / Фрегат" title="Клен / Фрегат"></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_greyc"><img src="/shop/img/color/color_kcv.png" alt="Клен / Цвета" title="Клен / Цветы"></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_brownf"><img src="/shop/img/color/color_yfr.png" alt="Ябл / Фрегат" title="Ябл / Фрегат"></a></li>
						<?php } ?>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $row['price']; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>		
				
		<?php } 	$cyt14 = mysql_query("SELECT * FROM ". $package ." WHERE id > 79 and id < 86" ); 
					while( $row = mysql_fetch_array($cyt14) ) {  ?>
		<div class="row product-list-all">
			<div class="one-third column  product-list-img center">
				<a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
			</div>
			
			<div class="two-thirds column  product-list">
				<div itemscope itemtype="http://schema.org/Product">
					<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
					<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
					<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
					<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
					<ul class="color">
						<?php if ($package == '' or $package == 'tumby_i_stellazhi') { ?>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_brown"><i class="fa fa-square brown" aria-hidden="true"></i></a></li>
						<?php } else { ?>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_greyf"><img src="/shop/img/color/color_kfr.png" alt="Клен / Фрегат" title="Клен / Фрегат"></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_greyc"><img src="/shop/img/color/color_kcv.png" alt="Клен / Цвета" title="Клен / Цветы"></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=tyv_brownf"><img src="/shop/img/color/color_yfr.png" alt="Ябл / Фрегат" title="Ябл / Фрегат"></a></li>
						<?php } ?>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $row['price']; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>	