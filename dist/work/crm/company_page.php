<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

	$id = htmlspecialchars(trim($_GET['id'])); # определяем статус

	#Создаем безопасносе соединение
	$db = new SafeMySQL();
	
	$row = $db->getRow('SELECT * FROM `company` WHERE id = ?s', $id);

	$company_name = $row['company_name'];
	$company_code = $row['company_code'];
	$company_region = $row['company_region'];
	$company_adres = $row['company_adres'];
	$company_phone = $row['company_phone'];
	$company_email = $row['company_email'];
	$company_about = $row['company_about'];
	$company_manager = $row['company_manager'];
	$company_date = $row['company_date'];
	$company_time = $row['company_time'];
	
	$start_date = date('Y-m-d');
	$end_date = date('Y-m-d', strtotime('+7 days'));

	if 		($_SESSION['role'] == 'admin') 																{ $disabled = ''; }
	elseif	($_SESSION['role'] == 'manager') 															{ $disabled = ''; $disabled_manager = 'disabled'; }
	elseif 	($_SESSION['role'] == '' or $_SESSION['role'] == 'guest') 									{ $disabled = 'disabled'; }
	if 		($_SESSION['role'] != 'admin' and $_SESSION['name'] != $company_manager) 					{ $disabled = 'disabled'; }
?>
<!DOCTYPE html>
<html lang="ru">
<head> 
	<title><?php echo $company_name; ?></title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
