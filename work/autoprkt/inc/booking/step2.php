<?php  session_start(); 
error_reporting(E_ALL & ~E_NOTICE);
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

$car_id = $_POST['car_id'];
$url = $_POST['url'];

$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');

	#Создаем безопасносе соединение
	$db = new SafeMySQL();
		
	#Определяем залог
	$row = $db->getRow('SELECT * FROM car WHERE id=?s', $_POST['car_id']);
	$zalog = $row['zalog'];
	
		if ($_POST['region'] == '') { $_POST['region'] = 'Краснодарский край и Адыгея'; }
		if ($_POST['zalog'] == '') { $_POST['zalog'] = $zalog; }

	#Если выбрали только один день
	if($_POST['date1'] == $_POST['date2']) { $_POST['count'] = '1'; $_POST['total'] = $_POST['price']; }

	


#Проверяем заполнены ли поля
if( $_POST['date1'] != '' && $_POST['phone'] != '' && $_POST['username'] != '' ){
		
				
		#Если ip пустой присваиваем ip
		if ($_POST['ip'] == '') { $_POST['ip'] = $_SERVER["REMOTE_ADDR"]; }
		
		#Проверяем пользователя
		$row = $db->getRow('SELECT * FROM user WHERE phone=?s', $_POST['phone']);
		$user_id = $row['id'];
		$status = $row['status'];
		
		#Собираем данные пользователя
		$user_data = array('status' => 'new', 'username' => $_POST['username'], 'phone' => $_POST['phone'], 'sid' => session_id(), 'ip' => $_POST['ip'],  );
		$user_data['date'] = date('Y-m-d H:i:s');
		#Собираем данные о бронировании
		$booking_data = array('user_id' => $user_id, 'auto' => $_POST['auto'], 'url' => $_POST['url'], 'tarif' => $_POST['tarif'], 'count' => $_POST['count'], 'date1' => $_POST['date1'], 'date2' => $_POST['date2'],  'price' => $_POST['price'], 'total' => $_POST['total'], 'region' => $_POST['region'], 'zalog' => $_POST['zalog'], 'sid' => session_id()  );
		$booking_data['date'] = date('Y-m-d H:i:s');	
		
		#Если уже клиент
		if ($status == 'confirmed') { 
				
			#Проверяем не было ли данным пользователем добавлено бронирование в этой же сессии
			$row = $db->getRow('SELECT * FROM booking WHERE user_id=?s and sid=?s', $user_id, session_id()  );
			#Если сессия совпадает (те повторное бронирование) 
			if ($row) {
				$db->query("DELETE FROM booking WHERE sid=?s", $row['sid']);
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}
			else { 
				#Записываем в базу Бронь
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}
		
			#Достаем бронь
			$row = $db->getRow('SELECT * FROM booking WHERE user_id=?s and sid=?s', $user_id, session_id()  );
			if ($row) {
				#Перенаправляем на страницу Оформленного заказа
				echo '<script language="JavaScript">window.location.href = "/inc/booking/confirm.php?id='. $row['id'] .'";</script>';
			} 
		
		}
		
		#Если нет паспортных данных
		elseif ($status == 'checked' ) { 
			#Проверяем не было ли данным пользователем добавлено бронирование в этой же сессии
			$row = $db->getRow('SELECT * FROM booking WHERE user_id=?s and sid=?s', $user_id, session_id()  );
			#Если сессия совпадает (те повторное бронирование) 
			if ($row) {
				$db->query("DELETE FROM booking WHERE sid=?s", $row['sid']);
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}
			else { 
				#Записываем в базу Бронь
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}
			
			#Достаем usera
			$row = $db->getRow('SELECT * FROM user WHERE phone=?s', $_POST['phone']  );
			if ($row) {
				#Перенаправляем на страницу Оформленного заказа
				echo '<script language="JavaScript">window.location.href = "/inc/booking/step3.php?usr='. base64_encode($_POST['phone']) .'&sid='. $row['sid'] .'"</script>';
			}
		
		} 
		
		#Если новый user и нет ФИО 
		elseif ($status == 'new' ) { 
			
			#Проверяем не было ли данным пользователем добавлено бронирование в этой же сессии
			$row = $db->getRow('SELECT * FROM booking WHERE user_id=?s and sid=?s', $user_id, session_id()  );
			#Если сессия совпадает (те повторное бронирование) 
			if ($row) {
				$db->query("DELETE FROM booking WHERE sid=?s", $row['sid']);
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}
			else { 
				#Записываем в базу Бронь
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}		
		} 
		#Если user залокирован 
		elseif ($status == 'disabled' ) {  }
		#Если нет такого usera
		else {
					
			#Записываем usera в БД
			$db->query("INSERT INTO user SET ?u", $user_data );
			
			#Достаем usera
			$row = $db->getRow('SELECT * FROM user WHERE phone=?s', $_POST['phone']  );
			$user_id = $row['id'];
			
			#Собираем данные о бронировании
			$booking_data = array('user_id' => $user_id, 'auto' => $_POST['auto'], 'url' => $_POST['url'], 'tarif' => $_POST['tarif'], 'count' => $_POST['count'], 'date1' => $_POST['date1'], 'date2' => $_POST['date2'],  'price' => $_POST['price'], 'total' => $_POST['total'], 'region' => $_POST['region'], 'zalog' => $_POST['zalog'], 'sid' => session_id()  );
			$booking_data['date'] = date('Y-m-d H:i:s');	
			
			#Проверяем не было ли данным пользователем добавлено бронирование в этой же сессии
			$row = $db->getRow('SELECT * FROM booking WHERE sid=?s', session_id()  );
			#Если сессия совпадает (те повторное бронирование) 
			if ($row) {
				$db->query("DELETE FROM booking WHERE sid=?s", $row['sid']);
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}
			else { 
				#Записываем в базу Бронь
				$db->query("INSERT INTO booking SET ?u", $booking_data );
			}
			
				
			#Отправляем письмо админу
			$to  = "info@autoprkt.ru"; 
			$subject = 'Новое бронирование'; 
			$message = "
				<p>ФИО: ". $_POST['username'] ."</p>
				<p>Телефон: ". $_POST['phone'] ."</p>
				<p>Автомобиль: ". $_POST['auto'] ."</p>
				<p>Тариф: ". $_POST['tarif'] ."</p>
				<p>Кол-во дней: ". $_POST['count'] ."</p>
				<p>Даты: с ". $_POST['date1'] ." по ". $_POST['date2'] ."</p>
				<p>Цена: ". $_POST['price'] ."</p>
				<p>Сумма: ". $_POST['total'] ."</p>
				<p>Регион аренды: ". $_POST['region'] ."</p>
				<p>Депозит: ". $_POST['zalog'] ."</p>
				<p>Подробнее по <a href='http://www.autoprkt.ru/user/home.php'>ссылке</a></p>";
				
			$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
			$headers .= "From: @autoprkt  <info@autoprkt.ru>\r\n";
				mail($to, $subject, $message, $headers);
				
			$row = $db->getRow('SELECT * FROM user WHERE phone=?s', $_POST['phone']);
			$user_id = $row['id'];
		
			
			//Создаем папку для загрузки документов
			$path = '../../uploads/'; 	// - путь до создаваемой папки.
			$folder = $user_id; 		// - имя создаваемой папки.
			$separ = '/';     			// - разделитель.

			if (!is_dir($path. $folder. $separ)) {
				mkdir($path. $folder. $separ, 0755);
			} 
		
		}
				
		#Выбор данных по авто
		$row = $db->getRow('SELECT * FROM car WHERE id = ?s', $car_id );
		$name = $row['name'];
		$brand = $row['brand'];
		$date1 = $row['date1'];
		$date2 = $row['date2'];
		
		

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
<?php 
	#Если user залокирован 
	if ($status == 'disabled' ) { ?>
		
		<div id="reserv_404">
			<p><i class="fa fa-hand-paper-o" aria-hidden="true"></i></p>
			<p><b>В бронировании отказано</b><br>
			<p>За вами числится задолженность</p>
		</div> 
		
<?php 
} else { 
?>
<nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> / <a href="/car/">Автомобили</a> / <a href="/car/<?php echo $brand; ?>/<?php echo $url; ?>/"><?php echo $name; ?></a> / Бронирование <?php echo $name; ?></p>
	</div>
	<h1 class="example-header">Бронирование <?php echo $name; ?></h1>	
</nav>
<article id="reserv_user">
	<div class="row">
		<div class="five columns">
			<table class="u-full-width">
				<tbody>
					<tr>
						<td>Автомобиль:</td>
						<td><?php echo $name; ?></td>
					</tr>
					<tr>
						<td>Тариф:</td>
						<td><?php echo $_POST['tarif']; ?></td>
					</tr>
					<tr>
						<td>Дата аренды:</td>
						<td>с <?php echo $_POST['date1']; ?> по <?php echo $_POST['date2']; ?></td>
					</tr>
					<tr>
						<td>Кол-во сут:</td>
						<td><?php echo $_POST['count']; ?></td>
					</tr>
					<tr>
						<td>Цена в сут:</td>
						<td><?php echo $_POST['price']; ?> руб.</td>
					</tr>
					<tr>
						<td>К оплате:</td>
						<td><b><?php echo $_POST['total'];  ?> руб.</b></td>
					</tr>
					<tr>
						<td>Регион аренды:</td>
						<td><?php echo $_POST['region']; ?></td>
					</tr>
					<tr>
						<td>Залог:</td>
						<td><?php echo $_POST['zalog']; ?> руб</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="seven columns">
			<form action="/inc/booking/step3.php" method="post" enctype="multipart/form-data" id="valid_user" role="form" data-togg="validator">
				<input type="hidden" name="car_id" value="<?php echo $car_id; ?>"/>
				<input type="hidden" name="url" value="<?php echo $_POST['url']; ?>"/>
				<input type="hidden" name="phone" value="<?php echo $_POST['phone']; ?>"/>
				<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>"/>
				<input type="hidden" name="region" value="<?php echo $_POST['region']; ?>"/>
				<input type="hidden" name="zalog" value="<?php echo $_POST['zalog']; ?>"/>
				<div class="col">
					<p class="text">Для оформления бронирования, при первом обращении, вам необходимо проити проверку нашей службы безопасности, для этого заполните, пожалуйста, следующие поля.</p>
				</div>
				<div class="col">
					<div class="four columns">
						<label for="userfirstname" class="control-label">Фамилия</label>
						<input class="u-full-width" type="text" name="userfirstname" placeholder="Фамилия" id="userfirstname" class="form-control" value="" required>
					</div>
					<div class="four columns">
						<label for="username" class="control-label">Имя</label>
						<input class="u-full-width" type="text" name="username" placeholder="Имя" id="username" class="form-control" value="<?php echo $_POST['username']; ?>" required>
					</div>
					<div class="four columns">
						<label for="userlastname" class="control-label">Отчество</label>
						<input class="u-full-width" type="text" name="userlastname" placeholder="Отчество" id="userlastname" class="form-control" value="" required>
					</div>
				</div>
				<div class="col">
					<div class="four columns bottom">
						<label for="phone"  class="control-label">Телефон</label>
						<input class="u-full-width" type="tel" name="phone" placeholder="Телефон" id="phone"  class="form-control" value="<?php echo $_POST['phone']; ?>" required>
					</div>
					<div class="eight columns bottom">
						<label for="email"  class="control-label">Электронная почта</label>
						<input class="u-full-width" type="email" name="email" placeholder="Электронная почта" id="email"  value="">
					</div>
				</div>
				<div class="clear"></div>
				<div class="col">
					<div class="policy">
						<p>Настоящим подтверждаю:</p>
						<p class="nomargin"><input type="checkbox" name="policy" id="policy" class="check" checked class="form-control" required /> <span><small>Мой возраст больше 23 лет</a></small></span></p>
						<p class="nomargin"><input type="checkbox" name="policy" id="policy" class="check" checked class="form-control" required /> <span><small>Мой стаж вождения больше 3 лет</a></small></span></p>
						<p class="nomargin"><input type="checkbox" name="policy" id="policy" class="check" checked class="form-control" required /> <span><small>Согласен с условиями <a href="/policy.php" target="_blank">политики конфиденциальности.</a></small></span></p>
						<p><input class="button button-primary" type="submit" value="Далее"></p>
					</div>
				</div> 
			</form>
		</div>			
	</div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; 

} }  

else { 	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Бронирование <?php echo $name; ?> | @autoprkt</title> 
		<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	</head>
	<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
	
	<div id="reserv_404">
		<p><i class="fa fa-hand-paper-o" aria-hidden="true"></i></p>
		<p><b>ОПС...</b><br>
		<?php
			if ($_POST['date1'] == '') { echo 'вы забыли выбрать дату'; }
			elseif ($_POST['phone'] == '') { echo 'вы забыли ввести номер телефона'; }
			elseif ($_POST['username'] == '') { echo 'вы забыли ввести Имя'; }
		
			echo '<script language="JavaScript">
							setTimeout(function() {
								window.location.href = "/inc/booking/step1.php?id='. $car_id .'";
							},1500);
						</script>'; 
					
		?></p>
	</div> 
	</body>
	</html>
	<?php } ?>
 