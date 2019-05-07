<?php session_start(); 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
$id = $_GET['id'];

if ($id != '') {
#   Подключение к БД
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');
	#   Выбор данных по авто
	$select_car = "SELECT * FROM car WHERE id = '$id'";
	$result = mysqli_query($link, $select_car);
	#   Вывод результата через $row
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$id = $row['id'];
	$url = $row['url'];
	$name = $row['name'];
	$brand = $row['brand'];
	$model = $row['model'];
	$year = $row['year'];
	$price = $row['price'];
	$price6_15 = $row['price6_15'];
	$price16_30 = $row['price16_30'];
	$price_mounth = $row['price_mounth'];
	$price_day = $row['price_day'];
	$zalog = $row['zalog'];
	
	$now = date('d.m.Y');
	$tomorrow = date("d.m.Y", strtotime('tomorrow'));
					 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Бронирование <?php echo $name; ?> | @autoprkt</title> 
	<meta name="Description" content="Бронирование автомобилей Infiniti, сдаваемых в аренду / прокат без водителя в Краснодаре | @autoprkt" /> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/css/pickmeup.css" type="text/css" />
	<script type="text/javascript" src="/js/pickmeup.min.js"></script> 
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php'; ?>
<nav id="path">
	<div class="path_menu">
		<p><a href="">Главная</a> / <a href="/car/">Автомобили</a> / <a href="/car/<?php echo $brand; ?>/<?php echo $url; ?>/"><?php echo $name; ?></a> / Бронирование <?php echo $name; ?></p>
	</div>
	<h1 class="example-header">Бронирование <?php echo $name; ?></h1>	
</nav>
<article id="reserv_date">
	<div class="row">
		<div class="four columns calendar">
			<h3>Выберете дату:</h3>
			<section>
				<article>
					<div class="clndr"></div>
				</article>
			</section>
			<script type="text/javascript">
			$(function () {
				
				$('#day').on('click', function (e) {
					$('.per_day').html('<?php echo $price_day; ?> /день');
					$('.day').html('День');
					$('.sum').html('<?php echo $price_day; ?>');
					var dates_range = pickmeup('.clndr').get_date(); 
					count = Math.round((dates_range[1] - dates_range[0]) / 3600 / 24 / 1000)
					select_days = count;
					
					//input
					document.getElementById('count').value = select_days;
					document.getElementById('tarif').value = 'День';
					document.getElementById('price').value = '<?php echo $price_day; ?>';
					document.getElementById('total').value = '<?php echo $price_day; ?>';
				});
				$('#work').on('click', function (e) {
					$('.per_day').html('<?php echo $price; ?> /сут');
					$('.day').html('Рабочая неделя');
					$('.sum').html('<?php echo $price/24*102; ?>');
					var dates_range = pickmeup('.clndr').get_date(); 
					count = Math.round((dates_range[1] - dates_range[0]) / 3600 / 24 / 1000)
					select_days = count;
					//var dates_range = pickmeup('.clndr').get_date().length; 
					//select_days = dates_range;
					
					//input
					document.getElementById('count').value = select_days;
					document.getElementById('tarif').value = 'Рабочая неделя (Пн 12:00 - Пт 18:00)';
					document.getElementById('price').value = '<?php echo $price; ?>';
					document.getElementById('total').value = '<?php echo $price/24*102; ?>';
				
				});
				$('#week').on('click', function (e) {
					$('.per_day').html('<?php echo $price; ?> /сут');
					$('.day').html('Выходные');
					$('.sum').html('<?php echo $price/24*66; ?>');
					var dates_range = pickmeup('.clndr').get_date(); 
					count = Math.round((dates_range[1] - dates_range[0]) / 3600 / 24 / 1000)
					select_days = count;
					
					//input
					document.getElementById('count').value = select_days;
					document.getElementById('tarif').value = 'Выходные (Пт 18:00 - Пн 12:00)';
					document.getElementById('price').value = '<?php echo $price; ?>';
					document.getElementById('total').value = '<?php echo $price/24*66; ?>';
				});
				$('.clndr').on('pickmeup-change', function (e) {
					var dates_range = pickmeup('.clndr').get_date(); 
					count = Math.round((dates_range[1] - dates_range[0]) / 3600 / 24 / 1000)
					select_days = count;
					
					$('.day').html('<span class="col">'+ select_days +'</span> сут'); 		
					
					if (select_days <= 5) { k = 1; }
					if (select_days > 5 && select_days < 16) { k = 0.95; }
					if (select_days >= 16  && select_days < 30) { k = 0.9; }
					if (select_days >= 30) { k = 0.8; }
					$('.per_day').html('<?php echo $price; ?>'*k + ' /сут');
					$('.sum').html(select_days*'<?php echo $price; ?>'*k);
					
					//input
					document.getElementById('count').value = select_days;
					document.getElementById('date1').value = e.detail.formatted_date[0];
					document.getElementById('date2').value = e.detail.formatted_date[1];
					document.getElementById('tarif').value = 'Свободный';
					document.getElementById('price').value = k*'<?php echo $price; ?>';
					document.getElementById('total').value = select_days*'<?php echo $price; ?>'*k;	
				});
				


			
				
			});
			
			</script>
			<div class="clear"></div>
			<p class="line" align="center">--- или ---</p>
			<h3>Специальный тариф:</h3>
			<div class="spec">
				<button id="day" class="button button-primary">День</button>
				<button id="week" class="button button-primary">Выходные</button>
				<button id="work" class="button button-primary">Рабочая неделя</button>
			</div>
			<div class="spec">
				<p><small>Тариф <b>"День"</b> рассчитывается с <b>10-00 до 22-00</b> или с <b>22-00 до 10-00</b></small></p>
				<p><small>Тариф <b>"Выходные"</b> рассчитывается с Пятницы <b>18-00</b> до Понедельника <b>12-00</b></small></p>
				<p><small>Тариф <b>"Рабочая неделя"</b> рассчитывается с Понедельника <b>12-00</b> до Пятницы <b>18-00</b></small></p>
    		</div>			
		</div>
		<div class="four columns right">
		
			<h3>Условия:</h3>
			<ul class="x-col">
				<li>Стоимость</li>
				<li class="line"><hr></li>
				<li><span class="per_day"><?php echo $price; ?> /сут</span></li>
			</ul>
			<ul class="x-col">
				<li>Залог</li>
				<li class="line"><hr></li>
				<li class="dep_per"><?php echo $zalog; ?> руб</li>
			</ul>
			
      		<div class="clear"></div>
			
			<form action="inc/booking/step2.php" method="post" enctype="multipart/form-data" id="valid_reserv" role="form" data-togg="validator">
  				<script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
				<script type="text/javascript">
					jQuery(function($){
						$("#phone").mask("8-999-999-99-99");
					});
				</script>
				<input type="hidden" name="car_id" value="<?php echo $id; ?>"/>
				<input type="hidden" name="auto" value="<?php echo $name; ?>"/>
				<input type="hidden" name="url" value="<?php echo $url; ?>"/>
				<input type="hidden" name="tarif" id="tarif" value=""/>
				<input type="hidden" name="count" id="count" value=""/>
				<input type="hidden" name="date1" id="date1" value=""/>
				<input type="hidden" name="date2" id="date2" value=""/>
				<input type="hidden" name="price" id="price" value=""/>
				<input type="hidden" name="total" id="total" value=""/>
				<input type="hidden" name="region" id="region" value=""/>
				<input type="hidden" name="zalog" id="zalog" value=""/>
				<input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>"/>	
					
  				<div class="x-col-total">
					<ul class="left">
						<li>Выбрано:</li>
						<li class="day"> <span class="col">0</span> сут</li>
					</ul>
					<ul class="right">
						<li>Всего:</li>
						<li class="price"> <span class="sum">0</span> руб</li>
					</ul>
				</div>
				<div class="reserv_form">
					
					<div class="row">
						<div class="six columns">
							<label for="phone" class="control-label">Телефон</label>
							<input type="tel" name="phone" placeholder="8-918-123-45-67" id="phone" class="form-control" required>
						</div>
						<div class="six columns">
							<label for="username"  class="control-label">Имя</label>
							<input data-minlength="3" type="text" name="username" placeholder="Как вас зовут" id="username"  class="form-control" required>
						</div>
					</div>
					<div class="button_center">
						<input class="button button-all" type="submit" value="Забронировать">
					</div>
				</div>
			</form>
		</div>
	</div>
    <div class="clear"></div>
</article>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; 
} 

else { 	echo '<script language="JavaScript">
 						setTimeout(function() {
							window.location.href = "/car/";
						},500);
					</script>';  
}

?>