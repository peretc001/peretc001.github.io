<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
$id = htmlspecialchars(trim($_GET['id']));
$url = htmlspecialchars(trim($_GET['url'])); 
$color = htmlspecialchars(trim($_GET['color'])); 

$title = mysql_query("SELECT * FROM komplektujushhie WHERE url = '$url' ");  
$row = mysql_fetch_assoc($title); 

if ($color == '' or $color == 'transparent') { $price = $row['price']; $h1_color = 'Прозрачный'; }
elseif ($color == 'turquoise') { $price = $row['price']; $h1_color = 'Бирюза'; }
elseif ($color == 'bronze') { $price = $row['price']; $h1_color = 'Бронза'; }
elseif ($color == 'opal') { $price = $row['price']; $h1_color = 'Опал'; }
elseif ($color == 'grey') { $price = $row['price']; $h1_color = 'Серый'; }
elseif ($color == 'silver') { $price = $row['price']; $h1_color = 'Серебро'; }
elseif ($color == 'green') { $price = $row['price']; $h1_color = 'Зеленый'; }
elseif ($color == 'yellow') { $price = $row['price']; $h1_color = 'Желтый'; }
elseif ($color == 'orange') { $price = $row['price']; $h1_color = 'Оранжевый'; }
elseif ($color == 'red') { $price = $row['price']; $h1_color = 'Красный'; }
elseif ($color == 'blue') { $price = $row['price']; $h1_color = 'Синий'; }
elseif ($color == 'black') { $price = '5.00'; $h1_color = 'Черный'; }
$thin_min = $row['thin_min'];
$thin_max = $row['thin_max'];
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title><?php echo $row['name']; ?> купить за <?php echo floor($row['price']); ?> руб.</title> 
	<meta name="Keywords" content="<?php echo $row['name']; ?>" /> 
	<meta name="Description" content="Купить <?php echo $row['name']; ?> на сайте ПОЛИКАРБОНАТА.НЕТ за <?php echo floor($row['price']); ?> руб." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	<script type="text/javascript" src="js/ajax-refresh-item.js"></script>
	
	<div class="refresh">
		<?php 	$product = mysql_query("SELECT * FROM komplektujushhie WHERE url = '$url'  ");  $row = mysql_fetch_assoc($product); ?>
		<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / 
			<a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / 
			<a href="/catalog/komplektujushhie_dly_polikarbonata/" itemprop="url"><span itemprop="title">Комплектующие для поликарбоната</span></a> / 
			<a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/<?php echo $color;?>/" itemprop="url"><span itemprop="title"><?php echo $row['name']; ?></span></a>
		</div>
		<div class="product_page">
			<div class="introHolder">
				<h1><?php echo $row['name'] .'. '. $h1_color; ?></h1>
			</div>
			<div class="row">
				<div class="one-third column page_left">
					<img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img'];?>" alt="<?php echo $row['name'] .' за '. floor($row['price']) .' руб.'; ?>">
			</div>
				<div class="two-thirds column page_right">
					<p class="color">1. Выберите цвет:</p>
					<ul class="color">
						<?php if ($row['id'] == '320') { } else { ?>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/"><i class="fa fa-circle transparent <?php if ($color == '' or $color == 'transparent') { echo 'active'; } ?>" aria-hidden="true" title="Прозрачный"></i></a></li>
						<?php } ?>
						<?php if ($row['id'] == '321') { } else { ?>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><i class="fa fa-circle turquoise <?php if ($color == 'turquoise') { echo 'active'; } ?>" aria-hidden="true" title="Бирюза"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/bronze/"><i class="fa fa-circle bronze <?php if ($color == 'bronze') { echo 'active'; } ?>" aria-hidden="true" title="Бронза"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/opal/"><i class="fa fa-circle opal <?php if ($color == 'opal') { echo 'active'; } ?>" aria-hidden="true" title="Опал"></i></a></li>
						<?php } ?>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/grey/"><i class="fa fa-circle grey <?php if ($color == 'grey') { echo 'active'; } ?>" aria-hidden="true" title="Серый"></i></a></li>
						<?php if ($row['id'] == '321') { } else { ?>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/silver/"><i class="fa fa-circle silver <?php if ($color == 'silver') { echo 'active'; } ?>" aria-hidden="true" title="Серебро"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/green/"><i class="fa fa-circle green <?php if ($color == 'green') { echo 'active'; } ?>" aria-hidden="true" title="Зеленый"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/yellow/"><i class="fa fa-circle yellow <?php if ($color == 'yellow') { echo 'active'; } ?>" aria-hidden="true" title="Желтый"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/orange/"><i class="fa fa-circle orange <?php if ($color == 'orange') { echo 'active'; } ?>" aria-hidden="true" title="Оранжевый"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/red/"><i class="fa fa-circle red <?php if ($color == 'red') { echo 'active'; } ?>" aria-hidden="true" title="Красный"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/blue/"><i class="fa fa-circle blue <?php if ($color == 'blue') { echo 'active'; } ?>" aria-hidden="true" title="Синий"></i></a></li>
						<?php } ?>
						<?php if ($row['id'] == '321') { ?>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/black/"><i class="fa fa-circle black <?php if ($color == 'blue') { echo 'active'; } ?>" aria-hidden="true" title="Черный"></i></a></li>
						<?php } ?>
					</ul>
				
					<ul class="price_kv">
						<li class="list">Цена за кв/м</td>
						<li class="price"><span><?php if($row['id'] == '320') { echo $new_price = $row['price']/125; } else { echo $row['price']; } ?></span> руб.</td>
					</ul>
					<?php if($row['id'] == '320') { ?>
					<ul class="price_kv">
						<li class="list">Цена за кв/м</td>
						<li class="price"><span><?php echo $row['price']; ?></span> руб.</td>
					</ul>
					<?php } ?>
				
					<form action="/catalog/inc/addtocart.php" method="post" id="add" class="-visor-no-click">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<input type="hidden" name="product_name" value="<?php echo $row['name'] .'. Цвет: '. $h1_color; ?>">
						<input type="hidden" name="color" value="<?php echo $h1_color; ?>">
						<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
						<input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
						<input type="hidden" name="img" value="/img/catalog/komplektujushhie/<?php echo $row['img'];?>">					
					<ul class="buy">	
							<li class="qty"><input type="number" name="qty" value="1"></li>
							<li><input type="submit" value="В корзину" class="button button-buy" onclick="yaCounter15357751.reachGoal('CART'); return true;"></li>
						</ul>	
						</form>
					</div>
			</div>
		</div>
		


