<?php /* Переменные для соединения с базой данных */
$hostname = "localhost";
$username = "u1730_dami";
$password = "2032004133";
$dbName = "u1730440_otziv";
/** Кодировка базы данных при создании таблиц. */
define('DB_CHARSET', 'utf8_general_ci');

/* создать соединение */
$link = mysqli_connect($hostname, $username, $password, $dbName);
mysqli_set_charset( $link, 'utf8'); ?>