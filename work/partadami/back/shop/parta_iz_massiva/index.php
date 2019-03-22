<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';

	$art = htmlspecialchars(trim($_GET['art']));			if ($art == '') {$art = '14'; }
	$package = htmlspecialchars(trim($_GET['package'])); 	if ($package == '') {$package = 'parta_0_stul'; } 

	$title = mysql_query("SELECT * FROM ". $package ." WHERE category = 'parta_iz_massiva' and art = '$art' ORDER by id asc "); 
	$query = mysql_fetch_assoc($title); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Парты ДЭМИ из МАССИВА Березы - Официальный интернет-магазин</title> 
	<meta name="Keywords" content="парта из массива, парта из березы" /> 
	<meta name="Description" content="Растущие парты из массива березы со склада в Краснодаре. Доставка. Сборка. Гарантия 5 лет. Официальный дилер." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Парты «ДЭМИ» из МАССИВА Березы
		</div>
	</div>
	<div id="product">
		<h1>ПАРТЫ «ДЭМИ» из МАССИВА Березы</h1>
		<div class="row">
			<ul class="filterM">
				<li><a href="#filter_mobile" data-uk-offcanvas class="button"><i class="fa fa-filter" aria-hidden="true"></i> <span>Фильтр</span></a></li>
				<li><?php 	if ($package == 'parta_0_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Без стула</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=<?php echo $art; ?>&package=parta_0_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a><?php } ?></li>
				<li><?php 	if ($package == '' or $package == 'parta_1_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Со стулом</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=<?php echo $art; ?>&package=parta_1_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом</a><?php } ?></li>
			</ul>
			<div class="one-third column filter">
				<h3>Фильтр</h3>
				<p class="package">Комплектация:</p>
				<ul class="package">
					<li><?php 	if ($package == 'parta_0_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Без стула</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=<?php echo $art; ?>&package=parta_0_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a><?php } ?></li>
					<li><?php 	if ($package == '' or $package == 'parta_1_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Со стулом СУТ.01-01</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=<?php echo $art; ?>&package=parta_1_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом СУТ.01-01</a><?php } ?></li>
				</ul>
				<p class="model">Модель:</p>
				<ul class="model">
					<li><?php 	if ($art == '' or $art == '14') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.14-10</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=14<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.14-10</a><?php } ?><br><span><i class="fa fa-expand" aria-hidden="true"></i> 75х55 см</span></li>
					<li><?php 	if ($art == '17') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.17-14</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=17<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.17-14</a><?php } ?><br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см (две столешницы)</span></li>
				</ul>
			</div>
			<div class="two-thirds column list-product">
				<?php 	$cyt14 = mysql_query("SELECT * FROM ". $package ." WHERE category = 'parta_iz_massiva' and art = '$art' "); 
					while( $row = mysql_fetch_array($cyt14) ) {
				?><div class="row product-list-all">
					<div class="one-third column  product-list-img center">
						<?php if ($package == 'parta_0_stul') { ?>
							<a href="/shop/<?php echo $row['category']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/parta_bez_stula/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
						<?php } elseif ($package == '' or $package == 'parta_1_stul') { ?>
							<a href="/shop/<?php echo $row['category']; ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt01-01.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
						<?php } ?>
					</div>
					<div class="two-thirds column  product-list">
						<div itemscope itemtype="http://schema.org/Product">
						<p class="product-header"><?php 
							if ($package == 'parta_0_stul') { ?>
							<a itemprop="url" href="/shop/<?php echo $row['category']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a>
						<?php } elseif ($package == '' or $package == 'parta_1_stul') { ?>
							<a itemprop="url" href="/shop/<?php echo $row['category']; ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt01-01.php"><span itemprop="name"><?php echo $row['name']; ?></span></a>
						<?php } ?></p>
						<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
						<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
						<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
						<ul class="color">
							<li><a href="/shop/<?php echo $row['category']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
						</ul>
						<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<ul>
								<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
								<!--font color="red"><strike>&nbsp;<?php echo $row['price']; ?>&nbsp;</strike></font--!> 
								<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php">подробнее</a></li>
							</ul>
						</div>
					</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div id="tyv">
			<div class="row">
			<?php 	$cyt14 = mysql_query("SELECT * FROM `parta_1_stul` WHERE id = '77' "); 
					$row = mysql_fetch_array($cyt14) ?>
				<div class="one-half column">								
					<div class="one-third column  product-list-img center">
						<a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
					</div>
					<div class="two-thirds column  product-list">
						<div itemscope itemtype="http://schema.org/Product">
							<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
							<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
							<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
							<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
							<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<ul>
									<li><b><span itemprop="price"><?php echo $row['price']; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
									<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			<?php 	$cyt14 = mysql_query("SELECT * FROM `parta_1_stul` WHERE id = '78' "); 
					$row = mysql_fetch_array($cyt14) ?>
				<div class="one-half column">								
					<div class="one-third column  product-list-img center">
						<a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
					</div>
					<div class="two-thirds column  product-list">
						<div itemscope itemtype="http://schema.org/Product">
							<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
							<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
							<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
							<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
							<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<ul>
									<li><b><span itemprop="price"><?php echo $row['price']; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
									<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="filter_mobile" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">
			<div class="u-pull-right close"><a class="close_bar"><i class="fa fa-times" aria-hidden="true"></i></a></div>
			<div class="filter">
				<p class="package">Комплектация:</p>
				<ul class="package">
					<li><?php 	if ($package == 'parta_0_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Без стула</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=<?php echo $art; ?>&package=parta_0_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a><?php } ?></li>
					<li><?php 	if ($package == '' or $package == 'parta_1_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Со стулом СУТ.01-01</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=<?php echo $art; ?>&package=parta_1_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом СУТ.01-01</a><?php } ?></li>
				</ul>
				<p class="model">Модель:</p>
				<ul class="model">
					<li><?php 	if ($art == '' or $art == '14') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.14-10</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=14<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.14-10</a><?php } ?><br><span><i class="fa fa-expand" aria-hidden="true"></i> 75х55 см</span></li>
					<li><?php 	if ($art == '17') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.17-14</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=17<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.17-14</a><?php } ?><br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см (две столешницы)</span></li>
				</ul>
				<p class="weight">Столешница:</p>
				<ul class="weight">
					<li><?php 	if ($art == '' or $art == '14') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>75х55 см</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=14<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> 75х55 см</a><?php } ?></li>
					<li><?php 	if ($art == '17') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>120х55 см (две столешницы)</b>'; } else { ?><a href="/shop/parta_iz_massiva/index.php?art=17<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> 120х55 см (две столешницы)</a><?php } ?></li>
				</ul>
			</div>				
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/more_models.php'; ?>	
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>		