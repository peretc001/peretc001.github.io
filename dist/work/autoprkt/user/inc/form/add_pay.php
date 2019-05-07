<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	$id = $_POST['id'];
	$type = $_POST['type'];
	
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	
	$row = $db->getRow("SELECT * FROM `car` WHERE name = ?s", $_POST['auto']);
	$auto_id = $row['id'];
	if ($auto_id == '') { $auto_id = '1'; }
	
	$balance_row = $db->getRow("SELECT * FROM `user` WHERE id = ?s", $_POST['user_id']);
	$current_balance = $balance_row['balance'];
	
	$data = array('user_id' => $_POST['user_id'], 'auto_id' => $auto_id, 'booking_id' => $_POST['booking_id'], 'money' => $_POST['money'], 'msg' => $_POST['msg'], 'date' => $_POST['date']);
	
	if ($type == 'prihod') {
		$db->query("INSERT INTO prihod SET ?u", $data);
		
		#Вычисляем баланс
		$balance = $current_balance + $_POST['money'];
		#Записываем баланс user`у
		$data_balance = array('balance' => $balance);
		$db->query("UPDATE user SET ?u WHERE id = ?s", $data_balance, $_POST['user_id'] );
		
		echo '<script language="JavaScript">
		window.location.href = "/user/booking_page.php?id='. $id .'"
		</script>';
		
	} elseif ($type == 'rashod') {
		$db->query("INSERT INTO rashod SET ?u", $data);
		
		#Вычисляем баланс
		$balance = $current_balance - $_POST['money'];
		#Записываем баланс user`у
		$data_balance = array('balance' => $balance);
		$db->query("UPDATE user SET ?u WHERE id = ?s", $data_balance, $_POST['user_id'] );
		
		echo '<script language="JavaScript">
		window.location.href = "/user/booking_page.php?id='. $id .'"
		</script>';
	} elseif ($type == 'rashod_auto') {
		
		
		$data_auto = array('auto_id' => $_POST['id'], 'money' => $_POST['money'], 'msg' => $_POST['msg'], 'date' => $_POST['date'], 'user_id' => '', 'booking_id' => '' );
		$db->query("INSERT INTO rashod SET ?u", $data_auto);
		
		
		echo '<script language="JavaScript">
		window.location.href = "/user/car_page.php?id='. $_POST['id'] .'"
		</script>';
	}
	
	
?>
