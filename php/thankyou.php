<?php 
require_once './PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
 
	// Настройки SMTP
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 0;

	$mail->Host = 'ssl://smtp.mail.ru';
	$mail->SMTPAuth = true;
	$mail->Username =  'Okna-StarWood@mail.ru'; // имя пользователя 
	$mail->Password = '03071987bsa'; // пароль
	$mail->SMTPSecure = 'SSL';
	$mail->Port = 465;

	$mail->setFrom('Okna-StarWood@mail.ru', 'Okna-StarWood');

	$mail->addAddress('Okna-StarWood@mail.ru', '');
	// $mail->addAddress('peretc001@mail.ru', '');

	$_POST['form'] ? $mail->Subject = 'Okna-StarWood: '. $_POST['form'] : $mail->Subject = 'Okna-StarWood: Заявка';
	
	// Тело письма
	$_POST['profil'] ? $body .= 'Профиль: <b>'. $_POST['profil'] .'</b><br>' : '';
	$_POST['wood'] ? $body .= 'Какое дерево?: <b>'. $_POST['wood'] .'</b><br>' : '';
	$_POST['where'] ? $body .= 'Окна куда: <b>'. $_POST['where'] .'</b><br>' : '';
	$_POST['time'] ? $body .= 'Когда нужны Окна?: <b>'. $_POST['time'] .'</b><br><hr><br>' : '';

	$body .= 'Имя: <b>'. $_POST['user'] .'</b><br>';
	$body .= 'Телефон: <b>'. $_POST['phone'] .'</b><br>';
	$_POST['email'] ? $body .= 'E-mail: <b>'. $_POST['email'] .'</b><br>' : '';
	$_POST['msg'] ? $body .= 'Сообщение: <b>'. $_POST['msg'] .'</b><br>' : '';
	
	$mail->msgHTML($body);

	if ($_POST['phone'] != '' and $_POST['human'] == 'human') {
		
		$mail->send();
	}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Благодарим за заявку</title>
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


<?php if ($_POST['phone'] != '' and $_POST['human'] == 'human') { ?>
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