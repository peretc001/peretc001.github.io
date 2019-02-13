<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
$id = htmlspecialchars(trim($_GET['id']));
$size = htmlspecialchars(trim($_GET['size'])); 
$color = htmlspecialchars(trim($_GET['color'])); 

$title = mysql_query("SELECT * FROM polikarbonat WHERE id = '$id' ");  
$row = mysql_fetch_assoc($title); 

if ($color == '' or $color == 'transparent') { $price = $row['price']; $h1_color = 'Прозрачный'; $light = '75-86';}
elseif ($color == 'turquoise') { $price = $row['price_color']; $h1_color = 'Бирюза'; $light = '25-45';}
elseif ($color == 'bronze') { $price = $row['price_color']; $h1_color = 'Бронза'; $light = '25-50';}

elseif ($color == 'opal' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Опал'; $light = '55-75';}
elseif ($color == 'opal' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1; $h1_color = 'Опал'; $light = '55-75';}
elseif ($color == 'opal' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08; $h1_color = 'Опал'; $light = '55-75';}

elseif ($color == 'grey' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Серый'; $light = '0';}
elseif ($color == 'grey' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1; $h1_color = 'Серый'; $light = '0';}
elseif ($color == 'grey' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08; $h1_color = 'Серый'; $light = '0';}

elseif ($color == 'silver' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Серебро'; $light = '0';}
elseif ($color == 'silver' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1; $h1_color = 'Серебро'; $light = '0';}
elseif ($color == 'silver' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08; $h1_color = 'Серебро'; $light = '0';}

elseif ($color == 'green' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Зеленый'; $light = '25-45';}
elseif ($color == 'green' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1; $h1_color = 'Зеленый'; $light = '25-45';}
elseif ($color == 'green' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.06; $h1_color = 'Зеленый'; $light = '25-45';}

elseif ($color == 'yellow' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Желтый'; $light = '25-45';}
elseif ($color == 'yellow' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1; $h1_color = 'Желтый'; $light = '25-45';}
elseif ($color == 'yellow' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08; $h1_color = 'Желтый'; $light = '25-45';}

elseif ($color == 'orange' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Оранжевый'; $light = '25-45';}
elseif ($color == 'orange' and $row['brand'] == 'Polygal' and $row['thin'] == '4') { $price = $row['price']*1.1; $h1_color = 'Оранжевый'; $light = '25-45';}
elseif ($color == 'orange' and $row['brand'] == 'Polygal' and $row['thin'] != '4') { $price = $row['price']*1.08; $h1_color = 'Оранжевый'; $light = '25-45';}

elseif ($color == 'red' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Красный'; $light = '25-45';}
elseif ($color == 'red' and $row['brand'] == 'Polygal') { $price = $row['price']*1.15; $h1_color = 'Красный'; $light = '25-45';}
elseif ($color == 'blue' and $row['brand'] != 'Polygal') { $price = $row['price_color']; $h1_color = 'Синий'; $light = '25-45';}
elseif ($color == 'blue' and $row['brand'] == 'Polygal') { $price = $row['price']*1.15; $h1_color = 'Синий'; $light = '25-45';}
$thin = $row['thin'];
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title><?php echo $row['name'] .' '. $row['brand'] .' '. $row['thin'] .'мм, '. $h1_color .','; ?> купить за <?php if ($color == 'transparent') { echo floor($row['price']); } else { echo floor($row['price_color']); } ?> руб. за кв/м</title> 
	<meta name="Keywords" content="<?php echo $row['name'] .' '. $row['brand'] .', '. $row['name'] .' '. $row['brand'] .' '. $row['thin'] .'мм, '. $row['name'] .' '. $row['brand'] .' '. $h1_color; ?>" /> 
	<meta name="Description" content="Купить <?php echo $row['name'] .' '. $row['brand'] .' '. $row['thin'] .'мм '. $h1_color; ?> на сайте ПОЛИКАРБОНАТА.НЕТ за <?php if ($color == 'transparent') { echo floor($row['price']); } else { echo floor($row['price_color']); } ?> руб. за кв/м." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	<script type="text/javascript" src="js/ajax-refresh-item.js"></script>
	<div class="refresh">
		<?php 	$product = mysql_query("SELECT * FROM polikarbonat WHERE id = '$id' "); $row = mysql_fetch_assoc($product); ?>
		<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / 
			<a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / 
			<a href="/catalog/sotovy_polikarbonat/" itemprop="url"><span itemprop="title">Сотовый поликарбонат</span></a> / 
			<a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/" itemprop="url"><span itemprop="title"><?php echo $row['thin'] .'мм'; ?></span></a> / 
			<a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_<?php echo $color; ?>/<?php if ($size == '12') { echo $size .'/'; } ?>" itemprop="url"><span itemprop="title"><?php echo $row['name'] .' '. $row['brand'] .', '. $row['thin'] .'мм, '. $h1_color; ?></span></a>
		</div>
		<div class="product_page">
			<div class="introHolder">
				<h1><?php echo $row['name'] .' '. $row['brand'] .', '. $row['thin'] .'мм, '. $h1_color; ?></h1>
			</div>
			
			<div class="row">
				<div class="one-third column page_left">
					<img class="tumb" src="/img/catalog/polikarbonat/<?php 
						if ($color == '' or $color == 'transparent') { echo '1.png'; } 
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
				</div>
				<div class="two-thirds column page_right">
					<p>1. Выберите цвет:</p>
					<ul class="color">
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_transparent/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle transparent <?php if ($color == '' or $color == 'transparent') { echo 'active'; } ?>" aria-hidden="true" title="Прозрачный"></i></a></li>
						<?php if ($row['thin'] >= '4') { ?>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_turquoise/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle turquoise <?php if ($color == 'turquoise') { echo 'active'; } ?>" aria-hidden="true" title="Бирюза"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_bronze/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle bronze <?php if ($color == 'bronze') { echo 'active'; } ?>" aria-hidden="true" title="Бронза"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_opal/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle opal <?php if ($color == 'opal') { echo 'active'; } ?>" aria-hidden="true" title="Опал"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_grey/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle grey <?php if ($color == 'grey') { echo 'active'; } ?>" aria-hidden="true" title="Серый"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_silver/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle silver <?php if ($color == 'silver') { echo 'active'; } ?>" aria-hidden="true" title="Серебро"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_green/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle green <?php if ($color == 'green') { echo 'active'; } ?>" aria-hidden="true" title="Зеленый"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_yellow/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle yellow <?php if ($color == 'yellow') { echo 'active'; } ?>" aria-hidden="true" title="Желтый"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_orange/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle orange <?php if ($color == 'orange') { echo 'active'; } ?>" aria-hidden="true" title="Оранжевый"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_red/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle red <?php if ($color == 'red') { echo 'active'; } ?>" aria-hidden="true" title="Красный"></i></a></li>
						<li><a href="/catalog/sotovy_polikarbonat/<?php echo $row['thin']; ?>mm/sotovy_polikarbonat_<?php echo $row['thin']; ?>mm_<?php echo $row['brand']; ?>_blue/<?php if ($size == '12') { echo $size .'/'; } ?>"><i class="fa fa-circle blue <?php if ($color == 'blue') { echo 'active'; } ?>" aria-hidden="true" title="Синий"></i></a></li>
						<?php } ?>
					</ul>
					<p>2. Выберите размер листа:</p>
					<ul class="size">			
						<?php if ($size == '' or $size == '6') { echo '<li class="active">2,1 х 6м</li> <li><a href="/catalog/sotovy_polikarbonat/'. $row['thin'] .'mm/sotovy_polikarbonat_'. $row['thin'] .'mm_'. $row['brand'] .'_'. $color .'/12/">2,1 х 12м</a></li>'; } else { echo '<li><a href="/catalog/sotovy_polikarbonat/'. $row['thin'] .'mm/sotovy_polikarbonat_'. $row['thin'] .'mm_'. $row['brand'] .'_'. $color .'/">2,1 x 6м</a></li> <li class="active">2,1 х 12м</li>';} ?>
					</ul>
					<ul class="price_kv">
						<li class="list">Цена за кв/м</td>
						<li class="price"><span><?php echo $price; ?></span> руб.</td>
					</ul>
					<ul class="price_list">
							<li class="list">Цена за лист <span><?php if ($size == '' or $size == '6') {echo '6';} else {echo '12';} ?> метров</span></td>
							<li class="price"><span><?php $list_p = $price; if ($size == '' or $size == '6') {$list_l = '12.6';} else {$list_l = '25.2';} $list = $list_p*$list_l; echo round($list); ?>.00</span> руб. </td>
					</ul>
					
					<p>3. Введите количество листов:</p>
					<form action="/catalog/inc/addtocart.php" method="post" id="add" class="-visor-no-click">
						<input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
						<input type="hidden" id="product_name" name="product_name" value="<?php echo $row['name']; ?> <?php echo $row['brand']; ?>, <?php echo $row['thin']; ?> мм, <?php echo $h1_color; ?>">
						<input type="hidden" id="color" name="color" value="<?php echo $h1_color; ?>">
						<input type="hidden" id="size" name="size" value="<?php if ($size == '') { echo '6'; } else { echo $size; } ?>">
						<input type="hidden" id="price" name="price" value="<?php echo round($list); ?>">
						<input type="hidden" id="url" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
						<input type="hidden" id="img" name="img" value="/img/catalog/polikarbonat/<?php 
							if ($color == '' or $color == 'transparent') { echo '1.png'; } 
							elseif ($color == 'turquoise') { echo '2.png'; } 
							elseif ($color == 'bronze') { echo '3.png'; }
							elseif ($color == 'opal') { echo '4.png'; }
							elseif ($color == 'grey') { echo '5.png'; }
							elseif ($color == 'silver') { echo '6.png'; }
							elseif ($color == 'green') { echo '7.png'; }
							elseif ($color == 'yellow') { echo '8.png'; }
							elseif ($color == 'orange') { echo '9.png'; }
							elseif ($color == 'red') { echo '10.png'; }
							elseif ($color == 'blue') { echo '11.png'; } ?>">
						
					<ul class="buy">	
						<li class="qty"><input type="number" name="qty" value="1"></li>
						<li><input type="submit" value="В корзину" class="button button-buy" onclick="yaCounter15357751.reachGoal('CART'); return true;"></li>
					</ul>	
					</form>
				</div>
			</div>
		</div>
		
		<div class="product_page_about">
			<div class="row">
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/1.png" alt="Прочность">
					<p><b>Прочность</b></p>
					<p>Наличие ребер жесткости делают поликарбонат прочнее обычного или оргстекла. Он не ломается в местах сгиба и является бесспорным лидером среди прочих светопроводящих материалов</p>
				</div>
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/2.png" alt="Светопропускание">
					<p><b>Светопропускание</b></p>
					<p>Способность пропускать от 0 до 86% естественного света (в зависимости от цвета) позволяют придать помещению приятный оттенок и вписаться в любые ситуации, будь то кафе, остановка или теплица</p>
				</div>
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/3.png" alt="Легкость">
					<p><b>Легкость</b></p>
					<p>Небольшой вес позволяет произвести монтаж листов любой площади и снизить нагрузку на несущую конструкцию. Он легче стекла аж в 16 раз и при этом с легкостью сворачивается в рулон</p>
				</div>
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/4.png" alt="Пожаробезопасность">
					<p><b>Пожаробезопасность</b></p>
					<p>Поликарбонат способен оплавляться, но не воспламеняется и не поддерживает горение. Это выгодно отличает его от изделий из акрилового стекла. Класс пожаробезопасности - В2, Д1, Т1</p>
				</div>
			</div>
			<div class="row">
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/5.png" alt="Защита от УФ лучей">
					<p><b>Защита от УФ лучей</b></p>
					<p>В процессе производства в полимер добавляется гранулированный UV-стабилизатор и наносится защитный слой посредством соэкструзии. Тем самым достигается двойная защита от УФ лучей</p>
				</div>
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/7.png" alt="Диапазон температур">
					<p><b>Диапазон температур</b></p>
					<p>Способен выдерживать экстремальные температуры и не меняет своих свойств в диапазоне от -40<sup>о</sup>С до +120<sup>о</sup>С. Материал проявляет наилучшую морозостойкость среди прочих аналогов.</p>
				</div>
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/6.png" alt="Гибкость">
					<p><b>Пластичность</b></p>
					<p>Поликарбонат очень легко гнется и сворачивается в рулон. Рекламные конструкции нестандартной формы без использования специальной аппаратуры - легко!</p>
				</div>
				<?php if($row['brand'] == 'Polynex'){ ?>
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/8.png" alt="Диапазон температур">
					<p><b>Гарантия 15 лет</b></p>
					<p>15-ти летняя гарантии от производителя поликарбоната класса премиум. Polynex предоставляет максимальную гарантию из всех производителей!</p>
				</div>
				<?php } else { ?>
				<div class="three columns">
					<img src="/img/catalog/polikarbonat/about/8.png" alt="Диапазон температур">
					<p><b>Гарантия 10 лет</b></p>
					<p>10-ти летняя гарантии от производителя поликарбоната.</p>
				</div>	
				<?php } ?>
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
							<td>Толщина</td>
							<td class="right"><?php echo $row['thin'];?> мм</td>
						</tr>
						<tr>
							<td>Размер листа</td>
							<td class="right">2,1 х <?php if ($size == '' or $size == '6') {echo '6';} else {echo '12';} ?> м</td>
						</tr>
						<tr>
							<td>Светопропускание</td>
							<td class="right"><?php echo $light;?>%</td>
						</tr>
						<tr>
							<td>Минимальный радиус изгиба</td>
							<td class="right"><?php 
									if ($row['thin'] == '3' or $row['thin'] == '3.5' or $row['thin'] == '4') { echo '0,7';} 
									elseif ($row['thin'] == '6') { echo '1,05';} 
									elseif ($row['thin'] == '8') { echo '1,2';} 
									elseif ($row['thin'] == '10') { echo '1,5';} 
									elseif ($row['thin'] == '16') { echo '2,4';} 
								?> м
							</td>
						</tr>
						<tr>
							<td>Прочность при растяжении</td>
							<td class="right">не менее 600 кгс/см<sup>2</sup></td>
						</tr>
						<tr>
							<td>Толщина УФ слоя</td>
							<td class="right">не менее 50 мкм</td>
						</tr>
						<tr>
							<td>Пожаробезопасность</td>
							<td class="right"><?php 
								if ($row['brand'] == 'Poligal' ) { echo 'Г1, РП1, В2, Д2, Т3';} 
								else { echo 'Г2, РП1, В2, Д2, Т2'; } 
								?>
							</td>
						</tr>
					</table>
				</div>
				<div class="one-half column">
					<table>
						<tr>
							<td>Водопоглощение</td>
							<td class="right">не более 0,37% по массе</td>
						</tr>
						<tr>
							<td>Коэффициенты теплопередачи</td>
							<td class="right"><?php 
									if ($row['thin'] == '3' or $row['thin'] == '3.5' or $row['thin'] == '4') { echo '3,9';} 
									elseif ($row['thin'] == '6') { echo '3,6';} 
									elseif ($row['thin'] == '8') { echo '3,4';} 
									elseif ($row['thin'] == '10') { echo '3,1';} 
									elseif ($row['thin'] == '16') { echo '2,3';} 
								?> Вт/м<sup>2</sup>
							</td>
						</tr>
						<tr>
							<td>Коэффициенты акустической изоляции</td>
							<td class="right"><?php 
									if ($row['thin'] == '3' or $row['thin'] == '3.5' or $row['thin'] == '4') { echo '15';} 
									elseif ($row['thin'] == '6') { echo '16';} 
									elseif ($row['thin'] == '8') { echo '16';} 
									elseif ($row['thin'] == '10') { echo '17';} 
									elseif ($row['thin'] == '16') { echo '21';} 
								?> dB
							</td>
						</tr>
						<tr>
							<td>Производитель</td>
							<td class="right"><?php echo $row['brand']; ?></td>
						</tr>
						<tr>
							<td>Страна</td>
							<td class="right"><?php echo $row['vendor']; ?></td>
						</tr>
					</table>
				</div>
			</div>	
		</div>
	</div>
	<script src="/js/uikit/js/components/slider.min.js"></script>
	<div class="product_page_accessories">
		<div class="introHolder">
			<h3>Аксессуары</h3>
		</div>
		<div class="row">
			<div class="uk-slidenav-position" data-uk-slider>
				<div class="uk-slider-container">
					<ul class="uk-slider uk-grid-width-medium-1-4"><?php
							$product = mysql_query("SELECT * FROM komplektujushhie WHERE thin like '%$thin%' or thin = 'all' order by id asc "); # Запрос
							while ($row = mysql_fetch_assoc($product)) { 
					?>
					
						<li><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/<?php 
								if ($row['id'] < '313') { echo 'transparent/'; }
								elseif ($row['id'] >= '313' and $row['id'] < '320') { }
								elseif ($row['id'] == '320') { echo 'turquoise/'; }
								elseif ($row['id'] == '321') { echo 'transparent/'; }
							?>"><img class="tumb" src="/img/catalog/komplektujushhie/<?php echo $row['img']; ?>"></a></p>
							<p class="name"><a href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/<?php 
								if ($row['id'] < '313') { echo 'transparent/'; }
								elseif ($row['id'] >= '313' and $row['id'] < '320') { }
								elseif ($row['id'] == '320') { echo 'turquoise/'; }
								elseif ($row['id'] == '321') { echo 'transparent/'; }
							?>"><?php echo $row['name']; ?></a></p>
							<p>Цена: <span><?php echo $row['price']; ?></span> руб.</p>
							<p><a class="button button-buy" href="/catalog/komplektujushhie_dly_polikarbonata/<?php echo $row['url']; ?>/<?php 
								if ($row['id'] < '313') { echo 'transparent/'; }
								elseif ($row['id'] >= '313' and $row['id'] < '320') { }
								elseif ($row['id'] == '320') { echo 'turquoise/'; }
								elseif ($row['id'] == '321') { echo 'transparent/'; }
							?>">Купить</a></p>
						</li>
					
					<?php } ?>
					</ul>
				</div>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
			</div>
		</div>	
	</div>

	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>