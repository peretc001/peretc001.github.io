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

	require_once $_SERVER['DOCUMENT_ROOT'] .'/work/vue/led/PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
 
	// Настройки SMTP
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 0;
		  
	$mail->Host = 'ssl://smtp.yandex.ru';
	$mail->SMTPAuth = true;
	$mail->Username =  'i.krasovsky@yandex.ru'; // имя пользователя yandex
	$mail->Password = 'GFDgd39021'; // пароль на yandex
	$mail->SMTPSecure = 'SSL';
	$mail->Port = 465;

	$mail->setFrom('i.krasovsky@yandex.ru', 'Krasovsky');

	$mail->addAddress('i.krasovsky@yandex.ru', '');

	// $mail->Host = 'ssl://smtp.yandex.ru';
	// $mail->SMTPAuth = true;
	// $mail->Username =  'l3dimperial@yandex.ru'; // имя пользователя yandex
	// $mail->Password = 'l3dimperial123'; // пароль на yandex
	// $mail->SMTPSecure = 'SSL';
	// $mail->Port = 465;

	// $mail->setFrom('l3dimperial@yandex.ru', 'LedImperial');

	// $mail->addAddress('l3dimperial@yandex.ru', '');

	$mail->Subject = 'Мой сайт: Калькулятор модулей: Заявка';

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
		$body .= '<b>Телефон:</b> '. $posts['sendData']['phone'] .'<br>';

	$mail->msgHTML($body);

	$mail->send();

}