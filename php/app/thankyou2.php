<?php 
header('Access-Control-Allow-Origin: ');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS' );
header('Content-Type: application/json');
header('Access-Control-Allow-Headers: Authorization' );
header('Authorization: 25354565758595');

//$posts = json_decode(stripslashes($_POST['body']));
$posts = json_decode(file_get_contents('php://input'), true)['data'];


// var_dump($posts);

$response = [
	//'step' => $posts['steps'],
	// 'phone' => $posts['steps']['phone'],
	// 'email' => $posts['steps']['email'],
	'answer' => 'good'
];

echo json_encode($response);

