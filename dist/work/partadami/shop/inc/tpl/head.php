<!DOCTYPE html> 
<html> 
<head> 
	<?php $menuid = mysql_query("SELECT * FROM ". $package ." WHERE url = '$url' "); $row = mysql_fetch_assoc($menuid);	
	$title = $row['name'] .' Модель: '. $row['model'];
	$desc = $row['desc']; ?>
	<title><?php echo $title; ?></title> 
	<meta name="Keywords" content="<?php echo $title; ?>" /> 
	<meta name="Description" content="<?php echo $desc; ?>" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; 
		$enable_otziv = 'yes';
		$enable_gallary = 'yes'; ?>
</head>