<?php session_start();
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
$id = $_POST['id'];
$color = $_POST['color'];
$total = round($_POST['qty'] * $_POST['price']);
$date = date('Y-m-d H:i:s'); // дата и время
$price = $_POST['price'];
if ($_POST['qty'] <= '0') {} else {
	
	# Если товар уже есть в корзине
	$select = mysql_query("SELECT * FROM cart WHERE product_id = '$id' and sid = '$sid' and color = '$color' and size = '$_POST[size]' "); 
	$query = mysql_fetch_assoc($select); 
		if ($query != null ) {
			$update = mysql_query("UPDATE cart SET qty = '$_POST[qty]', total = '$total', date = '$date' WHERE product_id = '$id' and color = '$color' and size = '$_POST[size]'");
		}
		else {
			$insert = mysql_query("INSERT INTO cart (id, product_id, product_name, money, size, qty, color, url, img, total, sid, date)  VALUES ('', '$id', '$_POST[product_name]', '$price', '$_POST[size]', '$_POST[qty]', '$color', '$_POST[url]', '$_POST[img]', '$total', '$sid', '$date') ");					
		}
}
	$cart = mysql_query("SELECT id FROM cart WHERE sid = '$sid'  "); 
	$query = mysql_fetch_assoc($cart); 
		if ( $query['id'] == '' ) {} 
		else { 
			$res = mysql_query("SELECT count(id) FROM cart WHERE sid = '$sid' ");
			$row = mysql_fetch_row($res);
			$qtys = $row[0]; // всего записей
										
			$res = mysql_query("SELECT SUM(total) FROM cart WHERE sid = '$sid'  "); 
			$row = mysql_fetch_row($res);
			$totals = $row[0]; // всего записей
			
		}
echo '<script language="JavaScript">
		window.location.href = "'. $_POST['url'] .'"
		</script>';
?>
