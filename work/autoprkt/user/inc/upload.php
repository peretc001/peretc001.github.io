<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$id = htmlspecialchars(trim($_GET['id']));  ?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Добавить</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
</head>
<body>
	<div class="booking_page">
		<div class="introHolder">
			<h1>Добавить фото</h1>
		</div>
		<div class="user_add">		
			<form action="/user/inc/form/upload_photo.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<div class="row">
					<div class="three columns">
						<label class="control-label">Фото Паспорта<br>(первый развор)</label>
						<input type="file" name="img1" accept="image/*">
					</div>
					<div class="three columns">
						<label class="control-label">Фото Паспорта<br>(прописка)</label>
						<input type="file" name="img2" accept="image/*">
					</div>
					<div class="three columns">
						<label class="control-label">Фото ВУ<br>(лицевая сторона)</label>
						<input type="file" name="img3" accept="image/*">
					</div>
					<div class="three columns">
						<label class="control-label">Фото ВУ<br>(обратная сторона)</label>
						<input type="file" name="img4" accept="image/*">
					</div>
				</div>
				<div class="row">
					<button value="Добавить" class="button button-all">Добавить</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>