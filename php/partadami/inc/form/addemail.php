<?php session_start(); ?>
<?php $admin_email = 'info@partadami.ru'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Заявка с сайта</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<link rel='stylesheet' id='font-awesome-css'  href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' type='text/css' media='all' />
	<style>
		body {margin: 0; padding: 0; opacity: 1; background: #f2f2f2; color: #666; font-family: 'Open Sans', sans-serif;}
		.send_ok {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100%;
			min-height: 100vh;
			text-align: center;
			padding: 15px;
		}
		.send_ok p {padding:1em 0;margin:0;text-align: center;}
		.send_ok .far {font-size:10em;}
	</style>
</head>
<body>
<?php

if ($_POST['email'] != '' and $_POST['human'] == 'human') {

	# Достаем sid
	# Подключаем файл конфигурации
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/form/safemysql.class.php';
		
	//$ip = $_SERVER['REMOTE_ADDR'];
	$sid = session_id();

	$db = new SafeMySQL();
	
	$user = $db->getRow("SELECT * FROM `email` WHERE email =  ?s", $_POST['email']);

	if ($user) {

		?>
		<div class="send_ok">
			<i class="far fa-thumbs-up"></i>
			<p><b>Благодарю за заявку</b></p>
			<p>Мы уже знаем ваш email, как только у нас стартует акция, мы сообщим вам</p>
		</div>
		<?php

	} else {

		$data = array('email' => $_POST['email'], 'status' => '', 'date' => date('Y-m-d H:i:s'), 'sid' => $sid );
		$db->query("INSERT INTO `email` SET ?u", $data);
		
		$to  = 'info@partadami.ru'; 
		$subject = 'Парты: Хочу скидку'; 
		$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: ДЭМИ <". $admin_email .">\r\n"; 
		$message = 'Телефон: <b>'. $_POST['email'] .'</b><br>';
			mail($to, $subject, $message, $headers);
	}
	?>
	<div class="send_ok">
		<i class="far fa-thumbs-up"></i>
		<p><b>Благодарю за заявку</b></p>
		<p>Как только у нас стартует акция, мы сообщим вам</p>
	</div>

<?php } else { ?>

	<div class="send_ok">
		<i class="far fa-thumbs-down"></i>
		<p><b>Заявка не принята</b></p>
		<p>Не указан адрес почты</p>
	</div>

<?php } ?>
	<script language="JavaScript">
		setTimeout(() => {
			window.location.href = "/"
		}, 2000);
	</script>
</body>
</html>