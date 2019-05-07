<?php session_start();
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
error_reporting(E_ALL & ~E_NOTICE);

$id = htmlspecialchars(trim($_GET['id']));
$type = htmlspecialchars(trim($_GET['type']));


	if ($type == 'clear') {
		$result = mysql_query("DELETE FROM cart WHERE sid = '$sid' ");
		echo '<script language="JavaScript">window.location.href = "/catalog/"</script>';	
	}
	elseif ($type == 'delit') {
		$result = mysql_query("DELETE FROM cart WHERE id = '$id' ");
		echo '<script language="JavaScript">window.location.href = "/catalog/cart.php"</script>';	
	}
	
	elseif ($type == 'minus') {
		$sql = mysql_query("SELECT * FROM cart WHERE id = '$id' ");
		while( $row = mysql_fetch_array($sql) )
			{ 
				$price[id] = $row["price"];
				$qty[id] = $row["qty"] - 1;
				$rezult[id] = ($price[id] * $qty[id]);
				$total = $total[id] + $rezult[id];
				
				$result = mysql_query("UPDATE cart SET qty = qty - 1, total = '$total'  WHERE id = '$id' ");
			}
		echo '<script language="JavaScript">window.location.href = "/catalog/cart.php"</script>';	
	}
	
	elseif ($type == 'plus') {
		$sql = mysql_query("SELECT * FROM cart WHERE id = '$id' ");
		while( $row = mysql_fetch_array($sql) )
			{ 
				$price[id] = $row["price"];
				$qty[id] = $row["qty"] + 1;
				$rezult[id] = ($price[id] * $qty[id]);
				$total = $total[id] + $rezult[id];
				
				$result = mysql_query("UPDATE cart SET qty = qty + 1, total = '$total'  WHERE id = '$id' ");
			}
		echo '<script language="JavaScript">window.location.href = "/catalog/cart.php"</script>';	
	}
	
	
	
	
?>