<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');
	$db = new SafeMySQL();
	
	
	$number_id = htmlspecialchars(trim($_GET['id'])); # определяем переданный phone
	$number = base64_decode($number_id); # декодируем переданный phone
	
	# находим usera с данным phone
	$id = $db->getOne('SELECT id FROM user WHERE phone=?s', $number); # присваиваем id
	
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Благодарим за заказ. Ваш заказ № <?php echo $id; ?>P</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
</head>
<body>
	<?php 	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php');	?>

	<?php  $total = $db->getOne('SELECT SUM(total) as `sum_total` FROM zakaz WHERE user_id=?s',$id); # Сумма заказа  ?>
	
	<div class="cart">	
					
		<div class="introHolder zakaz">
			<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
			<h3>Благодарим за заказ</h3>
			<p class="center">Наш сотрудник свяжется с вами для уточнения заказа</p>
		</div>
		<div class="introHolder order">
			<?php  $order_date = $db->getOne('SELECT DATE_FORMAT(date, "%d.%m.%Y") as date_f FROM user WHERE id=?s', $id); # Дата заказа  ?>
			<h4>Ваш Заказ № <?php echo $id; ?>Р от <?php echo $order_date; ?></h4>
		</div>
		
		<?php 	$product = $db->getAll('SELECT * FROM zakaz WHERE user_id = ?s ORDER by id asc ', $id);
				foreach($product as $row) { ?>
		
		<div class="row">
			<div class="left">
				<div class="three columns img">
					<a href="http://avtonakidki.net<?php echo $row["url"] ?>"><img src="http://avtonakidki.net/img/catalog/<?php echo $row['category'] ?>/<?php echo $row['img'] ?>"></a>
				</div>
				<div class="three columns name">
					<p><b><a href="http://avtonakidki.net<?php echo $row["url"] ?>"><?php echo $row["product_name"] ?></a></b></p>
					<p class="model"><?php echo $row['size']; ?></p>
					<p class="model">Цена: <b><?php echo number_format($row["price"], 0, ',', ' '); ?></b> руб.</p>
				</div>
			</div>
			<div class="right">
				<div class="four columns qty">
					<p><?php echo $row["qty"] ?> шт </p>
				</div>
				<div class="four columns price">	
					<p><?php echo number_format($row["total"], 0, ',', ' '); ?> руб.</p>
				</div>
			</div>
		</div>
		<?php }  ?>
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