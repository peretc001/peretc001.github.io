<?php
	
	/* Переменные для соединения с базой данных */
$hostname = "localhost:3306";
$username = "u0382_u0382359";
$password = "GFDgd39021";
$dbName = "u0382359_autoprkt";
/** Кодировка базы данных при создании таблиц. */
define('DB_CHARSET', 'utf8_general_ci');

/* создать соединение */
mysql_connect($hostname,$username,$password) OR DIE("Не могу создать соединение");
/* выбрать базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die("Не могу создать соединение"); 
mysql_query("SET NAMES utf8"); 

?>
