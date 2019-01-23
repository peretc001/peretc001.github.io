<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$id = htmlspecialchars(trim($_GET['id']));
	$category = 'kids';
	$db = new SafeMySQL();
	$row = $db->getRow('SELECT * FROM products WHERE id = ?s', $id);
		
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Меховая накидка на детское кресло <?php echo $row['color']; ?> - АВТОНАКИДКИ.НЕТ</title> 
	<meta name="Keywords" content="купить накидку на детское кресло" /> 
	<meta name="Description" content="Детские накидки для автокресла в наличии в Краснодаре" />
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
			<a href="/catalog/<?php echo $row['category']; ?>/" itemprop="url"><span itemprop="title">Накидки на детское кресло</span></a> / Меховая накидка на детское кресло <?php echo $row['color']; ?>
		</div>
		<div class="product_page">
			
			<div class="introHolder">
				<h1>Накидка на детское кресло <?php echo $row['color']; ?></h1>
			</div>
			<div class="row">
				<div class="one-half column page_left kids">
					
					<div id="links">
						<?php 	$select_img = $db->getAll('SELECT * FROM products WHERE category = ?s', $category);
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
					<ul class="color img">
						<?php 	$select_color = $db->getAll('SELECT * FROM products WHERE category = ?s', $category);
												foreach($select_color as $list) { ?>
						<li><a href="/catalog/<?php echo $list['category']; ?>/<?php echo $list['url']; ?>/"><img <?php if ($id == $list['id']) { echo ' class="active"'; } ?>src="/img/catalog/<?php echo $list['category']; ?>/<?php echo $list['img']; ?>"/></a></li>
							<?php } ?>
					</ul>
					
					<p class="price"> <span id="price"><?php echo $row['price']; ?></span> р.</p>
					
					<form action="/catalog/inc/addtocart.php" method="post" id="add" class="-visor-no-click">
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<input type="hidden" id="price_value" name="price" value="<?php echo $row['price']; ?>">
						<input type="hidden" id="size" name="size" value="">
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
				<p>Яркие, красочные меховые накидки для детских автокресел сегодня представляет торговая марка «Филиппок». Интересный дизайн и высокое качество изделий не оставят равнодушными ни детей, ни взрослых. Очаровательные накидки украсят интерьер машины, а поездка вашего ребенка пройдет увлекательнее и интереснее! И самое важное, при использовании автонакидки, в отличии от чехлов, остается возможность воспользоваться ремнями безопасности.</p>
				<p class="kids"><img src="/img/catalog/kids/kids.jpg"></p>
			</div>
		</div>
		<div class="product_page_specification">
			<div class="introHolder">
				<h2>Характеристики</h2>
			</div>
			<div class="row">
				<div class="one-half columns">
					<table>
						<tr>
							<td>Состав</td>
							<td class="right">искуственный мех</td>
						</tr>
						<tr>
							<td>Длина накидки</td>
							<td class="right">80 см</td>
						</tr>
						<tr>
							<td>Ширина спинки</td>
							<td class="right">34 см</td>
						</tr>
						<tr>
							<td>Длина ворса</td>
							<td class="right">2 см</td>
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