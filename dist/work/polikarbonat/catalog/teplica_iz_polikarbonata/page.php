<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
$id = htmlspecialchars(trim($_GET['id']));
$size = htmlspecialchars(trim($_GET['size']));
$teplica = mysql_query("SELECT * FROM teplica WHERE id = '$id' ");  
$row = mysql_fetch_assoc($teplica);

	if($id < '401' or $id > '404') { 
		header("Location: /catalog/teplica_iz_polikarbonata/"); 
	    exit;    
	}
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Купить теплицу <?php echo $row['model']; ?> из поликарбоната от <?php echo $row['price']; ?> руб. - ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="Keywords" content="Купить теплицу <?php echo $row['model']; ?>" /> 
	<meta name="Description" content="Купить теплицу <?php echo $row['model']; ?> из поликарбоната на сайте ПОЛИКАРБОНАТА.НЕТ от <?php echo $row['price']; ?> руб." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	
	
	$teplica = mysql_query("SELECT * FROM teplica WHERE id = '$id' ");  
	$row = mysql_fetch_assoc($teplica);

	?>
	
	
	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
		<div class="slides"></div>
		<a class="prev">‹</a>
		<a class="next">›</a>
		<a class="close">×</a>
		<ol class="indicator"></ol>
	</div>
		

	
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / <a href="/catalog/teplica_iz_polikarbonata/"><span itemprop="title">Теплицы из поликарбоната</span></a> / Теплица "<?php echo $row['model']; ?>"
	</div>
		
	<div class="product_page_teplica">
		<div class="introHolder">
			<h1>Теплица "<?php echo $row['model']; ?>" <?php if ($id == '403') { echo 'усиленная';} ?></h1>
		</div>
		
		<div class="row">
			<div class="one-third column page_left">
				
					<div class="general">
						<img src="img/catalog/teplica/<?php if ($id == '401') { echo 'slavanka.png'; } elseif ($id == '402') { echo 'tumb.png'; } elseif ($id == '403') { echo 'tumb.png'; } elseif ($id == '404') { echo 'avrora.png'; } ?>" alt='Купить теплицу из поликарбоната "<?php echo $row['model']; ?>" от <?php echo $row['price']; ?> руб.'>
					</div>
				<div id="links">
					<div class="tumb">
					<?php if ($id == '401') { ?>
						<a href="img/catalog/teplica/slavanka/1.jpg"><img src="img/catalog/teplica/slavanka/1.jpg" alt="Теплица Славянка. ПОЛИКАРБОНАТА.НЕТ"></a>
						<a class="img" href="img/catalog/teplica/slavanka/2.jpg"><img src="img/catalog/teplica/slavanka/2.jpg" alt="Теплица Славянка. ПОЛИКАРБОНАТА.НЕТ"></a>
						<a class="img" href="img/catalog/teplica/slavanka/3.jpg"><img src="img/catalog/teplica/slavanka/3.jpg" alt="Теплица Славянка. ПОЛИКАРБОНАТА.НЕТ"></a>
					<?php } if ($id == '404') { ?>
						<a class="img" href="img/catalog/teplica/avrora/1.jpg"><img src="img/catalog/teplica/avrora/1.jpg" alt="Теплица Аврора. ПОЛИКАРБОНАТА.НЕТ"></a>
						<a class="img" href="img/catalog/teplica/avrora/2.jpg"><img src="img/catalog/teplica/avrora/2.jpg" alt="Теплица Аврора. ПОЛИКАРБОНАТА.НЕТ"></a>
						<a class="img" href="img/catalog/teplica/avrora/3.jpg"><img src="img/catalog/teplica/avrora/3.jpg" alt="Теплица Аврора. ПОЛИКАРБОНАТА.НЕТ"></a>
						<a class="img" href="img/catalog/teplica/avrora/4.jpg"><img src="img/catalog/teplica/avrora/4.jpg" alt="Теплица Аврора. ПОЛИКАРБОНАТА.НЕТ"></a>
						<a class="img" href="img/catalog/teplica/avrora/5.jpg"><img src="img/catalog/teplica/avrora/5.jpg" alt="Теплица Аврора. ПОЛИКАРБОНАТА.НЕТ"></a>
						<a class="img" href="img/catalog/teplica/avrora/6.jpg"><img src="img/catalog/teplica/avrora/6.jpg" alt="Теплица Аврора. ПОЛИКАРБОНАТА.НЕТ"></a>
					<?php } ?>
					</div>
				</div>
				<script>
					document.getElementById('links').onclick = function (event) {
						event = event || window.event;
						var target = event.target || event.srcElement,
						link = target.src ? target.parentNode : target,
						options = {index: link, event: event, toggleControlsOnSlideClick: false},
						links = this.getElementsByTagName('a');
						blueimp.Gallery(links, options);
					};
				</script>
				<div class="clear"></div>
				<br>
				<p class="pdf"><a href="/catalog/teplica_iz_polikarbonata/doc/instrukcia_po_sborke_teplicy.pdf" target="_blank"><i class="fa fa-file-text" aria-hidden="true"></i> Инструкция по сборке теплицы</a></p>
			</div>
			<div class="two-thirds column page_right">
				<p>1. Размер теплицы:</p>
				<ul class="size">			
					<li <?php if ($size == '' or $size == '4') { $rsize = ''; echo 'class="active"'; } ?>><a  href="/catalog/teplica_iz_polikarbonata/page.php?id=<?php echo $id; ?>&size=4">3x4м</a></li>
					<li <?php if ($size == '6') { $rsize = '&size=6'; echo 'class="active"'; } ?>><a  href="/catalog/teplica_iz_polikarbonata/page.php?id=<?php echo $id; ?>&size=6">3x6м</a></li> 
					<li <?php if ($size == '8') { $rsize = '&size=8'; echo 'class="active"'; } ?>><a href="/catalog/teplica_iz_polikarbonata/page.php?id=<?php echo $id; ?>&size=8">3x8м</a></li>
					<li <?php if ($size == '10') { $rsize = '&size=10'; echo 'class="active"'; } ?>><a href="/catalog/teplica_iz_polikarbonata/page.php?id=<?php echo $id; ?>&size=10">3x10м</a></li>
					<li class="text">Высота теплицы: 2м</li>
				</ul>
				<p>2. Сотовый поликарбонат:</p>
				<ul class="polyc">			
					<li class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Сотовый поликарбонат: 4мм</li>
					<li>Возможна комплектация поликарбонатом другого размера. Цена индивидуально.
				</ul>
				<p>3. Каркас:</p>
				<ul class="polyc_size">			
					<?php if ($id == '401') { echo '<li class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Оцинкованный W профиль: 20х20x1.2мм</li>'; } 
					elseif ($id == '402') { echo '<li class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Окрашенная квадратная труба: 20х20x1.2мм</li><li class="noactive"><a href="/catalog/teplica_iz_polikarbonata/page.php?id=403'. $rsize .'"><i class="fa fa-square-o" aria-hidden="true"></i> Окрашенная квадратная труба: 20х40x1.5мм</a></li>'; }
					elseif ($id == '403') { echo '<li class="noactive"><i class="fa fa-square-o" aria-hidden="true"></i> <a href="/catalog/teplica_iz_polikarbonata/page.php?id=402'. $rsize .'">Окрашенная квадратная труба: 20х20x1.2мм</a></li><li class="active"><a><i class="fa fa-check-square-o" aria-hidden="true"></i> Окрашенная квадратная труба: 20х40x1.5мм</a></li>'; }
					elseif ($id == '404') { echo '<li class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Окрашенная профильная труба: 20х20x1.2мм</li>'; } ?>
				</ul>
				<ul class="specific">
					<li>Дуги - цельногнутые<br> Торцы - цельносварные</li>
					<li>Шаг между дугами - 1м<br> Основание: 20х40х1.2мм</li>
				</ul>
				<?php
					if ($size == '' or $size == '4') { $price = $row['price']; }
					elseif ($size == '6') { $s = '4000'; }
					elseif ($size == '8') { $s = '8000'; }
					elseif ($size == '10') { $s = '12000'; }
					$price = ($row['price'] + $s);
				?>
					
				<p class="price">Цена: <span><?php echo $price; ?> &#8381;</span></p>	
				<p>4. Введите количество:</p>
				<form action="/catalog/inc/addtocart.php" method="post" id="add" class="-visor-no-click">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="product_name" value="<?php echo $row['name']; ?> <?php echo $row['model']; ?>. <?php 	if ($id == '401') { echo 'Оцинкованный профиль: 20х20x1.2мм'; }
								elseif ($id == '402') { echo 'Окрашенная квадратная труба: 20х20x1.2мм'; }
								elseif ($id == '403') { echo 'Усиленная. Окрашенная квадратная труба: 20х40x1.5мм'; }
								elseif ($id == '404') { echo 'Окрашенная профильная труба: 20х20x1.2мм'; }
						?>">
					<input type="hidden" name="size" value="<?php if ($size == '') { echo '4'; } else { echo $size; } ?>">
					<input type="hidden" name="price" value="<?php echo $price; ?>">
					<input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<input type="hidden" name="img" value="/img/catalog/teplica/tumb.png">
					
					<ul class="buy">	
						<li class="qty"><input type="number" name="qty" value="1"></li>
						<li><input type="submit" value="В корзину" class="button button-buy" onclick="yaCounter15357751.reachGoal('CART'); return true;"></li>
					</ul>
				
				</form>
				<ul class="cert">
					<li><img src="/img/rst.svg" alt=""></li>
					<li>
						<u>Продукция сертифицирована:</u><br>
						По ГОСТ Р ИСО 9001-2008 (ИСО 9001:2008) (Система менеджмента качества)<br>
						По ГОСТ Р ИСО 14001-2007(ИСО 14001:2004) (Система экологического менеджмента)<br>
						По ГОСТ 12.0.230-2007, ОНSАS 18001:2007 (Система менеджмента проф. безопасности и здоровья)
					</li>
				</ul>
			</div>
		</div>
		<div class="introHolder">
			<h3>Похожие товары:</h3>
		</div>
		<br>
		<div class="row">
		<?php 
			$dop_teplica = mysql_query("SELECT * FROM teplica WHERE id != '$id' and id != '403' ");  
			while($row = mysql_fetch_assoc($dop_teplica)) { ?>

			<div class="one-half column dop">
				<p><b><?php echo $row['model']?></b></p>
				<a href="/catalog/teplica_iz_polikarbonata/page.php?id=<?php echo $row['id']; ?>"><img src="img/catalog/teplica/<?php echo $row['img']; ?>" alt=" Теплица из поликарбоната <?php echo $row['model']?>"></a>
				<p>Размер теплицы: 3х4, 3х6, 3х8, 3х10 м<br>
				Поликарбонат: 4мм<br>
				<?php echo $row['base']?><br>
				<p class="price">от <?php echo $row['price']; ?> &#8381;</p>
				<p><a class="button button-buy" href="/catalog/teplica_iz_polikarbonata/page.php?id=<?php echo $row['id']; ?>">Подробнее</a></p>
			</div>

		<?php } ?>
		</div>
	</div>


	<div class="teplica">
		<div class="introHolder">
			<h2>Характеристики теплицы</h2>
		</div>
		<div class="row">
			<div class="three columns">
				<img src="img/catalog/teplica/t1.png" alt="">
				<p>Легко<br> собирается</p>
			</div>
			<div class="three columns">
				<img src="img/catalog/teplica/t2.png" alt="">
				<p>Обладает защитой<br> от коррозии</p>
			</div>
			<div class="three columns">
				<img src="img/catalog/teplica/t3.png" alt="">
				<p>Защищает от<br> УФ лучей</p>
			</div>
			<div class="three columns">
				<img src="img/catalog/teplica/t4.png" alt="">
				<p>Не требует<br> основания</p>
			</div>
		
			<div class="three columns">
				<img src="img/catalog/teplica/t5.png" alt="">
					<p>Защищает от<br> паразитов</p>
			</div>
			<div class="three columns">
				<img src="img/catalog/teplica/t6.png" alt="">
					<p>Сокращает<br> срок созревания</p>
			</div>
			<div class="three columns">
				<img src="img/catalog/teplica/t7.png" alt="">
					<p>Имеет форточки<br> для проветривания</p>
			</div>
		</div>
	</div>


	<div class="teplica_review">
		<div class="introHolder">
			<h3>Отзывы</h3>
		</div>
		<?php 
			$i = 0;
			$ot = mysql_query("SELECT * FROM `gb` WHERE category = 'teplica' ORDER by dt DESC	");	
				while( $row = mysql_fetch_array($ot) )
		{ $i++; ?>
		<div class="row">
			<div class="left">
				<?php if($row['img'] != '') { ?>
					<div id="links-<?php echo $i; ?>">
						<a class="img" href="upload/<?php echo $row['img']; ?>"><img src="upload/<?php echo $row['img']; ?>" alt="<?php echo $row['alt']; ?>"></a>
					</div>
					<script>
					document.getElementById('links-<?php echo $i; ?>').onclick = function (event) {
						event = event || window.event;
						var target = event.target || event.srcElement,
						link = target.src ? target.parentNode : target,
						options = {index: link, event: event, toggleControlsOnSlideClick: false},
						links = this.getElementsByTagName('a');
						blueimp.Gallery(links, options);
					};
				</script>
				<?php } else {
					echo '<img src="upload/avatar.png">';
				} ?>
			</div>
			<div class="right">
				<p><b id="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></b>
				<?php 	
								
					for ($a = 1; $a <= 5; $a++) {
						if ($a > $row['total_value'])  // если значение переменной $a равно 5
							goto end;  // то переходим к выполнению инструкций следующих за меткой   
							echo '<i class="fa fa-star" aria-hidden="true"></i>';
						}
						end:
							for ($c = $a; $c <= 5; $c++)
							echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
						
				?>
				<p><?php echo $row['msg']; ?></p>
			</div>
		</div>
		<?php }  ?>
	</div>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
	<script src="js/ajax-refresh-item.js"></script>
	<link rel="stylesheet" href="/css/blueimp-gallery.css">
	<script src="/js/blueimp/blueimp-gallery.min.js"></script>
</body>
</html>