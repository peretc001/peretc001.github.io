<?php session_start(); 
$sid = session_id();
include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php');
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	$user_id = htmlspecialchars(trim($_GET['user_id'])); 

	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Добавить</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
	<div class="add_booking">
		<div class="introHolder">
			<h1>Добавить аренду</h1>
		</div>
		
		<div class="row">
				<script src="/user/js/jquery.maskedinput.js" type="text/javascript"></script>
				<script type="text/javascript">
					jQuery(function($){
					   $("#sim_number").mask("8-999-999-99-99");
					   $("#user_number").mask("8-999-999-99-99");
					});
				</script>
				<form action="/user/inc/form/add_booking.php" method="post" >
				<input type="hidden" name="sid" value="<?php echo $sid; ?>">
				<div class="row">
					<div class="four columns">
						<label for="auto" class="control-label">Авто:</label>
						<select id="auto" class="u-full-width form-control" name="auto">
						<?php $car = $db->getAll('SELECT * FROM car WHERE id = "2"'); 
								foreach ($car as $row) {   ?>
							<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="four columns">
						<label for="date" class="control-label">ДАТА:</label>
						<input id="date" type="date" class="u-full-width form-control" name="date" value="<?php echo date('Y-m-d'); ?>">				
					</div>
					<div class="four columns">
						<label for="user_id" class="control-label">Клиент:</label>
						<select id="user_id" class="u-full-width form-control" name="user_id">
						<?php $user = $db->getAll('SELECT * FROM user ORDER by id desc'); 
								foreach ($user as $row) {   ?>
							<option value="<?php echo $row['id']; ?>" <?php if ($user_id == $row['id']) { echo 'selected'; } ?> ><?php echo $row['userfirstname']; ?> <?php echo $row['username']; ?></option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="four columns">
						<label for="date1" class="control-label">ДАТА Аренды:</label>
						<input id="date1" type="date" class="u-full-width form-control" name="date1" value="<?php echo date('Y-m-d'); ?>">				
					</div>
					<div class="four columns">
						<label for="date2" class="control-label">ДАТА Сдачи:</label>
						<input id="date2" type="date" class="u-full-width form-control" name="date2" value="<?php echo date('Y-m-d'); ?>">				
					</div>
					<div class="four columns">
						<label for="price" class="control-label">Прайс:</label>
						<?php $car = $db->getRow('SELECT * FROM car WHERE id = "2"'); ?>
						<input id="price" type="tel" class="u-full-width form-control" name="price" value="<?php echo $car['price']; ?>">				
					</div>
				</div>
				<div class="row">
					<div class="twelve columns">
						<label for="msg" class="control-label">Комментарий:</label>
						<textarea id="msg" name="msg" class="u-full-width form-control"/></textarea>
					</div>
				</div>
				<div class="row">
					<input name="button" type="submit" value="Добавить" class="button button-all">
				</div>
		</div>
	</div>