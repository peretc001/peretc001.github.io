<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Страница не найден | ПОЛИКАРБОНАТА.НЕТ</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>

	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <span itemprop="title">Страница не найден</span>
	</div>
	
	<div class="page">
		<h1>Ошибка 404. Страница не найдена</h1>
	</div>
	<div class="catalog">
		<div class="row catalog_home">
			<div class="one-half column">
				<?php $title = mysql_query('SELECT * FROM polikarbonat ORDER by id asc'); # Цена для title
							$row = mysql_fetch_assoc($title); ?>
				<p><a href="/catalog/sotovy_polikarbonat/"><img class="tumb" src="img/catalog/sotovy_polikarbonat.png"></a></p>
				<p class="name"><a href="/catalog/sotovy_polikarbonat/">Сотовый поликарбонат от <?php echo floor($row['price']); ?> руб. за кв/м</a></p>
				<p class="thin">Толщина: <a href="/catalog/sotovy_polikarbonat/3mm/">3мм</a>, <a href="/catalog/sotovy_polikarbonat/3.5mm/">3.5мм</a>, <a href="/catalog/sotovy_polikarbonat/4mm/">4мм</a>, <a href="/catalog/sotovy_polikarbonat/6mm/">6мм</a>, <a href="/catalog/sotovy_polikarbonat/8mm/">8мм</a>, <a href="/catalog/sotovy_polikarbonat/10mm/">10мм</a>, <a href="/catalog/sotovy_polikarbonat/16mm/">16мм</a></p>
				<p class="thin">Производитель: <a href="/catalog/sotovy_polikarbonat/Plastilux/">Plastilux</a>, <a href="/catalog/sotovy_polikarbonat/Polygal/">Polygal</a></p>
			</div>
			<div class="one-half column">
				<?php $title = mysql_query('SELECT * FROM monolitny_polikarbonat ORDER by id asc'); # Цена для title
							$row = mysql_fetch_assoc($title); ?>
				<p><a href="/catalog/monolitny_polikarbonat/"><img class="tumb" src="img/catalog/monolitny_polikarbonat.png"></a></p>
				<p class="name"><a href="/catalog/monolitny_polikarbonat/">Монолитный поликарбонат от <?php echo floor($row['price']); ?> руб. за кв/м</a></p>
				<p class="thin">Толщина: <a href="/catalog/monolitny_polikarbonat/2mm/">2мм</a>, <a href="/catalog/monolitny_polikarbonat/3mm/">3мм</a>, <a href="/catalog/monolitny_polikarbonat/4mm/">4мм</a>, <a href="/catalog/monolitny_polikarbonat/5mm/">5мм</a>, <a href="/catalog/monolitny_polikarbonat/6mm/">6мм</a>, <a href="/catalog/monolitny_polikarbonat/8mm/">8мм</a>, <a href="/catalog/monolitny_polikarbonat/10mm/">10мм</a></p>
				<p class="thin">Производитель: <a href="/catalog/monolitny_polikarbonat/CarboGlass/">CarboGlass</a>, <a href="/catalog/monolitny_polikarbonat/Polygal/">Polygal</a></p>
			</div>
		</div>
		<div class="row catalog_home">
			<div class="one-half column">
				<p><a href="/catalog/teplica_iz_polikarbonata/"><img class="tumb" src="img/catalog/teplica_iz_polikarbonata.png"></a></p>
				<p class="name"><a href="/catalog/teplica_iz_polikarbonata/">Теплицы из поликарбоната</a></p>
		</div>
			<div class="one-half column">
				<p><a href="/catalog/komplektujushhie_dly_polikarbonata/"><img class="tumb" src="img/catalog/komplektujushhie.png"></a></p>
				<p class="name"><a href="/catalog/komplektujushhie_dly_polikarbonata/">Комплектующие для поликарбоната</a></p>
			</div>
		</div>
	</div>
<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php');	?>
</body>
</html>