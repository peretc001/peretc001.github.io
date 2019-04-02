<?php /* Переменные для соединения с базой данных */
$hostname_db = "localhost";
$username_db = "u0382_user";
$password_db = "12345";
$dbName_db = "u0382359_base";
/** Кодировка базы данных при создании таблиц. */
define('DB_CHARSET', 'utf8_general_ci');

/* создать соединение */
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');
?>
