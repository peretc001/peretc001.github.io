<?php session_start(); 
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'); 

	$category = htmlspecialchars(trim($_GET['category']));
	if ($category == '') { $category = 'polikarbonat'; }
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>ПОЛИКАРБОНАТА.НЕТ</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/css/custom.css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/skeleton.css">
	<link rel="stylesheet" href="/adm/adm.css" />
    <!-- Scripts
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
					
					<form action="/adm/valid.php" method="post">
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
		  
		//Формирование оператора SQL SELECT 
		$sqlCart = mysql_query("SELECT user FROM user WHERE user = '$login'");
		//Цикл по множеству записей и вывод необходимых записей 
		 while($row = mysql_fetch_array($sqlCart)) 
		 {
		//Присваивание записей 
		$name = $row["user"];
		  } ?>
		
		<div class="nav">
			<div class="row">
				<ul>
					<li class="home"><a href="/adm/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li class="exit"><a class="exit" href="/adm/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a></li>
				</ul>
			</div>
		</div>

		<div class="admin">
			<div class="row top">
				<ul>
					<li><a <?php if ($category == 'polikarbonat') {echo 'class="active"';} ?> href="/adm/index.php?category=polikarbonat">Сотовый</a></li>
					<li><a <?php if ($category == 'monolitny_polikarbonat') {echo 'class="active"';} ?> href="/adm/index.php?category=monolitny_polikarbonat">Монолитный</a></li>
					<li><a <?php if ($category == 'komplektujushhie') {echo 'class="active"';} ?> href="/adm/index.php?category=komplektujushhie">Комплектующие</a></li>
				</ul>
			</div>

			<div class="row">
				<?php if ($category == 'polikarbonat') { ?> 
				
				<div class="one-half column">
					
					<h1>Сотовый поликарбонат Plastilux:</h1>
			
					<?php 
						$i = 1;
						$polikarbonat = mysql_query("SELECT * FROM `". $category ."` WHERE brand = 'Plastilux' order by id asc ");
						while($row = mysql_fetch_assoc($polikarbonat)) { ?>
					
					<form action="/adm/update.php?category=<?php echo $category; ?>&id=<?php echo $row['id']; ?>" method="post" id="<?php echo $i++; ?>">
						<p id="<?php echo $row['id'];?>"><?php echo $row['name']; ?> <?php echo $row['thin']; ?>мм <?php echo $row['brand']; ?></p>
						<ul>
							<li class="price">Прозрачный:</li>
							<li><input type="tel" name="price" value="<?php echo $row['price']; ?>"></li>
							<li>&nbsp;</li>
						</ul>
						<ul>
							<li class="price_color">Цветной:</li>
							<li><input type="tel" name="price_color"  value="<?php echo $row['price_color']; ?>"></li>
							<li class="send"><input type="submit" class="button button-primary" value="Обновить"></li>
						</ul>
					</form>
					<?php } $i++; ?>
			
				</div>
				<div class="one-half column">
					
					<h1>Сотовый поликарбонат Polygal:</h1>
			
					<?php 
						$i = 1;
						$polikarbonat = mysql_query("SELECT * FROM `". $category ."` WHERE brand = 'Polygal' order by id asc ");
						while($row = mysql_fetch_assoc($polikarbonat)) { ?>
					
					<form action="/adm/update.php?category=<?php echo $category; ?>&id=<?php echo $row['id']; ?>"  method="post" id="<?php echo $i++; ?>">
						<p id="<?php echo $row['id'];?>"><?php echo $row['name']; ?> <?php echo $row['thin']; ?>мм <?php echo $row['brand']; ?></p>
						<ul>
							<li class="price">Прозрачный:</li>
							<li><input type="tel" name="price" value="<?php echo $row['price']; ?>"></li>
							<li>&nbsp;</li>
						</ul>
						<ul>
							<li class="price_color">Цветной:</li>
							<li><input type="tel" name="price_color"  value="<?php echo $row['price_color']; ?>"></li>
							<li class="send"><input type="submit" class="button button-primary" value="Обновить"></li>
						</ul>
					</form>
					<?php }  $i++; ?>
			
				</div>
				<?php } elseif ($category == 'monolitny_polikarbonat') { ?> 
				
				<div class="one-half column">
					
					<h1>Монолитный поликарбонат CarboGlass:</h1>
			
					<?php 
						$i = 1;
						$polikarbonat = mysql_query("SELECT * FROM `". $category ."` WHERE brand = 'CarboGlass' order by id asc ");
						while($row = mysql_fetch_assoc($polikarbonat)) { ?>
					
					<form action="/adm/update.php?category=<?php echo $category; ?>&id=<?php echo $row['id']; ?>" method="post" id="<?php echo $i++; ?>">
						<p id="<?php echo $row['id'];?>"><?php echo $row['name']; ?> <?php echo $row['thin']; ?>мм <?php echo $row['brand']; ?></p>
						<ul>
							<li class="price">Прозрачный:</li>
							<li><input type="tel" name="price" value="<?php echo $row['price']; ?>"></li>
							<li>&nbsp;</li>
						</ul>
						<ul>
							<li class="price_color">Цветной:</li>
							<li><input type="tel" name="price_color"  value="<?php echo $row['price_color']; ?>"></li>
							<li class="send"><input type="submit" class="button button-primary" value="Обновить"></li>
						</ul>
					</form>
					<?php } $i++; ?>
					
				</div>
				<div class="one-half column">
					
					<h1>Монолитный поликарбонат Polygal:</h1>
			
					<?php 
						$i = 1;
						$polikarbonat = mysql_query("SELECT * FROM `". $category ."` WHERE brand = 'Polygal' order by id asc ");
						while($row = mysql_fetch_assoc($polikarbonat)) { ?>
					
					<form action="/adm/update.php?category=<?php echo $category; ?>&id=<?php echo $row['id']; ?>"  method="post" id="<?php echo $i++; ?>">
						<p id="<?php echo $row['id'];?>"><?php echo $row['name']; ?> <?php echo $row['thin']; ?>мм <?php echo $row['brand']; ?></p>
						<ul>
							<li class="price">Прозрачный:</li>
							<li><input type="tel" name="price" value="<?php echo $row['price']; ?>"></li>
							<li>&nbsp;</li>
						</ul>
						<ul>
							<li class="price_color">Цветной:</li>
							<li><input type="tel" name="price_color"  value="<?php echo $row['price_color']; ?>"></li>
							<li class="send"><input type="submit" class="button button-primary" value="Обновить"></li>
						</ul>
					</form>
					<?php }  $i++; ?>
			
				</div>

				<?php } elseif ($category == 'komplektujushhie') { ?> 
				
				<div class="one-half columns">
					
					<h1>Комплектующие:</h1>
			
					<?php 
						$i = 1;
						$polikarbonat = mysql_query("SELECT * FROM `". $category ."` order by id asc ");
						while($row = mysql_fetch_assoc($polikarbonat)) { ?>
					
					<form action="/adm/update.php?category=<?php echo $category; ?>&id=<?php echo $row['id']; ?>"  method="post" id="<?php echo $i++; ?>">
						<p id="<?php echo $row['id'];?>"><?php echo $row['name']; ?> <?php echo $row['thin']; ?>мм <?php echo $row['brand']; ?></p>
						<ul>
							<li class="price">Прозрачный:</li>
							<li><input type="tel" name="price" value="<?php echo $row['price']; ?>"></li>
							<li class="send"><input type="submit" class="button button-primary" value="Обновить"></li>
						</ul>
					</form>
					<?php }  $i++; ?>
			
				</div>
				
				<?php } ?>
			</div>
		</div>
				
				
				
				
	<?php } ?>
</body>
</html>