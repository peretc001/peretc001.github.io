<?php session_start(); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
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
<body>

<?php
// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
		?>
	<section class="login">
		<div class="container">
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