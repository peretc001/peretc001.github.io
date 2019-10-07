<?php 
require_once './PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
 
	// Настройки SMTP
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 0;
		  
	$mail->Host = 'ssl://smtp.yandex.ru';
	$mail->SMTPAuth = true;
	$mail->Username =  'l3dimperial@yandex.ru'; // имя пользователя yandex
	$mail->Password = 'l3dimperial123'; // пароль на yandex
	$mail->SMTPSecure = 'SSL';
	$mail->Port = 465;

	$mail->setFrom('l3dimperial@yandex.ru', 'LedImperial');

	$mail->addAddress('l3dimperial@yandex.ru', '');

	if ($_POST['form_title'] == 'Замер') {
		$mail->Subject = 'Заявка на Замер';
	} else {
		$mail->Subject = 'Заявка на Коммерческое предложение';
	}

	// Тело письма
	$body .= 'ФИО: <b>'. $_POST['fio'] .'</b><br>';
	$body .= 'Email: <b>'. $_POST['email'] .'</b><br>';
	$body .= 'Телефон: <b>'. $_POST['phone'] .'</b><br>';
	$body .= 'Вкладка: <b>'. $_POST['form'] .'</b><br>';
	if($_POST['price']) {
		$body .= 'Цена: <b>'. $_POST['price'] .'</b><br>';
		$body .= 'Площадь: <b>'. $_POST['square'] .'</b><br>';
	}
	if($_POST['settingup']) {
		$body .= 'Монтаж: <b>'. $_POST['settingup'] .'</b><br>';
		$body .= 'Экран: <b>'. $_POST['led'] .'</b><br>';
		$body .= 'Управление: <b>'. $_POST['control'] .'</b><br>';
		$body .= 'Доставка: <b>'. $_POST['delivery'] .'</b><br>';
		$body .= 'Итого: <b>'. $_POST['total'] .'</b><br>';
	}
	if($_POST['commercial']) {
		$body .= 'Ссылка на коммерческое предложение: <a href="http://calcled.skipao.site'. $_POST['commercial'] .'">Скачать</a>';
	}

	$mail->msgHTML($body);

	if ($_POST['phone'] != '' and $_POST['human'] == 'human') {
		
		$mail->send();
	}



	//////

if ($_POST['form_title'] != 'Замер') {
	$mail2 = new PHPMailer;
	$mail2->CharSet = 'UTF-8';
		
		// Настройки SMTP
		$mail2->isSMTP();
		$mail2->SMTPAuth = true;
		$mail2->SMTPDebug = 0;
				
		$mail2->Host = 'ssl://smtp.yandex.ru';
		$mail2->SMTPAuth = true;
		$mail2->Username =  'i.krasovsky@yandex.ru'; // имя пользователя yandex
		$mail2->Password = 'Parol123'; // пароль на yandex
		$mail2->SMTPSecure = 'SSL';
		$mail2->Port = 465;

		$mail2->setFrom('i.krasovsky@yandex.ru', 'Z');

		$mail2->addAddress($_POST['email'], '');

		$mail2->Subject = 'Коммерческое предложение';

		// Тело письма
		$body2 = '<p style="text-align: center; color: #151515;"><b>Благодарим за обращение в LedImperial</b></p>
					<table style="width: 70%; margin: 10px auto; border: 1px solid #ddd; text-align: center; background: #eee; color: #151515; border-radius: 6px; padding: 100px 0; background: url(http://calcled.skipao.site/img/led.jpg) center no-repeat;">
						<tr>
							<td>
								<p style="color: #fff; text-transform: uppercase; font-size: 20px; font-weight: bold;">Ваше коммерческое предложение</p>
								<p style="text-align: center;"><a href="http://calcled.skipao.site'. $_POST['commercial'] .'"><img src="http://calcled.skipao.site/img/download.png" style="width: 150px;"></a></p>
							</td>
						</tr>
					</table>
					<table style="width: 68%; margin: 10px auto; "><tr><td>Телефон: 8 (800) 777-02-91</td><td style="text-align: right;"><a href="http://ledimperial.ru/">ledimperial.ru</td></tr></table>';


		$mail2->msgHTML($body2);

		if ($_POST['phone'] != '' and $_POST['human'] == 'human') {
			
			$mail2->send();
		}
	}
?>
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



	<div class="send_ok">
		<i class="far fa-thumbs-up"></i>
		<p><b>Благодарим за заявку</b></p>
		<p>В ближайщее время мы свяжемся с вами</p>
	</div>

<?php //} else { ?>

	<div class="send_ok">
		<i class="far fa-thumbs-down"></i>
		<p><b>Заявка не принята</b></p>
		<p>Не указан номер телефона</p>
	</div>

<?php //} ?>
	<script language="JavaScript">
		setTimeout(() => {
			window.location.href = "/"
		}, 2000);
	</script>
</body>
</html>