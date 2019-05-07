<?php /* Переменные для соединения с базой данных */
$hostname = "localhost";
$username = "u0572_site";
$password = "GFDgd39021";
$dbName = "u0572740_db";
/** Кодировка базы данных при создании таблиц. */
define('DB_CHARSET', 'utf8_general_ci');

/* создать соединение */
mysql_connect($hostname,$username,$password) OR DIE("Не могу создать соединение");
/* выбрать базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die("Не могу создать соединение"); 
mysql_query("SET NAMES utf8"); 
$sid = session_id();
?>
