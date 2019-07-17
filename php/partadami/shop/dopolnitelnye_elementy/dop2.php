<?php session_start();
	include ("../../inc/config.php");
	$url = "dop2";
	$category = "dopolnitelnye_elementy";
	$package = 'dopolnitelnye_elementy';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'dop_pink'; }
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/head.php'; ?>
<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/body_dop.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/accessories_dop.php';  
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; 
	?>
</body>	
