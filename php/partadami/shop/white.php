<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';

	$art = htmlspecialchars(trim($_GET['art']));			if ($art == '') {$art = '24'; }
	$package = htmlspecialchars(trim($_GET['package']));	if ($package == '') {$package = 'parta_0_white'; }

	$title = mysql_query("SELECT * FROM ". $package ." WHERE art = '$art' ORDER by id asc "); 
	$query = mysql_fetch_assoc($title); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Белые парты ДЕМИ от <?php echo $query['price']; ?> рублей. Каталог, цены, фото. Официальный магазин</title> 
	<meta name="Keywords" content="белая парта, белые парты дэми, интернет-магазин парт" /> 
	<meta name="Description" content="Растущие белые парты со стулом «ДЭМИ» в официальном магазине ДЭМИ. Доставка. Сборка. Гарантия 5 лет. Официальный дилер." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Белые парты «ДЭМИ»
		</div>
	</div>
	<div id="product">
		<h1>БЕЛЫЕ ПАРТЫ «ДЭМИ»</h1>
		
		<div class="row">
			<div class="wrap"><a href="/shop/techno/cyt31/parta_cyt31-04_so_stulom_cyt02-01.php"><img src="/shop/img/31/cyt31.jpg"></a></div>
		</div>
		<div class="row">
			<ul class="filterM">
				<li><a href="#filter_mobile" data-uk-offcanvas class="button"><i class="fa fa-filter" aria-hidden="true"></i> <span>Фильтр</span></a></li>
				<li><?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Без стула</b>'; } else { ?><a href="/shop/white.php?art=<?php echo $art; ?>&package=<?php if($package == 'parta_1_white') { echo 'parta_0_white'; } else { echo 'parta_0_techno'; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a><?php } ?></li>
				<li><?php 	if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Со стулом</b>'; } else { ?><a href="/shop/white.php?art=<?php echo $art; ?>&package=<?php if($package == 'parta_0_white') { echo 'parta_1_white'; } else { echo 'parta_1_techno'; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом</a><?php } ?></li>
			</ul>
			<div class="one-third column filter">
				<h3>Фильтр</h3>
				<p class="package">Комплектация:</p>
				<ul class="package">
					<li><?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Без стула</b>'; } else { ?><a href="/shop/white.php?art=<?php echo $art; ?>&package=<?php if($package == 'parta_1_white') { echo 'parta_0_white'; } else { echo 'parta_0_techno'; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a><?php } ?></li>
					<li><?php 	if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Со стулом СУТ.02-01</b>'; } else { ?><a href="/shop/white.php?art=<?php echo $art; ?>&package=<?php if($package == 'parta_0_white') { echo 'parta_1_white'; } else { echo 'parta_1_techno'; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом СУТ.02-01</a><?php } ?></li>
				</ul>
				<p class="model">Модель:</p>
				<ul class="model">
					<li><?php 	if ($art == '' or $art == '24') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.24</b>'; } else { ?><a href="/shop/white.php?art=24<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_white"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_white"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.24</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 75х55 см</span></li>
					<li><?php 	if ($art == '25') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.25</b>'; } else { ?><a href="/shop/white.php?art=25<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_white"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_white"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.25</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см (две столешницы)</span></li>
					<li><?php 	if ($art == '26') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.26</b>'; } else { ?><a href="/shop/white.php?art=26<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_techno"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_techno"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.26</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 80х55 см</span></li>
					<li><?php 	if ($art == '31') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.31</b>'; } else { ?><a href="/shop/white.php?art=31<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_techno"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_techno"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.31</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см (две столешницы)</span></li>
				</ul>
			</div>
			<div class="two-thirds column list-product">
				<?php 	$cyt24 = mysql_query("SELECT * FROM ". $package ." WHERE art = '$art' "); 
					while( $row = mysql_fetch_array($cyt24) ) {
				?><div class="row product-list-all">
					<div class="one-third column  product-list-img center">
						<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno' ) { ?>
							<a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/parta_bez_stula/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
						<?php } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { ?>
							<a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt02-01.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
						<?php } ?>
					</div>
					<div class="two-thirds column  product-list">
						<div itemscope itemtype="http://schema.org/Product">
						<p class="product-header"><?php 
							if ($package == 'parta_0_white' or $package == 'parta_0_techno') { ?>
							<a itemprop="url" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a>
						<?php } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { ?>
							<a itemprop="url" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt02-01.php"><span itemprop="name"><?php echo $row['name']; ?></span></a>
						<?php } ?></p>
						<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
						<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
						<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
						<ul class="color">

							<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "_so_stulom_cyt02-01"; } ?>.php?color=white_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "_so_stulom_cyt02-01"; } ?>.php?color=white_red"><i class="fa fa-square red" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "_so_stulom_cyt02-01"; } ?>.php?color=white_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "_so_stulom_cyt02-01"; } ?>.php?color=white_green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
							<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "_so_stulom_cyt02-01"; } ?>.php?color=white_orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
						</ul>
						<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<ul>
								<li><b><span itemprop="price"><?php $lpr = $row['price'];
										echo round($lpr, 0); ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
								<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "_so_stulom_cyt02-01"; } ?>.php">подробнее</a></li>
							</ul>
						</div>
					</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div id="filter_mobile" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">
			<div class="u-pull-right close"><a class="close_bar"><i class="fa fa-times" aria-hidden="true"></i></a></div>
			<div class="filter">
				<p class="package">Комплектация:</p>
				<ul class="package">
					<li><?php 	if ($package == '' or $package == 'parta_0_white' or $package == 'parta_0_techno') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Без стула</b>'; } else { ?><a href="/shop/white.php?art=<?php echo $art; ?>&package=<?php if($package == 'parta_1_white') { echo 'parta_0_white'; } else { echo 'parta_0_techno'; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a><?php } ?></li>
					<li><?php 	if ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Со стулом СУТ.02-01</b>'; } else { ?><a href="/shop/white.php?art=<?php echo $art; ?>&package=<?php if($package == 'parta_0_white') { echo 'parta_1_white'; } else { echo 'parta_1_techno'; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом СУТ.02-01</a><?php } ?></li>
				</ul>
				<p class="model">Модель:</p>
				<ul class="model">
					<li><?php 	if ($art == '' or $art == '24') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.24</b>'; } else { ?><a href="/shop/white.php?art=24<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_white"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_white"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.24</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 75х55 см</span></li>
					<li><?php 	if ($art == '25') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.25</b>'; } else { ?><a href="/shop/white.php?art=25<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_white"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_white"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.25</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см (две столешницы)</span></li>
					<li><?php 	if ($art == '26') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.26</b>'; } else { ?><a href="/shop/white.php?art=26<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_techno"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_techno"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.26</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 80х55 см</span></li>
					<li><?php 	if ($art == '31') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.31</b>'; } else { ?><a href="/shop/white.php?art=31<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_techno"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_techno"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.31</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см (две столешницы)</span></li>
				</ul>
				<p class="weight">Столешница:</p>
				<ul class="weight">
					<li><?php 	if ($art == '' or $art == '24') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>75х55 см</b>'; } else { ?><a href="/shop/white.php?art=24<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_white"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_white"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> 75х55 см</a><?php } ?></li>
					<li><?php 	if ($art == '25') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>120х55 см (две столешницы)</b>'; } else { ?><a href="/shop/white.php?art=25<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_white"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_white"; } ?>"><i class="fa fa-square-o" aria-hidden="true"></i> 120х55 см (две столешницы)</a><?php } ?></li>
					<li><?php 	if ($art == '26') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>80х55 см</b>'; } else { ?><a href="/shop/white.php?art=26<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_techno"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_techno"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> 80х55 см</a><?php } ?></li>
					<li><?php 	if ($art == '31') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>120х55 см (две столешницы)</b>'; } else { ?><a href="/shop/white.php?art=31<?php 	if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo "&package=parta_0_techno"; } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { echo "&package=parta_1_techno"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> 120х55 см (две столешницы)</a><?php } ?></li>
				</ul>
			</div>				
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/more_models.php'; ?>	
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>		