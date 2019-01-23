<?php session_start(); 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Login</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
	<link rel="stylesheet" href="/adm/adm.css">
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
					<form action="/adm/inc/valid.php" method="post" enctype="multipart/form-data">
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
		 echo '<script language="JavaScript">window.location.href = "/adm/home.php"</script>';
	 } 
?>
</body>
</html>