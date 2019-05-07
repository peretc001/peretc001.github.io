<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$id = htmlspecialchars(trim($_GET['id']));
	$category = 'mex';
	$db = new SafeMySQL();
	$row = $db->getRow('SELECT * FROM products WHERE id = ?s', $id);
		
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Меховая накидка на сиденья автомобиля из овчины <?php echo $row['color']; ?> - АВТОНАКИДКИ.НЕТ</title> 
	<meta name="Keywords" content="меховые накидки на сиденья автомобиля, меховые накидки из овчины" /> 
	<meta name="Description" content="Меховые накидки на сиденья автомобиля из овчины в наличии в Краснодаре" />
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
			<a href="/catalog/<?php echo $row['category']; ?>/" itemprop="url"><span itemprop="title">Накидки из меха</span></a> / Автомобильная накидка на сиденья из меха <?php echo $row['color']; ?>
		</div>
		<div class="product_page">
			
			<div class="introHolder">
				<h1><?php echo $row['name']; ?> <?php echo $row['color']; ?></h1>
			</div>
			<div class="row">
				<div class="one-half column page_left product_img">
					
					<div id="links">
						<?php 	if 		($id < '203') { $select_img = $db->getAll('SELECT * FROM products WHERE category = ?s and id < "203"', $category); }
								elseif 	($id > '202') { $select_img = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "202"', $category); }
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
						<?php 	if 		($id < '203') { $select_color = $db->getAll('SELECT * FROM products WHERE category = ?s and id < "203"', $category); }
								elseif 	($id > '202') { $select_color = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "202"', $category); }
									foreach($select_color as $list) { ?>
						<li><a href="/catalog/<?php echo $list['category']; ?>/<?php echo $list['url']; ?>/"><img <?php if ($id == $list['id']) { echo ' class="active"'; } ?>src="/img/catalog/<?php echo $list['category']; ?>/<?php echo $list['img']; ?>"/></a></li>
							<?php } ?>
					</ul>

					<ul class="tech">
						<li class="left">Основа:</li><li><?php if ($id < '203') { echo 'Ткань'; } else { echo 'Шкура'; } ?></li>
						<li class="left">Подкладка:</li><li>Антискользящая</li>
						<li class="left">Тип креплений:</li><li>Универсальный</li>
					</ul>

					<select class="u-full-width" name="price" id="select_price">
						<option id="Одна (на любое переднее седение)" value="<?php echo $row['price']; ?>" <?php if ($id > '202') { echo 'selected'; } ?>>Одна (на любое переднее седение)</option>
						<option id="Комплект на передние сиденья" value="<?php echo $row['price']*2 - 10; ?>" <?php if ($id < '203') { echo 'selected'; } ?>>Комплект на передние сиденья</option>
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
					<p class="price"> <span id="price"><?php 
							if ($id < '203') { echo $row['price']*2 - 10; }
							else { echo $row['price']; } ?></span> р.</p>
					
					<form action="/catalog/inc/addtocart.php" method="post" id="add" class="-visor-no-click">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<input type="hidden" id="price_value" name="price" value="<?php 
							if ($id < '203') { echo $row['price']*2 - 10; }
							else { echo $row['price']; } ?>">
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
				<p>Меховые накидки на сиденье автомобиля изготовливаются из натуральной шерсти с длинным ворсом. Накидки из меха придадут вашему автомобилю изысканный вид, уберегут сиденья и подарят комфорт в прохладное время года. Меховые накидки для сидений универсальны, и подойдут для любого автомобиля.</p>
			</div>
		</div>
		<div class="product_page_mex">
			<?php if ($id == '202') { ?>
			<div class="row">
				<img src="/img/catalog/mex/mex2.jpg" alt="Комбинированная накидка из меха АВТОНАКИДКИ.НЕТ">
			</div>
			<?php } ?>
			<div class="row">
				<img src="/img/catalog/mex/nakidka_iz_mexa.jpg" alt="Накидка из меха АВТОНАКИДКИ.НЕТ">
			</div>
			<div class="row">
				<div class="one-half column">
					<img src="/img/catalog/mex/zad.jpg" alt="Накидка из меха АВТОНАКИДКИ.НЕТ">
				</div>
				<div class="one-half column">
					<img src="/img/catalog/mex/vors.jpg" alt="Накидка из меха АВТОНАКИДКИ.НЕТ">
				</div>
			</div>
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
							<td class="right">овечья шерсть</td>
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
							<td class="right">7 см</td>
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
							<td class="right osn"><?php if ($id < '203') { echo 'Ткань'; } else { echo 'Шкура'; } ?></td>
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
	
	<?php if ($id > '202') { ?>
	<div class="product_list more">
		<div class="introHolder">
			<h2>Меховые накидки на ткани</h2>
		</div>
		<div class="row">
			<div class="two columns">&nbsp;</div>
			<?php 	$product = $db->getAll('SELECT * FROM products WHERE category = ?s and id < "203"', $category);
				foreach($product as $row) { ?>
			<div class="four columns" itemscope itemtype="http://schema.org/Product">
				<p><a itemprop="url" href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><span itemprop="name"><?php echo $row['name']; ?> <?php echo $row['color']; ?></span></a></p>
				<a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>" itemprop="image"></a>
				<p style="display:none;" itemprop="description">Меховые накидки на сиденье автомобиля изготовливаются из натуральной шерсти с длинным ворсом.</p>
				<p class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">от <span itemprop="price"><?php echo $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />р.</p>
				<p><a href="/catalog/<?php echo $row['category']; ?>/<?php echo $row['url']; ?>/" class="button button-buy">Купить</a></p>
			</div>
			<?php } ?>
			<div class="two columns">&nbsp;</div>
		</div>
	</div>
	<?php } else  { ?>
	<div class="product_list more">
		<div class="introHolder">
			<h2>Меховые накидки на шкуре</h2>
		</div>
		<div class="row">
			<?php 	$product = $db->getAll('SELECT * FROM products WHERE category = ?s and id > "202" LIMIT 3', $category);
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