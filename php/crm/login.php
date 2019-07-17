<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="img/favicon.png">
	<title>Вход</title> 
	<style>
		body {
			opacity: 0;
			overflow-x: hidden;
		}
		html {
			background-color: #9abee2;
		}
	</style>
</head>
<body class="is-login">

<?php
// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
		?>
	<section class="login">
		<div class="container">
			<a href="/" class="logo">
				<img src="/img/favicon.png" alt="">
				<h1><strong>CRM для самых маленьких</strong> <span class="description">система учета клиентов</span></h1>
			</a>
			<div class="row">
				<div class="col-12 col-md-4 offset-md-4">
					<form action="/inc/valid.php" method="post">
						<div class="login_card">
							<div class="form-group">
								<input id="login" type="text" name="login" class="form-control" value="" placeholder="Логин">
							</div>
							<div class="form-group">
								<input id="password" type="text" name="password" class="form-control" value="" placeholder="Пароль">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success" value="Войти">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="example">
				<ul>
					<li>Логин</li>
					<li>Пароль</li>
				</ul>
				<ul>
					<li>admin</li>
					<li>1</li>
				</ul>
				<ul>
					<li>manager</li>
					<li>2</li>
				</ul>
				<ul>
					<li>guest</li>
					<li>3</li>
				</ul>
			</div>
		</div>
	</section>
	<?php
    }
    else  //Иначе. 
    {
		 $login=$_SESSION['login'];
		 echo '<script language="JavaScript">window.location.href = "/home.php"</script>';
	 } 
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>