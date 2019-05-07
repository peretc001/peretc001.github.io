<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php');
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
$id = htmlspecialchars(trim($_GET['id'])); 

#Функция вывода русского месяца
function rdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array('янв' , 'фев' , 'мар' , 'апр' , 'мая' , 'июн' , 'июл' , 'авг' , 'сен' , 'окт' , 'ноя' , 'дек');
	if(strpos($param,'M')===false) return date($param, $time);
	else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
}

	#Создаем безопасносе соединение
	$db = new SafeMySQL();
	#Достаем данные
	$row = $db->getRow("SELECT * FROM `user` WHERE id = ?s", $id);
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Клиент N <?php echo $id; ?></title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
	<script src="/user/js/uikit/js/uikit.min.js"></script>
	<link rel="stylesheet" href="/user/js/uikit/css/uikit.css" />
	<link rel="stylesheet" href="/css/blueimp-gallery.css">
	<script src="/js/blueimp/blueimp-gallery.min.js"></script>
</head>
<body <?php if ($row['status'] == 'disabled') { echo 'class="disabled_page"'; } ?>>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
		<div class="slides"></div>
		<h3 class="title"></h3>
		<a class="prev">‹</a>
		<a class="next">›</a>
		<a class="close">×</a>
		<ol class="indicator"></ol>
	</div>
	
	<article class="user_page">
		<div class="introHolder">
			<h1>Клиент N <?php echo $id; ?></h1>
		</div>
		
		<div class="row function">
			<i class="manager"><b>Менеджер:</b> <?php echo $row['manager']; ?></i>
			<i class="create"><b>Дата создания:</b> <?php echo date("d.m.Y", strtotime($row['date'])); ?></i>
		</div>

		<div class="row">
			<div class="one-half column">
				<ul>
					<li class="name"><p>ФИО</li>			<li><p><?php echo $row['userfirstname']; ?> <?php echo $row['username']; ?> <?php echo $row['userlastname']; ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Телефон</li>		<li><p><?php echo $row['phone']; ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Статус</li>			<li><p><?php 	if ($row['status'] == 'checked') { echo '<i class="fa fa-address-card-o" aria-hidden="true" title="Требуются документы"></i>'; } 
																	elseif ($row['status'] == 'confirmed') { echo '<i class="fa fa-check-square-o" aria-hidden="true"  title="ОК"></i>'; } 
																	elseif ($row['status'] == 'new')  { echo '<i class="fa fa-phone-square" aria-hidden="true"  title="Требуется звонок"></i>'; }
																	elseif ($row['status'] == 'disabled')  { echo '<i class="fa fa-lock" aria-hidden="true" title="Заблокирован"></i>'; } 
															?></p></li>
				</ul>
			</div>
			<div class="one-half column">
				<ul>
					<li class="name"><p>E-mail</li>			<li><p><?php echo $row['email']; ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Дата рождения</li>	<li><p><?php echo date('d.m.Y', strtotime($row['birthday'])); ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Возраст</li>		<li><p><?php function calculate_age($birthday) {
																  $birthday_timestamp = strtotime($birthday);
																  $age = date('Y') - date('Y', $birthday_timestamp);
																  if (date('md', $birthday_timestamp) > date('md')) {
																	$age--;
																  }
																  return $age;
																}

																echo calculate_age($row['birthday']);
														?></p></li>
				</ul>
				
			</div>
		</div>
		<div class="row msg">
			<p><?php echo $row['msg']; ?></p>
		</div>

		<div class="row img">
			<div id="links">
				<div class="three columns">
					<a class="example-screenshot-wrapper" href="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img1']; ?>"><img class="example-screenshot" src="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img1']; ?>"; ?></a>
				</div>
				<div class="three columns">
					<a class="example-screenshot-wrapper" href="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img2']; ?>"><img class="example-screenshot" src="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img2']; ?>"; ?></a>
				</div>
				<div class="three columns">
					<a class="example-screenshot-wrapper" href="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img3']; ?>"><img class="example-screenshot" src="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img3']; ?>"; ?></a>
				</div>
				<div class="three columns">
					<a class="example-screenshot-wrapper" href="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img4']; ?>"><img class="example-screenshot" src="/uploads/<?php echo $row['id']; ?>/<?php echo $row['img4']; ?>"; ?></a>
				</div>
			</div>
		</div>
		<script>
			document.getElementById('links').onclick = function (event) {
				event = event || window.event;
				var target = event.target || event.srcElement,
				link = target.src ? target.parentNode : target,
				options = {index: link, event: event, toggleControlsOnSlideClick: false},
				links = this.getElementsByTagName('a');
				blueimp.Gallery(links, options);
			};
		</script>
	</article>
	<div class="edit_user">
		<div class="row">
			<a href="/user/user_edit.php?id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать</a>
		</div>
	</div>

	<article class="booking">
		<div class="introHolder">
			<h1>Аренда</h1>
		</div>
		<div class="filter">
			<div class="four columns spec_button">
				<span class="add"><a href="/user/booking_add.php?user_id=<?php echo $id; ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить</a></span> 
				<span class="all"><a href="/user/booking.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Все заказы</a></span> 
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
			<div class="col usermsg full">
				<b>Коментарий</b>
			</div>
		</div>
		<?php 
			
			$booking = $db->getAll('SELECT * FROM booking WHERE user_id = ?s ORDER by id desc', $row['id']); 
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
				<div class="col usermsg full">
					<?php echo $row['msg']; ?>
				</div>
			</div>
		
			</a>
		<?php } ?>
			
		<div class="row bottom">
				<div class="col usernumber">&nbsp;</div>
				<div class="col userdate">&nbsp;</div>
				<div class="col userauto">&nbsp;</div>
				<div class="col usertarif"><?php $count = $db->getRow('SELECT SUM(count) as sum_count FROM `booking` WHERE user_id = ?s', $row['user_id']);
				echo $count['sum_count'];  ?> сут.</div>
				<div class="col userdates">&nbsp;</div>
				<div class="col userprice"><b>Итого:</b></div>
				<div class="col usertotal"><b><?php $count = $db->getRow('SELECT SUM(total) as sum_total FROM `booking` WHERE user_id = ?s', $row['user_id']);
				echo number_format($count['sum_total'], 0, ',', '.');  ?> </b></div>
				<div class="col userid">&nbsp;</div>
				<div class="col usermsg">&nbsp;</div>
			</div>
	</article>
	<?php
		#Вычисляем Баланс клиента
			#Суммы аренды
			$balance_booking = $db->getRow('SELECT SUM(total) as sum_booking FROM `booking` WHERE user_id = ?s', $row['user_id']);
			$balance_booking_total = $balance_booking['sum_booking']; 
			#Приход
			$balance_plus = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` WHERE user_id = ?s', $row['user_id']);
			$plus = $balance_plus['sum_prihod']; 
			#Расход
			$balance_minus = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` WHERE user_id = ?s', $row['user_id']);
			$minus = $balance_minus['sum_rashod']; 
			#Итог
			$balance = $plus - $minus - $balance_booking_total;

	?>
	<article class="row balance">
			<h1>Баланс</h1>
			<div class="introHolder <?php if ($balance > 0) { echo 'plus'; }  elseif ($balance < 0)  { echo 'minus'; } ?>">
				<h1><?php if ($balance > 0) { echo '+'; }  ?> <?php if ($balance == '') { echo '0'; } else {  echo number_format($balance, 0, ',', ' '); } ?></h1>
				<!--a class="update" data-uk-toggle="{target:'#elem1'}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Изменить</a>
				<div id="elem1" class="edit_balance uk-hidden">
					<form action="/user/inc/form/edit_balance.php" method="post" >
						<input type="hidden" name="user_id" value="<?php echo $id; ?>">
						<input type="tel" class="form-control" name="balance" value="<?php echo $balance; ?>">&nbsp;
						<button  class="button button-all">ОБНОВИТЬ</button>
					</form>
				</div-->
			</div>
	</article>
	<article class="prihod">
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
					$prihod = $db->getAll('SELECT * FROM prihod WHERE user_id = ?s ORDER by id desc', $row['user_id']);
					foreach ($prihod as $row) {   ?>
				<ul >
					<li class="col date"><?php echo date("d.m.Y", strtotime($row['date'])); ?></li>
					<li class="col sum"><?php echo number_format($row['money'], 0, ',', '.'); ?></li>
					<li class="col msg"><?php echo $row['msg']; ?></li>
				</ul>
				<?php } ?>
				<ul class="row bottom">
					<li class="col date"></li>
					<li class="col sum"><?php $balance_plus = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` WHERE user_id = ?s', $row['user_id']);
			$plus = $balance_plus['sum_prihod']; echo number_format($plus, 0, ',', '.'); ?></li>
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
					$rashod = $db->getAll('SELECT * FROM rashod WHERE user_id = ?s ORDER by id desc', $row['user_id']);
					foreach ($rashod as $row) {   ?>
				<ul >
					<li class="col date"><?php echo date("d.m.Y", strtotime($row['date'])); ?></li>
					<li class="col sum"><?php echo number_format($row['money'], 0, ',', '.'); ?></li>
					<li class="col msg"><?php echo $row['msg']; ?></li>
				</ul>
				<?php } ?>
				<ul class="row bottom">
					<li class="col date"></li>
					<li class="col sum"><?php $balance_minus = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` WHERE user_id = ?s', $row['user_id']);
			$minus = $balance_minus['sum_rashod']; echo number_format($minus, 0, ',', '.'); ?></li>
					<li class="col msg"></li>
				</ul>
			</div>
		</div>
	</article>

    

    