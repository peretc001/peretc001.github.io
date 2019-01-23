<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	$id = htmlspecialchars(trim($_GET['id'])); 
	$type = htmlspecialchars(trim($_GET['type']));  
	 
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	#Вычисляем сумму аренды
	

	if($type == 'gen') {
	
		$data = array('general' => 'yes');
		$db->query("UPDATE booking SET ?u WHERE id = ?i", $data, $id );

	}
	if($type == 'ungen') {
	
		$data = array('general' => '');
		$db->query("UPDATE booking SET ?u WHERE id = ?i", $data, $id );

	}

echo '<script language="JavaScript">
		window.location.href = "/user/booking_page.php?id='. $id .'"
		</script>';
?>