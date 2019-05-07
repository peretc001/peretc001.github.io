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
	<p>Мы отправили Коммерческое предложение вам на электронную почту.</p>
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
			$subject = 'Парты ДЭМИ. Коммерческое предложение.'; 
			$message = '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
			<html>
			<head>
			<title>Парты ДЭМИ. Коммерческое предложение.</title> 
			<meta http-equiv="content-type" content="text/html; charset=utf-8">
			</head>
			<body style="margin:0;padding:0;background-color:#f0f0f0;">
			<div style="width:100%;margin:0 auto; padding:30px 0;">
				<div style="margin:0 20px;">
					<div style="width:640px;margin:0 auto;" align="right">
						<div style="width:155px;"><p style="background:url(http://www.partadami.ru/mail/img/print.png) 0 center no-repeat; padding:5px 15px 5px 15px; font-size:10pt; color:#3F454B;"><a style="text-decoration:none; color:#3F454B;"<a href="http://www.partadami.ru/shop/MPDF56/school.php">Версия для печати</a></p></div>
					</div>
					<div style="width:640px;background:#fff;padding:0 20px; margin:0 auto; font-family: sans-serif; font-size: 9pt; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;">  
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
					<div style="width:640px;background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
						<div style="padding:0 20px;">
							<br>
							<p style="text-align:center;font-family: sans-serif; font-size: 14pt;"><b>Коммерческое предложение</b></p>
							<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;">ООО «КрасГрупп» является официальным поставщиком детской школьной мебели (наборы растущей трансформируемой мебели) «Дэми».</p>
							<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;">Школьные парты «ДЭМИ» пользуется постоянным спросом неспроста. Парта-трансформер легко подстраиваются под рост ребенка и растет вместе с ним с первого класса и до окончания школы. Парта регулируется по высоте от 53 до 81,5 см (для детей ростом от 120 до 198 см – 2-6 группа роста).</p> 
							<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;">Механизм подъема столешницы обеспечивает ступенчатую (9 положений) регулировку. Работа за наклонной поверхностью обеспечивает эргономическое положение для разгрузки позвоночника и шейного отдела, а так же раскрепощает мускулатуру спины. Наклонное положение столешницы позволяет читать и писать, держа прямо голову и туловище.</p>
							<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;">Эргономичный школьный стул «Дэми» регулируется не только по высоте, но и по глубине, для того, чтобы ребенок мог равномерно распределить нагрузку на спину и бедра. Такая регулировка – незаменимая вещь для растущего организма, благодаря чему уменьшается риск появления у ребенка такого заболевания как сколиоз.</p>
							<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;">Соответствие требованиям СанПиН 2.4.2.2821-10 для учебных заведений (2-6 группа роста), ГОСТ 16371-93, ГОСТ 22046-2002</p>
							<br>
							<p style="text-align:center;font-family: sans-serif; font-size: 12pt; paddig:0;"><b>Предлагаемый вариант поставки:</b></p>
							<table style="width:100%; margin:0;border-collapse:none;" cellspacing="0" cellpadding="0">
								<tr>
									<td style="padding:10px; width:55%;border-top:1px solid #ccc;border-right:1px solid #ccc;border-left:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:bold;">Наименование</p>
									</td>
									<td style="padding:10px; width:15%;border-top:1px solid #ccc;border-right:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:bold;">Цена, руб.</p>
									</td>
									<td style="padding:10px 5px; width:10%;border-top:1px solid #ccc;border-right:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:bold;">Кол-во</p>
									</td>
									<td style="padding:10px; width:20%;border-top:1px solid #ccc;border-right:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:bold;">Стоимость, руб.</p>
									</td>
								</tr>
								<tr>
									<td style="padding:10px; border-top:1px solid #ccc;border-right:1px solid #ccc;border-left:1px solid #ccc;">
										<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;font-weight:normal;">
											<b>Комплект мебели для начальной школы:</b><br>	Набор ученический  одноместный<br>
											(парта модели СУТ.14 +  стул модели СУТ.01-01). Цвет: Клен/Серый
										</p>
									</td>
									<td style="padding:10px; border-top:1px solid #ccc;border-right:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:normal;">10 010,00</p>
									</td>
									<td style="padding:10px; border-top:1px solid #ccc;border-right:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:normal;">50</p>
									</td>
									<td style="padding:10px; border-top:1px solid #ccc;border-right:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:normal;">500 500,00</p>
									</td>
								</tr>
								<tr>
									<td colspan="4" style="padding:10px 0; align:center;border-top:1px solid #ccc;border-right:1px solid #ccc;border-left:1px solid #ccc;">
										<div align="center"><img src="http://www.partadami.ru/mail/img/school.png" style="max-width:600px;"></div>
									</td>
								</tr>
								<tr>
									<td style="padding:10px; border-top:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;"></td>
									<td colspan="2" style="padding:10px; border-bottom:1px solid #ccc; border-top:1px solid #ccc;border-right:1px solid #ccc;border-top:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:bold;">ИТОГО, руб.</p>
									</td>
									<td style="padding:10px; border-bottom:1px solid #ccc; border-top:1px solid #ccc; border-right:1px solid #ccc;border-top:1px solid #ccc;">
										<p style="text-align:center;font-family: sans-serif; font-size: 9pt;font-weight:bold;">500 500,00</p>
									</td>
							</table>	
							<br>
							<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;">Цена предлагаемых товаров включает в себя расходы на страхование, налоги, таможенные пошлины и другие обязательные платежи. В стоимость НЕ включены расходы на доставку и сборку товара.</p>
							<table>
								<tr>
									<td style="vertical-align:bottom;padding:0 0 15px 0;">
										<p style="text-align:justify;font-family: sans-serif; font-size: 9pt;">C уважением, Красовский И.В.<br>Директор ООО «КрасГрупп»</p> 
									</td>
									<td>
										<img src="http://www.partadami.ru/mail/img/label.png" style="margin:0 0 0 20px; width:149px; height:89px;">
									</td>
								</tr>
							</table>							
							<br>
							<br>
						</div>
					</div>
					<table style="width:580px;padding:0 20px; margin:20px auto;">
						<tr>
							<td width="20%">
							<td width="25%"><p style="background:url(http://www.partadami.ru/mail/img/pdf.png) left center no-repeat; padding:5px 15px 5px 30px;"><a style="color: #3F454B;  font-family: sans-serif; font-size: 12pt; text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/doc/price.pdf">Прейскурант</a></p></td>
							<td width="30%"><p style="background:url(http://www.partadami.ru/mail/img/xls.png) left center no-repeat; padding:5px 15px 5px 30px;"><a style="color: #3F454B; font-family: sans-serif; font-size: 12pt; text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/doc/order.xls">Форма заявки</a></p></td>
							<td width="20%">
						</tr>
					</table>
					<br>
					<div style="width:620px;margin:0 auto;">
						<p style="text-align:center;font-family: sans-serif; font-size: 12pt;"><b>ФОТОГАЛЛЕРЕЯ</b></p>
						<ul style="margin:0;padding:0;list-style:none;">
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/anapa2.jpg"><img src="http://www.partadami.ru/img/school/anapa2.png" alt="Школьные парты ДЭМИ в школе № 27 Анапа"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/elezavetka.jpg"><img src="http://www.partadami.ru/img/school/elezavetka.png" alt="Школьные парты ДЭМИ в школе № 1 V вида ст. Елизаветнинская"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/novoross.jpg"><img src="http://www.partadami.ru/img/school/novoross.png" alt="Школьные парты ДЭМИ в школе ДХШ им.С.Д.Эрьзя МО г.Новороссийск"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/krasnodar.jpg"><img src="http://www.partadami.ru/img/school/krasnodar.png" alt="Школьные парты ДЭМИ в школе  № 9 VIII вида Краснодарского края"></a></li>
						</ul>
						<ul style="margin:0;padding:0;list-style:none;">
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/orel1.jpg"><img src="http://www.partadami.ru/img/school/orel1.png" alt="Парты ДЭМИ в НОУ лицей Магистр"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/perm2.jpg"><img src="http://www.partadami.ru/img/school/perm2.png" alt="Парты ДЭМИ в школе № 32 Краснодар"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/perm3.jpg"><img src="http://www.partadami.ru/img/school/perm3.png" alt="Школьные парты ДЭМИ"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/img/school/perm4.jpg"><img src="http://www.partadami.ru/img/school/perm4.png" alt="Школьные парты ДЭМИ"></a></li>
						</ul>
					</div>
					<br>
								
					<div style="width:680px; padding:0 20px; margin:0 auto;">
							<br>
							<p style="text-align:center;font-family: sans-serif; font-size: 12pt;"><b>Технические характеристики:</b></p>
							<table style="width:100%; margin:0;border-collapse:none;" cellspacing="0" cellpadding="0">
								<tr>
									<td style="padding:5px 10px; width:60%; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Тип мебели</p>
									</td>
									<td style="padding:5px 10px; width:40%; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">комплект ученический одноместный (парта + 1 стул)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Ростовая группа</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">№ 2, № 3, № 4, № 5, № 6 </p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Возможность регулировки высоты столешницы</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Да</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px;border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Возможность регулировки угла наклона столешницы</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Да</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Возможность регулировки высоты задней полки</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Да</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Возможность регулировки высоты сиденья стула</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Да</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Возможность регулировки глубины сиденья стула</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Да</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Возможность регулировки высоты спинки стула</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Да</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Производитель</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">ДЭМИ</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Страна производитель</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Россия</p>
									</td>
								</tr>
								
								<tr>
									<td colspan="2" style="padding:15px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:bold;">Габаритные размеры</p>
									</td>
								</tr>
								
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Длина парты</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">750 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Глубина парты</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">610 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Длина столешницы парты</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">750 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Глубина столешницы парты</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">550 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Минимальная высота столешницы регулируемой парты</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">530 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Максимальная высота столешницы регулируемой парты</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">815 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Угол наклона столешницы</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">0 – 26 (градусов)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Высота сидения стула</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">345 – 445 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Глубина сидения</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">310 – 345 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Высота спинки</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">330 – 409 (мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Ширина стула</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">400 (мм)</p>
									</td>
								</tr>
								
								<tr>
									<td colspan="2" style="padding:15px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:bold;">Материал изготовления</p>
									</td>
								</tr>
								
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Каркас парты</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Металл (толщина 2 мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Столешница, Фасад</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">18 мм ЛДСП</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Кромка столешницы</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">2 мм ПВХ</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Каркас стула</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Металл (диаметр трубы 25 мм, толщина 2 мм)</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Сиденье</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Фанера</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Спинка</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Фанера</p>
									</td>
								</tr>
								
								<tr>
									<td colspan="2" style="padding:15px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:bold;">Вес и объем</p>
									</td>
								</tr>
								
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Общий вес в упаковке</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">45 кг</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Общий объем в упаковке</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">0.18 м<sup>3</sup></p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Гарантия на Парту</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">18 месяцев</p>
									</td>
								</tr>
								<tr>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-left:1px solid #ccc; border-bottom:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">Гарантия на Стул</p>
									</td>
									<td style="padding:5px 10px; border-top:1px solid #ccc; border-right:1px solid #ccc; border-bottom:1px solid #ccc;">
										<p style="text-align:left;font-family: sans-serif; font-size: 9pt;font-weight:normal;">12 месяцев</p>
									</td>
								</tr>
							</table>	
							<br>
						</div>
					<br>
					<div style="width:640px;background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
						<p style="text-align:center;font-family: sans-serif; font-size: 12pt;"><b>Возможные цвета:</b></p>
						<ul style="margin:0;padding:0;list-style:none;">
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/shop/img/14/1.jpg"><img src="http://www.partadami.ru/shop/img/14/1.png"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/shop/img/14/2.jpg"><img src="http://www.partadami.ru/shop/img/14/2.png"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/shop/img/14/3.jpg"><img src="http://www.partadami.ru/shop/img/14/3.png"></a></li>
						</ul>
						<ul style="margin:0;padding:0;list-style:none;">
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/shop/img/14/4.jpg"><img src="http://www.partadami.ru/shop/img/14/4.png"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/shop/img/14/5.jpg"><img src="http://www.partadami.ru/shop/img/14/5.png"></a></li>
							<li style="margin:0;padding:0;display:inline;"><a class="img" href="http://www.partadami.ru/shop/img/14/6.jpg"><img src="http://www.partadami.ru/shop/img/14/6.png"></a></li>
						
						</ul>
					</div>
					<br>
				<div style="width:660px;margin:0 auto;">
						<p style="text-align:center;font-family: sans-serif; font-size: 12pt;"><b>ТАМОЖЕННЫЕ ДЕКЛАРАЦИИ</b></p>
						<ul style="margin:0;padding:0;list-style:none;">
							<li style="margin:0;padding:0;display:inline;padding:0 5px;"><a href="http://www.partadami.ru/doc/certificate/2.jpg"><img style="border:2px solid #ddd;" src="http://www.partadami.ru/doc/certificate/2.png"></a></li>
							<li style="margin:0;padding:0;display:inline;padding:0 5px;"><a href="http://www.partadami.ru/doc/certificate/3.jpg"><img style="border:2px solid #ddd;" src="http://www.partadami.ru/doc/certificate/3.png"></a></li>
							<li style="margin:0;padding:0;display:inline;padding:0 5px;"><a href="http://www.partadami.ru/doc/certificate/6.jpg"><img style="border:2px solid #ddd;" src="http://www.partadami.ru/doc/certificate/6.png"></a></li>
						</ul>
					</div>
				<br>
				<div style="margin:0 20px;">
					<div style="width:640px;background:#fff;padding:0 20px; margin:0 auto; font-family: sans-serif; font-size: 9pt; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;">  
						<table style="width:100%;margin:0; padding:20px 0;">
							<tr>
								<td style="padding:0px 5px;">
									<p><a style="text-decoration:none; border:none; padding:0; margin:0;" href="http://www.partadami.ru">
									<img style="border:none;" src="http://www.partadami.ru/img/top/logo.png" alt="Парта ДЭМИ, парта трансформер ДЕМИ"></a></p>
								</td>
								<td style="padding:0px 0px 0 10px; text-align:left; color:#3F454B;">
									<div style="background:url(http://www.partadami.ru/img/top/line.png) left center no-repeat; padding:0px 15px 0 25px; color:#3F454B;">
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
				</div>
			</div>
		</body>
		</html>
';
		$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "CC: info@partadami.ru\r\n";	
		$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n"; 
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