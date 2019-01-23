<?php session_start(); //Запускаем сессии

	// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id'])) { echo '<script language="JavaScript">window.location.href = "/adm/"</script>'; }
    else  { $login=$_SESSION['login']; } 
	
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$id = htmlspecialchars(trim($_GET['id'])); 
	
	#Создаем безопасносе соединение
	$db = new SafeMySQL();
	
	$row = $db->getRow("SELECT * FROM products WHERE id = ?s", $id);
	
	if ($row['category'] == 'alcantara') 	{$category = 'Алькантара';}
	if ($row['category'] == 'mex') 		{$category = 'Мех';}
	if ($row['category'] == 'sheep') 		{$category = 'Овчина';}
	if ($row['category'] == 'len') 		{$category = 'Лен';}
	if ($row['category'] == 'velure') 		{$category = 'Велюр';}
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title><?php echo $row['name']; ?> <?php echo $row['color']; ?></title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
	<link rel="stylesheet" href="/adm/adm.css">
</head>
<body>
<div class="menu">
	<ul>
		<li><a class="home" href="/adm/home.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
		<li><a class="exit" href="/adm/inc/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a></li>
	</ul>
</div>
	<div class="product_page">
		<div class="introHolder">
			<h1><?php echo $row['name']; ?> <?php echo $row['color']; ?></h1>
		</div>
		<div class="row">
			<div class="box">
				<img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"/>
			</div>
		</div>
		
		<form action="/adm/inc/form/edit_page.php" method="post" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="category" value="<?php echo $row['category']; ?>">
		
			<div class="row">
				<div class="box">
					<label for="price" class="control-label">Цена:</label>
					<input id="price" type="tel" class="form-control" name="price" value="<?php echo $row['price']; ?>">				
				</div>
			</div>
			<div class="row">
				<ul class="policy">
					<li><input type="checkbox" name="all"/></li><li>Установить цену у всеx товаров из категории <b><?php echo $category; ?></b></li>
				</ul>
				<input name="button" type="submit" value="ОБНОВИТЬ" class="button button-all">
			</div>
		
		</form>
	</div>
	

</body>
</html>