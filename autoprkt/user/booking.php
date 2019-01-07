<?php session_start(); //Запускаем сессии
include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

$date = htmlspecialchars(trim($_GET['date'])); # определяем статус
$mashina = htmlspecialchars(trim($_GET['mashina'])); # определяем статус

$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');  

#Функция вывода русского месяца
function rdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array('янв' , 'фев' , 'мар' , 'апр' , 'мая' , 'июн' , 'июл' , 'авг' , 'сен' , 'окт' , 'ноя' , 'дек');
	if(strpos($param,'M')===false) return date($param, $time);
	else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
}
	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Аренды</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
<article class="booking">
	<div class="introHolder">
		<h1>Аренда</h1>
	</div>
	
	<div class="filter">
		<div class="four columns spec_button">
			<span class="add"><a href="/user/booking_add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить</a></span> 
			
		</div>
		<div class="eight columns filter_button">
			<b>Фильтр:</b>
			<span <?php if ($date == 'today') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=today">Сегодня</a></span> 
			<span <?php if ($date == 'yestarday') { echo 'class="active"'; } ?> ><a href="/user/booking.php?date=yestarday">Вчера</a></span> 
			<span <?php if ($date == 'week') { echo 'class="active"'; } ?> ><a href="/user/booking.php?date=week">Неделя</a></span> 
			<span <?php if ($date == 'mounth') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=mounth">Месяц</a></span> 
			<?php if ($date != '') { ?><a href="/user/booking.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
			<?php if ($mashina != '') { ?><a href="/user/booking.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
		</div>
	</div>
	<div class="filter">
		<div class="twelve columns filter_button">
			<span <?php if ($date == 'm0') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m0">Декабрь 17</a></span> 
			<span <?php if ($date == 'm1') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m1">Январь</a></span> 
			<span <?php if ($date == 'm2') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m2">Февраль</a></span> 
			<span <?php if ($date == 'm3') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m3">Март</a></span> 
			<span <?php if ($date == 'm4') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m4">Апрель</a></span>
			<span <?php if ($date == 'm5') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m5">Май</a></span>	
			<span <?php if ($date == 'm6') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m6">Июнь</a></span> 
			<span <?php if ($date == 'm7') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m7">Июль</a></span> 
			<span <?php if ($date == 'm8') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m8">Август</a></span> 
			<span <?php if ($date == 'm9') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m9">Сентябрь</a></span>
			<span <?php if ($date == 'm10') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m10">Октябрь</a></span>				
			<span <?php if ($date == 'm11') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m11">Ноябрь</a></span>				
			<span <?php if ($date == 'm12') { echo 'class="active"'; } ?>><a href="/user/booking.php?date=m12">Декабрь</a></span>				
			<?php if ($date != '') { ?><a href="/user/booking.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
		</div>
	</div>
	
	
	<div class="row top">
		<div class="col usernumber">
			<b>N</b>
		</div>
		<div class="col userdate">
			<b>Дата</b>
		</div>
		<div class="col userauto">
			<b>Авто</b>
		</div>
		<div class="col usertarif">
			<b>Срок</b>
		</div>
		<div class="col userdates">
			<b>Период</b>
		</div>
		<div class="col userprice">
			<b>Цена</b>
		</div>
		<div class="col usertotal">
			<b>Сумма</b>
		</div>
		<div class="col userid">
			<b>Клиент</b>
		</div>
		<div class="col usermsg">
			<b>Коментарий</b>
		</div>
	</div>
	<?php 
		$today = date('Y-m-d');
		$week = date('Y-m-d', strtotime('Monday this week'));
		$mounth = date('Y-m-01');
		if ($date == '') { $booking = $db->getAll('SELECT * FROM booking ORDER by date desc' ); }
		elseif ($date == 'today') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', date('Y-m-d') ); }
		elseif ($date == 'yestarday') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', date('Y-m-d', strtotime('yesterday')) ); }
		elseif ($date == 'week') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', $week ); }
		elseif ($date == 'mounth') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', $mounth ); }
		
		elseif ($date == 'm0') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2017-12-01" and date <= "2017-12-31" ORDER by date desc' ); }
		elseif ($date == 'm1') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-01-01" and date <= "2018-01-31" ORDER by date desc' ); }
		elseif ($date == 'm2') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-02-01" and date <= "2018-02-28" ORDER by date desc' ); }
		elseif ($date == 'm3') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-03-01" and date <= "2018-03-31" ORDER by date desc' ); }
		elseif ($date == 'm4') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-04-01" and date <= "2018-04-30" ORDER by date desc' ); }
		elseif ($date == 'm5') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-05-01" and date <= "2018-05-31" ORDER by date desc' ); }
		elseif ($date == 'm6') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-06-01" and date <= "2018-06-30" ORDER by date desc' ); }
		elseif ($date == 'm7') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-07-01" and date <= "2018-07-31" ORDER by date desc' ); }
		elseif ($date == 'm8') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-08-01" and date <= "2018-08-31" ORDER by date desc' ); }
		elseif ($date == 'm9') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-09-01" and date <= "2018-09-31" ORDER by date desc' ); }
		elseif ($date == 'm10') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-10-01" and date <= "2018-10-31" ORDER by date desc' ); }
		elseif ($date == 'm11') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-11-01" and date <= "2018-11-31" ORDER by date desc' ); }
		elseif ($date == 'm12') { $booking = $db->getAll('SELECT * FROM booking WHERE date >= "2018-12-01" and date <= "2018-12-31" ORDER by date desc' ); }
		
		if ($mashina != '') { $booking = $db->getAll('SELECT * FROM booking WHERE auto = ?s ORDER by date desc', $mashina ); }
		
		foreach ($booking as $row) {   ?>
	
		<a href="/user/booking_page.php?id=<?php echo $row['id']; ?>">
	
		<div class="row">
			<div class="col usernumber">
				<?php echo $row['id']; ?>
			</div>
			<div class="col userdate">
				<?php echo date("d.m.Y", strtotime($row['date'])); ?>
			</div>
			<div class="col userauto">
				<?php echo $row['auto']; ?>
			</div>
			<div class="col usertarif">
				<?php echo $row['count']; ?>
			</div>
			<div class="col userdates">
				<?php echo rdate('d M', strtotime($row['date1'])); ?> - <?php echo rdate('d M', strtotime($row['date2'])); ?>
			</div>
			<div class="col userprice">
				<?php echo number_format($row['price'], 0, ',', '.'); ?>
			</div>
			<div class="col usertotal">
				<?php echo number_format($row['total'], 0, ',', '.'); 
				$sum_prihod = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` WHERE booking_id = ?s', $row['id'] ); 
				$sum_rashod = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` WHERE booking_id = ?s', $row['id'] ); 
				$sum = $sum_prihod['sum_prihod'] - $sum_rashod['sum_rashod']; 
				$width = ($sum/$row['total'])*100;
				?>
				<span class="oplata<?php if ($width >= '100') {echo '_full'; } elseif ($width <= '0') {echo '_none'; }?>" style="width:<?php if ($width == '0') {echo '100'; } else { echo $width; } ?>%"></span>
			</div>
			<div class="col userid">
				<?php echo $row['user_id']; ?>
			</div>
			<div class="col usermsg">
				<?php echo $row['msg']; ?>
			</div>
		</div>
	
		</a>
	<?php } 
	
		
		if ($date == '') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking');  }
		elseif ($date == 'today') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date = ?s', date('Y-m-d') ); }
		elseif ($date == 'yestarday') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date = ?s', date('Y-m-d', strtotime('yesterday')) ); }
		elseif ($date == 'week') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= ?s', $week ); }
		elseif ($date == 'mounth') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= ?s', $mounth ); }
		
		elseif ($date == 'm0') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2017-12-01" and date <= "2017-12-31"' ); }
		elseif ($date == 'm1') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-01-01" and date <= "2018-01-31"' ); }
		elseif ($date == 'm2') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-02-01" and date <= "2018-02-28"' ); }
		elseif ($date == 'm3') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-03-01" and date <= "2018-03-31"' ); }
		elseif ($date == 'm4') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-04-01" and date <= "2018-04-30"' ); }
		elseif ($date == 'm5') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-05-01" and date <= "2018-05-31"' ); }
		elseif ($date == 'm6') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-06-01" and date <= "2018-06-30"' ); }
		elseif ($date == 'm7') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-07-01" and date <= "2018-07-31"' ); }
		elseif ($date == 'm8') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-08-01" and date <= "2018-08-31"' ); }
		elseif ($date == 'm9') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-09-01" and date <= "2018-09-31"' ); }
		elseif ($date == 'm10') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-10-01" and date <= "2018-10-31"' ); }
		elseif ($date == 'm11') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-11-01" and date <= "2018-11-31"' ); }
		elseif ($date == 'm12') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date >= "2018-12-01" and date <= "2018-12-31"' ); }
		
		if ($mashina != '') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE auto = ?s', $mashina ); }
		
		foreach ($sum as $row) {   ?>
	
	<div class="row bottom">
			<div class="col usernumber">&nbsp;</div>
			<div class="col userdate">&nbsp;</div>
			<div class="col userauto">&nbsp;</div>
			<div class="col usertarif"><?php echo $row['sum_count']; ?> сут.</div>
			<div class="col userdates">&nbsp;</div>
			<div class="col userprice"><b>Итого:</b></div>
			<div class="col usertotal"><b><?php echo number_format($row['sum_total'], 0, ',', '.'); ?></b></div>
			<div class="col userid">&nbsp;</div>
			<div class="col usermsg">&nbsp;</div>
		</div>
	<?php } ?>
</article>