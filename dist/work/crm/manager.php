<?php session_start();
	
	
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

	$id = htmlspecialchars(trim($_GET['id'])); # определяем managera

	#Создаем безопасносе соединение
	$db = new SafeMySQL();
	
	$row = $db->getRow('SELECT * FROM manager WHERE id = ?s', $id);

	$img = 		$row['img'];
	$login = 	$row['login'];
	$password = $row['password'];
	$name = 	$row['name'];
	$role = 	$row['role'];

	if 	($_SESSION['role'] == '' or $_SESSION['role'] == 'guest') 		{ header('Location: /home.php'); }
	if  ($_SESSION['role'] != 'admin' and $_SESSION['name'] != $name) 	{ header('Location: /home.php'); }
?>
<!DOCTYPE html>
<html lang="ru">
<head> 
	<title>Профиль - <?php echo $name; ?></title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
<body class="is-company">
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'); ?>

	<section class="manager_page">
		<div class="container">
			<form action="/inc/action/edit_manager.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<p class="text-center"><b>
						<?php echo $name; ?>
					</b></p>
					<div class="form-group row">
						<label for="name" class="col-sm-3 col-form-label">Имя</label>
						<div class="col-sm-9">
							<input id="name" type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Фамилия Имя" />
						</div>
					</div>
					<?php if($img) { ?><div class="form-group row manager_page__img">
						<img src="/img/manager/<?php echo $img; ?>" alt="">
						<a href="/inc/action/delete_manager_img.php?id=<?php echo $id; ?>"><i class="far fa-trash-alt"></i> Удалить</a>
					</div><?php } ?>
					<div class="form-group row">
						<label for="login" class="col-sm-3 col-form-label">Изображение</label>
						<div class="col-sm-9">
							<span class="control-fileupload">
						        <label for="file">&nbsp;</label>
						        <input type="file" id="file" name="file">
					        </span>
					        <small>Рекомендуемый размер 50x50px</small>
						</div>
					</div>
					<div class="form-group row">
						<label for="login" class="col-sm-3 col-form-label">Логин</label>
						<div class="col-sm-9">
							<input id="login" type="text" name="login" class="form-control" value="<?php echo $login; ?>" placeholder="Логин" />
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-3 col-form-label">Пароль</label>
						<div class="col-sm-9">
							<input id="password" type="text" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Пароль" />
						</div>
					</div>
					<?php if ($_SESSION['role'] == 'admin') { ?>
					<div class="form-group row">
						<label for="role" class="col-sm-3 col-form-label">Права</label>
						<div class="col-sm-9">
							<select class="custom-select" name="role" />
								<option <?php if ($role == 'admin') 	{ echo 'selected'; } ?> 	value="admin">Админ</option>
								<option <?php if ($role == 'manager') 	{ echo 'selected'; } ?> 	value="manager">Менеджер</option>
								<option <?php if ($role == 'guest') 	{ echo 'selected'; } ?> 	value="guest">Гость</option>
							</select>
						</div>
					</div>
					<?php } ?>	
					<p>
						<button type="submit" class="btn btn-success mt-2 w-100">Сохранить</button>
					</p>
				</div>
			</div>
			</form>
			
			<?php if ($_SESSION['role'] == 'admin' and $role == 'admin') { ?>
			<div class="row manager_list">
				<div class="col-md-6 offset-md-3 text-center">
					
					<div class="manager_list__header">
						<span>Менеджеры:</span>	
						<button class="btn btn-warning btn-sm" type="button" data-toggle="collapse" data-target="#add_manager"
							aria-expanded="false" aria-controls="add_manager"/>Добавить</button>
					</div>
					<div class="manager_list__add collapse" id="add_manager">
						<form action="/inc/action/add_manager.php" method="post">
							<div class="form-group row">
								<label for="manager_name" class="col-sm-3 col-form-label">Имя</label>
								<div class="col-sm-9">
									<input id="manager_name" type="text" name="name" class="form-control" value="" placeholder="Фамилия Имя" />
								</div>
							</div>
							<div class="form-group row">
								<label for="manager_login" class="col-sm-3 col-form-label">Логин</label>
								<div class="col-sm-9">
									<input id="manager_login" type="text" name="login" class="form-control" value="" placeholder="Логин" />
								</div>
							</div>
							<div class="form-group row">
								<label for="manager_password" class="col-sm-3 col-form-label">Пароль</label>
								<div class="col-sm-9">
									<input id="manager_password" type="text" name="password" class="form-control" value="" placeholder="Пароль" />
								</div>
							</div>
							<div class="form-group row">
								<label for="role" class="col-sm-3 col-form-label">Права</label>
								<div class="col-sm-9">
									<select class="custom-select" name="role"/>
										<option value="admin">Админ</option>
										<option value="manager">Менеджер</option>
										<option value="guest">Гость</option>
									</select>
								</div>
							</div>
							<p>
								<button type="submit" class="btn btn-success w-100">Добавить</button>
							</p>
						</form>
					</div>

					<?php 	
					//Фдмины
						$manager_list = $db->getAll('SELECT * FROM `manager` WHERE role = "admin" ORDER by name asc'); 
							foreach ($manager_list as $list) { ?>	
					<div class="manager_list__item">
						<p><b><a href="/manager.php?id=<?php echo $list['id']; ?>"><?php echo $list['name']; ?></a></b> (админ)</p><?php 
							$count = $db->getCol('SELECT COUNT(id) FROM company WHERE company_manager = ?s', $list['name']); 
						?>	
						<p><a href="/home.php?company_manager=<?php echo $list['name']; ?>"><span><?php echo $count[0]; ?></span></a></p>
					</div>
					<?php  }
					//Менеджеры
						$manager_list = $db->getAll('SELECT * FROM `manager` WHERE role = "manager" ORDER by name asc'); 
							foreach ($manager_list as $list) { ?>	
					<div class="manager_list__item">
						<p><a href="/manager.php?id=<?php echo $list['id']; ?>"><?php echo $list['name']; ?></a></p><?php 
							$count = $db->getCol('SELECT COUNT(id) FROM company WHERE company_manager = ?s', $list['name']); 
						?>	
						<p><a href="/home.php?company_manager=<?php echo $list['name']; ?>"><span><?php echo $count[0]; ?></span></a></p>
					</div>	
					<?php } 
					//Гость в конце
						$manager_list = $db->getAll('SELECT * FROM `manager` WHERE role = "guest" ORDER by name asc'); 
							foreach ($manager_list as $list) { ?>	
					<div class="manager_list__item">
						<p><a href="/manager.php?id=<?php echo $list['id']; ?>"><?php echo $list['name']; ?></a></p><?php 
						$count = $db->getCol('SELECT COUNT(id) FROM company WHERE company_manager = ?s', $list['name']); 
						?>	
						<p><a href="/home.php?company_manager=<?php echo $list['name']; ?>"><span><?php echo $count[0]; ?></span></a></p>
					</div>
					<?php } ?>

				</div>
			</div>
			<?php } ?>

		</div>
	</section>
	<input id="company_region" type="hidden" />
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>