<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';

	$art = htmlspecialchars(trim($_GET['art']));			if ($art == '' or $art == '13' or $art == '15' or $art == '28' or $art == '29') {$art = '41'; }
	$package = htmlspecialchars(trim($_GET['package'])); 	if ($package == '') {$package = 'parta_0_stul'; } 

	$title = mysql_query("SELECT * FROM ". $package ." WHERE category = 'parta_bez_risunka' and art = '$art' ORDER by id asc "); 
	$query = mysql_fetch_assoc($title); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Парты ДЕМИ от <?php echo $query['price']; ?> рублей. Каталог, цены, фото. Официальный магазин</title> 
	<meta name="Keywords" content="парта со стулом, интернет-магазин парт, растущая парта" /> 
	<meta name="Description" content="Растущая парта со стулом «ДЭМИ» в официальном магазине ДЭМИ. Доставка. Сборка. Гарантия 5 лет. Официальный дилер." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Парты «ДЭМИ» (ДЕМИ) без рисунка
		</div>
	</div>
	<div id="product">
		<h1>ПАРТЫ «ДЭМИ»</h1>
		<div class="row">
			<?php include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/filter_m.php'; ?>
			
			<div class="two-thirds column list-product">
				<?php 	$cyt14 = mysql_query("SELECT * FROM ". $package ." WHERE category = 'parta_bez_risunka' and art = '$art' ORDER by id asc"); 
					while( $row = mysql_fetch_array($cyt14) ) {
				?><div class="row product-list-all">
					<div class="one-third column  product-list-img center">
						<?php if ($package == 'parta_0_stul') { ?>
							<a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/parta_bez_stula/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
						<?php } elseif ($package == '' or $package == 'parta_1_stul') { ?>
							<a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt01-01.php"><img class="product-img" src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['desc']; ?>"></a>
						<?php } ?>
					</div>
					<div class="two-thirds column  product-list">
						<div itemscope itemtype="http://schema.org/Product">
						<p class="product-header"><?php 
							if ($package == 'parta_0_stul') { ?>
							<a itemprop="url" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php"><span itemprop="name"><?php echo $row['name']; ?></span></a>
						<?php } elseif ($package == '' or $package == 'parta_1_stul') { ?>
							<a itemprop="url" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt01-01.php"><span itemprop="name"><?php echo $row['name']; ?></span></a>
						<?php } ?></p>
						<p class="product-model">Модель: <span itemprop="model"><?php echo $row['model']; ?></span></p>
						<p class="product-description" itemprop="description"><?php echo $row['desc']; ?></p>
						<p style="display:none;"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" itemprop="image"><span itemprop="brand">ДЭМИ</span></p>
						<ul class="color">
							<?php 	if ($art == '28' or $art == '29') { ?>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
							<?php } elseif ($art == '14') { ?>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=brown"><i class="fa fa-square brown" aria-hidden="true"></i></a></li>
							<?php } elseif ($art == '41' or $art == '42' or $art == '43') { ?>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=sonoma_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=sonoma_pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=sonoma_blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=sonoma_turquoise"><i class="fa fa-square turquoise" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=sonoma_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=dub_grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=dub_beige"><i class="fa fa-square beige" aria-hidden="true"></i></a></li>
								<?php } else { ?>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=grey"><i class="fa fa-square grey" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=pink"><i class="fa fa-square pink" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=blue"><i class="fa fa-square blue" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=green"><i class="fa fa-square green" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=orange"><i class="fa fa-square orange" aria-hidden="true"></i></a></li>
								<li><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php?color=brown"><i class="fa fa-square brown" aria-hidden="true"></i></a></li>
							<?php } ?>
						</ul>
						<div class="product-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
							<ul>
								<li><b><?php echo '<span itemprop="price">'. $pr = $row['price']*1; ?></span> <small><meta itemprop="priceCurrency" content="RUB" />РУБ.</small></b></li>
								<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?><?php if ($package == 'parta_0_stul') { echo "/bez_stula"; }?>/parta_cyt<?php echo $row['url']; ?><?php if ($package == '' or $package == 'parta_1_stul') { echo "_so_stulom_cyt01-01"; } ?>.php">подробнее</a></li>
							</ul>
						</div>
					</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/filter_mobi.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/more_models.php'; ?>	
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>