<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$booking_id = htmlspecialchars(trim($_GET['booking_id'])); 
	$user_id = htmlspecialchars(trim($_GET['user_id'])); 
	$type = htmlspecialchars(trim($_GET['type'])); 
	
	$db = new SafeMySQL();
	
	# Достаем баланс Клиента
	$row = $db->getRow('SELECT * FROM user WHERE id=?s', $user_id);
	$balance = $row['balance'];
	
	if ($type == 'booking') {
		# Достаем сумму Аренды
		$row = $db->getRow('SELECT * FROM booking WHERE id=?s', $booking_id);
		$booking_balance = $row['total'];
		
		$total = $balance + $booking_balance;
		$data = array('balance' => $total);
	
		# Удаляем аренды
		$delete = $db->query('DELETE FROM booking WHERE id=?s', $booking_id);
		# Обновляем баланс
		$update = $db->query("UPDATE user SET ?u WHERE id = ?i", $data, $user_id );
		# Удаляем платежи
		$delete = $db->query('DELETE FROM prihod WHERE booking_id=?s', $booking_id);
		$delete = $db->query('DELETE FROM rashod WHERE booking_id=?s', $booking_id);
		
		echo '<script language="JavaScript">
		window.location.href = "/user/user_page.php?id='. $user_id .'"
		</script>';
		
		
	} elseif ($type == 'user') {
		# Удаляем аренды
		$delete = $db->query('DELETE FROM booking WHERE user_id=?s', $user_id);
		# Удаляем клиента
		$delete = $db->query('DELETE FROM user WHERE id=?s', $user_id);
		# Удаляем платежи
		$delete = $db->query('DELETE FROM prihod WHERE user_id=?s', $user_id);
		$delete = $db->query('DELETE FROM rashod WHERE user_id=?s', $user_id);
		
		echo '<script language="JavaScript">
		window.location.href = "/user/user.php"
		</script>';
	}
	
	
?>