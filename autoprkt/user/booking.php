<?php session_start(); //Запускаем сессии
include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

$date = htmlspecialchars(trim($_GET['date'])); # определяем статус
$start_date = htmlspecialchars(trim($_GET['start_date'])); # определяем статус
$last_date = htmlspecialchars(trim($_GET['last_date'])); # определяем статус
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
#Функция вывода ПОЛНОГО НАЗВАНИЯ русского месяца для поиска
function fdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array('Январь' , 'Февраль' , 'Март' , 'Апрель' , 'Май' , 'Июнь' , 'Июль' , 'Август' , 'Сентябрь' , 'Октябрь' , 'Ноябрь' , 'Декабрь');
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
	</div>
	<div class="filter">
		<div class="twelve columns filter_button">
		<?php 
			for ($mnt = strtotime("2017-12-01"); $mnt < strtotime(date('Y-m-d')); $mnt = strtotime("+1 month", $mnt)) { ?>

				<span class="<?php if ($start_date == date('Y-m-01', $mnt)) { echo 'active'; } ?>">
				<?php 
				 echo '<a href="/user/booking.php?date=mun&start_date='. date('Y-m-01', $mnt) .'&last_date='. date('Y-m-t', $mnt) .'">'. fdate("M", $mnt).' '. fdate("Y", $mnt) .'</a>';
				?></span><?php
			}
		?>
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
		$i = 1;
		$w = array();
		$where = '';
			
			if ($date) 			$w[] = $db->parse('date >= ?s and date <= ?s', $start_date, $last_date);
			if ($mashina)		$w[] = $db->parse('auto = ?s', $mashina);
			if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);
			$booking = $db->getAll("SELECT * FROM booking ?p ORDER by date desc", $where);
			
			foreach ($booking as $row) { ?>
	
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
	
	$i = 1;
	$w = array();
	$where = '';
		
		if ($date) 			$w[] = $db->parse('date >= ?s and date <= ?s', $start_date, $last_date);
		if ($mashina)		$w[] = $db->parse('auto = ?s', $mashina);
		if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);
		$sum = $db->getAll("SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking ?p ORDER by date desc", $where);
		
		foreach ($sum as $row) { ?>
	
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