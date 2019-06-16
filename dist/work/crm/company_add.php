<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

	if 		($_SESSION['role'] == 'admin') 								{ $disabled = ''; }
	elseif	($_SESSION['role'] == 'manager') 							{ $disabled = ''; $disabled_manager = 'disabled'; }
	elseif 	($_SESSION['role'] == '' or $_SESSION['role'] == 'guest') 	{ echo '<script language="JavaScript">window.location.href = "/home.php"</script>'; }

	#Создаем безопасносе соединение
	$db = new SafeMySQL();

?>
<!DOCTYPE html>
<html lang="ru">
<head> 
	<title>Добавить компанию</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'); ?>
<body>
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'); ?>
	<section class="company_page">
		<div class="container-fluid">
			<form action="/inc/action/add_company.php" method="post">
				<div class="row company_page_menu">
					<button class="btn btn-success">Сохранить</button>
					<a href="/home.php" class="btn btn-outline-secondary close_page">Закрыть</a>
					<span class="block_on_mobile">
						<div class="company_page_menu__date">
							<label for="date_format">Дата</label>
							<input type="text" id="date_format" name="company_date" class="btn btn-date ecj"
										data-uk-datepicker="{format:'DD.MM.YYYY', i18n:{months:['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'], weekdays: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб']}}"
										value="" readonly />
						</div>					
						<div class="company_page_menu__time">
							<label for="form-time">Время</label>
							<input type="text" id="form-time" class="btn btn-time ecj"  name="company_time"
								value="" data-uk-timepicker="{start:8, end:21}" readonly <?php echo $disabled; ?> />
						</div>
						<div class="company_page_menu__manager">
							<label for="company_manager">Менеджер</label>
							<select class="custom-select ecj" name="company_manager">
								<?php 
								if($disabled_manager) {
									echo '<option selected>'. $_SESSION['name'] .'</option>';
								} else {
									$manager_list = $db->getAll('SELECT * FROM `manager` ORDER by name desc'); 
										foreach ($manager_list as $list) { ?>
									<option <?php if($company_manager == $list['name']) { echo ' selected'; } ?>><?php echo $list['name']; ?></option>
								<?php } } ?>	
							</select>
						</div>
					</span>
					
				</div>

				<div class="row company_page_card">

					<div class="col-lg-4">
						<div class="company_page_block">
							 <div class="form-group row">
								<label for="company_name" class="col-sm-3 col-form-label">Название</label>
								<div class="col-sm-9">
									<input id="company_name" type="text" name="company_name" class="form-control ecj" value="" placeholder="Название"  required />
								</div>
							</div>
							<div class="form-group row">
								<label for="company_code" class="col-sm-3 col-form-label">ИНН</label>
								<div class="col-sm-9">
									<input id="company_code" type="tel" name="company_code" class="form-control ecj" value="" placeholder="ИНН" />
								</div>
							</div>
							<div class="form-group row">
								<label for="company_region" class="col-sm-3 col-form-label">Регион</label>
								<div class="col-sm-9 region_list">
									<input id="company_region" type="text" name="company_region" class="form-control ecj" value="" placeholder="Регион" />
								</div>
							</div>
							<div class="form-group row">
								<label for="company_adres" class="col-sm-3 col-form-label">Адрес</label>
								<div class="col-sm-9">
									<input id="company_adres" type="text" name="company_adres" class="form-control ecj" value="" placeholder="Адрес" />
								</div>
							</div>
							<div class="form-group row">
								<label for="company_phone" class="col-sm-3 col-form-label">Телефон</label>
								<div class="col-sm-9">
									<input id="company_phone" type="tel" name="company_phone" class="form-control ecj" value="" placeholder="Телефон" />
								</div>
							</div>
							<div class="form-group row">
								<label for="company_email" class="col-sm-3 col-form-label">E-mail</label>
								<div class="col-sm-9">
									<input id="company_email" type="email" name="company_email" class="form-control ecj" value="" placeholder="E-mail" />
								</div>
							</div>
							<div class="form-group">
								<label for="company_about">Описание</label>
								<textarea id="company_about" type="text" name="company_about" class="form-control ecj" rows="10" placeholder="Описание" ></textarea>
							</div>
						</div>
					</div>

				</form>

			</div>

		</div>
	</section>

	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'); ?>