<?php
	// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['name'])) { 
		header("location:/"); 
	}
?>
