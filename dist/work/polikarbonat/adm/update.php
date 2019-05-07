<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
	

$category = htmlspecialchars(trim($_GET['category']));
$id = htmlspecialchars(trim($_GET['id'])); 

$title = mysql_query("SELECT * FROM `". $category ."` WHERE id = '". $id ."' ");  
$row = mysql_fetch_assoc($title); 

$result = mysql_query("UPDATE `". $category ."` SET price = '". $_POST['price'] ."', price_color = '". $_POST['price_color'] ."'  WHERE id = '". $id ."' ");

echo '<script language="JavaScript">
		window.location.href = "/adm/index.php?category='. $category .'#'. $id .'"
		</script>';
?>