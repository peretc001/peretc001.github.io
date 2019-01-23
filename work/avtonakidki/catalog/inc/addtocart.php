<?php session_start();
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$id = $_POST['id'];
	$date = date('Y-m-d H:i:s'); // дата и время
	$sid = session_id();
	
	$db = new SafeMySQL();
	
	$product_date = $db->getRow('SELECT * FROM products WHERE id = ?s', $id);
	
	
		$data = array('product_id' => $id, 'product_name' => $product_date['name'] .' '. $product_date['color'], 'category' => $product_date['category'], 'price' => $_POST['price'], 'qty' => '1','total' => $_POST['price'], 'size' => $_POST['size'], 'color' => $product_date['color'], 'url' => $_POST['url'], 'img' => $product_date['img'], 'date' => $date, 'sid' => $sid );
		
		# Если товар уже есть в корзине
		$select = $db->getRow('SELECT * FROM cart WHERE product_id = ?s and color = ?s and size = ?s and sid = ?s ', $id, $product_date['color'], $_POST['size'], $sid);
			
			if ($select) { }
			else {
				$db->query("INSERT INTO cart SET ?u", $data);
			}				
		
	echo '<script language="JavaScript">
			window.location.href = "'. $_POST['url'] .'"
			</script>';
?>
