<?php 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// // Load Composer's autoloader
// require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/vendor/phpmailer/phpmailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'ssl://smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username =  'l3dimperial@yandex.ru'; // имя пользователя yandex
        $mail->Password = 'l3dimperial123'; // пароль на yandex
        $mail->SMTPSecure = 'SSL';
        $mail->Port = 465;

        $mail->setFrom('email', '');

        $mail->addAddress('email', '');

        $mail->Subject = 'Заявка';

        $mail->Body = '123';
        $mail->IsHTML(true);
        $mail->send();

        $test = $json['error'] = 0; // ошибок не было
        echo json_encode($test); // выводим массив ответа

    } catch (Exception $e) {
        echo 'Не возможно отправить письмо. Ошибка: ', $mail->ErrorInfo;
	 }
	 


// try {
//     //Server settings
//     $mail->SMTPDebug = 2;                                       // Enable verbose debug output
//     $mail->isSMTP();                                            // Set mailer to use SMTP
//     $mail->Host       = 'smtp.yandex.ru';  							// Specify main and backup SMTP servers
//     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//     $mail->Username   = 'l3dimperial@yandex.ru';                     // SMTP username
//     $mail->Password   = 'l3dimperial123';                               // SMTP password
//     $mail->SMTPSecure = 'SSL';                                  // Enable TLS encryption, `ssl` also accepted
//     $mail->Port       = 465;                                    // TCP port to connect to

//     //Recipients
//     $mail->setFrom('l3dimperial@yandex.ru', 'Calcled');
    
//     //$mail->addAddress('ellen@example.com');               // Name is optional
//     //$mail->addReplyTo('info@example.com', 'Information');
//     //$mail->addCC('cc@example.com');
//     //$mail->addBCC('bcc@example.com');

// //if ($_POST['phone'] != '' and $_POST['human'] == 'human') {

// 	// // Attachments
// 	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// 	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// 	$mail->addAddress('peretc001@mail.ru', 'Joe User');     // Add a recipient


// 	// Content
// 	$mail->isHTML(true);                                  // Set email format to HTML
// 	$mail->Subject = $_POST['form'] .': '. $_POST['form_title'];
// 	//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// 	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// 	$mail->Body .= 'ФИО: <b>'. $_POST['fio'] .'</b><br>';
// 	$mail->Body .= 'Email: <b>'. $_POST['email'] .'</b><br>';
// 	$mail->Body .= 'Телефон: <b>'. $_POST['phone'] .'</b><br>';
// 	if($_POST['price']) {
// 		$mail->Body .= 'Цена: <b>'. $_POST['price'] .'</b><br>';
// 		$mail->Body .= 'Площадь: <b>'. $_POST['square'] .'</b><br>';
// 	}
// 	if($_POST['settingup']) {
// 		$mail->Body .= 'Монтаж: <b>'. $_POST['settingup'] .'</b><br>';
// 		$mail->Body .= 'Экран: <b>'. $_POST['led'] .'</b><br>';
// 		$mail->Body .= 'Управление: <b>'. $_POST['control'] .'</b><br>';
// 		$mail->Body .= 'Доставка: <b>'. $_POST['delivery'] .'</b><br>';
// 		$mail->Body .= 'Итого: <b>'. $_POST['total'] .'</b><br>';
// 	}
// 	if($_POST['commercial']) {
// 		$mail->Body .= 'Ссылка на коммерческое предложение: <a href="http://calcled.skipao.site'. $_POST['commercial'] .'">Скачать</a>';
// 	}


// 	$mail->send();
// 	echo 'Message has been sent';

// } catch (Exception $e) {
// 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
	

// $to2  = $_POST['email']; 
// $subject2 = $_POST['form'] .': '. $_POST['form_title']; 
// $headers2 .= "Content-type: text/html; charset=utf-8 \r\n"; 
// $headers2 .= "From: Калькулятор <". $admin_email .">\r\n"; 
// $message2 = '
// 	<p style="text-align: center; color: #151515;"><b>Благодарим за обращение в LedImperial</b></p>
// 	<table style="width: 70%; margin: 10px auto; border: 1px solid #ddd; text-align: center; background: #eee; color: #151515; border-radius: 6px; padding: 100px 0; background: url(http://calcled.skipao.site/img/led.jpg) center no-repeat;">
// 		<tr>
// 			<td>
// 				<p style="color: #fff; text-transform: uppercase; font-size: 20px; font-weight: bold;">Ваше коммерческое предложение</p>
// 				<p style="text-align: center;"><a href="http://calcled.skipao.site'. $_POST['commercial'] .'"><img src="http://calcled.skipao.site/img/download.png" style="width: 150px;"></a></p>
// 			</td>
// 		</tr>
// 	</table>
// 	<table style="width: 68%; margin: 10px auto; "><tr><td>Телефон: 8 (800) 777-02-91</td><td style="text-align: right;"><a href="http://ledimperial.ru/">ledimperial.ru</td></tr></table>';
// mail($to2, $subject2, $message2, $headers2);

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
			//window.location.href = "/"
		}, 2000);
	</script>
</body>
</html>