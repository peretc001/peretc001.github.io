<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';


	#Создаем безопасносе соединение
	$db = new SafeMySQL();
	
	$id = htmlspecialchars(trim($_GET['id']));
	
	$row = $db->getRow('SELECT * FROM `car` WHERE id = ?s', $id);
 
	$id = $row['id'];
	$brand = $row['brand'];
	$name = $row['name'];
	$model = $row['model'];
	$year = $row['year'];
	$price = $row['price'];
	$price6_15 = $row['price6_15'];
	$price16_30 = $row['price16_30'];
	$price_mounth = $row['price_mounth'];
	$price_day = $row['price_day'];
	$zalog = $row['zalog'];
	$date1 = $row['date1'];
	$date2 = $row['date2'];
	$url = $row['url'];
					 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Аренда / прокат <?php echo $name; ?> в Краснодаре от <?php echo $price_day; ?> руб. | @autoprkt</title> 
	<meta name="Keywords" content="прокат <?php echo $name; ?> в Краснодаре, аренда <?php echo $name; ?> в Краснодаре" /> 
	<meta name="Description" content="Autoprkt - аренда и прокат <?php echo $name; ?> от <?php echo $price_day; ?> руб. без водителя в Краснодаре" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>

	<link rel="stylesheet" href="/css/blueimp-gallery.css">
	<script src="/js/blueimp/blueimp-gallery.min.js"></script>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?><nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> /  <a href="/car/">Автомобили</a>  /  Прокат <?php echo $name; ?></p>
	</div>
	<h1 class="example-header">Прокат <?php echo $name; ?></h1>
	<div style="display:none;" itemscope itemtype="http://schema.org/Product">
		<span itemprop="name"><?php echo $name; ?></span>
		<span itemprop="brand">Infiniti</span>
		<span itemprop="description">Autoprkt - аренда и прокат <?php echo $name; ?> от <?php echo $price_day; ?> руб. без водителя в Краснодаре</span>
		<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
			<span itemprop="price"><?php echo $price_day; ?></span> <meta itemprop="priceCurrency" content="RUB" />РУБ.
			<span itemprop="image">http://www.autoprkt.ru/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/1.jpg</span>
		</span>
	</div>
	<div class="page_menu">
		<div class="star">
			<?php
	  			#Запрос на сумму рейтинга
	  			$sum = $db->getAll('SELECT SUM(star) as star, SUM(star_col) as col FROM review WHERE url = ?s', $url);
					foreach ($sum as $rev) { 
						if ($rev['col'] == 0) { $totals = '0'; } else {
							#Вычисляем общий рейтинг
							$totals = $rev['star']/$rev['col'];
							#Округляем до одной запятой
							$total = number_format($totals, 1, ',', ' ') .'   ';
						}
					}
				#Выводим целые звездочки
				for ($a = 1; $a <= 5; $a++) {
    						if ($a > $total)  // если значение переменной $a равно 5
      							goto endf;  // то переходим к выполнению инструкций следующих за меткой   
    							echo '<i class="fa fa-star" aria-hidden="true"></i>';
  							
  							}
  							#Выводим пустые звездочки		
  							endf:
 								for ($c = $a; $c <= 5; $c++) 
  								echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
  								
  				
				
			?>
		</div>
		<div class="href">
			<ul>
				<li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#tech">Характеристики</a></li>
				<li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#price">Стоимость</a></li>
				<li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#review">Отзывы</a></li>
			</ul>
		</div>
	</div>
	<div class="clear"></div>		
