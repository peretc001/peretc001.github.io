<?php session_start();
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php');

	$db = new SafeMySQL();
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
if ($_POST['city'] == '' or $_POST['name'] == '') {
	echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Не заполнены обязательные поля (Город или Имя)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif ($_POST['phone'] == '' or $_POST['email'] == '') {
	echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Не заполнены обязательные поля (Телефон или Email)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif ($_POST['policy'] == '') {
	echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заявка НЕ принята</b><br>Требуется согласие с условиями политики конфиденциальности</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif (preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg']) or preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['name']) ){	
		echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>FUCK OFF</b></p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} else { 
	#OK
	echo '<div id="send_ok">
		<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
		<p><b>Благодарим за обращение</b><br>Наш менеджер свяжется с вами в ближайшее время.</p>
	</div>'; 
		
	// Отправляем письмо админу
	$to  = 'info@avtonakidki.net'; 
	$subject = 'Заявка на рассчет стоимости доставки';
	$message = "<p>Город доставки: ". $_POST['city'] ."</p><p>Имя: ". $_POST['name'] ."</p><p>Телефон: ". $_POST['phone'] ."</p><p>E-mail: ". $_POST['email'] ."</p><p>Сообщение: ". $_POST['msg'] ."</p><p>IP: ". $ip;
	$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: Автонакидки <info@avtonakidki.net>\r\n"; 
	$headers .= "CC: av.krasovskaya@mail.ru\r\n";	
		mail($to, $subject, $message, $headers);

	echo '<script language="JavaScript">
			setTimeout(function(){ window.location.href = "/delivery.php" },600);
			</script>';
	}

?>
