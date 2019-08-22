<?php $admin_email = 'i.krasovsky@yandex.ru'; ?>
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

if ($_POST['phone'] != '' and $_POST['human'] == 'human') {

	$to  = 'peretc001@mail.ru'; 
	$subject = $_POST['form'] .': '. $_POST['form_title']; 
	$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: Калькулятор <". $admin_email .">\r\n"; 
	$message .= 'ФИО: <b>'. $_POST['fio'] .'</b><br>';
	$message .= 'Email: <b>'. $_POST['email'] .'</b><br>';
	$message .= 'Телефон: <b>'. $_POST['phone'] .'</b><br>';
	if($_POST['price']) {
		$message .= 'Цена: <b>'. $_POST['price'] .'</b><br>';
		$message .= 'Площадь: <b>'. $_POST['square'] .'</b><br>';
	}
	if($_POST['settingup']) {
		$message .= 'Монтаж: <b>'. $_POST['settingup'] .'</b><br>';
		$message .= 'Экран: <b>'. $_POST['led'] .'</b><br>';
		$message .= 'Управление: <b>'. $_POST['control'] .'</b><br>';
		$message .= 'Доставка: <b>'. $_POST['delivery'] .'</b><br>';
		$message .= 'Итого: <b>'. $_POST['total'] .'</b><br>';
	}
		mail($to, $subject, $message, $headers);
	?>
	<div class="send_ok">
		<i class="far fa-thumbs-up"></i>
		<p><b>Благодарим за заявку</b></p>
		<p>В ближайщее время мы свяжемся с вами</p>
	</div>

<?php } else { ?>

	<div class="send_ok">
		<i class="far fa-thumbs-down"></i>
		<p><b>Заявка не принята</b></p>
		<p>Не указан номер телефона</p>
	</div>

<?php } ?>
	<script language="JavaScript">
		setTimeout(() => {
			window.location.href = "/"
		}, 2000);
	</script>
</body>
</html>