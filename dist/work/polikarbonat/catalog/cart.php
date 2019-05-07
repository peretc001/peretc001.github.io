<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Корзина - ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="Keywords" content="<?php echo $row['name']; ?>" /> 
	<meta name="Description" content="Купить <?php echo $row['name']; ?> на сайте ПОЛИКАРБОНАТА.НЕТ за <?php echo floor($row['price']); ?> руб. за кв/м." />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>
	
	<div class="menuid" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		<a href="/" itemprop="url"><span itemprop="title">Главная</span></a> / <a href="/catalog/" itemprop="url"><span itemprop="title">Каталог</span></a> / <a href="/catalog/cart.php" itemprop="url"><span itemprop="title">Корзина</span></a>
	</div>
	
	<div class="cart">
	
		<div class="introHolder">
			<h1>Корзина:</h1>
		</div>
				
		<?php 	$cart = mysql_query("SELECT id FROM cart WHERE sid = '$sid' order by product_id asc "); 
				$query = mysql_fetch_assoc($cart); 
		
			if ($query == 0 ) { echo "<br><h2 align='center'>В корзине еще нет товаров!</h2></div><br>"; } else {
				
				$cart = mysql_query("SELECT * FROM cart WHERE sid = '$sid' order by product_id asc ");
				while($row = mysql_fetch_assoc($cart)) {
		?>
		
		<div class="row">
			<div class="left">
				<div class="three columns img">
					<a href="<?php echo $row['url']; ?>"><img src="<?php echo $row['img']; ?>"></a>
				</div>
				<div class="three columns name">
					<p><b><a href="<?php echo $row['url']; ?>"><?php echo $row['product_name']; ?></a></b></p>
						<?php if($row['product_id'] <= '299') { ?><p class="model">Размер листа: <?php echo $row['size']; ?> м</p><?php } ?>
						<?php if($row['product_id'] >= '400') { ?><p class="model">Размер: 3x<?php echo $row['size']; ?> м</p><?php } ?>
						<p class="model">Цена: <b><?php echo $row['money']; ?></b> руб.</p>
				</div>
			</div>
			<div class="right">
				<div class="two columns qty">
					<p><?php if ($row['qty'] == 1) { } else { ?><a class="plus" href="/catalog/inc/clear.php?id=<?php echo $row['product_id']; ?>&amp;color=<?php echo $row['color']; ?>&amp;size=<?php echo $row['size']; ?>&amp;type=minus">-</a> <?php } ?>
						<?php echo $row['qty']; ?>
						<a class="minus" href="/catalog/inc/clear.php?id=<?php echo $row['product_id']; ?>&amp;color=<?php echo $row['color']; ?>&amp;size=<?php echo $row['size']; ?>&amp;type=plus">+</a></p>
				</div>
				<div class="two columns price">	
					<p><?php echo number_format($row['total'], 0, ',', ' '); ?> руб.</p>
				</div>
				<div class="two columns del">
					<a class="del" href="/catalog/inc/clear.php?id=<?php echo $row['product_id']; ?>&amp;color=<?php echo $row['color']; ?>&amp;size=<?php echo $row['size']; ?>&amp;type=delit"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<?php }  $query=mysql_query("SELECT SUM(total) as sum FROM cart WHERE sid = '$sid'  "); 
						$query=mysql_fetch_assoc($query); ?>
		<div class="row total">
			<div class="u-pull-left del">
				<p><a href="/catalog/inc/clear.php?session_id=<?php echo session_id(); ?>&amp;type=clear"><i class="fa fa-trash-o clear" aria-hidden="true"></i> Удалить все</a></p>
			</div>
			<div class="u-pull-right price">
				<p>ИТОГО: <span><?php echo number_format($query['sum'], 0, ',', ' ');?></span> p.</p>
			</div>
		</div>
		<p style="width:80%;margin:0 auto 2rem auto;" class="center">Для оформления заказа заполните, пожалуйста, поля формы или просто позвоните нам по телефону: <b>8 (918) 636-27-09</b></p>
		
	</div>
	<div class="cart_form">
		<script src="/js/valid/jquery.maskedinput.js" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(function($){
			   $("#phone").mask("8-999-999-99-99");
			});
		</script>
		<form action="/catalog/inc/zakaz.php" method="post" id="zakaz">
		<div class="row">
			<div class="four columns">
				<label for="phone" class="control-label">Номер телефона: <span>*</span></label>
				<input id="phone" type="tel" class="u-full-width form-control" name="phone" placeholder="Номер телефона" required>				
				</div>
			<div class="four columns">
				<label for="email" class="control-label">E-mail: <span>*</span></label>
				<input id="email" type="email" class="u-full-width form-control" name="email" placeholder="Ваш email" required>
			</div>
			<div class="four columns">
				<label for="user" class="control-label">ФИО:  <span>*</span></label>	
				<input id="user" type="text" class="u-full-width form-control" name="user" placeholder="ФИО" required>
			</div>
			
		</div>
		<div class="row">
			<div class="four columns">
				<label for="city" class="control-label">Город:  <span>*</span></label>
				<input id="city" type="text" class="u-full-width form-control" name="city" placeholder="Город" required>				
				</div>
			<div class="eight columns">
				<label for="msg" class="control-label">Коментарий</label>	
				<textarea id="msg" name="msg" class="u-full-width" placeholder="Коментарий" rows="6"/></textarea>
			</div>
		</div>
		<div class="row">		
			<div class="twelve columns">
				<ul class="policy">
					<li><input type="checkbox" name="policy" id="policy" checked/></li><li>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></li>
				</ul>
				<p><input name="button" type="submit" value="ОФОРМИТЬ" class="button button-primary" onclick="yaCounter15357751.reachGoal('ORDER'); return true;"></p>
			</div>
		</div>
		</form>	
	</div>
	<?php } ?>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>