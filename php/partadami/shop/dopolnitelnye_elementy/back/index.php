<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
	$filter = 'dop';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Дополнительные элементы для парт «ДЭМИ»</title> 
	<meta name="Keywords" content="Дополнительные элементы" /> 
	<meta name="Description" content="Дополнительные элементы для парт «ДЭМИ». Накладки, подставки" />
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Дополнительные элементы для парт «ДЭМИ»
		</div>
	</div>
	<div id="product">
		<h1>Дополнительные элементы</h1>

		<?php	$cyt14 = mysql_query("SELECT * FROM `dopolnitelnye_elementy` WHERE id = '100' "); 
				$row = mysql_fetch_array($cyt14) ?>
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
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=white"><i class="fa fa-square white" aria-hidden="true"></i></a></li>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<?php 	$cyt14 = mysql_query("SELECT * FROM `dopolnitelnye_elementy` WHERE id = '101' "); 
			$row = mysql_fetch_array($cyt14) ?>
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
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_red"><i class="fa fa-square red" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<?php	$cyt14 = mysql_query("SELECT * FROM `dopolnitelnye_elementy` WHERE id = '102' "); 
				$row = mysql_fetch_array($cyt14) ?>
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
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		<?php	$cyt14 = mysql_query("SELECT * FROM `dopolnitelnye_elementy` WHERE id = '103' "); 
				$row = mysql_fetch_array($cyt14) ?>
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
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
		
		<?php	$cyt14 = mysql_query("SELECT * FROM `dopolnitelnye_elementy` WHERE id = '104' "); 
				$row = mysql_fetch_array($cyt14) ?>
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
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_red"><i class="fa fa-square red" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=dop_orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
					</ul>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<!-- Стулья -->
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
	<div id="product">
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
		
		
		<?php	$cyt14 = mysql_query("SELECT * FROM `mealux` WHERE id >= '400'"); 
				while ($row = mysql_fetch_array($cyt14) ) { ?>
		<div class="row  product-list-all">	
			<div class="one-third column  product-list-img center">
				<a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
			</div>
			<div class="two-thirds column  product-list">
				<div itemscope itemtype="http://schema.org/Product">
					<p class="product-header"><a itemprop="url" class="name" href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a></p>
					<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
					<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
					<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
					<?php if($row['model'] == 'Comf-Pro Match') { ?>
					<ul class="color mealux-img">
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_black"><img src="/shop/img/color/mealux/black.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue"><img src="/shop/img/color/mealux/blue.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue2"><img src="/shop/img/color/mealux/blue2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue3"><img src="/shop/img/color/mealux/blue3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue4"><img src="/shop/img/color/mealux/blue4.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue5"><img src="/shop/img/color/mealux/blue5.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green"><img src="/shop/img/color/mealux/green.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green2"><img src="/shop/img/color/mealux/green2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green3"><img src="/shop/img/color/mealux/green3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green4"><img src="/shop/img/color/mealux/green4.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_orange"><img src="/shop/img/color/mealux/orange.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_pink"><img src="/shop/img/color/mealux/pink.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_pink2"><img src="/shop/img/color/mealux/pink2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_pink3"><img src="/shop/img/color/mealux/pink3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red"><img src="/shop/img/color/mealux/red.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red2"><img src="/shop/img/color/mealux/red2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red3"><img src="/shop/img/color/mealux/red3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_yellow"><img src="/shop/img/color/mealux/yellow.jpg"></a></li>
					</ul>
					<?php } elseif($row['model'] == 'Comf-Pro Newton') { ?>
					<ul class="color mealux-img">
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_black"><img src="/shop/img/color/mealux/black.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue"><img src="/shop/img/color/mealux/blue.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue3"><img src="/shop/img/color/mealux/blue3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue4"><img src="/shop/img/color/mealux/blue4.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue5"><img src="/shop/img/color/mealux/blue5.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green"><img src="/shop/img/color/mealux/green.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green2"><img src="/shop/img/color/mealux/green2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green3"><img src="/shop/img/color/mealux/green3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_orange"><img src="/shop/img/color/mealux/orange.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_orange2"><img src="/shop/img/color/mealux/orange2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_pink"><img src="/shop/img/color/mealux/pink.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_pink2"><img src="/shop/img/color/mealux/pink2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_pink3"><img src="/shop/img/color/mealux/pink3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red"><img src="/shop/img/color/mealux/red.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red2"><img src="/shop/img/color/mealux/red2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red3"><img src="/shop/img/color/mealux/red3.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_yellow"><img src="/shop/img/color/mealux/yellow.jpg"></a></li>
					</ul>
					<?php } elseif($row['model'] == 'Comf-Pro Oxford') { ?>
					<ul class="color mealux-img">
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue_oxford"><img src="/shop/img/color/mealux/blue.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_darkblue_oxford"><img src="/shop/img/color/mealux/blue2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red_oxford"><img src="/shop/img/color/mealux/red_oxford.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green_oxford"><img src="/shop/img/color/mealux/green.jpg"></a></li>
					</ul>
					<?php } elseif($row['model'] == 'Champion') { ?>
					<ul class="color mealux-img">
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue_champion"><img src="/shop/img/color/mealux/blue2.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_blue_champion_r"><img src="/shop/img/color/mealux/blue_r.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red_champion"><img src="/shop/img/color/mealux/red_oxford.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_red_champion_r"><img src="/shop/img/color/mealux/red_r.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green_champion"><img src="/shop/img/color/mealux/green.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_green_champion_r"><img src="/shop/img/color/mealux/green_r.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_orange_champion"><img src="/shop/img/color/mealux/orange_champion.jpg"></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php?color=mealux_violet_champion"><img src="/shop/img/color/mealux/violet_champion.jpg"></a></li>
					</ul>
					<?php } ?>
					<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<ul>
							<li><?php 	if ($row['model'] == 'Comf-Pro Match') { 
							echo '<span class="old">&nbsp;21200&nbsp;</span>'; 
								} 
								elseif ($row['model'] == 'Comf-Pro Newton') { 
									echo '<span class="old">&nbsp;19900&nbsp;</span>';
								} 
								elseif ($row['model'] == 'Comf-Pro Oxford') { 
									echo '<span class="old">&nbsp;17500&nbsp;</span>';
								} 
								elseif ($row['model'] == 'Champion') { 
									echo '<span class="old">&nbsp;21990&nbsp;</span>';
								} ?>
							<b><span itemprop="price"><?php echo $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	
	<!-- Полки -->
	
	<?php 	$cyt14 = mysql_query("SELECT * FROM `dopolnitelnye_elementy` WHERE id > '104' and id < '111' "); 
			while( $row = mysql_fetch_array($cyt14) ) { ?>
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
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>.php?color=brown"><i class="fa fa-square brown" aria-hidden="true"></i></a></li>
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