<body class="is-company">
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'); ?>
	<section class="company_page">
		<div class="container-fluid">
			<?php if ($disabled == '') { ?>	
			<form action="/inc/action/edit_company.php" method="post" class="edit_company_ajax">
				<input type="hidden" name="id" value="<?php echo $id; ?>"><?php } ?>	

				<div class="row company_page_menu">
					
				<?php if ($disabled == '') { ?>
				
					
					<button class="btn btn-success">Сохранить</button><?php } ?>	
					<a href="<?php echo $_SESSION['home']; ?>" class="btn btn-outline-secondary close_page">Закрыть</a>
					<span class="block_on_mobile">
						<div class="company_page_menu__date <?php if ($company_date >= $start_date and $company_date <= $end_date) { echo 'danger'; } ?>">
							<label for="date_format">Дата</label>
							<input type="text" id="date_format" name="company_date" class="btn btn-date <?php if ($company_date >= $start_date and $company_date <= $end_date) { echo 'btn-danger'; } ?> ecj"
										data-uk-datepicker="{format:'DD.MM.YYYY', i18n:{months:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'], weekdays: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']}}"
										value="<?php if($company_date and $company_date != '0000-00-00') { echo date('d.m.Y', strtotime($company_date)); } ?>" readonly <?php echo $disabled; ?>/>
							<?php if($disabled == '' and $company_date and $company_date != '0000-00-00') { echo '<i class="fas fa-times clear_input_date company"></i>'; } ?>
						</div>					
						<div class="company_page_menu__time <?php if ($company_date >= $start_date and $company_date <= $end_date) { echo 'danger'; } ?>">
							<label for="form-time">Время</label>
							<input type="text" id="form-time" class="btn btn-time <?php if ($company_time and $company_time != '00:00:00' and $company_date >= $start_date and $company_date <= $end_date) { echo 'btn-dark'; } ?> ecj"  name="company_time"
								value="<?php if($company_time and $company_time != '00:00:00') { echo date('H:i', strtotime($company_time)); } ?>" data-uk-timepicker="{start:8, end:21}" readonly <?php echo $disabled; ?>/>
								<?php if($disabled == '' and $company_time and $company_time != '00:00:00') { echo '<i class="fas fa-times clear_input_time company"></i>'; } ?>
						</div>
						<div class="company_page_menu__manager">
							<label for="company_manager">Менеджер</label>
							<select class="custom-select ecj" name="company_manager" <?php 
								//Блокируем select
								if ($_SESSION['role'] == 'manager' or $_SESSION['role'] == '' or $_SESSION['role'] == 'guest') { 
									echo 'disabled';
								} ?>/>
								<option></option>
								<?php 
									$manager_list = $db->getAll('SELECT * FROM `manager` ORDER by name desc'); 
										foreach ($manager_list as $list) { ?>
									<option value="<?php echo $list['name']?>" <?php if ($company_manager == $list['name']) { echo ' selected'; } ?>><?php echo $list['name']; ?></option>
								<?php } ?>
								
									
							</select>
						</div>
					</span>
					
				</div>

				<div class="row company_page_card">

					<div class="col-lg-4">
						<div class="company_page_block">
							<button class="show_company_info" type="button" data-toggle="collapse" data-target="#company_info"
								aria-expanded="false" aria-controls="company_info" ><i class="fas fa-caret-up"></i></button>
							<div class="company_info collapse show" id="company_info">
								<div class="form-group row">
									<label for="company_name" class="col-sm-3 col-form-label">Название</label>
									<div class="col-sm-9">
										<input id="company_name" type="text" name="company_name" class="form-control ecj" value="<?php echo htmlspecialchars($company_name); ?>" placeholder="Название" <?php echo $disabled; ?>/>
									</div>
								</div>
								<div class="form-group row">
									<label for="company_code" class="col-sm-3 col-form-label">ИНН</label>
									<div class="col-sm-9">
										<input id="company_code" type="tel" name="company_code" class="form-control ecj" value="<?php echo $company_code; ?>" placeholder="ИНН" <?php echo $disabled; ?>/>
									</div>
								</div>
								<div class="form-group row">
									<label for="company_region" class="col-sm-3 col-form-label">Регион</label>
									<div class="col-sm-9 region_list">
										<input id="company_region" type="text" name="company_region" class="form-control ecj" value="<?php echo $company_region; ?>" placeholder="Регион" <?php echo $disabled; ?>/>
									</div>
								</div>
								<div class="form-group row">
									<label for="company_adres" class="col-sm-3 col-form-label">Адрес</label>
									<div class="col-sm-9">
										<input id="company_adres" type="text" name="company_adres" class="form-control ecj" value="<?php echo $company_adres; ?>" placeholder="Адрес" <?php echo $disabled; ?>/>
									</div>
								</div>
								<div class="form-group row">
									<label for="company_phone" class="col-sm-3 col-form-label">Телефон</label>
									<div class="col-sm-9">
										<input id="company_phone" type="tel" name="company_phone" class="form-control ecj" value="<?php echo $company_phone; ?>" placeholder="Телефон" <?php echo $disabled; ?>/>
									</div>
								</div>
								<div class="form-group row">
									<label for="company_email" class="col-sm-3 col-form-label">E-mail</label>
									<div class="col-sm-9">
										<input id="company_email" type="email" name="company_email" class="form-control ecj" value="<?php echo $company_email; ?>" placeholder="E-mail" <?php echo $disabled; ?>/>
									</div>
								</div>
								<div class="form-group">
									<label for="company_about">Описание</label>
									<textarea id="company_about" type="text" name="company_about" class="form-control ecj" rows="10" placeholder="Описание" <?php echo $disabled; ?>/><?php echo $company_about; ?></textarea>
								</div>
							</div>
						</div>
					</div>

				<?php if ($disabled == '') { ?></form><?php } ?>

				<div class="col-md-6 col-lg-4">
					<div class="company_page_event" id="event_block">
						<div class="company_page_event__header">
							<span>Переговоры:</span><?php if ($disabled == '') { ?>	
							<button class="btn btn-warning btn-sm" type="button" data-toggle="collapse" data-target="#event"
								aria-expanded="false" aria-controls="event" <?php echo $disabled; ?>/>Добавить</button>
						</div>
						<div class="company_page_event__add collapse" id="event">
							<form action="/inc/action/add_event.php" method="post" class="company_page_ajax_form_event">
								<input type="hidden" name="company_id" value="<?php echo $id; ?>">
								<p><label for="date_format_event">Дата</label>
									<input type="text" id="date_format_event" name="event_date" class="btn btn-date"
										data-uk-datepicker="{format:'DD.MM.YYYY', i18n:{months:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'], weekdays: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']}}"
										value="<?php echo date('d.m.Y'); ?>" readonly <?php echo $disabled; ?>/>
								</p>
								<p class="form-group">
									<label for="event_msg">Описание</label>
									<textarea id="event_msg" type="text" name="event_msg" class="form-control" rows="5" placeholder="Описание" <?php echo $disabled; ?>/></textarea>
								</p>
								<p>
									<button type="submit" class="btn btn-success btn-sm" <?php echo $disabled; ?>/>Сохранить</button>
								</p>
							</form><?php } ?>	
						</div>
						<div class="company_page_event_block"><?php 	
							$event = $db->getAll('SELECT * FROM `event` WHERE company_id = ?s ORDER by event_date desc', $id); 
								if ($event) {

									foreach ($event as $row) { 
									
						?>
							<div class="company_page_event_block_card">
								<p class="company_page_event_block_card__date"><?php echo date('d.m.Y', strtotime($row['event_date'])); ?></p>
								<p><?php echo $row['event_msg']?></p>
								<?php if ($disabled == '') { ?><div class="dropdown">
									<button class="fas fa-ellipsis-v" type="button" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<form action="/inc/action/delete_event.php" method="post" class="delete_event">
											<input type="hidden" name="company_id" value="<?php echo $id; ?>">
											<input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
											<button type="submit" class="dropdown-item"><i class="far fa-trash-alt"></i> Удалить</button>
										</form>
									</div>
								</div><?php } ?>	
							</div>
							<?php } } else {
									echo '<div class="company_page_event_block_card empty"><p>пока тут пусто...</p></div>';
								} ?>	
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4">
					<div class="company_page_contact">
						<div class="company_page_contact__header">
							<span>Контакты:</span><?php if ($disabled == '') { ?>	
							<button class="btn btn-warning btn-sm" type="button" data-toggle="collapse" data-target="#contact"
								aria-expanded="false" aria-controls="contact" <?php echo $disabled; ?>/>Добавить</button>
						</div>
						<div class="company_page_contact__add collapse" id="contact">
							<form action="/inc/action/add_contact.php" method="post" class="company_page_ajax_form_contact">
								<input type="hidden" name="company_id" value="<?php echo $id; ?>">
								<p>
									<label for="contact_name" class="col-sm-3 col-form-label">ФИО</label>
									<input id="contact_name" type="text" name="contact_name" class="form-control" value="" placeholder="ФИО" <?php echo $disabled; ?>/>
								</p>
								<p>
									<label for="contact_job" class="col-sm-3 col-form-label">Должность</label>
									<input id="contact_job" type="text" name="contact_job" class="form-control" value="" placeholder="Должность" <?php echo $disabled; ?>/>
								</p>
								<p>
									<label for="contact_phone" class="col-sm-3 col-form-label">Телефон</label>
									<input id="contact_phone" type="tel" name="contact_phone" class="form-control" value=""
										placeholder="Телефон" <?php echo $disabled; ?>/>
								</p>
								<p>
									<button type="submit" class="btn btn-success btn-sm" <?php echo $disabled; ?>/>Сохранить</button>
								</p>
							</form><?php } ?>	
						</div>
						<div class="company_page_contact_block"><?php 	
							$contact = $db->getAll('SELECT * FROM `contact` WHERE company_id = ?s ORDER by id desc', $id); 
								if ($contact) {
									foreach ($contact as $row) { 
						?>	
							<div class="company_page_contact_block_card">
								<p class="company_page_contact_block_card__name"><b><?php echo $row['contact_name']?></b> - <?php echo $row['contact_job']?></p>
								<p><?php echo $row['contact_phone']?></p>
								<?php if ($disabled == '') { ?><div class="dropdown">
									<button class="fas fa-ellipsis-v" type="button" data-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<form action="/inc/action/delete_contact.php" method="post" class="delete_contact">
											<input type="hidden" name="company_id" value="<?php echo $id; ?>">
											<input type="hidden" name="contact_id" value="<?php echo $row['id']; ?>">
											<button type="submit" class="dropdown-item"><i class="far fa-trash-alt"></i> Удалить</button>
										</form>
									</div>
								</div><?php } ?>
							</div>
							<?php } } else {
									echo '<div class="company_page_event_block_card empty"><p>пока тут пусто...</p></div>';
								} ?>	
						</div>
					</div>
				</div>

			</div>

		</div>
	</section>

	<?php if ($_SESSION['role'] == 'admin') { ?><a class="delete_company" href="/inc/action/delete_company.php?id=<?php echo $id; ?>">Удалить компанию</a><?php } ?>		
	
	<script>
		document.addEventListener('DOMContentLoaded', () => {
			var home = localStorage.getItem('home_page');
			localStorage.setItem('home_page', '<?php echo $_SESSION['home']; ?>');

			var company_page = localStorage.getItem('company_page');
			localStorage.setItem('company_page', '<?php echo $id; ?>');
		});
	</script>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>