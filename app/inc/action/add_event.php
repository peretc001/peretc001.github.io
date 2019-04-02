<?php session_start();
	#include ($_SERVER['DOCUMENT_ROOT'] .'/inc/conf.php');
	$id = $_POST['id'];
	$type = $_POST['type'];
	
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	$event_date = date('Y-m-d', strtotime($_POST['event_date']));

	$data = array('company_id' => $_POST['company_id'], 'event_date' => $event_date, 'event_msg' => $_POST['event_msg']);

	
	$db->query("INSERT INTO event SET ?u", $data);
		
		
		echo '<script language="JavaScript">
			window.location.href = "/company_page.php?id='. $_POST['company_id'] .'"
		</script>';
	
	
?>
