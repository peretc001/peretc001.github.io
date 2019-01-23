<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>АВТОНАКИДКИ.НЕТ - Доставка</title> 
	<meta name="Keywords" content="" /> 
	<meta name="Description" content="Доставка" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / Доставка
	</div>

	<div class="delivery">
		<div class="introHolder">
			<h1>Доставка</h1>
		</div>
		<div class="row">
			<div class="twelve columns justify">
				<p><strong>Доставка по городу Краснодар:</strong></p>
				<ul>
					<li>В пределах города - <b>500 руб</b></li>
					<li>До 50 км за пределами города - <b>800 руб</b></li>
				</ul>
				<p><strong>Доставка по России:</strong></p>
				<p>Доставка по России осуществляется силами транспортной компании. Стоимость доставки зависит от веса и объема.</p>
				<p>Вы можете уточнить стоимость доставки по телефону: <b>+7 (918) 636-27-09</b> или заполнив форму ниже:</p>
			</div>
		</div>
	</div>
	<script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(function($){
		   $("#phone").mask("8-999-999-99-99");
		});
	</script>
	<div class="check_delivery">
		<div class="introHolder">
			<h2>Заявка на рассчет стоимости доставки</h2>
		</div>
		<form action="/inc/check_delivery.php" method="post" enctype="multipart/form-data" role="form" data-togg="validator">
			<input type="hidden" name="sid" value="<?php echo session_id(); ?>"/>	
			<div class="row">
				<div class="four columns">
					<label for="city" class="control-label">Город доставки <span>*</span></label>
					<input class="u-full-width" type="text" id="city" name="city" placeholder="Ваш город" class="form-control" value="" required>
				</div>
				<div class="four columns">
					<label for="name" class="control-label">Ваше имя <span>*</span></label>
					<input class="u-full-width" type="text" id="name" name="name" placeholder="Ваше Имя" class="form-control" value="" required>
				</div>
				<div class="four columns">
					<label for="phone" class="control-label">Телефон <span>*</span></label>
					<input class="u-full-width" type="tel" id="phone" name="phone" placeholder="Номер телефона" class="form-control" value="" required>
				</div>
			</div>
			<div class="row">
				<div class="four columns">
					<label for="email" class="control-label">E-mail <span>*</span></label>
					<input class="u-full-width" type="email" id="email" name="email" placeholder="E-mail" class="form-control" value="" required>
				</div>
				<div class="eight columns">
					<label for="comment">Комментарий</label>
					<textarea class="u-full-width" id="comment" name="msg" placeholder="Интересующая модель"></textarea>
				</div>
				<div class="policy">
					<span><input type="checkbox" name="policy" id="policy_control" class="form-control" checked required/></span> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span>
				</div>
			</div>
			<div class="row">
				<input type="submit" class="button button-primary" onclick="yaCounter15357751.reachGoal('CHECK_DELIVERY'); return true;" value="Отправить">
			</div>
		</form>
	</div>		
	
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>