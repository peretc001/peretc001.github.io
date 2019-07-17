<?php session_start();
	include ("../../inc/config.php");
	$url = "cmd03-01";
	$category = "tumby_i_stellazhi";
	$package = 'tumby_i_stellazhi';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'tyv_grey'; }
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