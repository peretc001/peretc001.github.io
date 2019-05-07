<?php
require( dirname(__FILE__) . '/wp-load.php');

$admin_email = get_option('admin_email');
$options = get_option( 'optimazedLanding_settings' );
$Name = $options['name']; ?>
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

if ($_POST['policy'] == 'on' and $_POST['phone'] != '' and $_POST['human'] == 'human') {

	$to  = $admin_email; 
	$subject = 'Заявка с сайта'; 
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: ". $Name ." <". $admin_email .">\r\n"; 
	if($_POST['name'] != '' or $_POST['msg'] != '') {
		$message .= 'Имя: <b>'. $_POST['name'] .'</b><br>Комментарий: '. $_POST['msg'] .'<br>';
	}
	$message .= 'Телефон: <b>'. $_POST['phone'] .'</b><br>--- Раздел: '. $_POST['recipient'];
		wp_mail($to, $subject, $message, $headers);
	?>
	<div class="send_ok">
		<i class="far fa-thumbs-up"></i>
		<p><b>Благодарим за заявку</b></p>
		<p>В ближайщее время наш менеджер свяжется с вами</p>
	</div>

<?php } else { ?>

	<div class="send_ok">
		<i class="far fa-thumbs-down"></i>
		<p><b>Заявка не принята</b></p>
		<p>Не указан номер телефона или вы не согласились с политикой конфиденциальности</p>
	</div>

<?php } ?>
	<script language="JavaScript">
		setTimeout(() => {
			window.location.href = "/"
		}, 2000);
	</script>
</body>
</html>