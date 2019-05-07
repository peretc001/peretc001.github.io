<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
$title = mysql_query('SELECT * FROM polikarbonat ORDER by id asc'); # Цена для title
$row = mysql_fetch_assoc($title); ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>ПОЛИКАРБОНАТА.НЕТ - купить поликарбонат в Краснодаре и крае</title> 
	<meta name="Keywords" content="поликарбонат купить, сотовый поликарбонат купить, монолитный поликарбонат купить" /> 
	<meta name="Description" content="Сотовый и монолитный поликарбонат со склада в Краснодаре. От <?php echo floor($row['price']); ?> руб. за кв/м. Доставка. Гарантия. Сертификаты." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
<div class="top_products grey">
	<div class="introHolder">
		<h3>Сотовый поликарбонат</h3>
	</div>
	<div class="row">
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM polikarbonat WHERE id = 104'); # Запрос
						while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/"><img class="tumb" src="/img/catalog/polikarbonat/<?php echo $row['img']; ?>" alt="Сотовый поликарбонат <?php echo $row['brand']; ?> <?php echo $row['thin']; ?>mm, от <?php echo floor($row['price']); ?> руб. за кв/м"></a></p>
				<p><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/">Сотовый поликарбонат <?php echo $row['brand']; ?>, <?php echo $row['thin']; ?>мм,<br>Прозрачный</a></p>
				<ul class="color">
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
				</ul>
				<p class="price">Цена: <span><?php echo $row['price']; ?></span> руб. кв/м</p>
				<p><a class="button button-buy" href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; }  ?>/<?php if ($size == '12') { echo $size .'/'; } ?>">Купить</a></p>
			<?php } ?>
		</div>
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM polikarbonat WHERE id = 109'); # Запрос
						while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_turquoise/"><img class="tumb" src="/img/catalog/polikarbonat/2.png" alt="Сотовый поликарбонат <?php echo $row['brand']; ?> <?php echo $row['thin']; ?>mm, от <?php echo floor($row['price']); ?> руб. за кв/м"></a></p>
				<p><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_turquoise/">Сотовый поликарбонат <?php echo $row['brand']; ?>, <?php echo $row['thin']; ?>мм,<br>Бирюза</a></p>
				<ul class="color">
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
				</ul>
				<p class="price">Цена: <span><?php echo $row['price_color']; ?></span> руб. кв/м</p>
				<p><a class="button button-buy" href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; }  ?>/<?php if ($size == '12') { echo $size .'/'; } ?>">Купить</a></p>
			<?php } ?>
		</div>
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM polikarbonat WHERE id = 110'); # Запрос
						while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/"><img class="tumb" src="/img/catalog/polikarbonat/3.png" alt="Сотовый поликарбонат <?php echo $row['brand']; ?> <?php echo $row['thin']; ?>mm, от <?php echo floor($row['price']); ?> руб. за кв/м"></a></p>
				<p><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/">Сотовый поликарбонат <?php echo $row['brand']; ?>, <?php echo $row['thin']; ?>мм,<br>Бронза</a></p>
				<ul class="color">
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
				</ul>
				<p class="price">Цена: <span><?php echo $row['price_color']; ?></span> руб. кв/м</p>
				<p><a class="button button-buy" href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php if ($color == '') { echo 'transparent'; } else { echo $color; }  ?>/<?php if ($size == '12') { echo $size .'/'; } ?>">Купить</a></p>
			<?php } ?>
		</div>
	</div>
	<p class="center"><a class="button button-primary" href="/catalog/sotovy_polikarbonat/">показать все</a></p>
</div>
<div class="teplica">
	<div class="row home">
		<div class="one-half column img">
			<a href="/catalog/teplica_iz_polikarbonata/"><img src="img/catalog/teplica/teplica.jpg" alt="готовые теплицы из поликарбоната"></a>
		</div>
		<div class="one-half column">
			<p class="header"><a href="/catalog/teplica_iz_polikarbonata/"><span>готовые</span><br> теплицы из поликарбоната</a></p>
			<p class="text">Легко собираются, повышают урожайность, не поддаются коррозии, имеет по торцам двери и форточки для проветривания, не требуют дополнительного ухода в зимнее время</p>
			<div class="row home no-gutters">
				<div class="one-thirds column">
					<p><i class="fa fa-truck" aria-hidden="true"></i></p>
					<p>Доставка</p>
				</div>
				<div class="one-thirds column">
					<p><i class="fa fa-wrench" aria-hidden="true"></i></p>
					<p>Монтаж</p>
				</div>
				<div class="one-thirds column">
					<p><i class="fa fa-diamond" aria-hidden="true"></i></p>
					<p>Гарантия</p>
				</div>
			</div>
			<p class="btn center"><a class="button button-green" href="/catalog/teplica_iz_polikarbonata/">Выбрать теплицу</a></p>
		</div>
	</div>
