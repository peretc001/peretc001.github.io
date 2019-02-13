<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Комплектующие для поликарбоната - ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="Keywords" content="Комплектующие для поликарбоната" /> 
	<meta name="Description" content="Купить Комплектующие для поликарбоната на сайте ПОЛИКАРБОНАТА.НЕТ" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / <a href="/catalog/komplektujushhie_dly_polikarbonata/" itemprop="url"><span itemprop="title">Комплектующие для поликарбоната</span></a>
	</div>
	<div class="catalog">
		<div class="introHolder">
			<h1>Комплектующие для поликарбоната</h1>
		</div>
		
		<?php 	$product = mysql_query('SELECT * FROM komplektujushhie WHERE id < 313 order by id asc '); # Запрос
				while ($row = mysql_fetch_assoc($product)) { ?>
			<div class="row product_list">
				<div class="one-half column img">
					<a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>" alt="<?php echo $row['name'] .' от '. floor($row['price']) .' руб. за шт'; ?>"></a>
				</div>
				<div class="one-half column products">
					<p class="name"><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/"><?php echo $row['name']; ?><?php if ($color != '') { echo ', '. $h1_color; } ?></a></p>
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
					<ul class="price">
						<li class="list">Цена за шт.</li>
						<li class="price"><span><?php echo $row['price']; ?></span> руб.</li>
					</ul>
					<p><a class="button button-buy" <a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/">Купить</a></p>
				</div>							
			</div>
		<?php } ?>
		<?php 	$product = mysql_query('SELECT * FROM komplektujushhie WHERE id >= 313 and id < 320 order by id asc '); # Запрос
				while ($row = mysql_fetch_assoc($product)) { ?>
			<div class="row product_list">
				<div class="one-half column img">
					<a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>" alt="<?php echo $row['name'] .' от '. floor($row['price']) .' руб. за шт'; ?>"></a>
				</div>
				<div class="one-half column products">
					<p class="name"><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/"><?php echo $row['name']; ?><?php if ($color != '') { echo ', '. $h1_color; } ?></a></p>
					<ul class="price">
						<li class="list">Цена за <?php if($row['id'] == '319' or $row['id'] == '318') { echo 'за погонный метр'; } else { echo 'за шт.'; } ?></li>
						<li class="price"><span><?php echo $row['price']; ?></span> руб.</li>
					</ul>
					<p><a class="button button-buy" <a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/">Купить</a></p>
				</div>							
			</div>
		<?php } ?>
		<?php 	$product = mysql_query('SELECT * FROM komplektujushhie WHERE id = 320 order by id asc '); # Запрос
				while ($row = mysql_fetch_assoc($product)) { ?>
			<div class="row product_list">
				<div class="one-half column img">
					<a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>" alt="<?php echo $row['name'] .' от '. floor($row['price']) .' руб. за шт'; ?>"></a>
				</div>
				<div class="one-half column products">
					<p class="name"><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><?php echo $row['name']; ?><?php if ($color != '') { echo ', '. $h1_color; } ?></a></p>
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
					<ul class="price">
						<li class="list">Цена за шт.</li>
						<li class="price"><span><?php echo $new_price = $row['price']/125; ?></span> руб.</li>
					</ul>
					<ul class="price">
						<li class="list">Цена за коробку</li>
						<li class="price"><span><?php echo $row['price']; ?></span> руб.</li>
					</ul>
					<p><a class="button button-buy" <a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/">Купить</a></p>
				</div>							
			</div>
		<?php } ?>
		<?php 	$product = mysql_query('SELECT * FROM komplektujushhie WHERE id = 321 order by id asc '); # Запрос
				while ($row = mysql_fetch_assoc($product)) { ?>
			<div class="row product_list">
				<div class="one-half column img">
					<a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>" alt="<?php echo $row['name'] .' от '. floor($row['price']) .' руб. за шт'; ?>"></a>
				</div>
				<div class="one-half column products">
					<p class="name"><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><?php echo $row['name']; ?><?php if ($color != '') { echo ', '. $h1_color; } ?></a></p>
					<ul class="color">
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/turquoise/"><i class="fa fa-circle turquoise" aria-hidden="true" title="Бирюза"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/grey/"><i class="fa fa-circle grey" aria-hidden="true" title="Серый"></i></a></li>
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/black/"><i class="fa fa-circle black" aria-hidden="true" title="Черный"></i></a></li>
					</ul>
					<ul class="price">
						<li class="list">Цена за шт.</li>
						<li class="price"><span><?php echo $row['price']; ?></span> руб.</li>
					</ul>
					<p><a class="button button-buy" <a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/transparent/">Купить</a></p>
				</div>							
			</div>
		<?php } ?>
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
				<?php $title = mysql_query('SELECT * FROM monolitny_polikarbonat ORDER by id asc'); # Цена для title
							$row = mysql_fetch_assoc($title); ?>
				<p><a href="/catalog/monolitny_polikarbonat/"><img class="tumb" src="img/catalog/monolitny_polikarbonat.png"></a></p>
				<p class="name"><a href="/catalog/monolitny_polikarbonat/">Монолитный поликарбонат от <?php echo floor($row['price']); ?> руб. за кв/м</a></p>
			</div>
		</div>
	</div>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>