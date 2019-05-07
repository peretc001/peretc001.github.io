<?php session_start(); 
error_reporting(E_ALL & ~E_NOTICE);
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	echo '<link rel="stylesheet" href="/style.css">';
	echo '<style type="text/css">body {background:#fafafa;}</style>';	
#Проверяем заполнены ли поля
if($_POST['username'] != '' && $_POST['caption'] != '' && $_POST['msg'] != '' ){
		
	if (!preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg'])) {
				
		#Создаем безопасносе соединение
		$db = new SafeMySQL();
		#$find = $db->getOne('SELECT email FROM email WHERE email=?s', $_POST['email']);
		#Если ip пустой присваиваем ip
		if ($_POST['ip'] == '') { $_POST['ip'] = $_SERVER["REMOTE_ADDR"]; }
		if ($_POST['rating'] == '') { $_POST['rating'] ='0'; $star_col = '0'; } else { $star_col = '1'; }
		$msg = strip_tags($_POST['msg']);
		#Собираем данные вкучу
		$data = array('id' => $id, 'url' => $_POST['url'], 'username' => $_POST['username'], 'star' => $_POST['rating'], 'star_col' => $star_col, 'caption' => $_POST['caption'], 'msg' => $msg, 'sid' => session_id(), 'ip' => $_POST['ip'],  );
		$data['date'] = date('Y-m-d H:i:s');
	
		#Записываем в базу
		$db->query("INSERT INTO review SET ?u", $data );	
		
		#Отправляем письмо
		$to  = "info@autoprkt.ru"; 
		$subject = 'ОТЗЫВ'; 
		$message = "Имя: ". $_POST['username'] ."<br>Заголовок: ". $_POST['caption'] ."<br>Отзыв: ". $msg ."<br>Рейтинг: ". $_POST['rating'] ."<br> url: ". $_POST['url'] ."<br> IP: ". $_POST['ip'];
		$headers = "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: @autoprkt <info@autoprkt.ru>\r\n";
			mail($to, $subject, $message, $headers); 
				
		
		echo '<div class="otziv_form"><div class="success">Спасибо за Ваш отзыв</div></div>
		<script language="JavaScript">
 			setTimeout(function() {
 				window.location.href = "http://autoprkt.ru'. $_POST['back_url'] .'/#review";
 			},1500);
		</script>';
		
	
	} else { echo '<div class="otziv_form"><div class="error">Найдена ссылка, ай-ай-ай )</div></div>
	<script language="JavaScript">
 setTimeout(function() {
 	window.location.href = "/car/'. $_POST['brand'] .'/'. $_POST['url'] .'/#hsBack";
 	},1500);
</script>'; }
}
else { echo '<div class="otziv_form"><div class="error">Не заполенены обязательные поля</div></div>
<script language="JavaScript">
 setTimeout(function() {
 	window.location.href = "http://autoprkt.ru/'. $_POST['back_url'] .'/#hsBack";
 	},1500);
</script>'; }

?>
