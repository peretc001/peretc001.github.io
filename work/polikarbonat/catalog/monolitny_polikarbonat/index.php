<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 	
$thin = htmlspecialchars(trim($_GET['thin']));
$size = htmlspecialchars(trim($_GET['size']));
$color = htmlspecialchars(trim($_GET['color']));
$brand = htmlspecialchars(trim($_GET['brand']));
$vendor = htmlspecialchars(trim($_GET['vendor']));
$size = htmlspecialchars(trim($_GET['size']));

$title = mysql_query('SELECT * FROM monolitny_polikarbonat ORDER by id asc'); # Цена для title
$row = mysql_fetch_assoc($title);


if ($thin == '') { $thin = ''; $z_thin = '';  } else { $z_thin = "and thin = '$thin'"; }
if ($size == '') { $size = ''; $z_size = '';}  else { $z_thin = "and size = '$size'"; }
if ($brand == '') { $brand = ''; $z_brand = '';} else{ $z_brand = "and brand = '$brand'"; }
if ($vendor == '') { $vendor = ''; $z_vendor = '';} elseif ($vendor == 'ru'){ $z_vendor = "and vendor = 'Россия'"; } elseif ($vendor == 'il'){ $z_vendor = "and vendor = 'Израиль'"; } elseif ($vendor == 'at'){ $z_vendor = "and vendor = 'Австрия'"; }

if ($color == '' or $color == 'transparent') { $h1_color = 'Прозрачный'; }
elseif ($color == 'turquoise') { $h1_color = 'Бирюза'; } 
elseif ($color == 'bronze') { $h1_color = 'Бронза'; } 
elseif ($color == 'opal') { $h1_color = 'Опал'; } 
elseif ($color == 'grey') { $h1_color = 'Серый'; } 
elseif ($color == 'silver') { $h1_color = 'Серебро'; } 
elseif ($color == 'green') { $h1_color = 'Зеленый'; } 
elseif ($color == 'yellow') { $h1_color = 'Желтый'; } 
elseif ($color == 'orange') { $h1_color = 'Оранжевый'; } 
elseif ($color == 'red') { $h1_color = 'Красный'; } 
elseif ($color == 'blue') { $h1_color = 'Синий'; } 
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Монолитный поликарбонат в Краснодаре от <?php echo floor($row['price']); ?> руб. за кв/м - ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="Keywords" content="монолитный поликарбонат, купить монолитный поликарбонат, монолитный поликарбонат в краснодаре, монолитный поликарбонат цена, монолитный поликарбонат купить в краснодаре от производителя" /> 
	<meta name="Description" content="Купить монолитный поликарбонат в краснодаре от производителя. Цены, размеры, характеристики. Цена от <?php echo floor($row['price']); ?> руб. за кв/м." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / <a href="/catalog/monolitny_polikarbonat/" itemprop="url"><span itemprop="title">Монолитный поликарбонат</span></a><?php if ($thin != '') { echo ' / <a href="/catalog/sotovy_polikarbonat/'. $thin .'mm/"  itemprop="url"><span itemprop="title">'. $thin .'мм</span></a>'; } ?>
	</div>
	<div class="catalog">
		<div class="introHolder">
			<h1>Монолитный поликарбонат в Краснодаре</h1>
		</div>
		<div class="row">
			<div class="filter">
				<ul>
					<li class="name"><b>Фильтр:</b></a>
					</li><li class="list"><a>Толщина <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="drop">
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=2&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">2мм</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=3&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">3мм</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=4&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">4мм</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=5&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">5мм</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=6&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">6мм</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=8&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">8мм</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=10&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>">10мм</a></li>
						</ul>
					</li><li class="list"><a>Производитель <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="drop">
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=<?php echo $thin; ?>&color=<?php echo $color; ?>&brand=CarboGlass&vendor=<?php echo $vendor; ?>">CarboGlass</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=<?php echo $thin; ?>&color=<?php echo $color; ?>&brand=Polygal&vendor=<?php echo $vendor; ?>">Polygal</a></li>
						</ul>
					</li><li class="list"><a>Страна <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="drop">
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=<?php echo $thin; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=ru">Россия</a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=<?php echo $thin; ?>&color=<?php echo $color; ?>&brand=<?php echo $brand; ?>&vendor=il">Израиль</a></li>
						</ul>
					</li><li class="list"><a>Цвет <i class="fa fa-caret-down" aria-hidden="true"></i></a>
						<ul class="color">
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=<?php echo $thin; ?>&color=transparent&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=<?php echo $thin; ?>&color=bronze&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
							<li><a href="/catalog/monolitny_polikarbonat/index.php?thin=<?php echo $thin; ?>&color=opal&brand=<?php echo $brand; ?>&vendor=<?php echo $vendor; ?>"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
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

		<?php 	$product = mysql_query('SELECT * FROM monolitny_polikarbonat WHERE id >= 1 '. $z_thin .' '. $z_size .' '. $z_brand .' '. $z_vendor .' order by id asc'); # Запрос
				while ($row = mysql_fetch_assoc($product)) {
										
					# Формируем url 
					if ($row['vendor'] == 'Россия') { $vend = 'ru';} 
					elseif ($row['vendor'] == 'Израиль') { $vend = 'il';}
					if ($color == '') {	} else { $col = $color; }
		?>
		<div class="row product_list">
				<div class="one-half column img">
					<a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; } ?>/<?php if ($size == '12') { echo $size .'/'; } ?>">
					<img class="tumb2" src="/img/catalog/monolitny_polikarbonat/<?php 
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
					<p class="name"><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; } ?>/<?php if ($size == '12') { echo $size .'/'; } ?>"><?php echo $row['name'] .' '. $row['brand'] .', '. $row['thin'] .'мм'; ?><?php if ($color != '') { echo ', '. $h1_color; } ?></a></p>
					<ul class="color">
						<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
						<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
						<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
					</ul>
					<p class="list">Толщина: <span><?php echo $row['thin']; ?> мм</span></p>
					<p class="size">Размер листа: <span>2,05 х 3,05 м</span></p>
					<ul class="price">
						<li class="list">Цена за кв/м</li>
						<li class="price">от <span><?php 
										if ($color == '' or $color == 'transparent') { $price = $row['price']; } else { $price = $row['price_color'];  } 
										echo $price; ?></span> руб.</li>
					</ul>
					<ul class="price">
						<li class="list">Цена за лист</li>
						<li class="price">от <span><?php $list_l = '6.2525'; $list_p = $price; $list = $list_p*$list_l; echo round($list); ?>.00</span> руб. </li>
					</ul>
					<p><a class="button button-buy" href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; }  ?>/<?php if ($size == '12') { echo $size .'/'; } ?>">Купить</a></p>
	</div>							
			</div>
		<?php } ?>
		<div class="row filter_result">
			<?php		$product = mysql_query('SELECT * FROM monolitny_polikarbonat WHERE id >= 1 '. $z_thin .' '. $z_size .' '. $z_brand .' '. $z_vendor .' order by id asc'); # Запрос
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
				<?php $title = mysql_query('SELECT * FROM polikarbonat ORDER by id asc'); # Цена для title
							$row = mysql_fetch_assoc($title); ?>
				<p><a href="/catalog/sotovy_polikarbonat/"><img class="tumb" src="img/catalog/sotovy_polikarbonat.png"></a></p>
				<p class="name"><a href="/catalog/sotovy_polikarbonat/">Сотовый поликарбонат от <?php echo floor($row['price']); ?> руб. за кв/м</a></p>
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