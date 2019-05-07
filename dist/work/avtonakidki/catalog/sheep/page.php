<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$id = htmlspecialchars(trim($_GET['id']));
	$category = 'sheep';
	$db = new SafeMySQL();
	$row = $db->getRow('SELECT * FROM products WHERE id = ?s', $id);
		
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Автомобильная накидка на сиденья <?php if ($id == '307' or $id == '308') { echo 'Мутон'; } else { echo 'из овчины'; } ?> <?php echo $row['color']; ?> - АВТОНАКИДКИ.НЕТ</title> 
	<meta name="Keywords" content="накидка на сиденья из овчины, накидки на сиденья автомобиля из овчины" /> 
	<meta name="Description" content="Автомобильная накидка на сиденья <?php if ($id == '307' or $id == '308') { echo 'Мутон'; } else { echo 'из овчины'; } ?> в Краснодаре, доставка по РФ" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
	<link rel="stylesheet" href="/css/blueimp-gallery.css">
	<script src="/js/blueimp/blueimp-gallery.min.js"></script>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>

	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
   			<div class="slides"></div>
    		<h3 class="title"></h3>
   			<a class="prev">‹</a>
    		<a class="next">›</a>
    		<a class="close">×</a>
    		<ol class="indicator"></ol>
		</div>

	<script type="text/javascript" src="js/ajax-refresh-item.js"></script>
	<div class="refresh">
		<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / 
			<a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / 
			<a href="/catalog/<?php echo $row['category']; ?>/" itemprop="url"><span itemprop="title">Накидки из овчины</span></a> / Автомобильная накидка на сиденья <?php if ($id == '307' or $id == '308') { echo 'Мутон'; } else { echo 'из овчины'; } ?> <?php echo $row['color']; ?>
		</div>
		<div class="product_page">
			
			<div class="introHolder">
				<h1><?php echo $row['name']; ?> <?php echo $row['color']; ?></h1>
			</div>
			<div class="row">
				<div class="one-half column page_left product_img">
					
					<div id="links">
						<?php 	if ($id < '307') { $select_img = $db->getAll('SELECT * FROM products WHERE category = ?s and id < "307"', $category); }
								elseif ($id == '307' or $id == '308') { $select_img = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "306" and id < "309"', $category); }
								elseif ($id > '308') { $select_img = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "308"', $category); }
											foreach($select_img as $list) { ?>
						<a <?php if($id != $list['id']) { echo 'data-gallery'; echo ' data-set="none"'; }  ?> href="/img/catalog/<?php echo $list['category']; ?>/<?php echo $list['img']; ?>"><img src="/img/catalog/<?php echo $list['category']; ?>/<?php echo $list['img']; ?>"/></a>
						<?php } ?>
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
				</div>
				<div class="one-half column page_right">
					<ul class="color product_color">
						<?php 	if ($id < '307') { $select_color = $db->getAll('SELECT * FROM products WHERE category = ?s and id < "307"', $category); }
								elseif ($id == '307' or $id == '308') { $select_color = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "306" and id < "309"', $category); }
								elseif ($id > '308') { $select_color = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "308"', $category); }
												foreach($select_color as $list) { ?>
						<li><a href="/catalog/<?php echo $list['category']; ?>/<?php echo $list['url']; ?>/"><img <?php if ($id == $list['id']) { echo ' class="active"'; } ?>src="/img/catalog/<?php echo $list['category']; ?>/<?php echo $list['img']; ?>"/></a></li>
							<?php } ?>
					</ul>
					<ul class="tech">
						<li class="left">Основа:</li><li><?php if ($id < '307') { echo 'Ткань'; } else { echo 'Шкура'; } ?></li>
						<li class="left">Подкладка:</li><li>Антискользящая</li>
						<li class="left">Тип креплений:</li><li>Универсальный</li>
					</ul>

					<select class="u-full-width" name="price" id="select_price">
						<option id="Одна (на любое переднее седение)" value="<?php echo $row['price']; ?>">Одна (на любое переднее седение)</option>
						<option id="Комплект на передние сиденья" value="<?php echo $row['price']*2 - 10; ?>" selected>Комплект на передние сиденья</option>
						<option id="Комплект на задние сиденья" value="<?php echo $row['price']*2; ?>">Комплект на задние сиденья</option>
						<option id="Комплект на весь салон" value="<?php echo $row['price']*4-10; ?>">Комплект на весь салон</option>
					</select>
					<script type="text/javascript">
						document.getElementById("select_price").addEventListener("change", function(){
						  document.getElementById('price').innerHTML = this.value;
						  document.getElementById('price_value').value = this.value;
							var i = this.selectedIndex;
							var text = this.options[i].text;
						  document.getElementById('size').value = text;
						});
					</script>
					<p class="price"> <span id="price"><?php echo $row['price']*2 - 10; ?></span> р.</p>
					
					<form action="/catalog/inc/addtocart.php" method="post" id="add" class="-visor-no-click">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<input type="hidden" id="price_value" name="price" value="<?php echo $row['price']*2 - 10; ?>">
						<input type="hidden" id="size" name="size" value="Комплект на передние сиденья">
						<input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
						<button class="button button-buy" 
							onsubmit="ym(50831057, 'reachGoal', 'AV_CART'); return true;">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i> В корзину</button>
					</form>
				</div>
			</div>
		</div>
		<div class="product_page_about">
			<div class="row">
				<p>Автомобильные накидки из овчины позволяют сохранить внешнюю привлекательность автомобильных сидений и предотвратить возникновение на их поверхности потёртостей и пятен. Накидки из овчины отлично подходят в зимний период. Накидки на сиденье автомобиля изготовливаются из натуральной овчины с коротким ворсом.</p>
			</div>
		</div>
		<div class="product_page_photo_zad">
			<div class="row" id="links2">
				<ul>
					<li><a href="/img/catalog/<?php echo $row['category']; ?>/zad1.jpg"><img src="/img/catalog/<?php echo $row['category']; ?>/zad1.jpg"></a></li>
					<li><a href="/img/catalog/<?php echo $row['category']; ?>/zad2.jpg"><img src="/img/catalog/<?php echo $row['category']; ?>/zad2.jpg"></a></li>
				</ul>
			</div>
			<script>
				document.getElementById('links2').onclick = function (event) {
				event = event || window.event;
				var target = event.target || event.srcElement,
				link = target.src ? target.parentNode : target,
				options = {index: link, event: event, toggleControlsOnSlideClick: false},
				links = this.getElementsByTagName('a');
				blueimp.Gallery(links, options);
				};
			</script>
		</div>
		<div class="product_page_specification">
			<div class="introHolder">
				<h2>Характеристики</h2>
			</div>
			<div class="row">
				<div class="one-half column">
					<table>
						<tr>
							<td>Материал верха</td>
							<td class="right">Натуральная шерсть</td>
						</tr>
						<tr>
							<td>Состав</td>
							<?php if ($id == '307' or $id == '308') { ?>
								<td class="right">Мутон, овечья шерсть</td>
							<?php } else { ?>
								<td class="right">овечья шерсть</td>
							<?php } ?>
						</tr>
						<tr>
							<td>Длина накидки (пер)</td>
							<td class="right">145 см</td>
						</tr>
						<tr>
							<td>Ширина спинки (пер)</td>
							<td class="right">55 см</td>
						</tr>
						<tr>
							<td>Ширина сидушки (пер)</td>
							<td class="right">55 см</td>
						</tr>
						<tr>
							<td>Длина ворса</td>
							<td class="right osn"><?php if ($id < '309') { echo '1.5 см'; } else { echo '2 см'; } ?></td>
						</tr>
					</table>
				</div>
				<div class="one-half column">
					<table>
						<tr>
							<td>Длина накидки (зад)</td>
							<td class="right">135 см</td>
						</tr>
						<tr>
							<td>Ширина накидки (зад)</td>
							<td class="right">55 см</td>
						</tr>
						<tr>
							<td>Спинка (зад)</td>
							<td class="right">75 х 53 см</td>
						</tr>
						<tr>
							<td>Основа</td>
							<td class="right osn"><?php if ($id < '307') { echo 'Ткань'; } else { echo 'Шкура'; } ?></td>
						</tr>
						<tr>
							<td>Крепление</td>
							<td class="right">Универсальное</td>
						</tr>
						<tr>
							<td>Гарантия качества</td>
							<td class="right">3 года</td>
						</tr>
					</table>
				</div>
			</div>	
		</div>
	</div>
	<?php if ($id < '307') { ?>
	<div class="product_list more">
		<div class="introHolder">
			<h2>Еще накидки из овчины</h2>
		</div>
		<div class="row">
			<?php 	$product = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "306" LIMIT 3', $category);
				foreach($product as $row) { ?>
			<div class="one-third column" itemscope itemtype="http://schema.org/Product">
				<p><a itemprop="url" href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><span itemprop="name"><?php echo $row['name']; ?> <?php echo $row['color']; ?></span></a></p>
				<a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" itemprop="image"></a>
				<p style="display:none;" itemprop="description">Меховые накидки на сиденье автомобиля изготовливаются из натуральной шерсти с длинным ворсом.</p>
				<p class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">от <span itemprop="price"><?php echo $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />р.</p>
				<p><a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/" class="button button-buy">Купить</a></p>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php } else  { ?>
	<div class="product_list more">
		<div class="introHolder">
			<h2>Еще накидки из овчины</h2>
		</div>
		<div class="row">
			<?php 	$product = $db->getAll('SELECT * FROM products WHERE category = ?s and id < "307" LIMIT 3', $category);
				foreach($product as $row) { ?>
			<div class="one-third column" itemscope itemtype="http://schema.org/Product">
				<p><a itemprop="url" href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><span itemprop="name"><?php echo $row['name']; ?> <?php echo $row['color']; ?></span></a></p>
				<a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" itemprop="image"></a>
				<p style="display:none;" itemprop="description">Меховые накидки на сиденье автомобиля изготовливаются из натуральной шерсти с длинным ворсом.</p>
				<p class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">от <span itemprop="price"><?php echo $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />р.</p>
				<p><a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/" class="button button-buy">Купить</a></p>
			</div>
			<?php } ?>
		</div>
	<?php } ?>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/catalog/inc/more_products.php'); ?>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>