<?php session_start();
	$sid = session_id();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	 
if ($_POST['price'] == '') {
	echo '<div class="error">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Не заполнено поле (Прайс)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif ($_POST['date1'] == $_POST['date2']) {
	echo '<div class="error">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Совпадают даты начала и конца аренды</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} else { 

	
	$db = new SafeMySQL();
	
	
	# Достаем car_url
	$car_url = $db->getRow('SELECT * FROM car WHERE name = ?s', $_POST['auto']);
	$url = $car_url['url'];
	
	# Считаем count
		#Вычисляем период аренды
		$d = new DateTime($_POST['date2']); 
		$count_day = $d->diff( new DateTime($_POST['date1']) )->format("%d");
		
		#Вычисляем сумму аренды
		$total = $_POST['price']*$count_day;
		
	$data = array('auto' => $_POST['auto'], 'url' => $url, 'date' => $_POST['date'], 'user_id' => $_POST['user_id'], 'tarif' => 'Свободный', 'count' => $count_day, 'date1' => $_POST['date1'], 'date2' => $_POST['date2'], 'price' => $_POST['price'], 'total' => $total, 'msg' => $_POST['msg'], 'sid' => $_POST['sid']);
	
	$db->query("INSERT INTO booking SET ?u", $data);
	
	
	
	# Достаем баланс Клиента
	$row = $db->getRow('SELECT * FROM user WHERE id=?s', $_POST['user_id'] );
	$balance = $row['balance'];
	
	$user_balance = $balance - $total;
	$data_balance = array('balance' => $user_balance);
	$db->query("UPDATE user SET ?u WHERE id = ?i", $data_balance, $_POST['user_id'] );
	
	
	# Достаем Номер Бронирования
	$booking_id = $db->getRow('SELECT id FROM booking Order by id desc');

	echo '<script language="JavaScript">
		window.location.href = "/user/booking_page.php?id='. $booking_id['id'] .'"
		</script>';
}
?>