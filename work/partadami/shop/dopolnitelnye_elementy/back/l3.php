<?php session_start();
	include ("../../inc/config.php");
	$url = "l3";
	$category = "dopolnitelnye_elementy";
	$package = 'dopolnitelnye_elementy';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'white'; }
	$menuid = mysql_query("SELECT * FROM ". $package ." WHERE url = '$url' "); $row = mysql_fetch_assoc($menuid);		
	$title = $row['name'] .' Модель: '. $row['model'];
	$desc = $row['desc'];

	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/head.php'; ?>
<body>
<?php 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/body_dop.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/spec_dop.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/accessories_dop.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php';
?>
</body>