<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header('Access-Control-Allow-Headers: Version, Authorization, Content-Type' );

$posts = json_decode(file_get_contents('php://input'), true)['data'];

if ($posts) {

	$response = [
		'all' => $posts['all'],
		'img' => $posts['img'],
		'answer' => 'good'
	];

	echo json_encode($response);

		$to  = 'i.krasovsky@yandex.ru'; 
		$subject = 'Мой сайт: Заявка с сайта'; 
		$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: Krasovsky23.ru <i.krasovsky@yandex.ru>\r\n"; 
		$message .= 'ИТОГО: <b>'. $posts['all']['price'] .'</b><br>';
		$message .= '<p>Материал: '. $posts['all']['steps']['material'] .'</p>';
		$message .= '<p>Размер: '. $posts['all']['steps']['width'] .' x '. $posts['all']['steps']['height'] .' см</p>';
		$message .= '<p>Форма: '. $posts['all']['steps']['forms'] .'</p>';
		$message .= '<p>Бордер: '. $posts['all']['steps']['borders'] .'</p>';
		$message .= '<p>-------</p>';
		$message .= '<p>Телефон: '. $posts['all']['steps']['phone'] .'</p>';
		$message .= '<p>E-mail: '. $posts['all']['steps']['email'] .'</p>';
                  
		$message .= 'Скрин: <br><br><img src="'. $posts['img'] .'">';
		
			mail($to, $subject, $message, $headers);

}