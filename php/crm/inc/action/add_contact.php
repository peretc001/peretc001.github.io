<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	$id = $_POST['id'];
	$type = $_POST['type'];
	
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	$data = array('company_id' => $_POST['company_id'], 'contact_name' => $_POST['contact_name'], 'contact_job' => $_POST['contact_job'], 'contact_phone' => $_POST['contact_phone']);

	
	$db->query("INSERT INTO `contact` SET ?u", $data);
		
		
		echo '<script language="JavaScript">
			window.location.href = "/company_page.php?id='. $_POST['company_id'] .'"
		</script>';
	
	
?>
