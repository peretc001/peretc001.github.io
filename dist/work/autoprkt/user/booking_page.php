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
	
	$row = $db->getRow("SELECT * FROM `booking` WHERE id = ?s", $id);
	$auto = $row['auto'];
	
	$user_row = $db->getRow("SELECT * FROM `user` WHERE id = ?s", $row['user_id']);
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Аренда N <?php echo $row['id']; ?></title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
	<script src="/user/js/uikit/js/uikit.min.js"></script>
	<link rel="stylesheet" href="/user/js/uikit/css/uikit.css" />
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
	<div class="booking_page">
		<div class="introHolder">
			<h1>Аренда N <?php echo $row['id']; ?></h1>
		</div>
		<div class="row">
			<p class="center"><b><a href="/user/user_page.php?id=<?php echo $user_row['id']; ?>"><?php echo $user_row['userfirstname']; ?> <?php echo $user_row['username']; ?> <?php echo $user_row['userlastname']; ?></a></b></p>
		</div>
		<div class="row">
			<div class="one-half column">
				<ul>
					<li class="name"><p>Дата</p></li>			<li><p><?php echo date("d.m.Y", strtotime($row['date'])); ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Авто</p></li>			<li><p><?php echo $row['auto']; ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Срок</p></li>			<li><p><?php echo $row['count'] ?> сут.</p></li>
				</ul>
			</div>
			<div class="one-half column">
				<ul>
					<li class="name"><p>Период</p></li>			<li><p><?php echo rdate('d M', strtotime($row['date1'])); ?> - <?php echo rdate('d M', strtotime($row['date2'])); ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Цена</p></li>			<li class="sum"><p><?php echo number_format($row['price'], 0, ',', '.'); ?></p></li>
				</ul>
				<ul>
					<li class="name"><p>Сумма</p></li>			<li class="total"><p><?php echo number_format($row['total'], 0, ',', '.'); ?></p></li>
				</ul>
				
			</div>
		</div>
		<div class="row msg<?php if($row['msg'] == '') { echo 'uk-hidden'; } ?>">
			<p><?php echo nl2br($row['msg']); ?></p>
		</div>
	</div>
	<?php 	
			#Вычисляем Баланс клиента
			#Приход
			$balance_plus = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` WHERE user_id = ?s and booking_id = ?s', $row['user_id'], $id);
			$plus = $balance_plus['sum_prihod']; 
			#Расход
			$balance_minus = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` WHERE user_id = ?s and booking_id = ?s', $row['user_id'], $id);
			$minus = $balance_minus['sum_rashod']; 
			#Итог
			$balance = $plus - $minus - $row['total'];

			#Определяем Номер ДОП соглашения			
			$ll = $db->getCol('SELECT * FROM `booking` WHERE user_id = ?s and general = "yes"', $row['user_id']);
			foreach ($ll as $list) {
				if($id > $list) {
					$general = $list;
				}
			}
			$counter = 0;
			for ($i = $general; $i < $id; $i++) {
						$i;
						$counter++;     
					}
			$dop_number = $counter;
	?>
	<div class="edit_user">
		<div class="row">
			<a href="http://doc.autoprkt.ru/MPDF56/index.php?id=<?php echo $row['id']; ?>&user_id=<?php echo $row['user_id']; ?>" target="blank"><i class="fa fa-file-text" aria-hidden="true"></i> Договор</a>
			<?php if($row['general'] == '') { ?>
				<a href="http://doc.autoprkt.ru/MPDF56/dop.php?id=<?php echo $row['id']; ?>&user_id=<?php echo $row['user_id']; ?>&general=<?php echo $general; ?>&dop_number=<?php echo $dop_number; ?>" target="blank"><i class="fa fa-file-text" aria-hidden="true"></i> ДС <?php echo $dop_number; ?></a>
			<?php } ?>
			<a href="http://doc.autoprkt.ru/MPDF56/act.php?id=<?php echo $id; ?>&user_id=<?php echo $row['user_id']; ?>" target="blank"><i class="fa fa-file-text" aria-hidden="true"></i> Акт</a>
		</div>
		<div class="row center">
				<?php 
					if($row['general'] == '') { 
						echo '<a href="/user/inc/form/edit_booking_make_general.php?id='. $id .'&type=gen" class="button button-warning">Дополнительный договор</a>';
					} elseif($row['general'] == 'yes') {
						echo '<a href="/user/inc/form/edit_booking_make_general.php?id='. $id .'&type=ungen" class="button button-danger">Основной договор</a>';
					}
				?>
		</div>
		<div class="row edit_menu">
			<ul>
				<li><a class="button btn_edit" data-uk-toggle="{target:'#elem1'}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать</a></li>
				<li>
					<form action="/user/inc/form/edit_booking.php" method="post" class="form_add_one_day">
						<input type="hidden" name="id" 		value="<?php echo $id; ?>">
						<input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
						<input type="hidden" name="date" 	value="<?php echo $row['date']; ?>">
						<input type="hidden" name="auto" 	value="<?php echo $row['auto']; ?>">
						<input type="hidden" name="date1" 	value="<?php echo $row['date1']; ?>">				
						<input type="hidden" name="date2" 	value="<?php echo date('Y-m-d', strtotime($row['date2']. '+1 days')); ?>">				
						<input type="hidden" name="price" 	value="<?php echo $row['price']; ?>">
						<input type="hidden" name="total" 	value="">
						<textarea hidden 		name="msg"><?php echo $row['msg']; ?></textarea>
						<button class="button btn_add_one_day">Добавить 1 сутки</button>
					</form>
				</li>
				<li><a class="button btn_plus" data-uk-toggle="{target:'#elem2'}" ><i class="fa fa-caret-down" aria-hidden="true"></i> Приход</a></li>
				<li><a class="button btn_minus" data-uk-toggle="{target:'#elem3'}" ><i class="fa fa-caret-up" aria-hidden="true"></i> Расход</a></li>
			</ul>
		</div>
		
		<div id="elem1" class="edit_booking_page uk-hidden">
				
			<script src="/user/js/jquery.maskedinput.js" type="text/javascript"></script>
			<script type="text/javascript">
				jQuery(function($){
				   $("#user_number").mask("8-999-999-99-99");
				   $("#user_number").mask("8-999-999-99-99");
				});
			</script>
			<form action="/user/inc/form/edit_booking.php" method="post" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
				<div class="row">
					<div class="four columns">
						<label for="date" class="control-label">Дата:</label>
						<input id="date" type="date" class="u-full-width form-control" name="date" value="<?php echo $row['date']; ?>">				
					</div>
					<div class="four columns">
						<label for="auto" class="control-label">Авто:</label>
						<select id="auto" class="u-full-width form-control" name="auto">
						<?php $car_select = $db->getAll('SELECT * FROM car WHERE id = "2"'); 
								foreach ($car_select as $row_car) {   ?>
							<option value="<?php echo $row_car['name']; ?>" <?php if ($row_car['name'] == $auto) { echo 'selected'; } ?> ><?php echo $row_car['name']; ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="four columns">
						<label for="date1" class="control-label">Дата начала:</label>
						<input id="date1" type="date" class="u-full-width form-control" name="date1" value="<?php echo $row['date1']; ?>">				
					</div>
					
				</div>
				<div class="row">
					<div class="four columns">
						<label for="date2" class="control-label">Дата сдачи:</label>
						<input id="date2" type="date" class="u-full-width form-control" name="date2" value="<?php echo $row['date2']; ?>">				
					</div>
					<div class="four columns">
						<label for="price" class="control-label">Цена:</label>
						<input id="price" type="tel" class="u-full-width form-control" name="price" value="<?php echo $row['price']; ?>">
					</div>
					<div class="four columns">
						<label for="total" class="control-label">Сумма:</label>
						<input id="total" type="tel" class="u-full-width form-control" name="total" value="<?php echo $row['total']; ?>">				
					</div>
					
				</div>
				<div class="row">
					<div class="twelve columns">
						<label for="msg" class="control-label">Комментарий:</label>
						<textarea id="msg" name="msg" class="u-full-width form-control"/><?php echo $row['msg']; ?></textarea>
					</div>
				</div>
				<div class="row">
					<input name="button" type="submit" value="ОБНОВИТЬ" class="button button-all"> <a class="del" href="/user/inc/form/del.php?booking_id=<?php echo $id; ?>&user_id=<?php echo $row['user_id']; ?>&type=booking"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
				</div>
			</form>
		</div>
		
		<div id="elem2" class="add_pay_date uk-hidden">
				
			<form action="/user/inc/form/add_pay.php" method="post" >
				<input type="hidden" name="type" value="prihod">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
				<input type="hidden" name="auto" value="<?php echo $row['auto']; ?>">
				<input type="hidden" name="booking_id" value="<?php echo $id; ?>">
						
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
		
		<div id="elem3" class="add_pay_date red uk-hidden">
				
			<form action="/user/inc/form/add_pay.php" method="post" >
				<input type="hidden" name="type" value="rashod">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
				<input type="hidden" name="auto" value="<?php echo $row['auto']; ?>">
				<input type="hidden" name="booking_id" value="<?php echo $id; ?>">
				
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
	
	<div class="row balance">
		<h1>Баланс</h1>
		<div class="introHolder <?php if ($balance > 0) { echo 'plus'; }  elseif ($balance < 0)  { echo 'minus'; } ?>">
			<h1><?php if ($balance > 0) { echo '+'; }  ?> <?php echo number_format($balance, 0, ',', ' '); ?></h1>
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
			<?php 	$select_prihod = $db->getAll("SELECT * FROM `prihod` WHERE user_id = ?s and booking_id = ?s UNION SELECT * FROM rashod WHERE user_id = ?s and booking_id = ?s ORDER by id desc", $row['user_id'], $id, $row['user_id'], $id);
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
						$balance_plus = $db->getRow('SELECT SUM(money) as sum_prihod FROM `prihod` WHERE user_id = ?s and booking_id = ?s', $row['user_id'], $id);
						$plus = $balance_plus['sum_prihod']; echo number_format($plus, 0, ',', '.'); 
					?></li>
					<li class="col sum red"><?php 
						$balance_minus = $db->getRow('SELECT SUM(money) as sum_rashod FROM `rashod` WHERE user_id = ?s and booking_id = ?s', $row['user_id'], $id);
						$minus = $balance_minus['sum_rashod']; echo number_format($minus, 0, ',', '.'); 
					?></li>
					<?php $total_mounth =  $plus - $minus;  ?>
					<li class="col msg"><span class="<?php if($total_mounth < '0') { echo ' minus'; } else { echo ' pluse'; } ?>"><?php echo number_format($total_mounth, 0, ',', '.');?></span></li>
				</ul>
		</div>
	</article>
	
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
			<div class="col userid">
				<b>Клиент</b>
			</div>
			<div class="col usermsg">
				<b>Коментарий</b>
			</div>
		</div>
		<?php 
			
			$booking = $db->getAll('SELECT * FROM `booking` WHERE user_id = ?s and id != ?s ORDER by id desc', $row['user_id'], $id); 
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
		<?php } ?>
			
		<div class="row bottom">
				<div class="col usernumber">&nbsp;</div>
				<div class="col userdate">&nbsp;</div>
				<div class="col userauto">&nbsp;</div>
				<div class="col usertarif"><?php $count = $db->getRow('SELECT SUM(count) as sum_count FROM `booking` WHERE user_id = ?s and id != ?s', $row['user_id'], $id);
				echo $count['sum_count'];  ?> сут.</div>
				<div class="col userdates">&nbsp;</div>
				<div class="col userprice"><b>Итого:</b></div>
				<div class="col usertotal"><b><?php $count = $db->getRow('SELECT SUM(total) as sum_total FROM `booking` WHERE user_id = ?s and id != ?s', $row['user_id'], $id);
				echo number_format($count['sum_total'], 0, ',', '.');  ?> </b></div>
				<div class="col userid">&nbsp;</div>
				<div class="col usermsg">&nbsp;</div>
			</div>
	</article>
	<br><br>
				
				

</body>
</html>