<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$booking_id = htmlspecialchars(trim($_GET['booking_id'])); 
	$user_id = htmlspecialchars(trim($_GET['user_id'])); 
	$type = htmlspecialchars(trim($_GET['type'])); 
	
	
	$db = new SafeMySQL();
	
	# Достаем Номер Бронирования
	$row = $db->getRow('SELECT * FROM user WHERE id=?s', $user_id);
	
	if ($type == 'booking') {
		
	echo '<div class="error">
			<p><i class="fa fa-question-circle-o" aria-hidden="true"></i></p>
			<p><b>ВНИМАНИЕ</b><br>Вы уверенны что хотите удалить <b>Аренду N '. $booking_id .'</b><br>у клиента <b>'. $row['userfirstname'] .' '. $row['username'] .'</b></p>
			<p><a href="javascript:history.back();"><b>Нет</b></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/user/inc/form/delete.php?booking_id='. $booking_id .'&user_id='. $user_id .'&type=booking">Да</a></p>
		</div>';
	
	} elseif ($type == 'user') {
		
	echo '<div class="error">
			<p><i class="fa fa-question-circle-o" aria-hidden="true"></i></p>
			<p><b>ВНИМАНИЕ</b><br>Вы уверенны что хотите удалить <b>клиента N '. $user_id .'<br><b>'. $row['userfirstname'] .' '. $row['username'] .'</b></p>
			<p><a href="javascript:history.back();"><b>Нет</b></a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/user/inc/form/delete.php?booking_id='. $booking_id .'&user_id='. $user_id .'&type=user">Да</a></p>
		</div>';
		
	}
?>