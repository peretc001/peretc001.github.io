<?php 
session_start(); //Запускаем сессии
include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

$status = htmlspecialchars(trim($_GET['status'])); # определяем статус
$date = htmlspecialchars(trim($_GET['date'])); # определяем дату

$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8'); 

	#Создаем безопасносе соединение
	$db = new SafeMySQL();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Клиенты</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'; ?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
<article class="user">
	<div class="introHolder">
		<h1>Клиенты</h1>
	</div>
	<div class="filter">
		<div class="four columns spec_button">
			<span class="add"><a href="/user/user_add.php"><i class="fa fa-plus-circle" aria-hidden="true"></i> Добавить</a></span> 
			<span class="all"><a href="/user/user.php"><i class="fa fa-address-card-o" aria-hidden="true"></i> Все клиенты</a></span> 
		</div>
		<div class="eight columns filter_button">
			<b>Фильтр:</b>
			<span <?php if ($status == 'new') { echo 'class="active"'; } ?>><a href="/user/user.php?status=new">Новые</a></span> 
			<span <?php if ($status == 'checked') { echo 'class="active"'; } ?> ><a href="/user/user.php?status=checked">Без документов</a></span> 
			<span <?php if ($status == 'disabled') { echo 'class="active"'; } ?> ><a href="/user/user.php?status=disabled">Заблокированные</a></span> 
			<?php if ($status != '') { ?><a class="del" href="/user/user.php"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php } ?>
		</div>
	</div>
	<div class="row top">
		<div class="col usernumber">
			<b>N</b>
		</div>
		<div class="col userstatus">
			<b>Статус</b>
		</div>
		<div class="col userfio">
			<b>ФИО</b>
		</div>
		<div class="col userphone">
			<b>Телефон</b>
		</div>
		<div class="col userdate">
			<b>Дата</b>
		</div>
		<div class="col useremail">
			<b>E-mail</b>
		</div>
		<div class="col usermanager">
			<b>Менеджер</b>
		</div>
	</div>
	<?php 
		if ($status == '') { $user = $db->getAll('SELECT * FROM user ORDER by id desc'); }
		else { $user = $db->getAll('SELECT * FROM user WHERE status=?s ORDER by id desc', $status); }
		foreach ($user as $row) {   ?>
		
		<div class="row <?php if ($row['status'] == 'checked') { echo 'checked'; } 
				elseif ($row['status'] == 'confirmed') { echo 'confirmed'; } 
				elseif ($row['status'] == 'disabled') { echo 'disabled'; } 
				else { echo 'new'; } ?>">
			
			<div class="col usernumber">
				<?php echo $row['id']; ?>
			</div>
			<div class="col userstatus">
				<?php 	if ($row['status'] == 'checked') { echo '<i class="fa fa-address-card-o" aria-hidden="true" title="Требуются документы"></i>'; } 
						elseif ($row['status'] == 'confirmed') { echo '<i class="fa fa-check-square-o" aria-hidden="true"  title="ОК"></i>'; } 
						elseif ($row['status'] == 'new')  { echo '<i class="fa fa-phone-square" aria-hidden="true"  title="Требуется звонок"></i>'; }
						elseif ($row['status'] == 'disabled')  { echo '<i class="fa fa-lock" aria-hidden="true" title="Заблокирован"></i>'; } ?>&nbsp;
			</div>
			<div class="col userfio">
				<a href="/user/user_page.php?id=<?php echo $row['id']; ?>"><?php echo $row['userfirstname']; ?> <?php echo $row['username']; ?> <?php echo $row['userlastname']; ?></a>
			</div>
			<div class="col userphone">
				<?php echo $row['phone']; ?>
			</div>
			<div class="col userdate">
				<?php echo date("d.m.Y", strtotime($row['date'])); ?>
			</div>
			<div class="col useremail">
				<?php if($row['email'] == '') { echo '&nbsp;'; } else { echo $row['email']; } ?>
			</div>
			<div class="col usermanager">
				<?php echo $row['manager']; ?>
			</div>
		</div>
	
	
	<?php } ?>
</article>