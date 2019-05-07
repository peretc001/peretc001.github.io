<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	
	$row = $db->getRow("SELECT * FROM `products` WHERE id = ?s", $_POST['id']);
	
	$data = array('price' => $_POST['price']);
	
	if($_POST['all'] == '') {
	
		$db->query("UPDATE products SET ?u WHERE id = ?s", $data, $_POST['id'] );
		echo '<script language="JavaScript">
			window.location.href = "/adm/home.php?select='. $_POST['id'] .'#'. $_POST['id'] .'"
			</script>';
		
	}
	else {
		
		$db->query("UPDATE products SET ?u WHERE category = ?s", $data, $_POST['category'] );
		echo '<script language="JavaScript">
			window.location.href = "/adm/home.php?select_category='. $_POST['category'] .'#'. $_POST['id'] .'"
			</script>';
	
	}
?>