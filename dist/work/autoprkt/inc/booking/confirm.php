<?php  session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

include $_SERVER['DOCUMENT_ROOT'] .'/inc/booking/class.coupon.php';
$coupon = coupon::generate(9, '', '', false, false, false, false, 'XXX-XXX-XXX');


$id = htmlspecialchars(trim($_GET['id'])); # определяем бронь

#Создаем подключение к БД
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');
	
		#Создаем безопасносе соединение
		$db = new SafeMySQL();
		
		$row = $db->getRow('SELECT * FROM booking WHERE id=?s', $id  );
		$user_id = $row['user_id'];
		
		$months = array( 1 => 'января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря' );
		$per_date = date('d ' . $months[date( 'n' )] . ' Y', strtotime($row['date']));
			
		#Отправляем письмо админу
		$to  = "info@autoprkt.ru"; 
		$subject = 'Бронь № '. $row['id']; 
		$message = '<p><b>Бронь N '. $row['id'] .'</b> от '. $per_date .'</p>	
			<p>Авто: '. $row['auto'] .'</p>
			<p>Тариф: '. $row['tarif'] .'</p>
			<p>Дата аренды: с '. $row['date1'] .' по '. $row['date2'] .'</p>
			<p>Кол-во сут: '. $row['count'] .'</p>
			<p>Цена в сут: '. $row['price'] .' руб.</p>
			<p><b>К оплате: '. $row['total'] .' руб.</b></p>
			<p>Регион аренды: '. $row['region'] .'</p>
			<p>Залог: '. $row['zalog'] .' руб.</p><br>';
			
		$row = $db->getRow('SELECT * FROM user WHERE id=?s', $user_id  );
		$email = $row['email'];
			
		$message .= '<p>ФИО: '. $row['userfirstname'] .' '. $row['username'] .' '. $row['userlastname'] .'</p>
			<p>Телефон: '. $row['phone'] .'</p>
			<p>Подробнее по <a href="http://www.autoprkt.ru/user/home.php?status=new">ссылке</a></p>
			<p>Код купона: <span style="background-color:#f5f5f5;padding:5px;"> '. $coupon .' </span></p>';				

		$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: @autoprkt  <info@autoprkt.ru>\r\n";
			mail($to, $subject, $message, $headers);
			
		
		//--------------- //
		#Отправляем письмо клиенту
		$row = $db->getRow('SELECT * FROM booking WHERE id=?s', $id  );
			
		#Отправляем письмо админу
		$to  = $email; 
		$subject = 'Новое бронирование'; 
		$message = '<p align="center"><b>Бронь N '. $row['id'] .'</b> от '. $per_date .'</p>	
			<p>Авто: '. $row['auto'] .'</p>
			<p>Тариф: '. $row['tarif'] .'</p>
			<p>Дата аренды: с '. $row['date1'] .' по '. $row['date2'] .'</p>
			<p>Кол-во сут: '. $row['count'] .'</p>
			<p>Цена в сут: '. $row['price'] .' руб.</p>
			<p><b>К оплате: '. $row['total'] .' руб.</b></p>
			<p>Регион аренды: '. $row['region'] .'</p>
			<p>Залог: '. $row['zalog'] .' руб.</p><br>
			<br>
			<p>В ближайшее время наш менеджер свяжется с вами для уточнения информации.</p>
			<br>
			<p align="center"><b>- Хотите скидку 10% -</b></p>
			<p>Порядок действий:<br>
				1. Берете авто на прокат<br>
				2. Выкладываете фотку авто в Instagramm с хэш-тегом <span style="background-color:#f5f5f5;padding:5px;"> #autoprkt </span><br>
				3. При сдаче авто получаете <b>скидку 10%</b></p>
			<p>Код купона: <span style="background-color:#f5f5f5;padding:5px;"> '. $coupon .' </span></p>
			<p  style="color:#999999;">НО:<br>
				Скидка предоставляется только при первом обращении<br>
				Максимальный размер скидки 500 руб.</p>
			<br>
			<p>Есть вопросы? Звоните 8-928-210-23-35</p>
			<p>C уважением, Ваш <a href="http://autoprkt.ru">autoprkt</a></p>';
			
		$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: @autoprkt  <info@autoprkt.ru>\r\n";
			mail($to, $subject, $message, $headers);
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
<article id="reserv_confirm">
	<div class="row">		
		<div class="twelve columns confirm">
				<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
				<p><b>Автомобиль забронирован</b><br>
				В ближайшее время наш менеджер свяжется с вами для уточнения информации.</p>
		</div>
	</div>
	<div class="zakaz">
		<div class="introHolder">
			<h1>Бронь N <?php echo $row['id']; ?></h1>
			<p>от <?php echo $per_date; ?></p>	
		</div>
		<div class="row">
			<div class="one-half columns booking">
				<div class="row">
					<div class="six columns left">Авто:</div>
					<div class="six columns"><?php echo $row['auto']; ?></div>
				</div>
				<div class="row">
					<div class="six columns left">Тариф:</div>
					<div class="six columns"><?php echo $row['tarif']; ?></div>
				</div>
				<div class="row">
					<div class="six columns left">Дата аренды:</div>
					<div class="six columns">с <?php echo $row['date1']; ?> по <?php echo $row['date2']; ?></div>
				</div>
				<div class="row">
					<div class="six columns left">Кол-во сут:</div>
					<div class="six columns"><?php echo $row['count']; ?></div>
				</div>
				<div class="row">
					<div class="six columns left">Цена в сут:</div>
					<div class="six columns"><?php echo $row['price']; ?> руб.</div>
				</div>
				<div class="row">
					<div class="six columns left">К оплате:</div>
					<div class="six columns"><b><?php echo $row['total'];  ?> руб.</b></div>
				</div>
				<div class="row">
					<div class="six columns left">Регион аренды:</div>
					<div class="six columns"><?php echo $row['region']; ?></div>
				</div>
				<div class="row">
					<div class="six columns left">Залог:</div>
					<div class="six columns"><?php echo $row['zalog']; ?> руб.</div>
				</div>
			</div>
		</div>
	</div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>