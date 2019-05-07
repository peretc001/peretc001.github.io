<?php  session_start(); 
error_reporting(E_ALL & ~E_NOTICE);
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');
		
$usr = htmlspecialchars(trim($_GET['usr'])); # определяем переданный phone
$phone = base64_decode($usr); # декодируем переданный phone
$sid = htmlspecialchars(trim($_GET['sid'])); # определяем session_id

		#Создаем безопасносе соединение
		$db = new SafeMySQL();
		
$car_id = $_POST['car_id'];
if ($car_id == '') {
	#Достаем бронь
	$row = $db->getRow('SELECT * FROM booking WHERE sid=?s', $sid  );
	$url = $row['url'];

	#Достаем авто
	$row = $db->getRow('SELECT * FROM car WHERE url=?s', $url  );
	$car_id = $row['id'];
}
	#Выбор данных по авто
	$row = $db->getRow('SELECT * FROM car WHERE id=?s', $car_id);
	$name = $row['name'];
	$url = $row['url'];
	$brand = $row['brand'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Бронирование <?php echo $name; ?> | @autoprkt</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>		
<nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> / <a href="/car/">Автомобили</a> / <a href="/car/<?php echo $brand; ?>/<?php echo $url; ?>/"><?php echo $name; ?></a> / Бронирование <?php echo $name; ?></p>
	</div>
	<h1 class="example-header">Бронирование <?php echo $name; ?></h1>	
</nav>


<?php	
	if ($usr == '' && $sid == '') {
	
	#Проверяем заполнены ли поля
	if( $_POST['userfirstname'] != '' && $_POST['userlastname'] != '' ){
		
		$user_data = array('userfirstname' => $_POST['userfirstname'], 'status' => 'checked', 'username' => $_POST['username'], 'userlastname' => $_POST['userlastname'], 'email' => $_POST['email'] );
		#Обновляем данные пользователя	
		$db->query("UPDATE user SET ?u WHERE phone=?s", $user_data,  $_POST['phone']);
		
		#Достаем user_id
		$row = $db->getRow('SELECT * FROM user WHERE phone=?s', $_POST['phone']  );
		$user_id = $row['id'];
		
		#Достаем бронь
		$row = $db->getRow('SELECT * FROM booking WHERE user_id=?s ORDER BY date desc', $user_id  );
?>

<article id="reserv_user">
	<div class="row">
		<div class="five columns">
			<table class="u-full-width">
				<tbody>
					<tr>
						<td>Автомобиль:</td>
						<td><?php echo $row['auto']; ?></td>
					</tr>
					<tr>
						<td>Тариф:</td>
						<td><?php echo $row['tarif']; ?></td>
					</tr>
					<tr>
						<td>Дата аренды:</td>
						<td>с <?php echo $row['date1']; ?> по <?php echo $row['date2']; ?></td>
					</tr>
					<tr>
						<td>Кол-во сут:</td>
						<td><?php echo $row['count']; ?></td>
					</tr>
					<tr>
						<td>Цена в сут:</td>
						<td><?php echo $row['price']; ?> руб.</td>
					</tr>
					<tr>
						<td>К оплате:</td>
						<td><b><?php echo $row['total'];  ?> руб.</b></td>
					</tr>
					<tr>
						<td>Регион аренды:</td>
						<td><?php echo $row['region']; ?></td>
					</tr>
					<tr>
						<td>Залог:</td>
						<td><?php echo $row['zalog']; ?> руб.</td>
					</tr>
				</tbody>
			</table>
		</div>
	
		<link rel="stylesheet" href="/uploads/!uploadjs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/uploads/!uploadjs/css/drop_uploader.css">

    <script src="/uploads/!uploadjs/js/jquery-3.2.1.js"></script>
    <script src="/uploads/!uploadjs/js/drop_uploader.js"></script>

    <script>
        $(document).ready(function(){
            $('input[type=file]').drop_uploader({
                uploader_text: 'Перетяните файл или нажмите',
                browse_text: 'Выбрать',
                only_one_error_text: 'Only one file allowed',
                not_allowed_error_text: 'File type is not allowed',
                big_file_before_error_text: 'Files, bigger than',
                big_file_after_error_text: 'is not allowed',
                allowed_before_error_text: 'Only',
                allowed_after_error_text: 'files allowed',
                browse_css_class: 'button button-primary',
                browse_css_selector: 'file_browse',
                uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                file_icon: '<i class="pe-7s-file"></i>',
                time_show_errors: 5,
                layout: 'thumbnails',
                method: 'normal',
                url: '/uploads/!uploadjs/ajax_upload.php?user_id=<?php echo $user_id; ?>',
                delete_url: '/uploads/!uploadjs/ajax_delete.php?user_id=<?php echo $user_id; ?>',
            });
        });
    </script>

    <div class="seven columns">
        <div class="row">
			<div class="col">
				<p class="text">Осталось только загрузить ваш паспорт и права.</p>
			</div>
			<form method="POST" action="/inc/booking/confirm.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
				<div class="upload">
					<div class="col-x4">
						<p>Фото Паспорта<br>(первый развор)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
					<div class="col-x4">
						<p>Фото Паспорта<br>(прописка)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
					<div class="col-x4">
						<p>Фото ВУ<br>(лицевая сторона)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
					<div class="col-x4">
						<p>Фото ВУ<br>(обратная сторона)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
				</div>
				<div class="col">		
					<div class="policy">
						<p><input class="button button-primary" type="submit" value="Забронировать"> <span class="more">или</span>  <a href="/inc/booking/callback.php?usr=<?php echo base64_encode($_POST['phone']); ?>&sid=<?php echo session_id(); ?>" class="button">заказать звонок</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
 </article>
<?php 
	#Если поля пустые и пришел не из письма отправляем на страницу бронирования
	} else { ?>

		<div id="reserv_404">
			<p><i class="fa fa-hand-paper-o" aria-hidden="true"></i></p>
			<p><b>ОПС...</b><br>что-то пошло не так</p>
			<script language="JavaScript">
				setTimeout(function() {
					window.location.href = "/inc/booking/step1.php?id=<?php echo $car_id; ?>";
				},1500);
			</script>
		</div>
		
	<?php } 
	
	}
	
	#Если пришел из письма или уже есть в базе
	else {
	
		#Достаем бронь
		$row = $db->getRow('SELECT * FROM booking WHERE sid=?s', $sid  );
		$user_id = $row['user_id'];
?>

<article id="reserv_user">
	<div class="row">
		<div class="five columns">
			<table class="u-full-width">
				<tbody>
					<tr>
						<td>Автомобиль:</td>
						<td><?php echo $row['auto']; ?></td>
					</tr>
					<tr>
						<td>Тариф:</td>
						<td><?php echo $row['tarif']; ?></td>
					</tr>
					<tr>
						<td>Дата аренды:</td>
						<td>с <?php echo $row['date1']; ?> по <?php echo $row['date2']; ?></td>
					</tr>
					<tr>
						<td>Кол-во сут:</td>
						<td><?php echo $row['count']; ?></td>
					</tr>
					<tr>
						<td>Цена в сут:</td>
						<td><?php echo $row['price']; ?> руб.</td>
					</tr>
					<tr>
						<td>К оплате:</td>
						<td><b><?php echo $row['total'];  ?> руб.</b></td>
					</tr>
					<tr>
						<td>Регион аренды:</td>
						<td><?php echo $row['region']; ?></td>
					</tr>
					<tr>
						<td>Залог:</td>
						<td><?php echo $row['zalog']; ?> руб.</td>
					</tr>
				</tbody>
			</table>
		</div>
	
	<link rel="stylesheet" href="/uploads/!uploadjs/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="/uploads/!uploadjs/css/drop_uploader.css">

    <script src="/uploads/!uploadjs/js/jquery-3.2.1.js"></script>
    <script src="/uploads/!uploadjs/js/drop_uploader.js"></script>

    <script>
        $(document).ready(function(){
            $('input[type=file]').drop_uploader({
                uploader_text: 'Перетяните файл или нажмите',
                browse_text: 'Выбрать',
                only_one_error_text: 'Only one file allowed',
                not_allowed_error_text: 'File type is not allowed',
                big_file_before_error_text: 'Files, bigger than',
                big_file_after_error_text: 'is not allowed',
                allowed_before_error_text: 'Only',
                allowed_after_error_text: 'files allowed',
                browse_css_class: 'button button-primary',
                browse_css_selector: 'file_browse',
                uploader_icon: '<i class="pe-7s-cloud-upload"></i>',
                file_icon: '<i class="pe-7s-file"></i>',
                time_show_errors: 5,
                layout: 'thumbnails',
                method: 'normal',
                url: '/uploads/!uploadjs/ajax_upload.php?user_id=<?php echo $user_id; ?>',
                delete_url: '/uploads/!uploadjs/ajax_delete.php?user_id=<?php echo $user_id; ?>',
            });
        });
    </script>

    <div class="seven columns">
        <div class="row">
			<div class="col">
				<p class="text">Осталось немного, только загрузить ваш паспорт и права.</p>
			</div>
			<form method="POST" action="/inc/booking/confirm.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
				<div class="upload">
					<div class="col-x4">
						<p>Фото Паспорта<br>(первый развор)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
					<div class="col-x4">
						<p>Фото Паспорта<br>(прописка)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
					<div class="col-x4">
						<p>Фото ВУ<br>(лицевая сторона)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
					<div class="col-x4">
						<p>Фото ВУ<br>(обратная сторона)</p>
						<input type="file" name="file[]" data-method="ajax" multiple data-count="1">
					</div>
				</div>
				<div class="col">		
					<div class="policy">
						<p><input class="button button-primary" type="submit" value="Забронировать"> <span class="more">или</span>  <?php
							#Достаем usera
							$row = $db->getRow('SELECT * FROM user WHERE id=?s', $user_id  );
							$phone = $row['phone'];
						?><a href="/inc/booking/callback.php?usr=<?php echo base64_encode($phone); ?>&sid=<?php echo session_id(); ?>" class="button">заказать звонок</a></p>
					</div>
				</div>
			</form>
		</div>
	</div>
 </article>

 <?php
	}
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>