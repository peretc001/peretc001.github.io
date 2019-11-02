<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header('Access-Control-Allow-Headers: Version, Authorization, Content-Type' );

$posts = json_decode(file_get_contents('php://input'), true)['data'];

if ($posts) {

	$response = [
		'answer' => 'good',
		'data' => $posts['sendData']
	];

	echo json_encode($response);

	require_once $_SERVER['DOCUMENT_ROOT'] .'/PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
 
	// Настройки SMTP
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 0;
		  
	// $mail->Host = 'ssl://smtp.yandex.ru';
	// $mail->SMTPAuth = true;
	// $mail->Username =  'i.krasovsky@yandex.ru'; // имя пользователя yandex
	// $mail->Password = 'GFDgd39021'; // пароль на yandex
	// $mail->SMTPSecure = 'SSL';
	// $mail->Port = 465;

	// $mail->setFrom('i.krasovsky@yandex.ru', 'Krasovsky');

	// $mail->addAddress('i.krasovsky@yandex.ru', '');

	$mail->Host = 'ssl://smtp.yandex.ru';
	$mail->SMTPAuth = true;
	$mail->Username =  'l3dimperial@yandex.ru'; // имя пользователя yandex
	$mail->Password = 'l3dimperial123'; // пароль на yandex
	$mail->SMTPSecure = 'SSL';
	$mail->Port = 465;

	$mail->setFrom('l3dimperial@yandex.ru', 'LedImperial');

	$mail->addAddress('Ledimperial@mail.ru', '');

	$posts['sendData']['commercial'] == 'yes' ? $mail->Subject = 'Мой сайт: Калькулятор модулей: Коммерческое предложение' : $mail->Subject = 'Мой сайт: Калькулятор модулей: Заявка';

		$body .= '<b>Цвет:</b> '. $posts['sendData']['color'] .'<br>';

		$posts['sendData']['where'] == 'inside' ? $where = 'В помещении' : $where = 'На улице';
		$body .= '<b>Используется:</b> '. $where .'<br>';

		if ($posts['sendData']['color'] == 'Полноцвет') {
			$body .= '<b>Шаг:</b> '. $posts['sendData']['step'] .'<br>';
		}

		if ($posts['sendData']['led']) {
			$body .= '<b>Доп. параметры:</b><br>';
			foreach ($posts['sendData']['led'] as $key => $row) {
				$key == 'dop1' ? $body .= 'Управляющий компьютер<br>' : '';
				$key == 'dop2' ? $body .= 'Отправляющий контроллер<br>' : '';
				$key == 'dop3' ? $body .= 'Wi-Fi модуль<br>' : '';
				$key == 'dop4' ? $body .= 'Датчик яркости<br>' : '';
				$key == 'dop5' ? $body .= 'Датчик яркости<br>' : '';
				$key == 'dop6' ? $body .= 'Датчик температуры<br>' : '';
				$key == 'dop7' ? $body .= 'Видеопроцессор<br>' : '';
			}
		}

		if ($posts['sendData']['setting']) {
			$body .= '<b>Монтаж:</b><br>';
			foreach ($posts['sendData']['led'] as $key => $row) {
				$key == 'dop1' ? $body .= 'Электрощитовая<br>' : '';
				$key == 'dop2' ? $body .= 'Шефмонтаж<br>' : '';
				$key == 'dop3' ? $body .= 'Монтаж оборудования<br>' : '';
				$key == 'dop4' ? $body .= 'Изгот. металлоконструкции<br>' : '';
				$key == 'dop5' ? $body .= 'Монтаж металлоконструкций<br>' : '';
				$key == 'dop6' ? $body .= 'Набор запасных частей<br>' : '';
			}
		}

		if ($posts['sendData']['delivery'] == true) {
			$body .= '<b>Доставка:</b> Нужна<br>';
		}


		$body .= '<b>Модули:</b> '. $posts['sendData']['height'] .' x '. $posts['sendData']['width'] .'<br>';
		$body .= '<b>Размер:</b> '. $posts['sendData']['h'] .' x '. $posts['sendData']['w'] .'см<br>';
		$body .= '<b>Цена:</b> '. $posts['sendData']['price'] .' p<br><br>';

		$body .= '<b>Имя:</b> '. $posts['sendData']['name'] .'<br>';
		$posts['sendData']['email'] != '' ? $body .= '<b>Email:</b> '. $posts['sendData']['email'] .'<br>' : false;
		$body .= '<b>Телефон:</b> '. $posts['sendData']['phone'] .'<br>';

		if ($posts['sendData']['commercial'] == 'yes') {
			$href = '?where='. $posts['sendData']['where'] .'&step_name=P'. $posts['sendData']['step'] .'-'. $posts['sendData']['pixel'] .'&step_pixel='. $posts['sendData']['pixel'] .'&step_size='. $posts['sendData']['size'] .'&width='. $posts['sendData']['w'] .'&height='. $posts['sendData']['h'] .'&pixel_w='. $posts['sendData']['pixel_w'] .'&pixel_h='. $posts['sendData']['pixel_h'] .'&step='. $posts['sendData']['step'] .'&led='. $posts['sendData']['sum_led'] .'&settingup='. $posts['sendData']['sum_setting'] .'&delivery='. $posts['sendData']['sum_delivery'] .'&price='. $posts['sendData']['price'] .'&monitor='. $posts['sendData']['monitor'];
			$body .= '<a href="http://calcled.skipao.site/pdf2.php'. $href .'">КП</a>';
		}

	$mail->msgHTML($body);
	
	$mail->send();

	//////

	if ($posts['sendData']['commercial'] == 'yes') {
		
		// Настройки SMTP
		$mail->SMTPDebug = 0;
		$mail->addAddress($posts['sendData']['email'], '');

		$mail->Subject = 'Коммерческое предложение';

		// Тело письма
		$body = '<p style="text-align: center; color: #151515;"><b>Благодарим за обращение в LedImperial</b></p>
					<table style="width: 100%; margin: 10px auto; border: 1px solid #ddd; text-align: center; background: #eee; color: #151515; border-radius: 6px; padding: 100px 0; background: url(http://calcled.skipao.site/img/led.jpg) center no-repeat;">
						<tr>
							<td>
								<p style="color: #fff; text-transform: uppercase; font-size: 20px; font-weight: bold;">Ваше коммерческое предложение</p>
								<p style="text-align: center;"><a href="http://calcled.skipao.site/pdf2.php'. $href .'"><img src="http://calcled.skipao.site/img/download.png" style="width: 150px;"></a></p>
							</td>
						</tr>
					</table>
					<table style="width: 68%; margin: 10px auto; "><tr><td>Телефон: 8 (800) 777-02-91</td><td style="text-align: right;"><a href="http://ledimperial.ru/">ledimperial.ru</td></tr></table>';


		$mail->msgHTML($body);
		$mail->send();
	}

}