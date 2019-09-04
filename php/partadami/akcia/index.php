<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
   <title>Парты ДЭМИ со скидкой - Официальный интернет-магазин</title> 
	<meta name="Keywords" content="дэми со скидкой, парты со скидкой" /> 
	<meta name="Description" content="Купить товары ДЕМИ со скидкой" /> 
    <?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
  	<!-- Scripts only for this page
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<script src="/js/blueimp/blueimp-gallery.min.js"></script>
	<!-- -->
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>


<div class="black_friday_list">
	<div class="introHolder">
		<h2>Парта со скидкой</h2>
	</div>
	<div class="row">
		<div class="one-half columns">
			<p class="product-img gallery">
				<a href="/akcia/img/15/15.jpg"><img src="/akcia/img/15/15.jpg" alt="СУТ.15-01"></a>
				<a style="display:none" href="/akcia/img/15/151.jpg"><img src="/akcia/img/15/151.jpg" alt="СУТ.15-01"></a>			
			</p>
			<p class="hot"><span>20%</span></p>
			<p class="product-name">Парта 120x55см + 2-е полки сзади + стул</p>
			<p class="product-description">Чехол на стул, подставка и пленка продаются отдельно</p>
			<p class="product-price"><span class="old">&nbsp;24.500&nbsp;</span> | <span class="new">19.999</span></p>
			<br>
		</div>
	</div>
	<div class="introHolder">
		<h2>Выставочные образецы</h2>
	</div>
	<br>
	<div class="row">
		<div class="one-half column">
			<p class="product-img gallery">
				<a href="/akcia/img/42/1.jpg"><img src="/akcia/img/42/1.jpg" alt="СУТ42"></a>
				<a style="display:none" href="/akcia/img/42/2.jpg"><img src="/akcia/img/42/2.jpg" alt="СУТ42"></a>
				<a style="display:none" href="/akcia/img/42/2.jpg"><img src="/akcia/img/42/2.jpg" alt="СУТ42"></a>				
			</p>
			<p class="hot"><span>20%</span></p>
			<p class="product-name">Парта со стулом<br>100x55см</p>
			<p class="product-price"><span class="old">&nbsp;16.100&nbsp;</span> | <span class="new">12.999</span></p>
			<br>
		</div>
		<div class="one-half column">
			<p class="product-img gallery">
				<a href="/akcia/img/43/1.jpg"><img src="/akcia/img/43/1.jpg" alt="СУТ43"></a>
				<a style="display:none" href="/akcia/img/43/2.jpg"><img src="/akcia/img/43/2.jpg" alt="СУТ43"></a>
				<a style="display:none" href="/akcia/img/43/3.jpg"><img src="/akcia/img/43/3.jpg" alt="СУТ43"></a>
			</p>
			<p class="hot"><span>25%</span></p>
			<p class="product-name">Парта со стулом<br>120x55см</p>
			<p class="product-price"><span class="old">&nbsp;19.800&nbsp;</span> | <span class="new">14.999</span></p>
			<br>
		</div>
	</div>
</div>
<!-- <div id="check_ok">
	<p><i class="fa fa-meh-o" aria-hidden="true"></i></p>
	<p>В данный момент товаров со скидкой нет</p>
</div> -->
<?php #include $_SERVER['DOCUMENT_ROOT'] .'/akcia/samples.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/popular.php'; ?>

<div id="email_akcia">
	<div class="introHolder black">
		<h2>Хотите скидку?</h2>
	</div>
	<div class="row">
		<div class="one-half columns email">
			<form action="../inc/addemail.php" method="post" id="addemail" class="addemail__form" role="form" data-togg="validator">
				<p>Укажите ваш E-mail и как только начнется новая акция мы сообщим вам.</p>
				<input type="hidden" name="status" value="subscribe">
				<div class="form-group">
      				<input type="email" name="email" placeholder="Ваш E-mail" data-minlength="3" class="u-max-full-width" class="form-control" required>
					<input class="button button-all callback__form__button" type="submit" value="Отправить" onclick="yaCounter15357751.reachGoal('SUBSCRIBE'); return true;">
				</div>
				<!-- <div class="policy"><input type="checkbox" name="policy" id="policy" class="check" checked/> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span></div> -->
				<div class="robot" style="justify-content: center;">
					<div class="circle-loader">
						<div class="checkmark draw"></div>
					</div>
					<span>Согласен с условиями <a href="/policy.php" target="_blank">Политики конфиденциальности</a></span>
				</div>
			</form>
		</div>
		<div id="send"></div>
	</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
		