</div>
<div class="top_products monolit">
	<div class="introHolder">
		<h3>Монолитный поликарбонат</h3>
	</div>
	<div class="row">
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM monolitny_polikarbonat WHERE id = 201'); # Запрос
							while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/"><img src="/img/catalog/monolitny_polikarbonat/1.png" alt="Монолитный поликарбонат <?php echo $row['brand']; ?> <?php echo $row['thin']; ?>mm, от <?php echo floor($row['price']); ?> руб. за кв/м"></a></p>
				<p><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/">Монолитный поликарбонат <?php echo $row['brand']; ?>, <?php echo $row['thin']; ?>мм,<br>Прозрачный</a></p>
				<ul class="color">
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
				</ul>
				<p class="price">Цена: <span><?php echo $row['price']; ?></span> руб. кв/м</p>
				<p><a class="button button-buy" href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/">Купить</a></p>
			<?php } ?>
		</div>
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM monolitny_polikarbonat WHERE id = 205'); # Запрос
							while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/"><img src="/img/catalog/monolitny_polikarbonat/3.png" alt="Монолитный поликарбонат <?php echo $row['brand']; ?> <?php echo $row['thin']; ?>mm, от <?php echo floor($row['price']); ?> руб. за кв/м"></a></p>
				<p><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/">Монолитный поликарбонат <?php echo $row['brand']; ?>, <?php echo $row['thin']; ?>мм,<br>Бронза</a></p>
				<ul class="color">
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
				</ul>
				<p class="price">Цена: <span><?php echo $row['price_color']; ?></span> руб. кв/м</p>
				<p><a class="button button-buy" href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/">Купить</a></p>
			<?php } ?>
		</div>
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM monolitny_polikarbonat WHERE id = 212'); # Запрос
							while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/"><img src="/img/catalog/monolitny_polikarbonat/4.png" alt="Монолитный поликарбонат <?php echo $row['brand']; ?> <?php echo $row['thin']; ?>mm, от <?php echo floor($row['price']); ?> руб. за кв/м"></a></p>
				<p><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/">Монолитный поликарбонат <?php echo $row['brand']; ?>, <?php echo $row['thin']; ?>мм,<br>Опал</a></p>
				<ul class="color">
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
					<li><a href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
				</ul>
				<p class="price">Цена: <span><?php echo $row['price_color']; ?></span> руб. кв/м</p>
				<p><a class="button button-buy" href="/catalog/monolitny_polikarbonat/<?php echo $row['thin']; ?>mm/monolitny_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/">Купить</a></p>
			<?php } ?>
		</div>
	</div>
	<p class="center"><a class="button button-primary" href="/catalog/monolitny_polikarbonat/">показать все</a></p>
