<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	
	$row = $db->getRow("SELECT * FROM `user` WHERE id = ?s", $_POST['user_id']);
	
	$data = array('balance' => $_POST['balance']);
	
	$db->query("UPDATE user SET ?u WHERE id = ?s", $data, $_POST['user_id'] );
	
	echo '<script language="JavaScript">
		window.location.href = "/user/user_page.php?id='. $_POST['user_id'] .'"
		</script>';
?>