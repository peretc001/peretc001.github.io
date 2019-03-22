<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
 error_reporting(E_ALL & ~E_NOTICE);

// Достаем id
	$id = htmlspecialchars(trim($_GET['id']));
// Достаем sid
	$sid = htmlspecialchars(trim($_GET['session_id']));
// Достаем color
	$color = htmlspecialchars(trim($_GET['color']));
	
	$date = date('Y-m-d H:i:s');

	$sql = mysql_query("SELECT * FROM cart where id='$id' and sid = '$sid' and color = '$color' ");
		while( $row = mysql_fetch_array($sql) )
			{ 
				$price = $row["price"];
				$qty = $row["qty"] + 1;
				$rezult = ($price * $qty);
				$total = $total + $rezult;
				
				$result = mysql_query("UPDATE cart SET qty = qty + 1, total = '$total'  WHERE id = '$id' and sid = '$sid' and color = '$color' ");
			}
	echo '<script language="JavaScript">
		window.location.href = "/shop/shoppingcart.php"
		</script>';
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<meta name="robots" content="noindex" />
	<title>Магазин детской мебели "ДЭМИ" в Краснодаре</title> 
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<style type="text/css">
		BODY {
		margin:0 auto;
		padding:100px 0 0 0;
		width:1000px;
		font-family:PT Sans Narrow; 
		font-size:10pt; 
		color:#353132;
	}
	</style>
</head> 
<BODY>
<h2>Секундочку...</h2>