<script src="/js/uikit/js/components/slider.min.js"></script>
	<div class="product_page_accessories">
		<div class="introHolder">
			<h3>Аксессуары</h3>
		</div>
		<div class="row">
			<div class="uk-slidenav-position" data-uk-slider>
				<div class="uk-slider-container">
					<ul class="uk-slider uk-grid-width-medium-1-4"><?php
							$product = mysql_query("SELECT * FROM polikarbonat order by id asc "); # Запрос
							while ($row = mysql_fetch_assoc($product)) { 
							
							if ($row['img'] == '1.png'){$color = 'transparent'; $h1_color = 'Прозрачный'; }
							elseif ($row['img'] == '2.png') {$color = 'turquoise'; $h1_color = 'Бирюза'; } 
							elseif ($row['img'] == '3.png') {$color = 'bronze'; $h1_color = 'Бронза'; } 
							elseif ($row['img'] == '4.png') {$color = 'opal'; $h1_color = 'Опал'; } 
							elseif ($row['img'] == '5.png') {$color = 'grey'; $h1_color = 'Серый'; } 
							elseif ($row['img'] == '6.png') {$color = 'silver'; $h1_color = 'Серебро'; } 
							elseif ($row['img'] == '7.png') {$color = 'green'; $h1_color = 'Зеленый'; } 
							elseif ($row['img'] == '8.png') {$color = 'yellow'; $h1_color = 'Желтый'; } 
							elseif ($row['img'] == '9.png') {$color = 'orange'; $h1_color = 'Оранжевый'; } 
							elseif ($row['img'] == '10.png') {$color = 'red'; $h1_color = 'Красный'; } 
							elseif ($row['img'] == '11.png') {$color = 'blue'; $h1_color = 'Синий'; } 
					
					?>
					
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php echo $color; ?>/"><img class="tumb" src="/img/catalog/polikarbonat/<?php echo $row['img']; ?>"></a></p>
							<p class="name"><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php echo $color; ?>/"><?php echo $row['name'] .' '. $row['brand'] .', '. $row['thin'] .'мм'; ?>. <?php echo $h1_color; ?></a></p>
							<p>Цена: <span><?php if ($color == 'transparent') { echo $row['price']; } else { echo $row['price_color']; } ?></span> руб.</p>
							<p><a class="button button-buy" href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php echo $color; ?>/">Купить</a></p>
						</li>
					
					<?php } ?>
					</ul>
				</div>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
			</div>
		</div>	
	</div>

	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>