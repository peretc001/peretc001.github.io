<?php session_start();
	include ("../../inc/config.php");
	$url = "17-14";
	$category = "parta_iz_massiva";
	$package = 'parta_1_stul';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'beige'; }
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