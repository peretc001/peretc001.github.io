<?php session_start();
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
	$url = "14-01r-d";
	$category = "parta_s_risunkom";
	$package = 'parta_1_stul';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '' or $color == 'grey') {$color = 'greyf'; }
	
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