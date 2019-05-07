<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/admin/inc/conf.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/admin/inc/safemysql.class.php';

	$art = htmlspecialchars(trim($_GET['art']));				if ($art == '') {$art = '14'; }
	$package = htmlspecialchars(trim($_GET['package']));


	if ($art == '14' or $art == '17') {
		$package = 'parta_0_stul';
		$package_secont = 'parta_1_stul';
		$category = 'parta_bez_risunka';
	}
	elseif ($art == '24' or $art == '25') {
		$package = 'parta_0_white';
		$package_secont = 'parta_1_white';
		$category = 'white';
	}
	elseif ($art == '26' or $art == '31') {
		$package = 'parta_0_techno';
		$package_secont = 'parta_1_techno';
		$category = 'techno';
	}
	elseif ($art == 'dop') {
		$package = 'dopolnitelnye_elementy';
		$package_secont = '';
		$category = 'dopolnitelnye_elementy';
	}
	elseif ($art == 'cyt') {
		$package = 'ergonomichnyj_stul';
		$package_secont = '';
		$category = 'ergonomichnyj_stul';
	}
	elseif ($art == 'tyv') {
		$package = 'tumby_i_stellazhi';
		$package_secont = '';
		$category = 'tumby_i_stellazhi';
	}
	elseif ($art == 'tyvr') {
		$package = 'tumby_i_stellazhi_with_picture';
		$package_secont = '';
		$category = 'tumby_i_stellazhi';
	}
	
	#Создаем безопасносе соединение
	$db = new SafeMySQL();

	// $data = array('top' => 'tumby_i_stellazhi_with_picture');
	// $db->query("UPDATE tumby_i_stellazhi_with_picture SET ?u", $data );
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/admin/inc/header.php'; ?>
</head>
<body>
	<div class="admin_product_filter">
		<div class="row">
			<b>Парты:</b>
			<?php 
			$prod = $db->getAll('SELECT * FROM parta_0_stul GROUP by art');
				foreach ($prod as $row) { ?>
			<a <?php if($art == $row['art']) { echo 'class="active"'; } ?>href="/admin/home.php?art=<?php echo $row['art']; ?>"><?php echo $row['art']; ?></a>
			<?php } ?>
			<b>Белые:</b>
			<?php 
			$prod = $db->getAll('SELECT * FROM parta_0_white GROUP by art');
				foreach ($prod as $row) { ?>
			<a <?php if($art == $row['art']) { echo 'class="active"'; } ?>href="/admin/home.php?art=<?php echo $row['art']; ?>"><?php echo $row['art']; ?></a>
			<?php } ?>
			<b>Техно:</b>
			<?php 
			$prod = $db->getAll('SELECT * FROM parta_0_techno GROUP by art');
				foreach ($prod as $row) { ?>
			<a <?php if($art == $row['art']) { echo 'class="active"'; } ?>href="/admin/home.php?art=<?php echo $row['art']; ?>"><?php echo $row['art']; ?></a>
			<?php } ?>
			<b>Допы:</b>
			<?php 
			$prod = $db->getAll('SELECT * FROM dopolnitelnye_elementy GROUP by art');
				foreach ($prod as $row) { ?>
			<a <?php if($art == $row['art']) { echo 'class="active"'; } ?>href="/admin/home.php?art=<?php echo $row['art']; ?>"><?php echo $row['art']; ?></a>
			<?php } ?>
			<b>Стулья:</b>
			<?php 
			$prod = $db->getAll('SELECT * FROM ergonomichnyj_stul GROUP by art');
				foreach ($prod as $row) { ?>
			<a <?php if($art == $row['art']) { echo 'class="active"'; } ?>href="/admin/home.php?art=<?php echo $row['art']; ?>"><?php echo $row['art']; ?></a>
			<?php } ?>
			<b>Тумбы:</b>
			<?php 
			$prod = $db->getAll('SELECT * FROM tumby_i_stellazhi GROUP by art');
				foreach ($prod as $row) { ?>
			<a <?php if($art == $row['art']) { echo 'class="active"'; } ?>href="/admin/home.php?art=<?php echo $row['art']; ?>"><?php echo $row['art']; ?></a>
			<?php } ?>
			<b>Тумбы с рисунком:</b>
			<?php 
			$prod = $db->getAll('SELECT * FROM tumby_i_stellazhi_with_picture GROUP by art');
				foreach ($prod as $row) { ?>
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
			if($art == 'dop' or $art == 'cyt' or $art == 'tyv' or $art == 'tyvr') { 
				$parta = $db->getAll('SELECT * FROM ?n ?p ORDER by id asc', $package, $where ); 
			} else {
				$parta = $db->getAll('SELECT * FROM ?n ?p UNION SELECT * FROM ?n ?p ORDER by id asc', $package, $where, $package_secont, $where ); 
			}
	?>
	<br><br>
	<div class="admin_product_page">
		<?php 
			foreach ($parta as $row) {
		?>
			<form action="/admin/inc/edit.php" method="post">
				<input type="hidden" name="id" 		value="<?php echo $row['id']; ?>">
				<input type="hidden" name="package" value="<?php echo $row['top']; ?>">
				<input type="hidden" name="art" 		value="<?php echo $art; ?>">
				<?php if($row['top'] == 'parta_0_stul' or $row['top'] == 'parta_0_white' or $row['top'] == 'parta_0_techno') { ?>
				<div class="row">
					<div class="tvelwe columns center">
						<b><?php echo $row['model']; ?></b>
					</div>
				</div>
				<?php } ?>
				<div class="row" id="<?php echo $row['id']; ?>">
					<div class="seven columns name<?php if($row['top'] == 'parta_1_stul' or $row['top'] == 'parta_1_white' or $row['top'] == 'parta_1_techno') { echo ' grey'; } ?>">
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
			<?php if($row['top'] == 'parta_1_stul' or $row['top'] == 'parta_1_white' or $row['top'] == 'parta_1_techno') { echo '<hr>'; } ?>
		<?php } ?>
			
			
	
</body>