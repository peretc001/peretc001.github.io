<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
 error_reporting(E_ALL & ~E_NOTICE);

// Достаем id
	$id = htmlspecialchars(trim($_GET['id']));
// Достаем sid
	$sid = htmlspecialchars(trim($_GET['sid']));
// Достаем color
	$color = htmlspecialchars(trim($_GET['color']));
	
	$date = date('Y-m-d H:i:s');

	$sql = mysql_query("SELECT * FROM cart where id='$id' and sid = '$sid' and color = '$color' ");
		while( $row = mysql_fetch_array($sql) )
			{ 
				$price = $row["price"];
				$qty = $row["qty"] + 1;
				$rezult = ($price * $qty);
				$total = $rezult;
				
				$upd = mysql_query("UPDATE cart SET qty = '$qty', total = '$total'  WHERE id = '$id' and sid = '$sid' and color = '$color' ");
			}
	echo '<script language="JavaScript">
		window.location.href = "/shop/shoppingcart.php"
		</script>';
?>