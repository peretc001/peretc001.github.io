<?php session_start(); //Запускаем сессии
	
	// Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id'])) { echo '<script language="JavaScript">window.location.href = "/adm/"</script>'; }
    else  { $login=$_SESSION['login']; } 

include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Zakaz | avtonakidki</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<link rel="stylesheet" href="/adm/adm.css">
</head>
<body>
<div class="menu">
	<ul>
		<li><a class="home" href="/adm/home.php"><i class="fa fa-home" aria-hidden="true"></i></a> <a class="zakaz" href="/adm/zakaz.php">Заказы</a></li>
		<li><a class="exit" href="/adm/inc/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a></li>
	</ul>
</div>
<div class="product_list">
	<div class="introHolder">
		<h1>Заказы</h1>
	</div>
	<div class="row">
	<?php 
		$products = $db->getAll('SELECT * FROM zakaz ORDER by id asc' ); 
		foreach ($products as $row) {   
		?>
		
		<div id="<?php echo $row['id']; ?>" class="box<?php if($select != '' and $row['id'] == $select) { echo ' select'; } if($select_category != '' and $row['category'] == $select_category) { echo ' select_category'; } ?>">
			<p><a href="/adm/page.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?> <?php echo $row['color']; ?></a></p>
			<a href="/adm/page.php?id=<?php echo $row['id']; ?>"><img src="/img/catalog/<?php echo $row['category']; ?>/<?php echo $row['img']; ?>"></a>
			<p class="price"><span><?php echo $row['price']; ?></span> р.</p>
		</div>
		<?php } ?>
		
	</div>
</div>
<br><br>
