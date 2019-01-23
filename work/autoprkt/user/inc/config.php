<?php /* Переменные для соединения с базой данных */
$hostname_db = "localhost:3306";
$username_db = "u0382_u0382359";
$password_db = "GFDgd39021";
$dbName_db = "u0382359_autoprkt";
/** Кодировка базы данных при создании таблиц. */
define('DB_CHARSET', 'utf8_general_ci');

/* создать соединение */
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');  

	// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id'])) { 
		header("location:/user/"); 
	}
?>

