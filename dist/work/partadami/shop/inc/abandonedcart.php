<?php session_start();
include ("../inc/config.php"); 
// Достаем email
	$email = htmlspecialchars(trim($_GET['email']));
	
	$query = mysql_query("SELECT * FROM cart WHERE email = '$email' "); 
	$query = mysql_fetch_assoc($query); 
	
	$result = mysql_query("UPDATE `cart` SET sid = '". session_id() ."' WHERE email = '$email' "); 
	
	echo '<script language="JavaScript">window.location.href = "/shop/shoppingcart.php"</script>';	
?>