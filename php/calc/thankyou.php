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
	if($_POST['commercial']) {
		$message .= 'Ссылка на коммерческое предложение: <a href="http://calcled.skipao.site'. $_POST['commercial'] .'">Скачать</a>';
	}
		mail($to, $subject, $message, $headers);

	$to2  = $_POST['email']; 
	$subject2 = $_POST['form'] .': '. $_POST['form_title']; 
	$headers2 .= "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers2 .= "From: Калькулятор <". $admin_email .">\r\n"; 
	$message2 = '
		<p style="text-align: center; color: #151515;"><b>Благодарим за обращение в LedImperial</b></p>
		<table style="width: 70%; margin: 10px auto; border: 1px solid #ddd; text-align: center; background: #eee; color: #151515; border-radius: 6px; padding: 100px 0; background: url(http://calcled.skipao.site/img/led.jpg) center no-repeat;">
			<tr>
				<td>
					<p style="color: #fff; text-transform: uppercase; font-size: 20px; font-weight: bold;">Ваше коммерческое предложение</p>
					<p style="text-align: center;"><a href="http://calcled.skipao.site'. $_POST['commercial'] .'"><img src="http://calcled.skipao.site/img/download.png" style="width: 150px;"></a></p>
				</td>
			</tr>
		</table>
		<table style="width: 68%; margin: 10px auto; "><tr><td>Телефон: 8 (800) 777-02-91</td><td style="text-align: right;"><a href="http://ledimperial.ru/">ledimperial.ru</td></tr></table>';
	mail($to2, $subject2, $message2, $headers2);

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