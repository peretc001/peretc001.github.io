<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	
	$id 	= htmlspecialchars(trim($_GET['id']));
	
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	$db->query("DELETE FROM `manager` WHERE id = ?s", $id);
		
		
		echo '<script language="JavaScript">
			window.location.href = "/home.php"
		</script>';
	
	
?>
