<?php session_start();
// include ("../inc/config.php"); 
// // Достаем email
// 	$email = htmlspecialchars(trim($_GET['email']));
	
// 	$query = mysql_query("SELECT * FROM cart WHERE email = '$email' "); 
// 	$query = mysql_fetch_assoc($query); 
	
// 	$result = mysql_query("UPDATE `cart` SET sid = '". session_id() ."' WHERE email = '$email' "); 
	
// 	echo '<script language="JavaScript">window.location.href = "/shop/shoppingcart.php"</script>';	


	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/form/safemysql.class.php';
		
	//$ip = $_SERVER['REMOTE_ADDR'];
	$sid = session_id();

	$db = new SafeMySQL();

	$data = array('email' => $_POST['email']);
	$db->query("UPDATE `cart` SET ?u WHERE sid = ?s", $data, $sid );
	
	$user = $db->getRow("SELECT * FROM `email` WHERE email =  ?s", $_POST['email']);
	
	if ( $user['email']) {
		echo $user['email'];
	} else {
		echo $_POST['email'];
	}
	
	#$response = [
		//'email' => $_POST['email'],
		//'sid' => $sid,
		//'user' => $user['email']
	#];
	#echo json_encode($response);
	
?>