</nav>
<div id="car_page">
	<div class="car">
		<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
		<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
   			<div class="slides"></div>
    		<h3 class="title"></h3>
   			<a class="prev">‹</a>
    		<a class="next">›</a>
    		<a class="close">×</a>
    		<ol class="indicator"></ol>
		</div>
		
		<div class="row">
			<div class="one-half column">
				<div id="links">
					<div class="general">
						<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/1.jpg"><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/1.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
					</div>
					<div class="tumb">
    					<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/2.jpg"><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/2.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
	    				<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/3.jpg"><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/3.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
	    				<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/4.jpg"><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/4.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
	    				<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/5.jpg"><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/5.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
	    				<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/6.jpg"><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/6.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
		    			<?php if ($brand == 'Infiniti') { ?>
		    			<div style="display:none;">
	    					<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/7.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/7.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
	    					<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/8.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/8.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
							<?php if ($model == 'EX35') { ?>
								<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/9.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/9.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
								<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/10.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/10.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
								<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/11.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/11.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
								<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/12.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/12.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
								<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/13.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/13.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
								<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/14.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/14.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
								<a href="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/15.jpg" data-gallery><img src="/img/auto/<?php echo $brand; ?>/<?php echo $model; ?>/15.jpg" alt="Прокат <?php echo $name; ?> в Краснодаре | @autoprkt"></a>
							<?php } ?>
		    			</div>
	    				<?php } ?>
	    			</div>
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

			<div class="one-half column right" id="tech">
				<h5>Технические характеристики:</h5>
				<?php
     				#   Запрос характеристик авто
     				$row = $db->getRow('SELECT * FROM specification WHERE url = ?s', $url);
				?>
				<ul class="tech">
     				<li>Объем: <?php echo $row['engine']; ?></li>
     				<li>Мощность: <?php echo $row['hp']; ?></li>
     				<li>Привод: <?php echo $row['wd']; ?></li>
     				<li>Коробка: <?php echo $row['gearbox']; ?></li>
     				<li>Топливо: <?php echo $row['fuel_type']; ?></li>
     				<li>Расход: <?php echo $row['fuel_need']; ?></li>
     				<li>Разгон: <?php echo $row['acceleration']; ?></li>
     				<li>Багажник: <?php echo $row['trunk']; ?></li>
     				<li>Бак: <?php echo $row['fuel_size']; ?></li>
     			</ul>
     			<h5 class="cpl">Комплектация:</h5>
     			<ul class="cpl">
     				<li>Мультируль</li>
     				<li>Память сидений</li>
     				<li>Кожаный салон</li>
     				<li>Парктроники</li>
     				<?php if ($brand == 'Infiniti') { ?>
     					<li>Камеры кругового обзора</li>
     					<li>Музыка: BOSE</li>
     					<li>Люк</li>
     					<li>Круиз-контроль</li>
     					<?php if ($model == 'FX35') { ?>
     						<li>Bluetooth</li>
     						<li>Навигация</li>
     						<li>Вентиляция сидений</li>
     					<?php } ?>
     				<?php } else { ?>
     					<li>Камера заднего вида</li>
     				<?php } ?>
     				<?php if ($brand == 'Infiniti') { } else { ?>
     					<li>USB</li>	
						<li>Bluetooth</li>
					<?php if ($brand == 'Audi' or $brand == 'BMW') { } else { ?>
     					<li>Навигация</li>
     				<?php } } ?>
     				<li>Подогрев сидений</li>
     			</ul>   			
    		</div>
		</div>

	</div>
    <div class="clear"></div>
</div>
<div id="price">
	<div class="row">
		<div class="introHolder">
			<h2>Стоимость проката</h2>
		</div>
	</div>
  	<div class="row">
  		<div class="one-half column">
  			<p>в сутки:</p>
   	 		<ul class="head">
   	 			<li>1-15</li>
   	 			<li>16-30</li>
   	 			<li>Месяц</li>
   	 			<li class="zalog">Залог</li>
   	 		</ul>
   	 		<ul class="price">
   	 			<li><?php echo $price; ?></li>
   	 			<li><?php echo $price16_30; ?></li>
   	 			<li><?php echo $price_mounth; ?></li>
   	 			<li class="zalog"><?php echo $zalog; ?><sup>*</sup></li>
   			</ul>
   		</div>
   	 	<div class="one-half column right">
   	 		<p>спец.тариф:</p>
   	 		<ul class="head">
   	 			<li class="day">День</li>
   	 			<li class="week">Выходные</li>
   	 			<li class="work">Рабочая неделя</li>
   	 			
   	 		</ul>
   	 		<ul class="price">
   	 			<li class="day"><?php echo $price_day; ?></li>
   	 			<li class="week"><?php echo $price/24*66; ?></li>
   	 			<li class="work"><?php echo $price/24*102; ?></li>
   	 			
   	 		</ul>
   	 	</div>
   	 </div>
   	 <div class="row">
   	 	<div class="note">
    		<p>* При эксплуатации в пределах Краснодарский край и Адыгея.</p>
    		<br>
	    	<p>Тариф <b>"День"</b> рассчитывается за 12 часов с <b>10-00 до 22-00</b> или с <b>22-00 до 10-00</b></p>
    		<p>Тариф <b>"Выходные"</b> рассчитывается с <b>Пятницы 18-00</b> до <b>Понедельника 11-00</b></p>
    		<p>Тариф <b>"Рабочая неделя"</b> рассчитывается с <b>Понедельника 12-00</b> до <b>Пятницы 17-00</b></p>
    		<br>
			<p>Задержка возврата авто до 3 часов - 500 рублей/час, более 3 часов - полные сутки<br>
	    	Задержка возврата авто по тарифу "День" до 30 минут - 500 рублей, более 30 мин - доплата за полные сутки</p>
    	</div>
    			
   	 	<div class="button_center">
   			Выбрать дату и <a class="button button-primary" href="/inc/booking/step1.php?id=<?php echo $id;?>">Забронировать</a>
	   	</div>
    		
   	</div>
   	<div class="clear"></div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/require.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/howitwork.php'; ?>

