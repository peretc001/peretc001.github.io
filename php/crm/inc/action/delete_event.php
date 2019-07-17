<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	
	$id = $_POST['company_id'];
	$event_id = $_POST['event_id'];
	
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	$db->query("DELETE FROM `event` WHERE id = ?s", $event_id);
		
		
		echo '<script language="JavaScript">
			window.location.href = "/company_page.php?id='. $id .'"
		</script>';
	
	
?>
