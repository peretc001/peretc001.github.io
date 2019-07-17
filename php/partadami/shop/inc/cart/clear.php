<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
 error_reporting(E_ALL & ~E_NOTICE);
// Достаем id
	$sid = htmlspecialchars(trim($_GET['sid']));
	
	$result = mysql_query("DELETE FROM cart WHERE sid = '$sid' ");
	
	echo '<script language="JavaScript">
		window.location.href = "/shop/"
		</script>';	
?>