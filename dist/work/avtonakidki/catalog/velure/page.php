<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$id = htmlspecialchars(trim($_GET['id']));
	$category = 'velure';
	$db = new SafeMySQL();
	$row = $db->getRow('SELECT * FROM products WHERE id = ?s', $id);
		
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Автомобильная накидка на сиденья из велюра <?php echo $row['color']; ?> - АВТОНАКИДКИ.НЕТ</title> 
	<meta name="Keywords" content="накидки из велюра" /> 
	<meta name="Description" content="Автомобильные накидки из велюра в наличии в Краснодаре" />
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
			<a href="/catalog/<?php echo $row['category']; ?>/" itemprop="url"><span itemprop="title">Накидки из велюра</span></a> / Автомобильная накидка на сиденья из велюра <?php echo $row['color']; ?>
		</div>
		<div class="product_page">
			
			<div class="introHolder">
				<h1>Накидка на сиденья из велюра <?php echo $row['color']; ?></h1>
			</div>
			<div class="row">
				<div class="one-half column page_left product_img">
					
					<div id="links">
						<?php 	
							$select_img = $db->getAll('SELECT * FROM products WHERE category = ?s', $category);
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
					<ul class="color">
						<li><a href="/catalog/<?php echo $row['category']; ?>/nakidka_dly_avto_iz_velura_chernaya/"><i class="fa <?php if ($id == '501') { echo 'fa-check-circle'; } else { echo 'fa-circle'; }?> black" aria-hidden="true" title="Черный"></i></a></li>
						<li><a href="/catalog/<?php echo $row['category']; ?>/nakidka_dly_avto_iz_velura_korichnevaya/"><i class="fa <?php if ($id == '502') { echo 'fa-check-circle'; } else { echo 'fa-circle'; }?> brown" aria-hidden="true" title="Коричневый"></i></a></li>						
					</ul>
					<ul class="tech">
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
							<td class="right">100% овечья шерсть</td>
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
							<td class="right">5 см</td>
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
	
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/catalog/inc/more_products.php'); ?>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>