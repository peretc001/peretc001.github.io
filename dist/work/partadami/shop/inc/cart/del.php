<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
 error_reporting(E_ALL & ~E_NOTICE);
// Достаем id
	$id = htmlspecialchars(trim($_GET['id']));
// Достаем sid
	$sid = htmlspecialchars(trim($_GET['session_id']));
// Достаем color
	$color = htmlspecialchars(trim($_GET['color']));
	
	mysql_query("DELETE FROM cart WHERE id = '$id' and sid = '$sid' and color = '$color' ");
	
		echo '<script language="JavaScript">
		window.location.href = "/shop/shoppingcart.php"
		</script>';
?>