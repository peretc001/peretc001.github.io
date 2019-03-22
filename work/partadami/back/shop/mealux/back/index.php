<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Детские кресла Mealux. Каталог, цены, фото. Официальный магазин</title> 
	<meta name="Keywords" content="детское кресло, эргономичное кресло" /> 
	<meta name="Description" content="Независимая регулировка высоты спинки и сиденья позволит правильно отрегулировать детское кресло под фигуру ребенка" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Детские кресла Mealux
		</div>
	</div>
	<div id="product">
		<h1>Детские кресла Mealux</h1>		
		
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
							<!--font color="red"><strike>&nbsp;<?php echo $row['price']; ?>&nbsp;</strike></font--!> 
							<li class="product-buy"><a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/detskoe_kreslo_<?php echo $row['url']; ?>.php">подробнее</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<?php include '../../inc/footer.php'; ?>	