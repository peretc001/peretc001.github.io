<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php'; 

	#Для поиска
	$company_name 	= htmlspecialchars(trim($_GET['company_name']));
	$company_code 	= htmlspecialchars(trim($_GET['company_code']));
	$company_region = htmlspecialchars(trim($_GET['company_region']));
	$company_adres 	= htmlspecialchars(trim($_GET['company_adres']));
	$company_phone 	= htmlspecialchars(trim($_GET['company_phone']));
	$company_email 	= htmlspecialchars(trim($_GET['company_email']));
	$company_about 	= htmlspecialchars(trim($_GET['company_about']));
	$company_date_post		= htmlspecialchars(trim($_GET['company_date']));
	if($company_date_post) {
		$company_date 		= date('Y-m-d', strtotime($company_date_post));
	}
	$company_time 		= htmlspecialchars(trim($_GET['company_time']));
	$company_manager 	= htmlspecialchars(trim($_GET['company_manager']));
	
	$start_date = date('Y-m-d');
	$end_date 	= 	date( "Y-m-d", strtotime( "$start_date +7 day" ) );
	if($company_date >= $start_date and $company_date <= $end_date) { $start_date =  $company_date; $end_date = $company_date; }

	$_SESSION['home'] = $_SERVER['REQUEST_URI'];


	#Создаем безопасносе соединение
	$db = new SafeMySQL(); 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Клиентская база</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'); ?>
	<section class="filter show_filter_block collapse" id="filter">
		<div class="container-fluid">
			<form action="/home.php" method="get" id="search_form">
				
			<div class="row">
				
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_name">Название</label>
						<div class="uk-form-icon">
							<input id="company_name" type="text" name="company_name" class="form-control" value="<?php echo $company_name; ?>" placeholder="Название" />
							<?php if($company_name) { echo '<i class="fas fa-times clear_input_name"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_code">ИНН</label>
						<div class="uk-form-icon">
							<input id="company_code" type="text" name="company_code" class="form-control" value="<?php echo $company_code; ?>" placeholder="ИНН" />
							<?php if($company_code) { echo '<i class="fas fa-times clear_input_code"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_region">Регион</label>
						<div class="uk-form-icon">
							<input id="company_region" type="text" name="company_region" class="form-control" value="<?php echo $company_region; ?>" placeholder="Регион" />
							<?php if($company_region) { echo '<i class="fas fa-times clear_input_region"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_adres">Адрес</label>
						<div class="uk-form-icon">
							<input id="company_adres" type="text" name="company_adres" class="form-control" value="<?php echo $company_adres; ?>" placeholder="Адрес" />
							<?php if($company_adres) { echo '<i class="fas fa-times clear_input_adres"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_phone">Телефон</label>
						<div class="uk-form-icon">
							<input id="company_phone" type="tel" name="company_phone" class="form-control" value="<?php echo $company_phone; ?>" placeholder="Телефон" />
							<?php if($company_phone) { echo '<i class="fas fa-times clear_input_phone"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_email">E-mail</label>
						<div class="uk-form-icon">
							<input id="company_email" type="text" name="company_email" class="form-control" value="<?php echo $company_email; ?>" placeholder="E-mail" />
							<?php if($company_email) { echo '<i class="fas fa-times clear_input_email"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_about">Описание</label>
						<div class="uk-form-icon">
							<input id="company_about" type="text" name="company_about" class="form-control" value="<?php echo $company_about; ?>" placeholder="Описание" />
							<?php if($company_about) { echo '<i class="fas fa-times clear_input_about"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_date">Дата</label>
						<div class="uk-form-icon">
							<input type="text" id="date_format" name="company_date" class="btn btn-date" value="<?php echo $company_date_post; ?>"
							data-uk-datepicker="{format:'DD.MM.YYYY', i18n:{months:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'], weekdays: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']}}" readonly/>
							<?php if($company_date) { echo '<i class="fas fa-times clear_input_date"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_time">Время</label>
						<div class="uk-form-icon">
							<input type="text" id="form-time" class="btn btn-time"  name="company_time" value="<?php echo $company_time; ?>" data-uk-timepicker="{start:8, end:21}" readonly />
							<?php if($company_time) { echo '<i class="fas fa-times clear_input_time"></i>'; } ?>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label for="company_manager">Менеджер</label>
							<select class="custom-select" name="company_manager" />
								<option <?php if($company_manager == $list['name']) { echo 'selected'; } ?>><?php echo $list['name']; ?></option>
							<?php 
									$manager_list = $db->getAll('SELECT * FROM `manager` ORDER by name desc'); 
										foreach ($manager_list as $list) { 
							?>
							<option <?php if($company_manager == $list['name']) { echo 'selected'; } ?>><?php echo $list['name']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label class="d-none d-sm-block">&nbsp;</label>
						<button tyle="submit" class="btn btn-success">Найти</button>
					</div>
				</div>
				<div class="col-6 col-md-3 col-lg-2">
					<div class="form-group">
						<label class="d-none d-sm-block">&nbsp;</label>
						<a href="/home.php" class="btn btn-outline-secondary">Очистить</a>
					</div>
				</div>
			
			</div>
			</form>
		</div>
	</section>

	<section class="company_list">
		<div class="container-fluid">
			<div class="row">
			
			<?php

				$i = 1;
				$w = array();
				$where = '';
					

				if ($company_name) 		$w[] = $db->parse("company_name LIKE ?s", "%$company_name%");
				if ($company_code) 		$w[] = $db->parse("company_code LIKE ?s", "%$company_code%");
				if ($company_region) 	$w[] = $db->parse("company_region LIKE ?s", "%$company_region%");
				if ($company_adres) 	$w[] = $db->parse("company_adres LIKE ?s", "%$company_adres%");
				if ($company_phone) 	$w[] = $db->parse("company_phone LIKE ?s", "%$company_phone%");
				if ($company_email) 	$w[] = $db->parse("company_email LIKE ?s", "%$company_email%");
				if ($company_about) 	$w[] = $db->parse("company_about LIKE ?s", "%$company_about%");
				if ($company_manager) 	$w[] = $db->parse('company_manager = ?s', $company_manager);
				if ($company_date) 		$w[] = $db->parse('company_date = ?s', $company_date);
				if ($company_time) 		$w[] = $db->parse("company_time = ?s", $company_time);
				

				//if ($company_time) 		$w[] = $db->parse("company_time = ?s", $company_time);
							
				if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);

				$company_list = $db->getAll("SELECT * FROM `company` ?p ORDER by company_name asc", $where); ?>
							
					
				<div class="col-md-6 order-2 order-md-12">
					<p class="company_list_name">
						Все организации
					</p>
					<div class="company_list_block">
						<div class="row company_list_block__header">
							<div class="col-4">Название</div>
							<div class="col-5">Регион</div>
							<div class="col-3">Телефон</div>
						</div>	
						<?php if ($company_list) {

						foreach ($company_list as $row) {   
						?>	
						<a href="/company_page.php?id=<?php echo $row['id']?>" class="row company_items">
							<div class="col-6 col-sm-4"><b><?php echo $row['company_name']?></b></div>
							<div class="col-6 col-sm-5"><?php echo $row['company_region']?></div>
							<div class="col-12 col-sm-3"><?php echo $row['company_phone']?></div>
							<?php $event = $db->getRow('SELECT * FROM `event` WHERE company_id = ?s ORDER by event_date desc', $row['id']); 
							?><div class="col-12 col-sm-8 company_list_block__desc"><?php if($event) { echo '<u>'. date('d.m.Y', strtotime($event['event_date'])) .'</u> '. $event['event_msg']; } ?></div>
							<div class="col-6 col-sm-2 company_list_block__time"><?php if($row['company_time'] and $row['company_time'] != '00:00:00') { ?><span class="btn btn-outline-secondary"><?php echo date('H:i', strtotime($row['company_time'])); ?></span><?php } ?></div>
							<div class="col-6 col-sm-2 company_list_block__date"><?php if($row['company_date'] and $row['company_date'] != '0000-00-00') { ?><span class="btn btn-outline-secondary"><?php echo date('d.m.Y', strtotime($row['company_date'])); ?></span><?php } ?></div>
						</a>	
					<?php } }  else { ?>	
						<div class="no_find"><i class="far fa-meh"></i><br>ничего не найдено...</div>	
					<?php } ?>	
					</div>
				</div>
				
				
				<?php

					$i = 1;
					$w = array();
					$where = '';
						

					if ($_SESSION['role'] == 'manager') 						$w[] = $db->parse("company_manager = ?s", $_SESSION['name']);
					if ($_SESSION['role'] != 'manager' and $company_manager) 	$w[] = $db->parse("company_manager = ?s", $company_manager);
					
					if ($company_name) 		$w[] = $db->parse("company_name LIKE ?s", "%$company_name%");
					if ($company_code) 		$w[] = $db->parse("company_code LIKE ?s", "%$company_code%");
					if ($company_region) 	$w[] = $db->parse("company_region LIKE ?s", "%$company_region%");
					if ($company_adres) 	$w[] = $db->parse("company_adres LIKE ?s", "%$company_adres%");
					if ($company_phone) 	$w[] = $db->parse("company_phone LIKE ?s", "%$company_phone%");
					if ($company_email) 	$w[] = $db->parse("company_email LIKE ?s", "%$company_email%");
					if ($company_about) 	$w[] = $db->parse("company_about LIKE ?s", "%$company_about%");
					if ($company_time) 		$w[] = $db->parse("company_time = ?s", $company_time);
					
					if ($company_date) 		{
						$w[] = $db->parse('company_date >= ?s and company_date <= ?s', $start_date, $end_date);
					} else {
						$w[] = $db->parse('company_date >= ?s and company_date <= ?s', $start_date, $end_date);
					}

					if (count($w)) 	$where = "WHERE ". implode(' AND ', $w);
							
					$sort = 'desc';
					$company_list_control = $db->getAll("SELECT * FROM `company` ?p ORDER by company_date ". $sort .", company_time ". $sort, $where); ?>

					
				<div class="col-md-6 order-1 order-md-12" id="sort_block">
					<a class="sort" data-sort="date_item"><i class="fas fa-sort"></i> <span>По дате</span></a>
					<p class="company_list_name">
						На контроле: с <?php echo date('d.m.Y', strtotime($start_date)); ?> по <?php echo date('d.m.Y', strtotime($end_date)); ?> 
					</p>
					<div class="company_list_block control">
						<div class="row company_list_block__header">
							<div class="col-4">Название</div>
							<div class="col-5">Регион</div>
							<div class="col-3">Телефон</div>
						</div>

						<?php if ($company_list_control) { ?><ul class="list"><?php
						

							foreach ($company_list_control as $row) {   
							?>	
							<li>
								<a href="/company_page.php?id=<?php echo $row['id']?>" class="row company_items date_item" data-timestamp="<?php 
									$date_item = new DateTime($row['company_date'] . $row['company_time']);
									echo $date_item->getTimestamp();
									?>">
									<div class="col-6 col-sm-4"><b><?php echo $row['company_name']?></b></div>
									<div class="col-6 col-sm-5"><?php echo $row['company_region']?></div>
									<div class="col-12 col-sm-3"><?php echo $row['company_phone']?></div>
									<?php $event = $db->getRow('SELECT * FROM `event` WHERE company_id = ?s ORDER by event_date desc', $row['id']); 
									?><div class="col-12 col-sm-8 company_list_block__desc"><?php if($event) { echo '<u>'. date('d.m.Y', strtotime($event['event_date'])) .'</u> '. $event['event_msg']; } ?></div>
									<div class="col-6 col-sm-2 company_list_block__time"><?php if($row['company_time'] and $row['company_time'] != '00:00:00') { ?><span class="btn btn-dark"><?php echo date('H:i', strtotime($row['company_time'])); ?></span><?php } ?></div>
									<div class="col-6 col-sm-2 company_list_block__date"><?php if($row['company_date'] and $row['company_date'] != '0000-00-00') { ?><span class="btn btn-dark"><?php echo date('d.m.Y', strtotime($row['company_date'])); ?></span><?php  } ?></div>
								</a>
							</li>	
						<?php } ?></ul>	
					<?php } else { ?>	
						<div class="no_find"><i class="far fa-meh"></i><br>ничего не найдено...</div>
					<?php } ?>	
					</div>
				</div>

			</div>

		</div>
	</section>

	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>
	<script>
		var options = {
			valueNames: [{ name: 'date_item', attr: 'data-timestamp' }]
		};

		var sortList = new List('sort_block', options);
	</script>