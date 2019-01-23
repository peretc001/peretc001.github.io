<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	$id = $_POST['id']; 
	 
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	#Вычисляем период аренды
	$d = new DateTime($_POST['date2']); 
	$count = $d->diff( new DateTime($_POST['date1']) )->format("%d");

	#Вычисляем сумму аренды
	

	if($_POST['total'] == '') { $total = $_POST['price']*$count;  } else { $total = $_POST['total']; }
	
	$data = array('date' => $_POST['date'], 'auto' => $_POST['auto'], 'count' => $count, 'date1' => $_POST['date1'], 'date2' => $_POST['date2'], 'price' => $_POST['price'], 'total' => $total, 'msg' => $_POST['msg']);
	$db->query("UPDATE booking SET ?u WHERE id = ?i", $data, $id );

echo '<script language="JavaScript">
		window.location.href = "/user/booking_page.php?id='. $id .'"
		</script>';
?>