<?php  session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

include $_SERVER['DOCUMENT_ROOT'] .'/inc/booking/class.coupon.php';
$coupon = coupon::generate(9, '', '', false, false, false, false, 'XXX-XXX-XXX');

$car = htmlspecialchars(trim($_GET['car'])); # определяем авто
$usr = htmlspecialchars(trim($_GET['usr'])); # определяем переданный phone
$phone = base64_decode($usr); # декодируем переданный phone
$sid = htmlspecialchars(trim($_GET['sid'])); # определяем session_id

#Создаем подключение к БД
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');
	
		#Создаем безопасносе соединение
		$db = new SafeMySQL();
		
		#Проверяем есть ли такой user, достаем его email
		$row = $db->getRow('SELECT * FROM user WHERE phone=?s', $phone);
			$user_email = $row['email'];
			$user_id = $row['id'];
			$user_firstname = $row['userfirstname'];
			$user_name = $row['username'];
			$user_lastname = $row['userlastname'];
		
		#Проверяем есть ли бронирование		
		$row = $db->getRow('SELECT * FROM booking WHERE user_id=?s ORDER BY date desc', $user_id  );
			$car_id = $row['url'];
			$booking_tarif = $row['tarif'];
			$booking_count = $row['count'];
			$booking_date1 = $row['date1'];
			$booking_date2 = $row['date2'];
			$booking_price = $row['price'];
			$booking_total = $row['total'];
			$booking_region = $row['region'];
			$booking_zalog = $row['zalog'];
			
		#Выбор данных по авто
		$select_car = "SELECT * FROM car WHERE url = '$car_id' ";
		$result = mysqli_query($link, $select_car);
		#   Вывод результата через $row
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$car = $row['id'];
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
<div id="reserv_404">
	<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
	<p><b>Благодарим за обращение</b><br>
	Наш менеджер свяжется с вами для уточнения информации.</p>
	<p>Мы отправили вам письмо на почту <?php echo $user_email; ?>, если у вас появится время раньше, чем с вами свяжется наш менеджер, вы сможете самостоятельно заполнить все данные.</p>
	<p>Или просто отправьте через <b>WhatsApp</b> на номер <b>8-928-210-23-35</b>:</p>
	<ul>
		<li>фото паспорта (разворот с фото и прописку)</li>
		<li>фото прав (лицевая и обратная сторона)</li>
	</ul>
	<p><i class="fa fa-code" aria-hidden="true"></i></p> 
	<p><b>Код на скидку</b><br>
	В том же письме вы найдете специальный код на скиду.<br>Все подробности в письме.</p>
</div> 
<?php 


#Отправляем письмо админу
$to  = "info@autoprkt.ru"; 
$subject = 'ЗАПРОС ЗВОНКА'; 
$message = "<p><b>Уточнить данные паспорта и водительского удостоверения.</b></p>
			<p>ФИО: ". $user_firstname ." ". $user_name ." ". $user_lastname ."</p>
			<p>Телефон: ". $phone ."</p>
			<p>Автомобиль: ". $name ."</p>
			<p>Тариф: ". $booking_tarif ."</p>
			<p>Кол-во дней: ". $booking_count ."</p>
			<p>Даты: с ". $booking_date1 ." по ". $booking_date2 ."</p>
			<p>Цена: ". $booking_price ."</p>
			<p>Сумма: ". $booking_total ."</p>
			<p>Регион аренды: ". $booking_region ."</p>
			<p>Депозит: ". $booking_zalog ."</p>
			<p>Код купона: <span style='background-color:#f5f5f5;padding:5px;'> ". $coupon ." </span></p>
			<p>Подробнее по <a href='http://www.autoprkt.ru/user/home.php'>ссылке</a></p>";
				

$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: @autoprkt  <info@autoprkt.ru>\r\n";
	mail($to, $subject, $message, $headers); 


#Отправляем письмо клиенту
$to  = $user_email;
$subject = 'Бронирование '. $name; 
$message = '<p style="font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Благодарим за обращение</b><br>
				<span style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Наш менеджер свяжется с вами для уточнения информации.</p>
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Если у вас появится время раньше, чем с вами свяжется наш менеджер, вы сможете самостоятельно заполнить все данные по <a href="http://autoprkt.ru/inc/booking/step3.php?car='. $car .'&usr='. $usr .'&sid='. $sid .'">ссылке</a> или просто отправьте через WhatsApp на номер 8-928-210-23-35:</p>
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;margin-left:10px;">- фото паспорта (разворот с фото и прописку)</p>
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;margin-left:10px;">- фото прав (лицевая и обратная сторона)</p> 
				
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>- Хотите скидку 10% -</b></p>
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Порядок действий:<br>
				1. Берете авто на прокат<br>
				2. Выкладываете фотку авто в Instagramm с хэш-тегом <span style="background-color:#f5f5f5;padding:5px;"> #autoprkt </span><br>
				3. При сдаче авто получаете <b>скидку 10%</b></p>
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 12pt;">Код купона: <span style="background-color:#f5f5f5;padding:5px;"> '. $coupon .' </span></p>
				<p  style="font-family: Helvetica, Arial, sans-serif; font-size: 9pt; color:#999999;">НО:<br>
				Скидка предоставляется только при первом обращении<br>
				Максимальный размер скидки 1000 руб.</p>
				<br>
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Есть вопросы? Звоните 8-928-210-23-35</p>
				<p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">C уважением, Ваш autoprkt</p>';
					


$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: @autoprkt  <info@autoprkt.ru>\r\n";
	mail($to, $subject, $message, $headers); 

include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>