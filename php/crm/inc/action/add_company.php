<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();

	if($_POST['company_date']) { $company_date = date('Y-m-d', strtotime($_POST['company_date'])); } 
	if($_POST['company_time']) { $company_time = $_POST['company_time']; } 

	$data = array('company_name' => $_POST['company_name'], 'company_code' => $_POST['company_code'], 'company_region' => $_POST['company_region'], 'company_adres' => $_POST['company_adres'], 'company_phone' => $_POST['company_phone'], 'company_email' => $_POST['company_email'], 'company_about' => $_POST['company_about'], 'company_date' => $company_date,  'company_time' => $company_time, 'company_manager' => $_POST['company_manager'] );
	
	$db->query("INSERT INTO `company` SET ?u", $data);

	$inn = $db->getRow('SELECT * FROM `company` WHERE company_name = ?s', $_POST['company_name']);
		
		
		echo '<script language="JavaScript">
			window.location.href = "/company_page.php?id='. $inn['id'] .'"
		</script>';
	
	
?>