</div>
<div class="top_products grey">
	<div class="introHolder">
		<h3>Популярные комплектующие</h3>
	</div>
	<div class="row">
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM komplektujushhie WHERE id = 301'); # Запрос
							while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>, <?php echo floor($row['price']); ?> руб."></a></p>
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/"><?php echo $row['name']; ?></a></p>
				<ul class="color">
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><i class="fa fa-circle turquoise" aria-hidden="true" title="Бирюза"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/bronze/"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/opal/"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/grey/"><i class="fa fa-circle grey" aria-hidden="true" title="Серый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/silver/"><i class="fa fa-circle silver" aria-hidden="true" title="Серебро"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/green/"><i class="fa fa-circle green" aria-hidden="true" title="Зеленый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/yellow/"><i class="fa fa-circle yellow" aria-hidden="true" title="Желтый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/orange/"><i class="fa fa-circle orange" aria-hidden="true" title="Оранжевый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/red/"><i class="fa fa-circle red" aria-hidden="true" title="Красный"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/blue/"><i class="fa fa-circle blue" aria-hidden="true" title="Синий"></i></a></li>
				</ul>
				<p class="price">Цена: <span><?php echo $row['price']; ?></span> руб.</p>
				<p><a class="button button-buy" href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/">Подробнее</a></p>
			<?php } ?>
		</div>
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM komplektujushhie WHERE id = 303'); # Запрос
							while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/green/"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>, <?php echo floor($row['price']); ?> руб."></a></p>
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/green/"><?php echo $row['name']; ?></a></p>
				<ul class="color">
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/"><i class="fa fa-circle transparent" aria-hidden="true" title="Прозрачный"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><i class="fa fa-circle turquoise" aria-hidden="true" title="Бирюза"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/bronze/"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/opal/"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/grey/"><i class="fa fa-circle grey" aria-hidden="true" title="Серый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/silver/"><i class="fa fa-circle silver" aria-hidden="true" title="Серебро"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/green/"><i class="fa fa-circle green" aria-hidden="true" title="Зеленый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/yellow/"><i class="fa fa-circle yellow" aria-hidden="true" title="Желтый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/orange/"><i class="fa fa-circle orange" aria-hidden="true" title="Оранжевый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/red/"><i class="fa fa-circle red" aria-hidden="true" title="Красный"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/blue/"><i class="fa fa-circle blue" aria-hidden="true" title="Синий"></i></a></li>
				</ul>
				<p class="price">Цена: <span><?php echo $row['price']; ?></span> руб.</p>
				<p><a class="button button-buy" href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/green/">Подробнее</a></p>
			<?php } ?>
		</div>
		<div class="one-third column">
			<?php 	$product = mysql_query('SELECT * FROM komplektujushhie  WHERE id = 320'); # Запрос
							while ($row = mysql_fetch_assoc($product)) { ?>
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>, <?php echo floor($row['price']); ?> руб."></a></p>
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><?php echo $row['name']; ?></a></p>
				<ul class="color">
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><i class="fa fa-circle turquoise" aria-hidden="true" title="Бирюза"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/bronze/"><i class="fa fa-circle bronze" aria-hidden="true" title="Бронза"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/opal/"><i class="fa fa-circle opal" aria-hidden="true" title="Опал"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/grey/"><i class="fa fa-circle grey" aria-hidden="true" title="Серый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/silver/"><i class="fa fa-circle silver" aria-hidden="true" title="Серебро"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/green/"><i class="fa fa-circle green" aria-hidden="true" title="Зеленый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/yellow/"><i class="fa fa-circle yellow" aria-hidden="true" title="Желтый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/orange/"><i class="fa fa-circle orange" aria-hidden="true" title="Оранжевый"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/red/"><i class="fa fa-circle red" aria-hidden="true" title="Красный"></i></a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/blue/"><i class="fa fa-circle blue" aria-hidden="true" title="Синий"></i></a></li>
				</ul>
				<p class="price">Цена: <span><?php echo $row['price']; ?></span> руб.</p>
				<p><a class="button button-buy" href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/">Подробнее</a></p>
			<?php } ?>
		</div>
	</div>
	<p class="center"><a class="button button-primary" href="/catalog/komplektujushhie_dly_polikarbonata/">показать все</a></p>
</div>
<div class="page">
	<div class="row">
		<p>Планируете построить навес для автомобиля? Сомневаетесь в выборе материала? Вопросов много. Ответ один. 
		Поликарбонат - универсальный, долговечный и практичный материал. Его популярность неуклонно растет, а область применения становится все шире. Чтобы купить поликарбонатный лист, необходимо определиться с его конструкцией 
		и толщиной. Это зависит от конкретной области применения материала. Он может быть <a href="/catalog/monolitny_polikarbonat/">монолитным</a> и <a href="/catalog/sotovy_polikarbonat/">сотовым</a>, 
		а толщина листа варьируется от <a href="/catalog/sotovy_polikarbonat/3mm/">3 мм</a> до 32 мм. Внешне поликарбонатный лист напоминает стекло. Однако это единственное сходство. По своей функциональности поликарбонатные листы превосходят все аналоги.</p>
		<p>Сферы применения:</p>
		<ul>
			<li>сельское хозяйство (тепличные комплексы, заборы);</li>
			<li>промышленное и городское строительство (части оборудования, защитные ограждения, оформление улиц и домов);</li>
			<li>торговля и рекламна (вывески, наружная реклама, витринные конструкции);</li> 
			<li>сфера дизайна интерьеров (всевозможные авторские сооружения).</li> 
		</ul>
		<p>Купить поликарбонат в <a href="/contact.php">Краснодаре</a>. Товар <a href="/sertificat.php">сертифицирован</a>.</p>
	</div>
</div>

<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php');	?>
</body>
</html>
