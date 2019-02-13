<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 	
$thin = htmlspecialchars(trim($_GET['thin']));
$size = htmlspecialchars(trim($_GET['size']));
$color = htmlspecialchars(trim($_GET['color']));
$brand = htmlspecialchars(trim($_GET['brand']));
$vendor = htmlspecialchars(trim($_GET['vendor']));

$title = mysql_query('SELECT * FROM polikarbonat ORDER by id asc'); # Цена для title
$row = mysql_fetch_assoc($title);


if ($thin == '') { $thin = ''; $z_thin = '';  } else { $z_thin = "thin = '$thin' and"; }
if ($size == '') { $size = ''; }
if ($brand == '') { $brand = ''; $z_brand = '';} else{ $z_brand = "and brand = '$brand'"; }
if ($vendor == '') { $vendor = ''; $z_vendor = '';} elseif ($vendor == 'ru'){ $z_vendor = "and vendor = 'Россия'"; } elseif ($vendor == 'il'){ $z_vendor = "and vendor = 'Израиль'"; } elseif ($vendor == 'at'){ $z_vendor = "and vendor = 'Австрия'"; }

if ($color == '' or $color == 'transparent') { $h1_color = 'Прозрачный'; $z_color = ''; }
elseif ($color == 'turquoise') { $h1_color = 'Бирюза'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'bronze') { $h1_color = 'Бронза'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'opal') { $h1_color = 'Опал'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'grey') { $h1_color = 'Серый'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'silver') { $h1_color = 'Серебро'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'green') { $h1_color = 'Зеленый'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'yellow') { $h1_color = 'Желтый'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'orange') { $h1_color = 'Оранжевый'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'red') { $h1_color = 'Красный'; $z_color = 'and thin >= 4'; } 
elseif ($color == 'blue') { $h1_color = 'Синий'; $z_color = 'and thin >= 4'; } 
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Купить сотовый поликарбонат в Краснодаре от <?php echo floor($row['price']); ?> руб. за кв/м - ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="Keywords" content="сотовый поликарбонат, купить сотовый поликарбонат, сотовый поликарбонат в краснодаре, сотовый поликарбонат цена, сотовый поликарбонат размеры" /> 
	<meta name="Description" content="Сотовый поликарбонат в Краснодаре от 3.5 до 16мм. Цены, размеры, характеристики. Доставка по Краснодарскому краю." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / <a href="/catalog/sotovy_polikarbonat/" itemprop="url"><span itemprop="title">Сотовый поликарбонат</span></a><?php if ($thin != '') { echo ' / <a href="/catalog/sotovy_polikarbonat/'. $thin .'mm/"  itemprop="url"><span itemprop="title">'. $thin .'мм</span></a>'; } ?>
	</div>
	<div class="catalog">
		<div class="introHolder">
			<h1>Сотовый поликарбонат в Краснодаре</h1>
		</div>
		<div class="row">
			<div class="filter">
				<ul>
					<li class="name"><b>Фильтр:</b></a>
					</li><li class="list"><a>Толщина <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="drop">
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=3&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">3мм</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=3.5&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">3.5мм</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=4&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">4мм</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=6&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">6мм</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=8&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">8мм</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=10&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">10мм</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=16&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">16мм</a></li>
						</ul>
					</li><li class="list"><a>Размер <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="drop">
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=6&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">6м</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=12&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">12м</a></li>
						</ul>
					</li><li class="list"><a>Производитель <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="drop">
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=Plastilux&vendor=<?php echo $vendor; ?>">Plastilux (Россия)</a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=<?php echo $color; ?>&brand=Polygal&vendor=<?php echo $vendor; ?>">Polygal (Израиль)</a></li>
						</ul>
					</li><li class="list"><a>Цвет <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="color">
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=transparent&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=turquoise&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle turquoise" aria-hidden="true" title="Бирюза"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=bronze&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=opal&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=grey&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle grey" aria-hidden="true" title="Серый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=silver&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle silver" aria-hidden="true" title="Серебро"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=green&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle green" aria-hidden="true" title="Зеленый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=yellow&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle yellow" aria-hidden="true" title="Желтый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=orange&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle orange" aria-hidden="true" title="Оранжевый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=red&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle red" aria-hidden="true" title="Красный"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/index.php?thin=<?php echo $thin; ?>&size=<?php echo $size; ?>&color=blue&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle blue" aria-hidden="true" title="Синий"></i></a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<div class="row filter_result">
			<?php if ($thin != '' or $size != '' or $brand != '' or $vendor != '' or $color != '') { 
					echo '<div id="del"><b>Фильтр:</b> ';
						if ($thin != '') { echo 'Толщина: <span>'. $thin .' мм</span> <a href="/catalog/sotovy_polikarbonat/index.php?thin=&size='. $size .'&color='. $color .'&brand='. $brand .'&vendor='. $vendor .'" class="f_result">x</a>'; }
						if ($size != '') { echo 'Размер листа: <span>2,1 х '. $size .' м</span> <a href="/catalog/sotovy_polikarbonat/index.php?thin='. $thin .'&size=&color='. $color .'&brand='. $brand .'&vendor='. $vendor .'" class="f_result">x</a>'; }
						if ($brand != '') { echo 'Производитель: <span>'. $brand .' </span> <a href="/catalog/sotovy_polikarbonat/index.php?thin='. $thin .'&size='. $size .'&color='. $color .'&brand=&vendor='. $vendor .'" class="f_result">x</a>'; }
						if ($vendor != '') { echo 'Страна: ';
							if ($vendor == 'ru') { echo "<span>Россия</span>"; } elseif ($vendor == 'il') { echo "<span>Израиль</span>"; }  elseif ($vendor == 'at') { echo "<span>Австрия</span>"; } 
						echo '<a href="/catalog/sotovy_polikarbonat/index.php?thin='. $thin .'&size='. $size .'&color='. $color .'&brand='. $brand .'&vendor=" class="f_result">x</a>'; }
						if ($color != '') { echo 'Цвет: <span>';
							if ($color == 'transparent') { echo 'Прозрачный';} 
							elseif ($color == 'turquoise') { echo 'Бирюза';} 
							elseif ($color == 'bronze') { echo 'Бронза';} 
							elseif ($color == 'opal') { echo 'Опал';} 
							elseif ($color == 'grey') { echo 'Серый';} 
							elseif ($color == 'silver') {echo 'Серебро';}
							elseif ($color == 'green') { echo 'Зеленый';}
							elseif ($color == 'yellow') { echo 'Желтый';}
							elseif ($color == 'orange') { echo 'Оранжевый';}
							elseif ($color == 'red') { echo 'Красный';}
							elseif ($color == 'blue') { echo 'Синий';}
						echo '</span> <a href="/catalog/sotovy_polikarbonat/index.php?thin='. $thin .'&size='. $size .'&color=&brand='. $brand .'&vendor='. $vendor .'" class="f_result">x</a>'; }
					echo '<a class="clear" href="/catalog/sotovy_polikarbonat/">очистить</a></div>';
			}				
			?>
		</div>
		<?php $product = mysql_query('SELECT * FROM polikarbonat WHERE '. $z_thin .' id >= 101 '. $z_brand .' '. $z_vendor .' and brand != "Lexan" order by id asc'); # Запрос
					while ($row = mysql_fetch_assoc($product)) {
		?>
			<?php
				if ($color == '' or $color == 'transparent') { $price = $row['price'];}
				elseif ($color == 'turquoise' or $color == 'bronze') { $price = $row['price_color'];}
				elseif ($color == 'opal' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'opal' and $row['brand'] == 'Polygal'and $row['thin'] == '4') { $price = $row['price']*1.1;}
				elseif ($color == 'opal' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08;}
				elseif ($color == 'grey' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'grey' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1;}
				elseif ($color == 'grey' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08;}
				elseif ($color == 'silver' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'silver' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1;}
				elseif ($color == 'silver' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08;}
				elseif ($color == 'green' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'green' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1;}
				elseif ($color == 'green' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.06;}
				elseif ($color == 'yellow' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'yellow' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1;}
				elseif ($color == 'yellow' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08;}
				elseif ($color == 'orange' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'orange' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1;}
				elseif ($color == 'orange' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08;}
				elseif ($color == 'red' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'red' and $row['brand'] == 'Polygal') { $price = $row['price']*1.15;}
				elseif ($color == 'blue' and $row['brand'] == 'Plastilux') { $price = $row['price_color'];}
				elseif ($color == 'blue' and $row['brand'] == 'Polygal') { $price = $row['price']*1.15;}
			?>
			<div class="row product_list">
				<div class="one-half column img">
					<a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; } ?>/<?php if ($size == '12') { echo $size .'/'; } ?>">
						<img class="tumb" src="/img/catalog/polikarbonat/<?php 
							if ($color == '') { echo $row['img']; } 
							elseif ($color == 'transparent') { echo '1.png'; } 
							elseif ($color == 'turquoise') { echo '2.png'; } 
							elseif ($color == 'bronze') { echo '3.png'; }
							elseif ($color == 'opal') { echo '4.png'; }
							elseif ($color == 'grey') { echo '5.png'; }
							elseif ($color == 'silver') { echo '6.png'; }
							elseif ($color == 'green') { echo '7.png'; }
							elseif ($color == 'yellow') { echo '8.png'; }
							elseif ($color == 'orange') { echo '9.png'; }
							elseif ($color == 'red') { echo '10.png'; }
							elseif ($color == 'blue') { echo '11.png'; } ?>" alt="<?php echo $row['name'] .' '. $row['brand'] .', '. $row['thin'] .'мм, от '. floor($row['price']) .' руб. за кв/м'; ?>">
					</a>
				</div>
				<div class="one-half column products">
					<p class="name"><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; } ?>/<?php if ($size == '12') { echo $size .'/'; } ?>"><?php echo $row['name'] .' '. $row['brand'] .', '. $row['thin'] .'мм'; ?><?php if ($color != '') { echo ', '. $h1_color; } ?></a></p>
					<ul class="color">
						<?php if ($row['id'] < '103') {  ?>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
						<?php } else { ?>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_turquoise/"><i class="fa fa-circle turquoise" aria-hidden="true" title="Бирюза"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_grey/"><i class="fa fa-circle grey" aria-hidden="true" title="Серый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_silver/"><i class="fa fa-circle silver" aria-hidden="true" title="Серебро"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_green/"><i class="fa fa-circle green" aria-hidden="true" title="Зеленый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_yellow/"><i class="fa fa-circle yellow" aria-hidden="true" title="Желтый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_orange/"><i class="fa fa-circle orange" aria-hidden="true" title="Оранжевый"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_red/"><i class="fa fa-circle red" aria-hidden="true" title="Красный"></i></a></li>
							<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_blue/"><i class="fa fa-circle blue" aria-hidden="true" title="Синий"></i></a></li>
						<?php } ?>
					</ul>
					<p class="list">Толщина: <span><?php echo $row['thin']; ?> мм</span></p>
					<p class="size">Размер листа: <span>2,1 х <?php if ($size == '') { echo $size = '6'; $list_l = '12.6'; } elseif ($size == '6') { echo $size = '6'; $list_l = '12.6'; } else { echo $size = '12'; $list_l = '25.2';} ?> м</span></p>
					<ul class="price">
						<li class="list">Цена за кв/м</li>
						<li class="price">от <span><?php echo $price; ?></span> руб.</li>
					</ul>
					<ul class="price">
						<li class="list">Цена за лист</li>
						<li class="price">от <span><?php $list_p = $price; $list = $list_p*$list_l; echo round($list); ?>.00</span> руб. </li>
					</ul>
					<p><a class="button button-buy" href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; }  ?>/<?php if ($size == '12') { echo $size .'/'; } ?>">Купить</a></p>
				</div>							
			</div>
		<?php } ?>
		<div class="row filter_result">
			<?php		$product = mysql_query('SELECT * FROM polikarbonat WHERE '. $z_thin .' id >= 1 '. $z_brand .' '. $z_vendor .' '. $z_color .' and brand != "Lexan" '); # Запрос
						$row = mysql_fetch_assoc($product);
						if (empty($row)) { echo '<tr><td colspan="2"><p><b>ой...</b> ничего не найдено. Попробуйте изменить параметры фильтра.</p>'; }
			?>
		</div>
	</div>
	<div class="teplica">
		<div class="row">
			<div class="one-half column teplica_img center">
				<img src="img/catalog/teplica/tumb2.png">
			</div>
			<div class="one-half column teplica_text">
				<p class="header"><span class="bg">готовые</span></p>
				<p class="header">теплицы из поликарбоната</p>
				<p class="text">Легко собираются, не поддаются коррозии, имеет по торцам двери и форточки для проветривания, не требуют дополнительного ухода в зимнее время</p>
				<p class="btn center"><a class="button button-green" href="/catalog/teplica_iz_polikarbonata/">Выбрать теплицу</a></p>
			</div>
		</div>
	</div>
	<div class="top_products">
		<div class="introHolder">
			<h3>Еще товары</h3>
		</div>
		<div class="row catalog_home">
			<div class="one-half column">
				<?php $title = mysql_query('SELECT * FROM monolitny_polikarbonat ORDER by id asc'); # Цена для title
							$row = mysql_fetch_assoc($title); ?>
				<p><a href="/catalog/monolitny_polikarbonat/"><img class="tumb" src="img/catalog/monolitny_polikarbonat.png"></a></p>
				<p class="name"><a href="/catalog/monolitny_polikarbonat/">Монолитный поликарбонат от <?php echo floor($row['price']); ?> руб. за кв/м</a></p>
			</div>
			<div class="one-half column">
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/"><img class="tumb" src="img/catalog/komplektujushhie.png"></a></p>
				<p class="name"><a href="/catalog/komplektujushhie_dly_polikarbonata/">Комплектующие для поликарбоната</a></p>
			</div>
		</div>
	</div>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>