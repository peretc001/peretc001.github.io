<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/admin/inc/conf.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/admin/inc/safemysql.class.php';

	$art = htmlspecialchars(trim($_GET['art']));				if ($art == '') {$art = '14'; }
	$package = htmlspecialchars(trim($_GET['package'])); 	if ($package == '') {$package = 'parta_0_stul'; } 
	$package_secont = 'parta_1_stul';
	$category = 'parta_bez_risunka';
	
	#Создаем безопасносе соединение
	$db = new SafeMySQL();

	// $data = array('top' => 'parta_1_stul');
	// $db->query("UPDATE parta_1_stul SET ?u", $data );
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/admin/inc/header.php'; ?>
</head>
<body>
	<?php 
		$prod = $db->getAll('SELECT * FROM parta_0_stul GROUP by art');
	?>
	<div class="admin_product_filter">
		<div class="row">
		<?php foreach ($prod as $row) { ?>
		<a <?php if($art == $row['art']) { echo 'class="active"'; } ?>href="/admin/home.php?art=<?php echo $row['art']; ?>"><?php echo $row['art']; ?></a>
		<?php } ?>
		</div>
	</div>
	<?php
		$i = 1;
		$w = array();
		$where = '';
			
			if ($category) 	$w[] = $db->parse('category = ?s', $category);
			if ($art) 			$w[] = $db->parse('art = ?s', $art);
			if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);
			
			$parta = $db->getAll('SELECT * FROM ?n ?p UNION SELECT * FROM ?n ?p ORDER by id asc', $package, $where, $package_secont, $where ); 
	?>
	<br><br>
	<div class="admin_product_page">
		<?php 
			foreach ($parta as $row) {
		?>
			<form action="/admin/inc/edit.php" method="post">
				<input type="hidden" name="id" 		value="<?php echo $row['id']; ?>">
				<input type="hidden" name="package" value="<?php echo $row['top']; ?>">
				<?php if($row['top'] == 'parta_0_stul') { ?>
				<div class="row">
					<div class="tvelwe columns center">
						<b><?php echo $row['model']; ?></b>
					</div>
				</div>
				<?php } ?>
				<div class="row">
					<div class="seven columns name<?php if($row['top'] == 'parta_1_stul') { echo ' grey'; } ?>">
						<?php echo $row['name']; ?>
					</div>
					<div class="two columns">
						<input type="tel" name="price" value="<?php echo $row['price']; ?>">
					</div>
					<div class="two columns">
						<button class="button button-primary">Update</button>
					</div>
				</div>
			</form>
			<?php if($row['top'] == 'parta_1_stul') { echo '<hr>'; } ?>
		<?php } ?>
			
			
	
</body>