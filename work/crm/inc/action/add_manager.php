<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();

	$data = array('name' => $_POST['name'], 'login' => $_POST['login'], 'password' => $_POST['password'], 'role' => $_POST['role'] );
	
	$db->query("INSERT INTO manager SET ?u", $data);

	$id = $db->getRow('SELECT * FROM manager WHERE login = ?s', $_POST['login']);
		
		
		echo '<script language="JavaScript">
			window.location.href = "/manager.php?id='. $id['id'] .'"
		</script>';
	
	
?>
