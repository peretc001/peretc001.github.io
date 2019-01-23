<?php session_start(); 
/* Переменные для соединения с базой данных */
$hostname_db = "localhost:3306";
$username_db = "u0382_u0382359";
$password_db = "GFDgd39021";
$dbName_db = "u0382359_autoprkt";
/** Кодировка базы данных при создании таблиц. */
define('DB_CHARSET', 'utf8_general_ci');

/* создать соединение */
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');  
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Login</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
</head>
<body>

<?php
// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
		?>
			<!--Если пусты, то выводим форму входа.--> 
			<div class="login">
				<div class="row">
					<form action="/user/inc/valid.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="pole" value='123'>
						<p>Логин</p>
						<input name="login" type="text">
						<p>Пароль:</p>
						<input name="password" type="password">
						<br>
						<input type="submit" class="button button-primary" value="Войти">
					</form>
				</div>
			</div>
		<?php
    }
    else  //Иначе. 
    {
		 $login=$_SESSION['login'];
		 echo '<script language="JavaScript">window.location.href = "/user/home.php"</script>';
	 } 
?>
</body>
</html>