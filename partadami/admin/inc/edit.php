<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/admin/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/admin/inc/header.php');
	$id = $_POST['id']; 
	$package = $_POST['package'];
	 
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/admin/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	

	
	

	$data = array('price' => $_POST['price']);
	$db->query('UPDATE ?n SET ?u WHERE id = ?s', $package, $data, $id );

echo '<script language="JavaScript">
		window.location.href = "/admin/home.php"
		</script>';
?>