<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>КОРЗИНА | Интернет-магазин "ДЭМИ"</title> 
	<meta name="Description" content="КОРЗИНА | Интернет-магазин ДЭМИ" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	<div id="nav_menuid">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Корзина
		</div>
	</div>
	<div id="product">	
		<?php $query=mysql_query("SELECT id FROM cart WHERE sid = '". session_id() ."'  "); 
			$query=mysql_fetch_assoc($query); 
		
			if ($query == 0 ) { echo "<br><h2 align='center'>В корзине еще нет товаров!</h2></div><br>"; include $_SERVER['DOCUMENT_ROOT'] .'/inc/popular.php'; } else {
		?>
		<h1>Корзина</h1>
		<?php $cart = mysql_query("SELECT * FROM cart WHERE sid = '". session_id() ."' ORDER by num ASC");
				while($row = mysql_fetch_assoc($cart)) { ?>
		<div class="row cart">
			<div class="left">
				<div class="three columns img">
					<a href="<?php echo $row['url']; ?>"><img src="<?php echo $row['img']; ?>"></a>
				</div>
				<div class="three columns name">
					<p><a href="<?php echo $row['url']; ?>"><?php echo $row['name']; ?></a></p>
					<?php if ($row['id'] == '555') {} else { ?><p class="model">Модель: <?php echo $row['model']; ?></p><?php } ?>
					<?php if ($row['id'] == '555') {} else { ?><p class="color">Цвет: <?php echo $row['color']; ?></p><?php } ?>
				</div>
			</div>
			<div class="right">
				<div class="two columns qty">
					<?php if ($row['qty'] == 1) { } else { ?>
						<a class="minus" href="/shop/inc/cart/minus.php?id=<?php echo $row['id']; ?>&amp;sid=<?php echo $row['sid']; ?>&amp;color=<?php echo $row['color']; ?>">-</a>
					<?php } ?>
					<?php echo $row['qty']; ?>
					<a class="plus" href="/shop/inc/cart/plus.php?id=<?php echo $row['id']; ?>&amp;sid=<?php echo $row['sid']; ?>&amp;color=<?php echo $row['color']; ?>">+</a>
				</div>
				<div class="two columns price">	
					<?php $price[id] = $row['price'];
							$qty[id] = $row['qty'];
							$rezult[id] = ($price['id'] * $qty['id']);
							$total = $total['id'] + $rezult['id'];
							echo $total; ?> р.
				</div>
				<div class="two columns del">
					<a class="del" href="/shop/inc/cart/del.php?id=<?php echo $row['id']; ?>&amp;sid=<?php echo $sid = $row['sid']; ?>&amp;color=<?php echo $row['color']; ?>">x</a>
				</div>
			</div>
		</div>
		<?php }  $query=mysql_query("SELECT *,SUM(total) as sum FROM cart WHERE sid = '". session_id() ."' "); 
						$query=mysql_fetch_assoc($query); 
						$emails = $query['email'];
						$total_sum = $query['sum'];
						?>
		<div class="row total">
			<div class="u-pull-left del">
				<p><a href="/shop/inc/cart/clear.php?sid=<?php echo $sid; ?>">Удалить все</a></p>
			</div>
			<div class="u-pull-right price">
				<p><span>ИТОГО:</span> <?php echo $total_sum;  ?> p.</p>
			</div>

		</div>
		
		
		
		<div class="row justify">
			<p>Для оформления заказа заполните, пожалуйста, поля формы или просто позвоните нам по телефону: 
			<?php // показ информации в зависимости от города
				if($data['city'] == 'Краснодар') {
					echo '<b>8 (861) 242-81-05</b>';
				}
				elseif($data['region'] == 'Волгоградская область' or $data['region'] == 'Астраханская область' or $data['region'] == 'Саратовская область' )
				{
					echo '<b>8 (917) 647-647-3</b>';
				}
				else
				{
					echo '<b>8 (988) 242-81-05</b>';
				} 
			?>
			</p>
		</div>
		
		<form action="/shop/inc/zakaz.php" method="post" role="form" data-togg="validator">
			<input type="hidden" name="coupon" value="<?php echo $coupon; ?>">
			<div class="row">
				<div class="six columns">
					<label for="email" class="control-label">E-mail: <span>*</span></label>								
					<?php 					
					#Если email НЕизвестен
					$query=mysql_query("SELECT * FROM cart WHERE sid = '". session_id() ."'  "); 
					$query=mysql_fetch_assoc($query); 
					
					
					if ($query['email'] == '') { ?>
						<input id="email" type="email" class="u-full-width form-control" name="email" placeholder="Ваш email" required>
					<?php } #Если email известен 
					else { ?>
						<input id="email" type="email" class="u-full-width form-control" name="email" placeholder="Ваш email" required value="<?php echo $query['email']; ?>"/>
					<?php } ?>
				</div>
				<div class="six columns">
					<label for="phone" class="control-label">Номер телефона:  <span>*</span></label>	
					<input id="phone" type="tel" class="u-full-width form-control phone_mask" name="phone" placeholder="Номер телефона" required>
				</div>
			</div>
			<div class="row">
				<div class="six columns">
					<label for="firstname" class="control-label">ФИО полностью:  <span>*</span></label>	
					<input id="firstname" type="text" class="u-full-width form-control" name="firstname" placeholder="ФИО" required>
				</div>
				<div class="six columns">
					<label for="city" class="control-label">Город:  <span>*</span></label>	
					<input id="city" type="text" class="u-full-width form-control" name="city" placeholder="Город" autocorrect="off" style="text-transform: capitalize;" required>
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					<label for="msg">Коментарий:</label>	
					<textarea id="msg" name="msg" class="u-full-width" placeholder="Например, серия и номер паспорта, при отправке ТК" rows="4"/></textarea>
				</div>
			</div>
			<div class="row">		
				<div class="twelve columns">
					<p class="policy"><input type="checkbox" name="policy" id="policy" checked/> <span>Ознакомлен и согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></span></p>
					<p><input name="button" type="submit" value="ОФОРМИТЬ" class="button button-primary" onclick="yaCounter15357751.reachGoal('ORDER'); return true;"></p>
				</div>
			</div>
		</form>		
	</div>
	<?php } ?>
</div>
<?php include '../inc/footer.php'; ?>