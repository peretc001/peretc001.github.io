<?php

$posts = json_decode(file_get_contents('php://input'), true)['data'];

if ($posts) {

($posts['all']['form']['SecondStep']['newFlat'] 			== true)	? $posts['all']['form']['SecondStep']['newFlat'] = 'Квартира в новостройке' : false;
($posts['all']['form']['SecondStep']['secondaryFlat'] 	== true)	? $posts['all']['form']['SecondStep']['secondaryFlat'] = 'Квартира на вторичном рынке' : false;
($posts['all']['form']['ThirdStep']['StudioApartment'] 	== true)	? $posts['all']['form']['ThirdStep']['StudioApartment'] = 'Квартира-студия' : false;
($posts['all']['form']['ThirdStep']['flat1'] 				== true)	? $posts['all']['form']['ThirdStep']['flat1'] = '1-комната' : false;
($posts['all']['form']['ThirdStep']['flat2'] 				== true)	? $posts['all']['form']['ThirdStep']['flat2'] = '2-комната' : false;
($posts['all']['form']['ThirdStep']['flat3'] 				== true)	? $posts['all']['form']['ThirdStep']['flat3'] = '3-комната' : false;
($posts['all']['form']['ThirdStep']['flat4'] 				== true)	? $posts['all']['form']['ThirdStep']['flat4'] = '4-комната' : false;
($posts['all']['form']['ThirdStep']['more4flat'] 			== true)	? $posts['all']['form']['ThirdStep']['more4flat'] = 'больше 4 комнат' : false;
($posts['all']['form']['FourthStep']['allDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['allDistrict'] = 'Все районы города' : false;
($posts['all']['form']['FourthStep']['fmrDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['fmrDistrict'] = 'ФМР - Фестивальный район' : false;
($posts['all']['form']['FourthStep']['cmrDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['cmrDistrict'] = 'ЦМР - Центральный район' : false;
($posts['all']['form']['FourthStep']['enkaDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['enkaDistrict'] = 'ЭНКА - Район им.Маршала Жукова' : false;
($posts['all']['form']['FourthStep']['kmrDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['kmrDistrict'] = 'КМР - Комсомольский район' : false;
($posts['all']['form']['FourthStep']['kkbDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['kkbDistrict'] = 'ККБ - Краевой клинической больницы' : false;
($posts['all']['form']['FourthStep']['gmrDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['gmrDistrict'] = 'ГМР - Гидростроителей' : false;
($posts['all']['form']['FourthStep']['chmrDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['chmrDistrict'] = 'ЧМР - Район Черемушки' : false;
($posts['all']['form']['FourthStep']['ymrDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['ymrDistrict'] = 'ЮМР - Юбилейный район' : false;
($posts['all']['form']['FourthStep']['ripDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['ripDistrict'] = 'РИП - Район Ленты (Шанхай)' : false;
($posts['all']['form']['FourthStep']['pmrDistrict'] 		== true)	? $posts['all']['form']['FourthStep']['pmrDistrict'] = 'ПМР - Пашковский район' : false;
($posts['all']['form']['FourthStep']['naberegDistrict'] 	== true)	? $posts['all']['form']['FourthStep']['naberegDistrict'] = 'Район Кубанской набережной' : false;
($posts['all']['form']['FourthStep']['vitaminDistrict'] 	== true)	? $posts['all']['form']['FourthStep']['vitaminDistrict'] = 'Витаминкомбинат - Район Витаминкомбината' : false;
($posts['all']['form']['FifthStep']['finished'] 			== true)	? $posts['all']['form']['FifthStep']['finished'] = 'готовое' : false;
($posts['all']['form']['FifthStep']['surrenderYear'] 		== true)	? $posts['all']['form']['FifthStep']['surrenderYear'] = 'сдача в этом году' : false;
($posts['all']['form']['FifthStep']['Year20'] 				== true)	? $posts['all']['form']['FifthStep']['Year20'] = '2020-2021 г' : false;
($posts['all']['form']['FifthStep']['Year21'] 				== true)	? $posts['all']['form']['FifthStep']['Year21'] = '2021-2022 г' : false;
($posts['all']['form']['FifthStep']['Year22'] 				== true)	? $posts['all']['form']['FifthStep']['Year22'] = '2022-2023 г' : false;
($posts['all']['form']['SixthStep']['do1mln'] 				== true)	? $posts['all']['form']['SixthStep']['do1mln'] = 'до 1 млн рублей' : false;
($posts['all']['form']['SixthStep']['do1_5mln'] 			== true)	? $posts['all']['form']['SixthStep']['do1_5mln'] = 'до 1,5 млн рублей' : false;
($posts['all']['form']['SixthStep']['do3mln'] 				== true)	? $posts['all']['form']['SixthStep']['do3mln'] = '2-3 млн рублей' : false;
($posts['all']['form']['SixthStep']['do4mln'] 				== true)	? $posts['all']['form']['SixthStep']['do4mln'] = '3-4 млн рублей' : false;
($posts['all']['form']['SixthStep']['do5mln'] 				== true)	? $posts['all']['form']['SixthStep']['do5mln'] = 'более 5 млн рублей' : false;
($posts['all']['form']['SeventhStep']['cash'] 				== true)	? $posts['all']['form']['SeventhStep']['cash'] = 'за наличные' : false;
($posts['all']['form']['SeventhStep']['mortgage'] 			== true)	? $posts['all']['form']['SeventhStep']['mortgage'] = 'в ипотеку' : false;
($posts['all']['form']['SeventhStep']['installments'] 	== true)	? $posts['all']['form']['SeventhStep']['installments'] = 'в рассрочку' : false;
($posts['all']['form']['SeventhStep']['capital'] 			== true)	? $posts['all']['form']['SeventhStep']['capital'] = 'материнский капитал' : false;
($posts['all']['form']['SeventhStep']['militaryMortgage'] == true)	? $posts['all']['form']['SeventhStep']['militaryMortgage'] = 'военная ипотека' : false;
($posts['all']['form']['EighthStep']['month1'] 				== true)	? $posts['all']['form']['EighthStep']['month1'] = 'в течение месяца' : false;
($posts['all']['form']['EighthStep']['month3'] 				== true)	? $posts['all']['form']['EighthStep']['month3'] = 'в течение 3-х месяцев' : false;
($posts['all']['form']['EighthStep']['month6'] 				== true)	? $posts['all']['form']['EighthStep']['month6'] = 'через полгода' : false;
($posts['all']['form']['EighthStep']['month12'] 			== true)	? $posts['all']['form']['EighthStep']['month12'] = 'через год' : false;
($posts['all']['form']['EighthStep']['afterSale'] 			== true)	? $posts['all']['form']['EighthStep']['afterSale'] = 'после продажи своего жилья' : false;
($posts['all']['form']['EighthStep']['notDecided'] 		== true)	? $posts['all']['form']['EighthStep']['notDecided'] = 'еще не определился' : false;

	$response = [
		'answer' => 'good'
	];

	echo json_encode($response);

	require_once './PHPMailer/PHPMailerAutoload.php';
 
$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
 
	// Настройки SMTP
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPDebug = 0;
		  
	$mail->Host = 'ssl://smtp.yandex.ru';
	$mail->SMTPAuth = true;
	$mail->Username =  'svetlanaanasimova@yandex.ru'; // имя пользователя yandex
	$mail->Password = 'Chnch56gj'; // пароль на yandex
	$mail->SMTPSecure = 'SSL';
	$mail->Port = 465;

	$mail->setFrom('svetlanaanasimova@yandex.ru', 'Новостройки-в-Краснодаре');

	$mail->addAddress('svetlanaanasimova@yandex.ru', '');

	$mail->Subject = 'Новостройки-в-Краснодаре: Заявка';


	$body .= 'Меня интересует:<br>';
	foreach ($posts['all']['form'] as $key => $row) {
		if ($key == 'SecondStep') {
			$body .= '<b>1. Жилой фонд</b><br>';
		}
		if ($key == 'ThirdStep') {
			$body .= '<b>2. Количество комнат</b><br>';
		}
		if ($key == 'FourthStep') {
			$body .= '<b>3. Район</b><br>';
		}
		if ($key == 'FifthStep') {
			$body .= '<b>4. Год сдачи</b><br>';
		}
		if ($key == 'SixthStep') {
			$body .= '<b>5. Бюджет</b><br>';
		}
		if ($key == 'SeventhStep') {
			$body .= '<b>6. Способ покупки</b><br>';
		}
		if ($key == 'EighthStep') {
			$body .= '<b>7. Когда планируете</b><br>';
		}
		foreach ($row as $key2 => $value2) {
			
			if($value2 != false) {
				$body .= '-- '. $value2 .'<br>';
			}
		}
	}

	$body .= '<br><b>Телефон</b>: '. $posts['phone'];

	$mail->msgHTML($body);

	$mail->send();

}