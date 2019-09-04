<?php session_start();
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
	$url = "41";
	$art = "41";
	$category = "parta_bez_risunka";
	$package = 'parta_0_stul';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'sonoma_turquoise'; }
	
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
