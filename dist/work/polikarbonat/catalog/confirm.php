<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
$number_id = htmlspecialchars(trim($_GET['id'])); # определяем переданный phone
$number = base64_decode($number_id); # декодируем переданный phone
$confirm_id = mysql_query("SELECT * FROM user WHERE phone = '$number' "); # находим usera с данным phone
	$row = mysql_fetch_assoc($confirm_id); 
	$id = $row['id']; # присваиваем id
	?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Благодарим за заказ. Ваш заказ № <?php echo $id; ?>P</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>

<?php  $query=mysql_query("SELECT SUM(total) as tot FROM zakaz WHERE user_id = '$id'"); 
	$query=mysql_fetch_assoc($query); 
	#Сумма
	$total = $query['tot']; 
?>
	<div class="cart">	
		<?php $name = mysql_query("SELECT *,DATE_FORMAT(date, '%d.%m.%Y') as date_f FROM user WHERE id = '$id' "); 
					$row = mysql_fetch_assoc($name); ?>
					
		<div class="introHolder zakaz">
			<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
			<h3>Благодарим за заказ</h3>
			<p class="center">Наш сотрудник свяжется с вами для уточнения заказа</p>
		</div>
		<div class="introHolder order">
			<h4>Ваш Заказ № <?php echo $row["id"] ?>Р от <?php echo $row["date_f"] ?></h4>
		</div>
		<?php $cart = mysql_query("SELECT * FROM zakaz WHERE user_id = '$id' ORDER by id asc"); 
						while($row = mysql_fetch_assoc($cart)) { ?>
		
		<div class="row">
			<div class="left">
				<div class="three columns img">
					<a href="http://polikarbonata.net<?php echo $row["url"] ?>"><img src="http://polikarbonata.net<?php echo $row['img'] ?>"></a>
				</div>
				<div class="three columns name">
					<p><b><a href="http://polikarbonata.net<?php echo $row["url"] ?>"><?php echo $row["product_name"] ?></a></b></p>
					<?php if($row['product_id'] <= '299') { ?><p class="model">Размер листа: <?php echo $row['size']; ?> м</p><?php } ?>
					<?php if($row['product_id'] >= '400') { ?><p class="model">Размер: 3x<?php echo $row['size']; ?> м</p><?php } ?>
					<p class="model">Цена: <b><?php echo number_format($row["money"], 0, ',', ' '); ?></b> руб.</p>
				</div>
			</div>
			<div class="right">
				<div class="four columns qty">
					<p><?php echo $row["qty"] ?>шт </p>
				</div>
				<div class="four columns price">	
					<p><?php echo number_format($row["total"], 0, ',', ' '); ?> руб.</p>
				</div>
			</div>
		</div>
		<?php }  	$query=mysql_query("SELECT SUM(total) as sum FROM zakaz WHERE user_id = '$id' ");
					$query=mysql_fetch_assoc($query);
					$total = $query['sum'];					?>
		<div class="row total">
			<div class="u-pull-right price">
				<p>ИТОГО: <span><?php echo number_format($total, 0, ',', ' '); ?></span> p.</p>
			</div>
		</div>
		
					
	</div>
	<br>
		
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
</body>
</html>