<?php session_start(); 
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php'); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$date = htmlspecialchars(trim($_GET['date'])); # определяем статус

	$db = new SafeMySQL();

	#Функция вывода русского месяца
	function rdate($param, $time=0) {
		if(intval($time)==0)$time=time();
		$MonthNames=array('янв' , 'фев' , 'мар' , 'апр' , 'мая' , 'июн' , 'июл' , 'авг' , 'сен' , 'окт' , 'ноя' , 'дек');
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
		<div class="twelve columns filter_button">
			<span <?php if ($date == 'm0') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m0">Декабрь 17</a></span> 
			<span <?php if ($date == 'm1') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m1">Январь</a></span> 
			<span <?php if ($date == 'm2') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m2">Февраль</a></span> 
			<span <?php if ($date == 'm3') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m3">Март</a></span> 
			<span <?php if ($date == 'm4') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m4">Апрель</a></span>
			<span <?php if ($date == 'm5') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m5">Май</a></span>	
			<span <?php if ($date == 'm6') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m6">Июнь</a></span> 
			<span <?php if ($date == 'm7') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m7">Июль</a></span> 
			<span <?php if ($date == 'm8') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m8">Август</a></span> 
			<span <?php if ($date == 'm9') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m9">Сентябрь</a></span>
			<span <?php if ($date == 'm10') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m10">Октябрь</a></span>				
			<span <?php if ($date == 'm11') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m11">Ноябрь</a></span>				
			<span <?php if ($date == 'm12') { echo 'class="active"'; } ?>><a href="/user/pay.php?date=m12">Декабрь</a></span>				
			<?php if ($date != '') { ?><a href="/user/pay.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
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


			$each_mounth = date('Y-m-01');
			$w = array();
			$where = '';
					
				if ($date == 'mounth') 	$w[] = $db->parse('date >= ?s', $each_mounth);
				if ($date == 'm0') 		$w[] = $db->parse('date >= "2017-12-01" and date <= "2017-12-31"');
				if ($date == 'm1') 		$w[] = $db->parse('date >= "2018-01-01" and date <= "2018-01-31"');
				if ($date == 'm2') 		$w[] = $db->parse('date >= "2018-02-01" and date <= "2018-02-30"');
				if ($date == 'm3') 		$w[] = $db->parse('date >= "2018-03-01" and date <= "2018-03-31"');
				if ($date == 'm4') 		$w[] = $db->parse('date >= "2018-04-01" and date <= "2018-04-30"');
				if ($date == 'm5') 		$w[] = $db->parse('date >= "2018-05-01" and date <= "2018-05-30"');
				if ($date == 'm6') 		$w[] = $db->parse('date >= "2018-06-01" and date <= "2018-06-30"');
				if ($date == 'm7') 		$w[] = $db->parse('date >= "2018-07-01" and date <= "2018-07-31"');
				if ($date == 'm8') 		$w[] = $db->parse('date >= "2018-08-01" and date <= "2018-08-31"');
				if ($date == 'm9') 		$w[] = $db->parse('date >= "2018-09-01" and date <= "2018-09-30"');
				if ($date == 'm10') 	$w[] = $db->parse('date >= "2018-10-01" and date <= "2018-10-31"');
				if ($date == 'm11') 	$w[] = $db->parse('date >= "2018-11-01" and date <= "2018-11-30"');
				if ($date == 'm12') 	$w[] = $db->parse('date >= "2018-12-01" and date <= "2018-12-31"');
				
				if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);
				$select_prihod = $db->getAll("SELECT * FROM `prihod` ?p UNION SELECT * FROM rashod ?p ORDER by date desc", $where, $where);
				foreach ($select_prihod as $row) {   ?>

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