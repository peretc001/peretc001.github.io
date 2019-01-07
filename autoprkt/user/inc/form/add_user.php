<?php session_start();
	$sid = session_id();
	$ip = $_SERVER['REMOTE_ADDR'];
	
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
 
	
	
	$db = new SafeMySQL();
		
	$data = array('status' => $_POST['status'], 'userfirstname' => $_POST['userfirstname'], 'username' => $_POST['username'], 'userlastname' => $_POST['userlastname'], 'phone' => $_POST['phone'], 'email' => $_POST['email'], 'birthday' => $_POST['birthday'], 'birthday_city' => $_POST['birthday_city'], 'pas_s' => $_POST['pas_s'],  'pas_n' => $_POST['pas_n'], 'pas_who' => $_POST['pas_who'], 'pas_date' => $_POST['pas_date'], 'pas_reg' => $_POST['pas_reg'], 'vy_s' => $_POST['vy_s'], 'vy_n' => $_POST['vy_n'], 'vy_date' => $_POST['vy_date'], 'msg' => $_POST['msg'], 'sex' => $_POST['sex'], 'manager' => $_POST['manager'], 'sid' => $sid, 'ip' => $ip );
	$data['date'] = date('Y-m-d');
	
		#Достаем Номер Бронирования
		$user_id = $db->getRow('SELECT id FROM user Order by id desc');
		$user_folder = $user_id['id'] + 1;
		
		#Создаем папку для загрузки документов
		$path = '../../../uploads/'; 	// - путь до создаваемой папки.
		$folder = $user_folder; 		// - имя создаваемой папки.
		$separ = '/';     			// - разделитель.

		if (!is_dir($path. $folder. $separ)) {
			mkdir($path. $folder. $separ, 0755);
		} 
		
	$db->query("INSERT INTO user SET ?u", $data);
	

	# Достаем Номер Бронирования
	$user_id = $db->getRow('SELECT id FROM user Order by id desc');

	echo '<script language="JavaScript">
		window.location.href = "/user/inc/upload.php?id='. $user_id['id'] .'"
		</script>';


?>