<?php if ($brand == 'Audi' or $brand == 'BMW' or $brand == 'Lexus') { } else { ?>
<div id="instagramm">
	<div class="row">
		<div class="introHolder">
			<h2><a href="https://www.instagram.com/autoprkt/">@autoprkt</a></h2>
		</div>
	</div>	
	<!-- The Gallery as inline carousel, can be positioned anywhere on the page -->
	<div id="blueimp-image-carousel" class="blueimp-gallery blueimp-gallery-carousel blueimp-gallery-display blueimp-gallery-playing" style="display: block;">
    	<div class="slides"></div>
    	<a class="prev">‹</a>
    	<a class="next">›</a>
	</div>
	<script src="/js/blueimp/jquery.js"></script>
	<script src="/js/blueimp/insta_<?php echo $url; ?>.js"></script>
	<div class="clear"></div>
</div>
<?php } ?>
<div id="review">
	<div class="section">
		<?php
	  			$select_review = $db->getAll('SELECT * FROM `review` WHERE url = ?s', $url);
				 
		?>
		<div class="introHolder">
			<h2>Отзывы клиентов</h2>
			<?php if ($select_review) { ?>
				<p>Что пишут наши клиенты об автомобиле <?php echo $name; ?></p>
			<?php } else { ?>
				<p>Отзывов об автомобиле <?php echo $name; ?> пока нет. Будь первым и получи скидку!</p>
			<?php } ?>
		</div>
		<?php
	  			foreach ($select_review as $row) {
		?>
		<div class="row">
			<div class="one column">
				<h6><?php echo $row['username']; ?></h6>
				<div class="fa-star-rev">
					<?php 
						for ($a = 1; $a <= 5; $a++) {
    						if ($a > $row['star'])  // если значение переменной $a равно 5
      							goto end;  // то переходим к выполнению инструкций следующих за меткой   
    							echo '<i class="fa fa-star" aria-hidden="true"></i>';
  							}
  							end:
  								for ($c = $a; $c <= 5; $c++)
  								echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
  					?>
				</div>
				<p class="date"><?php echo date('d.m.Y', strtotime($row['date'])); ?></p>
			</div>
    		<div class="third columns">
    			<h6><?php echo $row['caption']; ?></h6>
				<p><?php echo $row['msg']; ?></p>
			</div>
			<?php if ($row['answer'] != '') { ?>
						<div class="two columns">&nbsp;</div>
						<div class="two columns">
							<i class="fa fa-level-down" aria-hidden="true"></i>
							<div class="answer"><p><?php echo $row['answer']; ?></p></div>
						</div>
					<?php } ?>
	  	</div>
    	<?php } ?>
    	<div class='add_otziv' id="hsBack">
    		<a class="button add_review" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-plus-circle" aria-expanded="true"></i> Добавить отзыв</a>
    	</div>
    	<div class="otziv_form">
			<div class="collapse" id="collapseExample">
				<form action="/inc/add/add_otziv.php" method="post" enctype="multipart/form-data" id="valid_otziv" role="form" data-togg="validator">
  					<div class="row">
    					<div class="five columns">
      						<label for="username" class="control-label">Имя</label>
      						<input data-minlength="3" class="u-full-width" type="text" name="username" placeholder="Ваше имя" id="username" class="form-control" required>
    					</div>
    					<div class="five columns">
      						<label>Оценка</label>
      						<input type="hidden" name="url" value="<?php echo $url; ?>"/>
      						<input type="hidden" name="brand" value="<?php echo $brand; ?>"/>
      						<input type="hidden" name="ip" value="<?php echo $_SERVER["REMOTE_ADDR"] ?>"/>	
      						<input type="hidden" name="back_url" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>	
      						
	      					<div class="star-rating">
    			  				<div class="star-rating__wrap">
     							   	<input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
     									<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars"></label>
			       					<input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
        								<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
			       					<input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
        								<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
        							<input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
			        					<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
       								<input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
        								<label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars"></label>
      							</div>
    						</div>
					    </div>
					</div>
					<div class="row">
						<div class="ten columns">
					    	<label for="caption"  class="control-label">Заголовок</label>
						    <input class="u-full-width" type="text" name="caption" placeholder="Заголовок" id="caption"  class="form-control" data-minlength="3" required>
    				    </div>
					</div>
  					<div class="row">
						<div class="ten columns">
					    	<label for="msg"  class="control-label">Отзыв</label>
							<textarea class="u-full-width" placeholder="Ваш отзыв об автомобиле <?php echo $name; ?>..." name="msg" id="msg" class="form-control" data-minlength="5" required></textarea>
    				    </div>
					</div>
					<input class="button button-all" type="submit" value="Добавить">
				</form>
			</div>
		</div>
	</div>	
	<div class="clear"></div>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/car_more.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>