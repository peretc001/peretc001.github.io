<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Благодарим за обращение в магазин ДЭМИ</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php';
# Достаем sid
# Подключаем файл конфигурации
include $_SERVER['DOCUMENT_ROOT'] .'/inc/form/safemysql.class.php';
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$sid = session_id();

	$db = new SafeMySQL();
	$id = $db->getOne('SELECT id FROM check_delivery WHERE sid=?s',$sid);
	
if ($_POST['policy'] == '') {
	echo '<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Требуется согласие с условиями политики конфиденциальности</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif ($_POST['name'] == '' or $_POST['phone'] == '') {
	echo '<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Не заполнены обязательные поля (Имя или Телефон)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif ($_POST['email'] == '' or $_POST['city'] == '') {
	echo '<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Не заполнены обязательные поля (Email или Город)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif (preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg']) or preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['name']) ){	
		echo '<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>FUCK OFF</b></p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} else { 

?>
<div id="check_ok">
	<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
	<p><b>Благодарим за обращение</b><br>Наш менеджер свяжется с вами в ближайшее время.</p>
</div> 
<?php	
	$data = array('name' => $_POST['name'], 'phone' => $_POST['phone'], 'email' => $_POST['email'], 'city' => $_POST['city'],'msg' => $_POST['msg'], 'ip' => $ip);
	$data['date'] = date('Y-m-d H:i:s'); // дата и время
	if($id) {
		$db->query("UPDATE  check_delivery SET sid=?s, date=?s, ?u WHERE id = ?i", $sid, $date, $data, $id );
	} else {
		$db->query("INSERT INTO check_delivery SET id=?s, sid=?s, ?u", $id, $sid, $data );
	}


	$user_info = $db->getAll('SELECT * FROM check_delivery WHERE sid=?s',$sid);
		foreach ($user_info as $row) {
		
			// Отправляем письмо админу
			$to  = "info@partadami.ru"; 
			$subject = 'Заявка на рассчет стоимости доставки';
			$message = "<p>Город доставки: ". $row['city'] ."</p><p>Имя: ". $row['name'] ."</p><p>Телефон: ". $row['phone'] ."</p><p>E-mail: ". $row['email'] ."</p><p>Сообщение: ". $row['msg'];
			$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
			$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n"; 
				mail($to, $subject, $message, $headers);
	}
 }

 

include $_SERVER['DOCUMENT_ROOT'] .'/inc/popular.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
