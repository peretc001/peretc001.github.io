<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Купить теплицы из поликарбоната в Краснодаре | ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="Keywords" content="купить теплицу, теплицы из поликарбоната, теплицы из поликарбоната в краснодаре, теплицы из поликарбоната цены" /> 
	<meta name="Description" content="Готовые теплицы из поликарбоната в Краснодаре. Доставка, Монтаж, Цены, Размеры, Характеристики." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
	
	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
		<div class="slides"></div>
		<a class="prev">‹</a>
		<a class="next">›</a>
		<a class="close">×</a>
		<ol class="indicator"></ol>
	</div>

	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / <span itemprop="title">Купить теплицы из поликарбоната</span>
	</div>
	<div class="catalog">
		<div class="introHolder">
			<h1>Теплицы из поликарбоната в Краснодаре</h1>
		</div>
		<div class="row teplica_home">
		<?php 
			$dop_teplica = mysql_query("SELECT * FROM teplica WHERE id != '403' ");  
			while($row = mysql_fetch_assoc($dop_teplica)) { ?>

			<div class="one-third column">
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
	<div class="page">
		<div class="row justify">
			<p>Являетесь владельцем дачи, садового участка или индивидуального жилого дома с земельным участком? Мечтаете своими силами вырастить экологически чистые, без наличия в них вредных пестицидов, нитратов и нитритов, фрукты и овощи, собрав богатый урожай?</p>
			<p><b>Теплица из поликарбоната</b> станет отличным решением данного вопроса!</p>
			<p>В нашем интернет-магазине можно купить теплицу арочной формы с покрытием из листов поликарбоната толщиной от 4 мм и различными типами каркаса. Все каркасы состоят из цельногнутых дуг и имеют цельносварные торцы. Арочная форма позволяет снегу не задерживаться на теплице, а соскальзывать вниз, что приводит к более длительному сроку эксплуатации конструкции. Приобретя теплицу в нашем интернет-магазине, вы избавите себя от необходимости устанавливать прочный фундамент, так как теплицы из поликарбоната имеют небольшой вес; защитите свои растения от вредного воздействия ультрафиолетовых лучей (с внешней стороны листы покрыты специальным UV-поглощающим слоем); сможете выращивать растения круглый год: теплица из поликарбоната выдерживает температурную среду от - 40 до +120 градусов, а имеющиеся форточки для проветривания помогут предотвратить перегрев растений в жаркое время года.</p>
		</div>
		<div class="row">
			<div class="one-third column">
				<img src="/img/catalog/teplica/delivery.svg" alt="">
				<p><b>Доставка</b></p>
			</div>
			<div class="one-third column">
				<img src="/img/catalog/teplica/settings.svg" alt="">
				<p><b>Монтаж</b></p>
			</div>
			<div class="one-third column garanty">
				<img src="/img/catalog/teplica/garanty.svg" alt="">
				<p><b>Гарантия</b></p>
			</div>
		</div>
	</div>
	<div class="teplica_howtobuy">
		<div class="introHolder">
			<h2>КАК КУПИТЬ ТЕПЛИЦУ ИЗ ПОЛИКАРБОНАТА</h2>
		</div>
		<div class="row">
			<div class="three columns">
				<p>1. Выберете теплицу</p>
				<img src="img/catalog/teplica/p1.png" alt="">
			</div>
			<div class="three columns">
				<p>2. Выберете размер</p>
				<img src="img/catalog/teplica/p2.png" alt="">
			</div>
			<div class="three columns">
				<p>3. Введите контакты</p>
				<img src="img/catalog/teplica/p3.png" alt="">
			</div>
			<div class="three columns">
				<p>4. Ожидайте звонка</p>
				<img src="img/catalog/teplica/p4.png" alt="">
			</div>
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
	<link rel="stylesheet" href="/css/blueimp-gallery.css">
	<script src="/js/blueimp/blueimp-gallery.min.js"></script>
</body>
</html>