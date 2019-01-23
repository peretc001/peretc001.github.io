<?php  session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php');
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
$id = htmlspecialchars(trim($_GET['id'])); 

#Создаем безопасносе соединение
	$db = new SafeMySQL();
	
	$row = $db->getRow("SELECT * FROM `car` WHERE id = ?s", $id);
	$name = $row['name'];
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Аренда <?php echo $row['name']; ?></title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
	<script src="/user/js/uikit/js/uikit.min.js"></script>
	<link rel="stylesheet" href="/user/js/uikit/css/uikit.css" />
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
	<div class="booking_page">
		<div class="introHolder">
			<h1>Авто <?php echo $row['name']; ?></h1>
		</div>
		<div class="row">
			<div class="one-half column">
				<ul>
					<li class="name"><p>Авто</p></li>			<li><p><?php echo $row['name']; ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Цена сут</p></li>		<li><p><?php echo $row['price'] ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>6-15 сут</p></li>		<li><p><?php echo $row['price6_15']; ?></p></li>
				</ul>
			</div>
			<div class="one-half column">
				<ul>
					<li class="name"><p>16-30 сут</p></li>		<li><p><?php echo $row['price16_30']; ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Месяц</p></li>			<li><p><?php echo $row['price_mounth']; ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Залог</p></li>			<li><p><?php echo $row['zalog']; ?></p></li>
				</ul>
			</div>
		</div>
		<div class="row msg">
			<p>Vin:  <?php echo $row['vin']; ?></p></li>
		</div>
	</div>
	
	<div class="edit_user">
		<div class="row edit_menu">
			<ul>
				<li><a class="minus" data-uk-toggle="{target:'#elem3'}" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Расход</a></li>
			</ul>
		</div>
		
		<div id="elem3" class="add_pay_date red uk-hidden">
				
			<form action="/user/inc/form/add_pay.php" method="post" >
				<input type="hidden" name="type" value="rashod_auto">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="auto" value="<?php echo $row['auto']; ?>">
				
				<div class="row">
					<div class="four columns">
						<label for="date" class="control-label">ДАТА ПЛАТЕЖА:</label>
						<input id="date" type="date" class="u-full-width form-control" name="date" value="<?php echo date('Y-m-d'); ?>">				
					</div>
					<div class="four columns">
						<label for="money" class="control-label">Сумма:</label>
						<input id="money" type="tel" class="u-full-width form-control" name="money" value="">
					</div>
					<div class="four columns">
						<label for="msg" class="control-label">Коментарий:</label>
						<textarea id="msg" name="msg" class="u-full-width form-control"/></textarea>
					</div>
				</div>
				<div class="row">
					<input name="button" type="submit" value="Добавить" class="button button-all">
				</div>
			</form>
		</div>
	</div>
	
	<div class="busy">
		<div class="row">
		<?php 	#Вычисляем кол-во дней с начала первой аренды (декабрь 2017 года)
				$date1 = date('Y-m-d');
				$date2 = $row['date'];
				$diff = abs(strtotime($date2) - strtotime($date1));
				$days = floor(($diff)/ (60*60*24));
				#Получаем результат
				$days;
				#Считаем кол-во дней аренды авто
				$busy = $db->getRow('SELECT SUM(count) as sum_count FROM `booking` WHERE auto = ?s', $name);
				$busy_count = $busy['sum_count']; 
				$percent = $busy_count / $days;
				$rest = substr($percent, 0, 4); 
				$ctr = $rest*100 .'%';
				?>
		</div>		
	</div>
	<div class="row balance">
		<h1>Конверсия</h1>
		<div class="introHolder">
			<h1><?php echo $ctr; ?></h1>
		</div>
	</div>
	<?php 	
			#Вычисляем Баланс клиента
			#Приход
			$balance_plus = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` WHERE auto_id = ?s', $id);
			$plus = $balance_plus['sum_prihod']; 
			#Расход
			$balance_minus = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` WHERE auto_id = ?s', $id);
			$minus = $balance_minus['sum_rashod']; 
			#Итог
			$balance = $plus - $minus - $row['total'];
	?>
	<div class="row balance">
		<h1>Баланс</h1>
		<div class="introHolder <?php if ($balance > 0) { echo 'plus'; }  elseif ($balance < 0)  { echo 'minus'; } ?>">
			<h1><?php if ($balance > 0) { echo '+'; }  ?> <?php echo number_format($balance, 0, ',', ' '); ?></h1>
		</div>
	</div>
	
	<div class="prihod">
		<div class="row">
			<div class="one-half column">
				<div class="introHolder">
					<h3>Приход</h3>
				</div>
				<ul class="top">
					<li class="col date">Дата</li>
					<li class="col sum">Сумма</li>
					<li class="col msg">Комментарий</li>
				</ul>
				<?php 
					$prihod = $db->getAll('SELECT * FROM prihod WHERE auto_id = ?s ORDER by id desc', $id);
					foreach ($prihod as $row) {   ?>
				<ul >
					<li class="col date"><?php if($row['user_id'] != '') { ?><a href="/user/user_page.php?id=<?php echo $row['user_id']; ?>"><?php } ?><?php echo date("d.m.Y", strtotime($row['date'])); ?><?php if($row['user_id'] != '') { ?></a><?php } ?></li>
					<li class="col sum"><?php echo number_format($row['money'], 0, ',', '.'); ?></li>
					<li class="col msg"><?php echo $row['msg']; ?></li>
				</ul>
				<?php } ?>
				<ul class="row bottom">
					<li class="col date"></li>
					<li class="col sum"><?php echo number_format($plus, 0, ',', '.'); ?></li>
					<li class="col msg"></li>
				</ul>
			</div>
			
			<div class="one-half column">
				<div class="introHolder">
					<h3>Расход</h3>
				</div>
				<ul class="top">
					<li class="col date">Дата</li>
					<li class="col sum">Сумма</li>
					<li class="col msg">Комментарий</li>
				</ul>
				<?php 
					$rashod = $db->getAll('SELECT * FROM rashod WHERE auto_id = ?s ORDER by id desc', $id);
					foreach ($rashod as $row) {   ?>
				<ul >
					<li class="col date"><?php if($row['user_id'] != '') { ?><a href="/user/user_page.php?id=<?php echo $row['user_id']; ?>"><?php } ?><?php echo date("d.m.Y", strtotime($row['date'])); ?><?php if($row['user_id'] != '') { ?></a><?php } ?></li>
					<li class="col sum"><?php echo number_format($row['money'], 0, ',', '.'); ?></li>
					<li class="col msg"><?php echo $row['msg']; ?></li>
				</ul>
				<?php } ?>
				<ul class="row bottom">
					<li class="col date"></li>
					<li class="col sum"><?php echo number_format($minus, 0, ',', '.'); ?></li>
					<li class="col msg"></li>
				</ul>
			</div>
		</div>
	</div>
	
	