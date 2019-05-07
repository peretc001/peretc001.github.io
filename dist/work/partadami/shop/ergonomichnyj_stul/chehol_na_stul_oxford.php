<?php session_start();
	include ("../../inc/config.php");
	$url = "cyt03";
	$category = "ergonomichnyj_stul";
	$package = 'ergonomichnyj_stul';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'cyt_grey'; }
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/head.php'; ?>
<body>
	<?php 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/body_dop.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/accessories.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; 
	?>
</body>