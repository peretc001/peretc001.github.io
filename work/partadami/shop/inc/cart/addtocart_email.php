<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/form/safemysql.class.php';
 error_reporting(E_ALL & ~E_NOTICE);
// Достаем sid
	$email = htmlspecialchars(trim($_GET['email']));
	
	
	$ids = mysql_query("SELECT id FROM email ORDER BY id desc LIMIT 1");
	$row = mysql_fetch_assoc($ids);
	
		$id = $row['id'] + 1;
	
	$db = new SafeMySQL();
		#Данные
		$data = array('id' => $id, 'email' => $email, 'status' => 'abandonedcart', 'sid' => session_id() );
		$data['date'] = date('Y-m-d H:i:s');
		$data['date_send'] = date('Y-m-d H:i:s', strtotime("+20 hours", strtotime($data['date']))); 

	$emails = mysql_query("SELECT * FROM email WHERE email = '$email' ");
	$row = mysql_fetch_assoc($emails);
	
	if ($email == $row['email'] ) {} 
	else {
		
		$sids = mysql_query("SELECT * FROM email WHERE sid = '". session_id() ."' ");
		$row = mysql_fetch_assoc($sids);
	
		if ( $row['sid'] == session_id() ) {
			$db->query("UPDATE email SET email=?s WHERE sid=?s", $email, session_id());
			}
		else {
			$db->query("INSERT INTO email SET ?u", $data);
		}
		
	}
	
	$cart = $db->query("UPDATE cart SET email=?s WHERE sid=?s", $email, session_id());	
	

?>
