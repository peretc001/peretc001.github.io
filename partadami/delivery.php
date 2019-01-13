<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>ДОСТАВКА парт Дэми по Краснодарскому, Ставропольскому краю, Волгоградской области, Саратовской области, Республике Крым</title> 
	<meta name="Keywords" content="доставка парт, доставка дэми, парты дэми доставка" /> 
	<meta name="Description" content="Рассчет стоимости доставки парт Дэми до вашего города." /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Доставка
		</div>
	</div>
	<div id="section">
		<h1>Доставка</h1>
		<div class="row">
			<div class="twelve columns justify">
				<p>Доставка по городу Краснодар:</p>
				<ul>
					<li>Модели серии СУТ 14, 24, 26 - <b>500 руб</b></li>
					<li>Модели серии СУТ 17, 25, 31 - <b>700 руб</b></li>
					<li>Модели серии ТУВ и СМД - <b>1000 руб</b></li>
				</ul>
				<p>Доставка по России осуществляется силами транспортной компании. Стоимость доставки зависит от веса и объема.</p>
				<p>Вы можете уточнить стоимость доставки по телефону: <b>+7 (861) 242-81-05</b>, через Онлайн-консультанта или заполнив форму ниже:</p>
			</div>
		</div>
	</div>
	<script src="/js/valid/jquery.maskedinput.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(function($){
		   $("#phone").mask("8-999-999-99-99");
		});
	</script>
	<div id="check_delivery">
		<h2>Заявка на рассчет стоимости доставки</h2>
		<form action="/inc/form/check_delivery.php" method="post" enctype="multipart/form-data" role="form" data-togg="validator">
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
			<div class="policy"><input type="checkbox" name="policy" id="policy" class="check" checked/> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span></div>
			</div>
			<div class="row">
				<input type="submit" class="button button-primary" onclick="yaCounter15357751.reachGoal('CHECK_DELIVERY'); return true;" value="Отправить">
			</div>
		</form>
	</div>		
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>