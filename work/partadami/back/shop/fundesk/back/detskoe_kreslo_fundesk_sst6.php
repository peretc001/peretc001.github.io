<?php session_start();
	include ("../../inc/config.php");
	$url = "sst6";
	$category = "fundesk";
	$package = 'fundesk';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'fundesk_pink'; }
	$menuid = mysql_query("SELECT * FROM ". $package ." WHERE url = '$url' "); $row = mysql_fetch_assoc($menuid);		
	$title = $row['name'] .' Модель: '. $row['model'];
	$desc = $row['desc'];

	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/head.php'; ?>
<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/body.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/spec.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/accessories.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/product_otziv.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; 
	?>
</body>