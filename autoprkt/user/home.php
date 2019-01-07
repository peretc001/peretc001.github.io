<?php 
session_start(); //Запускаем сессии
include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

$status = htmlspecialchars(trim($_GET['status'])); # определяем статус
$date = htmlspecialchars(trim($_GET['date'])); # определяем дату
if ($date == '') { $date = 'mounth'; }

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
    <title>User | @autoprkt</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'; ?>
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
			<span class="all"><a href="/user/booking.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Все заказы</a></span> 
		</div>
		<div class="eight columns filter_button">
			<b>Фильтр:</b>
			<span <?php if ($date == 'today') { echo 'class="active"'; } ?>><a href="/user/home.php?date=today">Сегодня</a></span> 
			<span <?php if ($date == 'yestarday') { echo 'class="active"'; } ?> ><a href="/user/home.php?date=yestarday">Вчера</a></span> 
			<span <?php if ($date == 'week') { echo 'class="active"'; } ?> ><a href="/user/home.php?date=week">Неделя</a></span> 
			<span <?php if ($date == 'mounth') { echo 'class="active"'; } ?>><a href="/user/home.php?date=mounth">Месяц</a></span> 
			<?php if ($date != '') { ?><a class="del" href="/user/home.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
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
		if ($date == '') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', date('Y-m-d') ); }
		elseif ($date == 'today') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', date('Y-m-d') ); }
		elseif ($date == 'yestarday') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', date('Y-m-d', strtotime('yesterday')) ); }
		elseif ($date == 'week') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', $week ); }
		elseif ($date == 'mounth') { $booking = $db->getAll('SELECT * FROM booking WHERE date2 >= ?s ORDER by date desc', $mounth ); }
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
		elseif ($date == 'today') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date2 >= ?s ORDER by date desc', date('Y-m-d') ); }
		elseif ($date == 'yestarday') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date2 >= ?s ORDER by date desc', date('Y-m-d', strtotime('yesterday')) ); }
		elseif ($date == 'week') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count FROM booking WHERE date2 >= ?s', $week ); }
		elseif ($date == 'mounth') { $sum = $db->getAll('SELECT SUM(total) as sum_total, SUM(count) as sum_count  FROM booking WHERE date2 >= ?s', $mounth ); }
		foreach ($sum as $row) {   ?>
	
	<div class="row bottom">
			<div class="col usernumber">&nbsp;</div>
			<div class="col userdate">&nbsp;</div>
			<div class="col userauto">&nbsp;</div>
			<div class="col usertarif"><?php if ($row['sum_count'] == '') { echo '0'; } else { echo $row['sum_count']; } ?> сут.</div>
			<div class="col userdates">&nbsp;</div>
			<div class="col userprice"><b>Итого:</b></div>
			<div class="col usertotal"><b><?php if ($row['sum_total'] == '') { echo '0'; } else { echo number_format($row['sum_total'], 0, ',', '.');  } ?></b></div>
			<div class="col userid">&nbsp;</div>
			<div class="col usermsg">&nbsp;</div>
		</div>
	<?php } ?>
</article>


<article class="user">
	<div class="introHolder">
		<h1>Клиенты</h1>
	</div>
	<div class="filter">
		<div class="four columns spec_button">
			<span class="add"><a href="/user/user_add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить</a></span> 
			<span class="all"><a href="/user/user.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Все клиенты</a></span> 
		</div>
		<div class="eight columns filter_button">
			<b>Фильтр:</b>
			<span <?php if ($status == 'new') { echo 'class="active"'; } ?>><a href="/user/user.php?status=new">Новые</a></span> 
			<span <?php if ($status == 'checked') { echo 'class="active"'; } ?> ><a href="/user/user.php?status=checked">Без документов</a></span> 
			<span <?php if ($status == 'disabled') { echo 'class="active"'; } ?> ><a href="/user/user.php?status=disabled">Заблокированные</a></span> 
			<?php if ($date != '') { ?><a class="del" href="/user/user.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
		</div>
	</div>
	<div class="row top">
		<div class="col usernumber">
			<b>N</b>
		</div>
		<div class="col userstatus">
			<b>Статус</b>
		</div>
		<div class="col userfio">
			<b>ФИО</b>
		</div>
		<div class="col userphone">
			<b>Телефон</b>
		</div>
		<div class="col userdate">
			<b>Дата</b>
		</div>
		<div class="col useremail">
			<b>E-mail</b>
		</div>
		<div class="col usermanager">
			<b>Менеджер</b>
		</div>
	</div>
	<?php 
		if ($status == '') { $user = $db->getAll('SELECT * FROM user ORDER by id desc'); }
		else { $user = $db->getAll('SELECT * FROM user WHERE status=?s ORDER by id desc', $status); }
		foreach ($user as $row) {   ?>
		
		<div class="row <?php if ($row['status'] == 'checked') { echo 'checked'; } 
				elseif ($row['status'] == 'confirmed') { echo 'confirmed'; } 
				elseif ($row['status'] == 'disabled') { echo 'disabled'; } 
				else { echo 'new'; } ?>">
			
			<div class="col usernumber">
				<?php echo $row['id']; ?>
			</div>
			<div class="col userstatus">
				<?php 	if ($row['status'] == 'checked') { echo '<i class="fa fa-address-card-o" aria-hidden="true" title="Требуются документы"></i>'; } 
						elseif ($row['status'] == 'confirmed') { echo '<i class="fa fa-check-square-o" aria-hidden="true"  title="ОК"></i>'; } 
						elseif ($row['status'] == 'new')  { echo '<i class="fa fa-phone-square" aria-hidden="true"  title="Требуется звонок"></i>'; }
						elseif ($row['status'] == 'disabled')  { echo '<i class="fa fa-lock" aria-hidden="true" title="Заблокирован"></i>'; } ?>&nbsp;
			</div>
			<div class="col userfio">
				<a href="/user/user_page.php?id=<?php echo $row['id']; ?>"><?php echo $row['userfirstname']; ?> <?php echo $row['username']; ?> <?php echo $row['userlastname']; ?></a>
			</div>
			<div class="col userphone">
				<?php echo $row['phone']; ?>
			</div>
			<div class="col userdate">
				<?php echo date("d.m.Y", strtotime($row['date'])); ?>
			</div>
			<div class="col useremail">
				<?php if($row['email'] == '') { echo '&nbsp;'; } else { echo $row['email']; } ?>
			</div>
			<div class="col usermanager">
				<?php echo $row['manager']; ?>
			</div>
		</div>
	
	
	<?php } ?>
</article>

<article class="auto">
	<div class="introHolder">
		<h1>Автомобили</h1>
	</div>
	<div class="row top">
		<div class="one column autonumber">
			<b>N</b>
		</div>
		<div class="two columns autoname">
			<b>Авто</b>
		</div>
		<div class="one column autoprice">
			<b>Тариф</b>
		</div>
		<div class="two columns autozalog">
			<b>Залог</b>
		</div>
		<div class="two columns autoprihod">
			<b>Общий доход</b>
		</div>
		<div class="two columns autorashod">
			<b>Общий расход</b>
		</div>
		<div class="two columns autototal">
			<b>Прибыль</b>
		</div>
	</div>
	<?php 
		$car = $db->getAll('SELECT * FROM car WHERE id <= "2"'); 
		foreach ($car as $row) {   ?>
	
		<a href="/user/car_page.php?id=<?php echo $row['id']; ?>">
	
		<div class="row">
			<div class="one column autonumber">
				<?php echo $row['id']; ?>
			</div>
			<div class="two columns autoname">
				<?php echo $row['name']; ?>
			</div>
			<div class="one column autoprice">
				<?php echo $row['price']; ?>
			</div>
			<div class="two columns autozalog">
				<?php echo $row['zalog']; ?>
			</div>
			<div class="two columns autoprihod">
				<?php 
						$prihod = $db->getRow('SELECT SUM(money) as p_money FROM prihod WHERE auto_id = ?s', $row['id']); 
						$total_prihod = $prihod['p_money']; echo number_format($total_prihod, 0, ',', ' ');
				?>
			</div>
			<div class="two columns autorashod">
				<?php 
						$rashod = $db->getRow('SELECT SUM(money) as r_money FROM `rashod` WHERE auto_id = ?s', $row['id']); 
						$total_rashod = $rashod['r_money']; echo number_format($total_rashod, 0, ',', ' ');
				?>
			</div>
			<div class="two columns autototal">
				<b><?php $rent = $total_prihod - $total_rashod; echo number_format($rent, 0, ',', ' ');  ?></b>
			</div>
		</div>
	
		</a>
	<?php } ?>
	
		<div class="row bottom">
			<div class="one column autonumber">
				&nbsp;
			</div>
			<div class="two columns autoname">
				&nbsp;
			</div>
			<div class="one column autoprice">
				&nbsp;
			</div>
			<div class="two columns autozalog">
				&nbsp;
			</div>
			<div class="two columns autoprihod">
				<?php $sumd = $db->getRow('SELECT SUM(money) as sum_total FROM prihod '); ?>
				<b><?php $sumdox = $sumd['sum_total']; echo number_format($sumd['sum_total'], 0, ',', ' ');  ?></b>
			</div>
			<div class="two columns autorashod">
				<?php $sumr = $db->getRow('SELECT SUM(money) as sum_rash FROM rashod '); ?>
				<b><?php $sumras = $sumr['sum_rash']; echo number_format($sumr['sum_rash'], 0, ',', ' ');  ?></b>
			</div>
			<div class="two columns autototal">
				<b><?php $srent = $sumdox - $sumras; echo number_format($srent, 0, ',', ' ');  ?></b>
			</div>
		</div>
</article>
<br><br><br>