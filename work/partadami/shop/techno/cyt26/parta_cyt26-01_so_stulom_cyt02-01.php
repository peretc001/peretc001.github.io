<?php session_start();
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
	$url = "26-01";
	$art = "26";
	$category = "techno";
	$package = 'parta_1_techno';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'white_blue'; }
	
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/head.php'; ?>
<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/body.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/spec.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/accessories_white.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/product_otziv.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; 
	?>
</body>