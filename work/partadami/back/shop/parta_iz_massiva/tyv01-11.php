<?php session_start();
	include ("../../inc/config.php");
	$url = "tyv01-11";
	$category = "parta_iz_massiva";
	$package = 'parta_1_stul';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'beige'; }
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/head.php'; ?>
<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/body_dop.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/accessories_dop.php';  
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; 
	?>
</body>	