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
<!--div id="nav_menuid" class="grey">
	<div class="row">
		<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Акции
	</div>
</div-->

<?php $_SESSION['black_friday'] = 'yes'; ?>
<div class="black_friday_list">
	<div class="introHolder">
		<h2>Тумба ТУВ.01 (выставочный образец)</h2>
	</div>
	<div class="row">
		<div class="one-half columns">
			<p class="product-img">
				<a href="/shop/tumby_i_stellazhi/tyv01r.php?color=tyv_greyf"><img src="/akcia/img/tyv01/1.jpg" alt="ТУВ.01"></a>
			</p>
			<p class="hot"><span>50%</span></p>
			<p class="product-name">Тумба выкатная с рисунком</p>
			<p class="product-price"><span class="old">&nbsp;9950&nbsp;</span> | <span class="new">5000</span></p>
		</div>
	</div>
</div>
<!-- div id="check_ok">
	<p><i class="fa fa-meh-o" aria-hidden="true"></i></p>
	<p>В данный момент товаров со скидкой нет</p>
</div -->
<?php #include $_SERVER['DOCUMENT_ROOT'] .'/akcia/samples.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/popular.php'; ?>

<div id="email_akcia">
	<div class="introHolder black">
		<h2>Хотите скидку?</h2>
	</div>
	<div class="row">
		<div class="one-half columns email">
			<form action="../inc/addemail.php" method="post" id="addemail" role="form" data-togg="validator">
				<p>Укажите ваш E-mail и как только начнется новая акция мы сообщим вам.</p>
				<input type="hidden" name="status" value="subscribe">
				<div class="form-group">
      				<input type="email" name="email" placeholder="Ваш E-mail" data-minlength="3" class="u-max-full-width" class="form-control" required>
					<input class="button button-all" type="submit" value="Отправить" onclick="yaCounter15357751.reachGoal('SUBSCRIBE'); return true;">
				</div>
				<div class="policy"><input type="checkbox" name="policy" id="policy" class="check" checked/> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span></div>
			</form>
		</div>
		<div id="send"></div>
	</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
		