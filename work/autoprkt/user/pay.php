<?php session_start(); 
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php'); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$date = htmlspecialchars(trim($_GET['date'])); # определяем статус
	$start_date = htmlspecialchars(trim($_GET['start_date'])); # определяем статус
	$last_date = htmlspecialchars(trim($_GET['last_date'])); # определяем статус
	$car = htmlspecialchars(trim($_GET['car'])); # определяем статус

	if($start_date == '') {
		$date = 'mun';
		$start_date = date('Y-m-01');
		$last_date = date('Y-m-t');
	}
	$db = new SafeMySQL();

	#Функция вывода русского месяца
	function rdate($param, $time=0) {
		if(intval($time)==0)$time=time();
		$MonthNames=array('янв' , 'фев' , 'мар' , 'апр' , 'мая' , 'июн' , 'июл' , 'авг' , 'сен' , 'окт' , 'ноя' , 'дек');
		if(strpos($param,'M')===false) return date($param, $time);
		else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
	}
	#Функция вывода ПОЛНОГО НАЗВАНИЯ русского месяца для поиска
	function fdate($param, $time=0) {
		if(intval($time)==0)$time=time();
		$MonthNames=array('Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь');
		if(strpos($param,'M')===false) return date($param, $time);
		else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
	}

?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Платежи</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); 
	
	#Вычисляем Баланс клиента
	#Приход
	$balance_plus = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` ');
	$plus = $balance_plus['sum_prihod']; 
	#Расход
	$balance_minus = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` ');
	$minus = $balance_minus['sum_rashod']; 
	#Итог
	$balance = $plus - $minus - $row['total'];
	?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
	<article class="row balance">
			<h1>Баланс</h1>
			<div class="introHolder <?php if ($balance > 0) { echo 'plus'; }  elseif ($balance < 0)  { echo 'minus'; } ?>">
				<h1><?php if ($balance > 0) { echo '+'; }  ?> <?php if ($balance == '') { echo '0'; } else {  echo number_format($balance, 0, ',', ' '); } ?></h1>
			</div>
	</article>
	<div class="filter">
		<div class="introHolder">
			<h3>Платежи</h3>
		</div>
		<div class="row">
			<div class="twelve columns filter_button">
				<b>Авто:</b>
					<?php
						$auto = $db->getAll('SELECT * FROM car WHERE id <= 2');
						foreach ($auto as $row) {
					?>
					<span <?php if ($car == $row['id']) { echo 'class="active"'; } ?>>
						<a href="/user/pay.php?<?php if ($date) { echo 'date=mun&start_date='. $start_date .'&last_date='. $last_date .'&'; } ?>car=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></span> 
					<?php } ?>
					<?php if ($car != '') { ?><a href="/user/pay.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="twelve columns filter_button">
				<?php 
					for ($mnt = strtotime("2017-12-01"); $mnt <= strtotime(date('Y-m-d')); $mnt = strtotime("+1 month", $mnt)) { ?>

						<span class="<?php if ($date == 'mun' and $start_date == date('Y-m-01', $mnt)) { echo 'active'; } ?>">
							<a href="/user/pay.php?date=mun&start_date=<?php echo date('Y-m-01', $mnt); ?>&last_date=<?php echo date('Y-m-t', $mnt); ?><?php if($car) { echo '&car='. $car; } ?>"><?php echo fdate("M", $mnt).' '. fdate("Y", $mnt); ?></a>
						</span><?php
					}
				?>
				<span class="<?php if ($date == 'all') { echo 'active'; } ?>"><a href="/user/pay.php?date=all&start_date=2017-12-01&last_date=<?php echo date('Y-m-t'); ?>">За весь период</a></span>
				<?php if ($date != '') { ?><a href="/user/pay.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
			</div>
		</div>
	</div>
	<article class="prihod mounth">
		<div class="row mounth">
			<ul class="top">
				<li class="col date">Дата</li>
				<li class="col sum">Приход</li>
				<li class="col sum">Расход</li>
				<li class="col msg">Комментарий</li>
			</ul>
			<?php 
				$i = 1;
				$w = array();
				$where = '';
					
					if ($date) 			$w[] = $db->parse('date >= ?s and date <= ?s', $start_date, $last_date);
					if ($car)			$w[] = $db->parse('auto_id = ?s', $car);
					if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);
					$select_prihod = $db->getAll("SELECT * FROM `prihod` ?p UNION SELECT * FROM rashod ?p ORDER by date desc", $where, $where);
					
					foreach ($select_prihod as $row) { ?>
			

			<ul>
					<li class="col date"><?php if($row['user_id'] != '') { ?><a href="/user/user_page.php?id=<?php echo $row['user_id']; ?>"><?php } ?><?php echo date("d.m.Y", strtotime($row['date'])); ?><?php if($row['user_id'] != '') { ?></a><?php } ?></li>
					<li class="col sum green">
						<?php 	$select_sum = $db->getRow('SELECT money FROM prihod WHERE money = ?s and id = ?s', $row['money'], $row['id']);
									if($select_sum) {
									echo number_format($select_sum['money'], 0, ',', '.'); } else { echo '&nbsp;'; } ?>
					</li>
					<li class="col sum red">
					<?php 	$select_ras = $db->getRow('SELECT money FROM rashod WHERE money = ?s and id = ?s', $row['money'], $row['id']);
								if($select_ras) {
									echo number_format($select_ras['money'], 0, ',', '.'); } else { echo '&nbsp;'; } ?>
					</li>
					<li class="col msg"><?php echo $row['msg']; ?></li>
				</ul>
				<?php } ?>
				<ul class="row bottom">
					<li class="col date"></li>
					<li class="col sum green"><?php 
						$balance_plus = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` ?p', $where);
						$plus = $balance_plus['sum_prihod']; echo number_format($plus, 0, ',', '.'); 
					?></li>
					<li class="col sum red"><?php 
						$balance_minus = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` ?p', $where);
						$minus = $balance_minus['sum_rashod']; echo number_format($minus, 0, ',', '.'); 
					?></li>
					<?php $total_mounth =  $plus - $minus;  ?>
					<li class="col msg"><span class="<?php if($total_mounth < '0') { echo ' minus'; } else { echo ' pluse'; } ?>"><?php echo number_format($total_mounth, 0, ',', '.');?></span></li>
				</ul>
		</div>
	</article>
	<br><br>
</body>
</html>