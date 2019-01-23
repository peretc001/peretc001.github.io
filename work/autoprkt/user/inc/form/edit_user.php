<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
	
	$row = $db->getRow("SELECT * FROM `user` WHERE id = ?s", $_POST['id']);
	
	$data = array('status' => $_POST['status'], 'userfirstname' => $_POST['userfirstname'], 'username' => $_POST['username'], 'userlastname' => $_POST['userlastname'], 'phone' => $_POST['phone'], 'email' => $_POST['email'], 'birthday' => $_POST['birthday'], 'pas_s' => $_POST['pas_s'],  'pas_n' => $_POST['pas_n'], 'pas_who' => $_POST['pas_who'], 'pas_date' => $_POST['pas_date'], 'pas_reg' => $_POST['pas_reg'], 'vy_s' => $_POST['vy_s'], 'vy_n' => $_POST['vy_n'], 'vy_date' => $_POST['vy_date'], 'msg' => $_POST['msg'], 'sex' => $_POST['sex'],  'manager' => $_POST['manager'] );
	
	$db->query("UPDATE user SET ?u WHERE id = ?s", $data, $_POST['id'] );
	
	echo '<script language="JavaScript">
		window.location.href = "/user/user_page.php?id='. $_POST['id'] .'"
		</script>';
?>