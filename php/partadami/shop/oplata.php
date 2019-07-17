<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
// Достаем sid
$number_id = htmlspecialchars(trim($_GET['id'])); # определяем переданный phone
$number = base64_decode($number_id); # декодируем переданный phone
$confirm_id = mysql_query("SELECT * FROM user WHERE phone = '$number' ORDER by date desc"); # находим usera с данным phone
	$row = mysql_fetch_assoc($confirm_id); 
	$id = $row['id']; # присваиваем id
	$firstname = $row['firstname'];
	$email = $row['email'];
	$phone = $row['phone'];
	$city = $row['city'];
	?>
<!DOCTYPE html>
<html>
<head> 
	<title>Благодарим за заказ. Ваш заказ № <?php echo $id; ?>P</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; #Определяем сумму заказа
	$query=mysql_query("SELECT SUM(total) as tot FROM zakaz_new WHERE user_id = '$id'"); 
	$query=mysql_fetch_assoc($query); 
	$total = $query['tot']; 
	?>
	<div id="product">
		<?php	$name = mysql_query("SELECT *,DATE_FORMAT(date, '%d.%m.%Y') as date_f FROM user WHERE id = '$id' "); 
				$row = mysql_fetch_assoc($name); 
		?>
		<h1 class="roboto">Заказ № <?php echo $row["id"] ?>Р от <?php echo $row["date_f"] ?></h1>
		<?php $cart = mysql_query("SELECT * FROM zakaz_new WHERE user_id = '$id' ORDER by product_id asc"); 
						while($row = mysql_fetch_assoc($cart)) { 
		?>
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
					<?php echo $row['qty']; ?> шт.
				</div>
				<div class="two columns price">	
					<?php $price[id] = $row['price'];
							$qty[id] = $row['qty'];
							$rezult[id] = ($price['id'] * $qty['id']);
							$total_product = $total_product['id'] + $rezult['id'];
							echo $total_product; ?> р.
				</div>
				<div class="two columns del"></div>
			</div>
		</div>
		
		<?php }  ?>
		<div class="row total">
			<div class="u-pull-right price">
				<p><span>ИТОГО:</span> <?php echo $total;  ?> p.</p>
			</div>
		</div>
	</div>
	<div id="section">
		<h2>Способы оплаты</h2>
		<div class="row">
			<div class="one-half column oplata">
				<p class="name"><i class="fa fa-rub" aria-hidden="true"></i><br>
				<b>Наличными</b></p>
				<p><span>Вы можете оплатить ваш заказ наличными в магазине</span></p>
				<p class="center"><a href="/gde_kupit/">Адреса магазинов</a></p>
			</div>
			<div class="one-half column oplata">			
				<p class="name"><i class="fa fa-university" aria-hidden="true"></i><br>
				<b>Банковский перевод</b></p>
				<p><span>Возможна комиссия <?php $commission = $total*0.01; echo number_format($commission, 0, ',', ' '); ?> руб. Оплатить можно в любом банке или через онлайн-банк, заполнив реквизиты из квитанции.</span></p>
				<p class="center"><a href="/shop/MPDF56/index.php?s=<?php echo $total; ?>&id=<?php echo $id; ?>" target="_blank"><span>Квитанция на оплату</span></a></p>
			</div>
		</div>

		<div class="row">
			<div class="one-half columns oplata">
				<p class="name"><i class="fa fa-sticky-note-o" aria-hidden="true"></i><br>
				<b>Счет на оплату</b></p>
				<p><span>Юридические лица могут оплатить по счету.</span></p>
				<p class="center"><a href="/shop/MPDF56/schet.php?s=<?php echo $total; ?>&id=<?php echo $id; ?>" target="_blank"><span>Счет на оплату</span></a></p>
			</div>
		</div>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
</body>