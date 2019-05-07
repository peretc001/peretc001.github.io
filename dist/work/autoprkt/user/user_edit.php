<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php');
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
$id = htmlspecialchars(trim($_GET['id'])); 

	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Редактировать</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
	<?php 
		$row = $db->getRow("SELECT * FROM `user` WHERE id = ?s", $id);
	?>
	<div class="booking_page">
		<div class="introHolder">
			<h1>Клиент N <?php echo $id; ?></h1>
		</div>
		<div class="edit_user">		
			<script src="/user/js/jquery.maskedinput.js" type="text/javascript"></script>
			<script type="text/javascript">
				jQuery(function($){
				   $("#phone").mask("8-999-999-99-99");
				});
			</script>
			<form action="/user/inc/form/edit_user.php" method="post" >
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="row">
					<div class="two columns">
						<label for="status" class="control-label">Статус:</label>
						<select id="status" class="u-full-width form-control" name="status">
							<option value="new" <?php if ($row['status'] == 'new') { echo 'selected';} ?> >Новый</option>
							<option value="checked" <?php if ($row['status'] == 'checked') { echo 'selected';} ?> >Требуется документ</option>
							<option value="confirmed" <?php if ($row['status'] == 'confirmed') { echo 'selected';} ?> >Подтвержден</option>
							<option value="disabled" <?php if ($row['status'] == 'disabled') { echo 'selected';} ?> >Заблокирован</option>
						</select>
					</div>
					<div class="two columns">
						<label for="sex" class="control-label">Пол:</label>
						<select id="sex" class="u-full-width form-control" name="sex">
							<option value="М" <?php if ($row['sex'] == 'М') { echo 'selected';} ?> >Муж</option>
							<option value="Ж" <?php if ($row['sex'] == 'Ж') { echo 'selected';} ?> >Жен</option>
						</select>
					</div>
					<div class="two columns">
						<label for="manager" class="control-label">Менеджер:</label>
						<select id="manager" class="u-full-width form-control" name="manager">
							<option value="Красовский" selected>Красовский</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="four columns">
						<label for="userfirstname" class="control-label">Фамилия:</label>
						<input id="userfirstname" type="text" class="u-full-width form-control" name="userfirstname" value="<?php echo $row['userfirstname']; ?>">				
					</div>
					<div class="four columns">
						<label for="username" class="control-label">Имя:</label>
						<input id="username" type="text" class="u-full-width form-control" name="username" value="<?php echo $row['username']; ?>">				
					</div>
					<div class="four columns">
						<label for="userlastname" class="control-label">Отчество:</label>
						<input id="userlastname" type="text" class="u-full-width form-control" name="userlastname" value="<?php echo $row['userlastname']; ?>">				
					</div>
				</div>
				<div class="row">
					<div class="four columns">
						<label for="phone" class="control-label">Телефон:</label>
						<input id="phone" type="tel" class="u-full-width form-control" name="phone" value="<?php echo $row['phone']; ?>">				
					</div>
					<div class="four columns">
						<label for="email" class="control-label">E-mail:</label>
						<input id="email" type="email" class="u-full-width form-control" name="email" value="<?php echo $row['email']; ?>">
					</div>
					<div class="four columns">
						<label for="birthday" class="control-label">Дата рождения:</label>
						<input id="birthday" type="date" class="u-full-width form-control" name="birthday" value="<?php echo $row['birthday']; ?>">				
					</div>
				</div>
			</div>
			<div class="edit_user grey">	
				<div class="introHolder grey">
					<h3>Паспорт</h3>
				</div>
				<div class="row grey">
					<div class="two columns">
						<label for="pas_s" class="control-label">Серия:</label>
						<input id="pas_s" type="text" class="u-full-width  form-control" name="pas_s" value="<?php echo $row['pas_s']; ?>">				
					</div>
					<div class="two columns">
						<label for="pas_n" class="control-label">Номер:</label>
						<input id="pas_n" type="text" class="u-full-width  form-control" name="pas_n" value="<?php echo $row['pas_n']; ?>">				
					</div>
					<div class="six columns">
						<label for="pas_who" class="control-label">Выдан:</label>
						<input id="pas_who" type="text" class="u-full-width form-control" name="pas_who" value="<?php echo $row['pas_who']; ?>">				
					</div>
					<div class="two columns">
						<label for="pas_date" class="control-label">Дата:</label>
						<input id="pas_date" type="date" class="u-full-width form-control" name="pas_date" value="<?php echo $row['pas_date']; ?>">				
					</div>
				</div>
				<div class="row grey">
					<div class="six columns">
						<label for="pas_reg" class="control-label">Зарегистрирован:</label>
						<input id="pas_reg" type="text" class="u-full-width form-control" name="pas_reg" value="<?php echo $row['pas_reg']; ?>">				
					</div>
					<div class="two columns">
						<label for="vy_s" class="control-label">ВУ серия:</label>
						<input id="vy_s" type="text" class="u-full-width form-control" name="vy_s" value="<?php echo $row['vy_s']; ?>">				
					</div>
					<div class="two columns">
						<label for="vy_n" class="control-label">ВУ номер:</label>
						<input id="vy_n" type="text" class="u-full-width form-control" name="vy_n" value="<?php echo $row['vy_n']; ?>">				
					</div>
					<div class="two columns">
						<label for="vy_date" class="control-label">ВУ дата:</label>
						<input id="vy_date" type="date" class="u-full-width form-control" name="vy_date" value="<?php echo $row['vy_date']; ?>">				
					</div>
				</div>
			</div>
			<div class="edit_user">
				<div class="row">
					<div class="twelve columns">
						<label for="msg" class="control-label">Комментарий:</label>
						<textarea id="msg" name="msg" class="u-full-width form-control"/><?php echo $row['msg']; ?></textarea>
					</div>
				</div>
				<div class="row">
					<input name="button" type="submit" value="ОБНОВИТЬ" class="button button-all"> <a class="del" href="/user/inc/form/del.php?user_id=<?php echo $id; ?>&type=user"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</a>
				</div>
			</form>
		</div>

</body>
</html>