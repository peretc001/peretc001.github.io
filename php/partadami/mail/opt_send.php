<?php session_start();
# Достаем sid
$sid = htmlspecialchars(trim($_GET['sid']));
if ($sid == '') {$sid = session_id(); }
# Подключаем файл конфигурации
include ("../inc/config.php");
include ("../inc/header.php");
include ("../shop/inc/safemysql.class.php");
$ip = $_SERVER['REMOTE_ADDR'];
	$db = new SafeMySQL();
	$id = $db->getOne('SELECT id FROM check_price WHERE sid=?s',$sid);
	
	if($_POST['phone'] != '' or $_POST['city'] != ''){
		
		if (!preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg'])) {
?>
 <Div id="check_ok">
	<p class="ok">Заявка принята!</p>
	<p>Мы отправили Прейскурант вам на электронную почту.</p>
	<br>
</div>	
<?php	
	$data = array('name' => $_POST['name'], 'city' => $_POST['city'], 'phone' => $_POST['phone'], 'email' => $_POST['email'], 'msg' => $_POST['msg'], 'ip' => $ip);
	$data['date'] = date('Y-m-d H:i:s'); // дата и время
	if($id) {
		$db->query("UPDATE  check_price SET sid=?s, date=?s, ?u WHERE id = ?i", $sid, $date, $data, $id );
	} else {
		$db->query("INSERT INTO check_price SET id=?s, sid=?s, ?u", $id, $sid, $data );
	}


	$user_info = $db->getAll('SELECT * FROM check_price WHERE sid=?s',$sid);
		foreach ($user_info as $row) {
		
			// Отправляем письмо админу
			$to  = "info@partadami.ru"; 
			$subject = 'Заявка на прайс';
			$message = "Имя: ". $row['name'] ."<br>Город:". $row['city'] ."<br>Телефон:". $row['phone'] ."<br>Email:". $row['email'] ."<br>Сообщение:". $row['msg'];
			$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
			$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n"; 
			$headers .= "Bcc: info@partadami.ru\r\n";
			$headers .= "CC: opt@partadami.ru\r\n";	
			$headers .= "CC: volgograd@partadami.ru\r\n";	
				mail($to, $subject, $message, $headers);
			

			// Отправляем письмо клиенту
			$to  = $_POST['email']; 
			$subject = 'Заявка на прайс Парты ДЭМИ'; 
			$message = '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
			<html>
<head>
<title>Парты ДЭМИ оптом</title> 
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body style="margin:0;padding:0;background-color:#f0f0f0;">
<div style="width:100%;margin:0 auto; padding:30px 0;">
				<div style="margin:0 20px;">
					<div style="width:640px;background:#fff;padding:0 20px; margin:0 auto; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;">  
						<table style="width:100%;margin:0; padding:20px 0;">
							<tr>
								<td style="padding:0px 5px;">
									<p><a style="text-decoration:none; border:none; padding:0; margin:0;" href="http://www.partadami.ru">
									<img style="border:none;" src="http://www.partadami.ru/img/top/logo.png" alt="Парта ДЭМИ, парта трансформер ДЕМИ"></a></p>
								</td>
								<td style="padding:0px 0px 0 10px; text-align:left; color:#3F454B;">
									<div style="background:url(http://www.partadami.ru/img/top/line.png) left center no-repeat; margin:0; padding:0px 15px 0 25px; color:#3F454B;">
									<a style="color:#888; text-decoration:none;" href="http://www.partadami.ru">
										<p style="text-transform:uppercase; font-size:8pt; text-align:left; color:#888; padding:0; margin:0 0 2px 0;">
											<b style="text-transform:uppercase; color: #3F454B; text-align:left;">Парты трансформеры</b>
										</p>
										<p style="text-transform:uppercase; font-size:7pt; text-align:left; color:#888; padding:0; margin:0 0 2px 0;">Официальный поставщик<br> на Юге России</a></p></div></td> 
								<td><p style="background:url(http://www.partadami.ru/mail/img/map.png) left center no-repeat; padding:5px 15px 5px 30px; font-size:10pt; color:#3F454B;"><a style="text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/gde_kupit/">Контакты</a></p></td>
								<td><p style="background:url(http://www.partadami.ru/mail/img/pdf.png) left center no-repeat; padding:5px 15px 5px 30px; font-size:10pt; color:#3F454B;"><a style="text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/doc/price.pdf">Прайс</a></p></td>
							</tr>
						</table>
					</div>
					<br>
					<div style="-webkit-text-size-adjust:auto; width:640px;background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
						<div style="padding:0 20px;">
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Добрый день!</b></p>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Благодарим Вас за интерес, проявленный к продукции фабрики «ДЭМИ».</p>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">
								ООО «КрасГрупп» является официальным оптовым поставщиком детской трансформируемой мебели «ДЭМИ» на территории Краснодарского края и Волгоградской области. 
								Оптовый склад в Краснодаре, Волгограде и Сочи. Более 30 магазинов-партнеров. Более 1,5 тысяч счастливых покупателей ежегодно.</p>
							<p style="text-align:justify;padding-left:30px; font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>Целевая аудитория:</b> физические лица, с детьми от 4 до 15 лет.<br>Также среди покупателей бывают и частные детские сады и общеобразовательные школы.</p>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Если вам интересно, то предлагаем вам 2 варианта сотрудничества:</p>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">1. <u>Для покупателей без образов:</u>
								<ul>
									<li style="list-style:none; font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Первая оптовая партия 10 комплектов (парта + стул), дальше отгружаем от 1 шт.
									<li style="list-style:none; font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Ваша торговая наценка: <b>27%</b>
								</ul>
							<p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">2. <u>Для покупателей с образцами:</u>
								<ul>
									<li style="list-style:none; font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Первая оптовая партия > 10 комплектов (парта + стул), дальше отгружаем от 1 шт.
									<li style="list-style:none; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; text-align:justify;">2 комплекта должны быть собраны в качестве выставочных образцов (примеры <a style="color: #0F68B1; text-decoration:none;" href="http://www.partadami.ru/doc/brand_section.pdf">экспозиций</a>)
									<li style="list-style:none; font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Ваша торговая наценка: <b>40%</b>
								</ul>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Если Вы готовы, нам понадобятся от вас <b>реквизиты для договора</b> и заполненная <b><a style="color: #0F68B1; text-decoration:none;" href="http://www.partadami.ru/doc/order.xls">форма заявки</a></b>. Если вы не уверены, какие модели лучше для начала выбрать, то ниже представлены самые продаваемые. Если у вас сомнения в качестве продукции, предлагаем почитать <a style="color: #0F68B1; text-decoration:none;" href="http://www.partadami.ru/otziv.php">отзывы</a>.</p>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Остались вопросы - задавайте.</p>	
							<br><p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Желаем успеха и побольше продаж.</p>	
						</div>
					</div>
					<table style="width:580px;padding:0 20px; margin:20px auto;">
						<tr>
							<td width="30%"><p style="background:url(http://www.partadami.ru/mail/img/pdf.png) left center no-repeat; padding:5px 15px 5px 30px;"><a style="color: #3F454B;  font-family: Helvetica, Arial, sans-serif; font-size: 12pt; text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/doc/price.pdf">Прейскурант</a></p></td>
							<td width="40%"><p style="background:url(http://www.partadami.ru/mail/img/pdf.png) left center no-repeat; padding:5px 15px 5px 30px;"><a style="color: #3F454B; font-family: Helvetica, Arial, sans-serif; font-size: 12pt; text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/doc/brand_section.pdf">Пример экспозиции</a></p></td>
							<td width="30%"><p style="background:url(http://www.partadami.ru/mail/img/xls.png) left center no-repeat; padding:5px 15px 5px 30px;"><a style="color: #3F454B; font-family: Helvetica, Arial, sans-serif; font-size: 12pt; text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/doc/order.xls">Форма заявки</a></p></td>
						</tr>
					</table>';

			#ТОП покупок
		$message .= '<div style="width:640px; margin:0 auto; padding:0; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; ">
							<h1 style="font: bold 16pt Helvetica; color:#444; margin:20px 0 20px 0; padding:0;" align="center">Самые популярные товары</h1>
							<table style="width:100%;padding:0;margin:0;">
								<tr>
									<td style="width:33%; padding:0; margin:0;	vertical-align:top;	text-align:center;">
										<div style="background:#fff; padding:10px 5px; margin:0; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
											<p style="height:50px;font-size:9pt; padding:0; margin:10px 0 0 0;"><b><a style="color: #0F68B1; text-decoration:none;" 
												href="http://www.partadami.ru/shop/techno/cyt26/parta_cyt26_so_stulom_cyt02-01.php">Белая парта ДЭМИ 80х55 см + Стул</a></b></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0 10px 0;font-size:9pt;color:#999;">Модель: СУТ.26</p>
											
											<p align="center"><a 
												href="http://www.partadami.ru/shop/techno/cyt26/parta_cyt26_so_stulom_cyt02-01.php">
												<img style="width:190px;" src="http://www.partadami.ru/shop/img/26/0.jpg" alt="Парта ДЭМИ (ДЕМИ) 80х55 см"></a></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0;font-size:10pt;"><b style="font-size:12pt;">17500</b> <b style="font-size:9pt;">РУБ.</b>
											<a style="cursor: pointer; cursor: hand; text-decoration:none; background: #e10061; font-family: PT Sans Narrow; color: #ffffff; font-weight: normal; padding: 5px 12px; margin:0 0 0 5px; font-size: 14px; border-radius: 4px 4px 4px 4px; -moz-border-radius: 4px 4px 4px 4px; -webkit-border-top-left-radius: 4px; -webkit-border-top-right-radius: 4px; -webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px;"  
												href="http://www.partadami.ru/shop/techno/cyt26/parta_cyt26_so_stulom_cyt02-01.php">купить</a></p> 
										</div>
									</td>
									<td style="width:33%; padding:0 0 0 2px; margin:0;	vertical-align:top;	text-align:center;">
										<div style="background:#fff; padding:10px 5px; margin:0; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
											<p style="height:45px;font-size:9pt; padding:0; margin:10px 0;"><b><a style="color: #0F68B1; text-decoration:none;" 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt14/parta_cyt14-01_so_stulom_cyt01-01.php?color=grey">Парта ДЭМИ 75х55 см + Полка сзади + Стул</a></b></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0 10px 0;font-size:9pt;color:#999;">Модель: СУТ.14-01</p>
											<p align="center"><a 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt14/parta_cyt14-01_so_stulom_cyt01-01.php?color=grey">
												<img style="width:190px;" src="http://www.partadami.ru/shop/img/14-01/1.png" alt="Парта ДЭМИ (ДЕМИ) 75х55 см + Полка сзади 75х25 см + Стул"></a></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0;font-size:10pt;"><b style="font-size:12pt;">13400</b> <b style="font-size:9pt;">РУБ.</b> 
											<a style="cursor: pointer; cursor: hand; text-decoration:none; background: #e10061; font-family: PT Sans Narrow; color: #ffffff; font-weight: normal; padding: 5px 12px; margin:0 0 0 5px; font-size: 14px; border-radius: 4px 4px 4px 4px; -moz-border-radius: 4px 4px 4px 4px; -webkit-border-top-left-radius: 4px; -webkit-border-top-right-radius: 4px; -webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px;"  
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt14/parta_cyt14-01_so_stulom_cyt01-01.php?color=grey">купить</a></p> 
										</div>
									</td>
									<td style="width:33%; padding:0 0 0 2px; margin:0;	vertical-align:top;	text-align:center;">
										<div style="background:#fff; padding:10px 5px; margin:0; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
											<p style="height:45px;font-size:9pt; padding:0; margin:10px 0;"><b><a style="color: #0F68B1; text-decoration:none;" 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt14/parta_cyt14-02_so_stulom_cyt01-01.php?color=pink">Парта ДЭМИ 75х55 см + Полка сзади + Полка сбоку + Стул</a></b></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0 10px 0;font-size:9pt;color:#999;">Модель: СУТ.14-02</p>
											
											<p align="center"><a 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt14/parta_cyt14-02_so_stulom_cyt01-01.php?color=pink">
												<img style="width:190px;" src="http://www.partadami.ru/shop/img/14-02/2.png" alt="Парта ДЭМИ (ДЕМИ) 75х55 см + Полка сзади 75х25 см + Полка сбоку 75х25 см + Стул"></a></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0;font-size:10pt;"><b style="font-size:12pt;">14550</b> <b style="font-size:9pt;">РУБ.</b>
											<a style="cursor: pointer; cursor: hand; text-decoration:none; background: #e10061; font-family: PT Sans Narrow; color: #ffffff; font-weight: normal; padding: 5px 12px; margin:0 0 0 5px; font-size: 14px; border-radius: 4px 4px 4px 4px; -moz-border-radius: 4px 4px 4px 4px; -webkit-border-top-left-radius: 4px; -webkit-border-top-right-radius: 4px; -webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px;"  
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt14/parta_cyt14-02_so_stulom_cyt01-01.php?color=pink">купить</a></p> 
										</div>
									</td>
								</tr>
								
								<tr>
									<td style="width:33%; padding:10px 0 0 0; margin:0;	vertical-align:top;	text-align:center;">
										<div style="background:#fff; padding:10px 5px; margin:0; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
											<p style="height:50px;font-size:9pt; padding:0; margin:10px 0;"><b><a style="color: #0F68B1; text-decoration:none;" 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt17/parta_cyt17-04_so_stulom_cyt01-01.php?color=orange">Парта ДЭМИ 120х55 см + подвесная тумба + 2-е полки сзади + Стул</a></b></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0 10px 0;font-size:9pt;color:#999;">Модель: СУТ.17-04</p>
											
											<p align="center"><a 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt17/parta_cyt17-04_so_stulom_cyt01-01.php?color=orange">
												<img style="width:190px;" src="http://www.partadami.ru/shop/img/17-04/5.png" alt="Парта ДЭМИ (ДЕМИ) 120х55 см + подвесная тумба + 2-е полки сзади 60х25 см + Стул"></a></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0;font-size:10pt;"><b style="font-size:12pt;">28800</b> <b style="font-size:9pt;">РУБ.</b>
											<a style="cursor: pointer; cursor: hand; text-decoration:none; background: #e10061; font-family: PT Sans Narrow; color: #ffffff; font-weight: normal; padding: 5px 12px; margin:0 0 0 5px; font-size: 14px; border-radius: 4px 4px 4px 4px; -moz-border-radius: 4px 4px 4px 4px; -webkit-border-top-left-radius: 4px; -webkit-border-top-right-radius: 4px; -webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px;"
											href="http://www.partadami.ru/shop/parta_bez_risunka/cyt17/parta_cyt17-04_so_stulom_cyt01-01.php?color=orange">купить</a></p> 
										</div>
									</td>
									<td style="width:33%; padding:10px 0 0 2px; margin:0;	vertical-align:top;	text-align:center;">
										<div style="background:#fff; padding:10px 5px; margin:0; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
											<p style="height:50px;font-size:9pt; padding:0; margin:10px 0;"><b><a style="color: #0F68B1; text-decoration:none;" 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt15/parta_cyt15-04_so_stulom_cyt01-01.php?color=blue">Парта ДЭМИ 120х55 см + подвесная тумба + 2-е полки сзади + Стул</a></b></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0 10px 0;font-size:9pt;color:#999;">Модель: СУТ.15-04</p>
											
											<p align="center"><a 
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt15/parta_cyt15-04_so_stulom_cyt01-01.php?color=blue">
												<img style="width:190px;" src="http://www.partadami.ru/shop/img/15-04/3.png" alt="Парта ДЭМИ (ДЕМИ) 120х55 см + подвесная тумба + 2-е полки сзади 60х25 см + Стул"></a></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0;font-size:10pt;"><b style="font-size:12pt;">26650</b> <b style="font-size:9pt;">РУБ.</b>
											<a style="cursor: pointer; cursor: hand; text-decoration:none; background: #e10061; font-family: PT Sans Narrow; color: #ffffff; font-weight: normal; padding: 5px 12px; margin:0 0 0 5px; font-size: 14px; border-radius: 4px 4px 4px 4px; -moz-border-radius: 4px 4px 4px 4px; -webkit-border-top-left-radius: 4px; -webkit-border-top-right-radius: 4px; -webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px;"  
												href="http://www.partadami.ru/shop/parta_bez_risunka/cyt15/parta_cyt15-04_so_stulom_cyt01-01.php?color=blue">купить</a></p> 
										</div>
									</td>
									<td style="width:33%; padding:10px 0 0 2px; margin:0;	vertical-align:top;	text-align:center;">
										<div style="background:#fff; padding:10px 5px; margin:0; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
											<p style="height:50px;font-size:9pt; padding:0; margin:10px 0;"><b><a style="color: #0F68B1; text-decoration:none;" 
												href="http://www.partadami.ru/shop/white/cyt24/parta_cyt24-01_so_stulom_cyt02-01.php?color=white_blue">Белая парта ДЭМИ 75х55 см + Полка сзади + Стул</a></b></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0 10px 0;font-size:9pt;color:#999;">Модель: СУТ.24-01</p>
											
											<p align="center"><a 
												href="http://www.partadami.ru/shop/white/cyt24/parta_cyt24-01_so_stulom_cyt02-01.php?color=white_blue">
												<img style="width:190px;" src="http://www.partadami.ru/shop/img/24/0.png" alt="Белая парта ДЭМИ 75х55 см + Полка сзади 75х25 см + Стул"></a></p>
											<p style="font-family: Helvetica, Arial, sans-serif; margin:5px 0;font-size:10pt;"><b style="font-size:12pt;">15100</b> <b style="font-size:9pt;">РУБ.</b>
											<a style="cursor: pointer; cursor: hand; text-decoration:none; background: #e10061; font-family: PT Sans Narrow; color: #ffffff; font-weight: normal; padding: 5px 12px; margin:0 0 0 5px; font-size: 14px; border-radius: 4px 4px 4px 4px; -moz-border-radius: 4px 4px 4px 4px; -webkit-border-top-left-radius: 4px; -webkit-border-top-right-radius: 4px; -webkit-border-bottom-right-radius: 4px; -webkit-border-bottom-left-radius: 4px;"									
												href="http://www.partadami.ru/shop/white/cyt24/parta_cyt24-01_so_stulom_cyt02-01.php?color=white_blue">купить</a></p> 
										</div>
									</td>
								</tr>
							</table>
					</div>';

	
	$message .= '<br><br>
					<div style="width:600px; -webkit-text-size-adjust:none; background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 0 0; -webkit-border-radius: 10px 10px 0 0; border-radius: 10px 10px 0 0;">
							<table style="width:100%;padding:0;margin:0;">
								<tr>
									<td style="width:23%;padding:10px 5px;margin:0 auto;vertical-align:top;">
										<ul style="margin:0;padding:0;list-style:none;">
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/parta_bez_risunka/">Парты без рисунка</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/parta_s_risunkom/">Парты с рисунком</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/parta_iz_massiva/">Парты из массива</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/techno/">Белые парты</a></li>
										</ul>
									</td>
									<td style="width:27%;padding:10px 5px;margin:0 auto;vertical-align:top;">
										<ul style="margin:0;padding:0;list-style:none;">
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/tumby_i_stellazhi/">Тумбы и стеллажи</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/ergonomichnyj_stul/">Стулья и чехлы</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/detskaya_skladnaya_mebel/">Детская складная мебель</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/dopolnitelnye_elementy/">Дополнительные элементы</a></li>
										</ul>
									</td>
									<td style="width:27%;padding:10px 5px 10px 20px;margin:0 auto;vertical-align:top;border-left:1px solid #dedede;">
										<ul style="margin:0;padding:0;list-style:none;">
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/delivery.php">Доставка</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/settingup.php">Сборка</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/garanty.php">Гарантия</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/oplata.php">Способы оплаты</a></li>
										</ul>
									</td>
									<td style="width:23%;padding:10px 5px;margin:0 auto;vertical-align:top;">
										<ul style="margin:0;padding:0;list-style:none;">
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/certificate.php">Сертификаты</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/exchange.php">Обмен и возврат</a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/otziv.php"><b>ОТЗЫВЫ</b></a></li>
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/opt.php">Оптовые продажи</a></li>
										</ul>
									</td>
								</tr>
							</table>
					</div>
					<div style="width:600px; -webkit-text-size-adjust:none; background:#f8f8f8;padding:0 20px; margin:0 auto; color:#222; border-left:1px solid #dedede;border-right:1px solid #dedede;">
						<table style="width:100%;padding:0;margin:0;">
							<tr>
								<td style="width:50%;padding:20px 5px;margin:0 auto;vertical-align:middle;text-align:right;">
									<p  style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Следите за нами в социальных сетях:</p>
								</td>
								<td style="width:50%;padding:10px 10px;margin:0 auto;vertical-align:middle;">
									<ul style="margin:0;padding:2px 0 0 0;list-style:none;">
										<li style="display:inline;padding:0 2px;margin:0;"><a href="http://vk.com/partadami"><img src="http://www.partadami.ru/img/social/yandex/B.png"></a></li>
										<li style="display:inline;padding:0 2px;margin:0;"><a href="http://www.odnoklassniki.ru/group/52007615856814"><img src="http://www.partadami.ru/img/social/yandex/O.png"></a></li>
										<li style="display:inline;padding:0 2px;margin:0;"><a href="https://www.facebook.com/krasgroup"><img src="http://www.partadami.ru/img/social/yandex/F.png"></a></li>
										<li style="display:inline;padding:0 2px;margin:0;"><a href="https://plus.google.com/u/0/116470759965043791681?rel=author"><img src="http://www.partadami.ru/img/social/yandex/G.png"></a></li>
										<li style="display:inline;padding:0 2px;margin:0;"><a href="https://www.instagram.com/partadami/"><img src="http://www.partadami.ru/img/social/yandex/I.png"></a></li>
									</ul>
								</td>
							</tr>
						</table>							
					</div>
					<div style="width:600px; -webkit-text-size-adjust:none; background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 0 0 10px 10px; -webkit-border-radius: 0 0 10px 10px; border-radius: 0 0 10px 10px;">
						<table style="width:100%;padding:0;margin:0;">
							<tr>
								<td style="width:60%;padding:20px;margin:0 auto;vertical-align:middle;text-align:left;">
									<p  style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt;">Вы получили это письмо, так как подписались на рассылку.</p>
								</td>
								<td style="width:40%;padding:20;margin:0 auto;vertical-align:middle;">
									<p  style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt;">Отписаться можно по <a style="color:#0f68b1;" href="http://www.partadami.ru/inc/cron/delete_email.php?email='. $_POST['email'] .'">ссылке</a></p>
								</td>
							</tr>
						</table>
					</div>
					<br><br>
		</body>
		</html>';
		$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n"; 
		$headers .= "CC: info@partadami.ru\r\n";	
		$headers .= 'MIME-Version: 1.0' . "\r\n";
			mail($to, $subject, $message, $headers); 
			
		}
	} else { ?>
		<Div id="check_ok">
		<p class="ok">Заявка НЕ принята</p>
		<p>Найдена ссылка, ай-ай-ай )</p>
	</div>	
	<?php }
 
	}
	else { echo "Не заполнены обязательные поля"; }

	
	
 ?>