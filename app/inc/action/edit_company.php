<?php session_start();
	#include ($_SERVER['DOCUMENT_ROOT'] .'/inc/conf.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();

	$company_date = date('Y-m-d', strtotime($_POST['company_date']));
	
	$row = $db->getRow("SELECT * FROM company WHERE id = ?s", $_POST['id']);
	
	$data = array('company_name' => $_POST['company_name'], 'company_code' => $_POST['company_code'], 'company_region' => $_POST['company_region'], 'company_adres' => $_POST['company_adres'], 'company_phone' => $_POST['company_phone'], 'company_email' => $_POST['company_email'], 'company_about' => $_POST['company_about'], 'company_date' => $company_date,  'company_time' => $_POST['company_time'], 'company_manager' => $_POST['company_manager'] );
	
	$db->query("UPDATE company SET ?u WHERE id = ?s", $data, $_POST['id'] );
	
	echo '<script language="JavaScript">
		window.location.href = "/company_page.php?id='. $_POST['id'] .'"
		</script>';
?>