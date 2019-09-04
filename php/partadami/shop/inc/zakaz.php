<?php session_start();
# Достаем sid
$sid = htmlspecialchars(trim($_GET['sid']));
if ($sid == '') {$sid = session_id(); }
# Подключаем файл конфигурации
include ("../../inc/config.php");
include ("../../inc/header.php");
error_reporting(E_ALL & ~E_NOTICE);
	
$ip = $_SERVER['REMOTE_ADDR'];


if($_POST['email'] == '' or $_POST['phone'] == '') { 
	echo '<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заказ НЕ принят</b><br>Вы забыли добавить товар в корзину или не заполнили обязательные поля.</p>
			<p align="center"><a href="/shop/shoppingcart.php">&#8592; Вернуться в корзину</a></p>
		</div>';
	} else {

	if(!preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg']) ){	
		
	$date = date('Y-m-d H:i:s'); // дата и время
	
	# Записываем данные покупателя
	$res = mysql_query(" SELECT * FROM user WHERE sid = '$sid' ");
	$row = mysql_fetch_assoc($res);
	
	# Если такого нет - записываем	
	if ($row == null ) {
		$add_user = mysql_query("INSERT INTO `user` (id, lastname, firstname, middlename, phone, email, city, msg, sid, date, ip) VALUES ('', '$_POST[lastname]', '$_POST[firstname]', '$_POST[middlename]', '$_POST[phone]', '$_POST[email]', '$_POST[city]', '$_POST[msg]', '$sid', '$date', '$ip' ) ");
	}
	# Если есть - обновляем 
	else {
		$upd_user = mysql_query("UPDATE `user` SET lastname = '$_POST[lastname]', firstname = '$_POST[firstname]', middlename = '$_POST[middlename]', phone = '$_POST[phone]', email = '$_POST[email]', city = '$_POST[city]', msg = '$_POST[msg]', date = '$date', ip = '$ip' WHERE sid = '$row[sid]' ");						
	}
	
	# Определяем сумму всего заказа
	$total_value = mysql_query("SELECT SUM(total) as `sum_total` FROM cart WHERE sid = '$sid' ");
	$query = mysql_fetch_assoc($total_value); 
	$total = $query['sum_total'];
	
	# Номер договора, т.е. номер ранее записанного user`а
	$res = mysql_query(" SELECT * FROM user WHERE sid = '$sid' ");
	$row = mysql_fetch_assoc($res);
	$OrderId = $row['id'];
	
	
	# Проверяем наличие ранее оформленного заказа данным покупателем
	$add_zakaz_select = mysql_query("SELECT * FROM zakaz_new WHERE sid = '$sid' "); 
	$row = mysql_fetch_assoc($add_zakaz_select); 
	
	# Если заказа не было - добавляем
	if ( $row == null ) { 
		
		$insert = mysql_query("INSERT INTO zakaz_new (id, product_id, name, model, url, img, qty, price, color, sid, date, total, user_id)  
		SELECT '', id, name, model, url, img, qty, price, color, sid, date, total, '" .$OrderId ."' FROM cart WHERE sid = '$sid' ");
	}
	else {
		
		# Проверяем если что-то в корзине
		$add_zakaz_cart = mysql_query("SELECT * FROM cart WHERE sid = '$sid' "); 
		$row = mysql_fetch_assoc($add_zakaz_cart); 
		
		# Если в корзине пусто, т.е. попытка записать нулевой заказ
		if ( $row == null ) { 
			# Определяем сумму ранее оформленного заказа
			$total_value = mysql_query("SELECT SUM(total) as `sum_total` FROM zakaz_new WHERE sid = '$sid' ");
			$query = mysql_fetch_assoc($total_value); 
			$total = $query['sum_total'];
			
			# И ничего не делаем
		}
		# Если в корзине НЕ пусто, клиент хочет изменить товар
		else {
		# Удаляем ранее оформленный заказ
		$delete = mysql_query("DELETE FROM zakaz_new WHERE sid = '$sid' ");
		
		# Записываем новый
		$insert = mysql_query("INSERT INTO zakaz_new (id, product_id, name, model, url, img, qty, price, color, sid, date, total, user_id)  
		SELECT '', id, name, model, url, img, qty, price, color, sid, date, total, '". $OrderId ."' FROM cart WHERE sid = '$sid' ");
		}
	}	
	// Отправляем письмо админу
	$to  = "info@partadami.ru"; 
	$subject = 'ЗАКАЗ: Детская мебель "ДЭМИ"'; 
	$message .= '<body style="margin:0;padding:0;>
				<table style="width:100%;padding:0 20px;background:#f0f0f0;">
				<tr>
				<td>
					<table style="width:640px; -webkit-text-size-adjust:none; background:#fff;padding:0 20px;margin:0 auto; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; border:1px solid #dedede; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;"> 
							<tr>
								<td style="padding:10px 5px;">
									<p><a style="text-decoration:none; border:none; padding:0; margin:0;" href="http://www.partadami.ru">
									<img style="border:none;" src="http://www.partadami.ru/img/top/logo.png" alt="Парта ДЭМИ, парта трансформер ДЕМИ"></a></p>
								</td>
								<td style="padding:0px 0px 0 10px; text-align:left; color:#3F454B;">
									<div style="background:url(http://www.partadami.ru/img/top/line.png) left center no-repeat; margin:0; padding:0px 15px 0 25px;">
									<a style="color:#888; text-decoration:none;" href="http://www.partadami.ru">
										<p style="text-transform:uppercase; font-size:8pt; text-align:left; color:#888; padding:0; margin:0 0 2px 0;">
											<b style="text-transform:uppercase; color: #3F454B; text-align:left;">Парты трансформеры</b>
										</p>
										<p style="text-transform:uppercase; font-size:7pt; text-align:left; color:#888; padding:0; margin:0 0 2px 0;">Официальный поставщик<br> на Юге России</a></p></div></td> 
								<td><p style="background:url(http://www.partadami.ru/mail/img/catalog.png) left center no-repeat; padding:5px 15px 5px 30px; font-size:10pt; color:#3F454B;"><a style="text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/shop/">Каталог</a></p></td>
								<td><p style="background:url(http://www.partadami.ru/mail/img/map.png) left center no-repeat; padding:5px 15px 5px 30px; font-size:10pt; color:#3F454B;"><a style="text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/gde_kupit/">Контакты</a></p></td>
							</tr>
						</table>
					<br>';
					$name = mysql_query("SELECT *,DATE_FORMAT(date, '%d.%m.%Y') as date_f FROM user WHERE id = '$OrderId' "); 
									$row = mysql_fetch_assoc($name);
									
		$message .= '<h1 align="center" style="font-family: Helvetica, Arial, sans-serif; font-size: 12pt;">Ваш заказ № '. $row["id"] .'Р от '.  $row["date_f"] .'</h1>
				
				<div style="-webkit-text-size-adjust:auto; width:600px;background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
						<div style="padding:20px 10px;">
				
				<table style="width:100%;">';
				
				$cart = mysql_query("SELECT * FROM  zakaz_new WHERE user_id = '$OrderId' ORDER by product_id asc"); 
						while($row = mysql_fetch_assoc($cart)) {
				$message .= '
				<tr>
					<td class="img" valign="top" style="width:5%; padding:5px;"><p><img src="http://www.partadami.ru'. $row["img"] .'" style="width:30px;"></p></td>
					<td class="name" valign="top" style="width:78%; padding:5px;"><p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#000;" href="http://www.partadami.ru/'. $row["url"] .'"><b>'. $row["name"] .'</b></a><br><span style="font-size:9pt;">Модель: '. $row["model"] .'. Цвет: '. $row["color"] .'</span></p></td>
					<td class="qty" valign="top" style="width:7%; padding:5px;"><p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;">'. $row["qty"] .' x </p></td>
					<td class="price" valign="top" style="width:10%; padding:5px;"><p style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;">'. $row["price"] .'</p></td>
				</tr>';
				 }
	$message .= '<tr><td colspan="2" style="text-align:right;padding:5px 0;" valign="top">';
						
	$message .= '<p style="padding:2px 0;text-align:right;font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#000;"><b>К оплате:</b></p>';
						
	
	$message .= '</td><td colspan="2" style="padding:5px 0;font-family: Helvetica, Arial, sans-serif; color:#000;" align="center" valign="top">';
					
					
		$message .= '<p style="padding:0;font-family: Helvetica, Arial, sans-serif; font-size: 12pt; color:#000;"><b>'. $total .' p.</b></p>'; 
							
		$message .= '</td>
				</tr>
			</table>
		</div>
	</div>';
	
	# Записываем данные покупателя
	$res = mysql_query(" SELECT * FROM user WHERE id = '$OrderId' ");
	$row = mysql_fetch_assoc($res);
	
	$message .= '<div style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; width:100%;margin:20px auto 0 auto; padding:0;">
						<div id="page" style="max-width:580px; margin:0 auto; padding:0;">
							<table style="width:100%;" >
								<tr>
									<td style="width:5%;"></td>
									<td style="width:45%;" valign="top">
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Способы оплаты:</b></p>
										<table>
											<tr>
												<td style="padding:5px;">
													<img src="http://www.partadami.ru/mail/img/visa.png">
												</td>
												<td style="padding:5px;">
													<p style="padding:0;margin:0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><a style="color:#3F454B;text-decoration:none;" href="http://www.partadami.ru/shop/oplata.php?id='. base64_encode($row['phone']) .'">Банковской картой</a></p>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<img src="http://www.partadami.ru/mail/img/pdf.png">
												</td>
												<td style="padding:5px;">
													<p style="padding:0;margin:0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><a style="color:#3F454B;text-decoration:none;" href="http://www.partadami.ru/shop/oplata.php?id='. base64_encode($row['phone']) .'">Квитанция на оплату</a></p>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<img src="http://www.partadami.ru/mail/img/credit.png">
												</td>
												<td style="padding:5px;">
													<p style="padding:0;margin:0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><a style="color:#3F454B;text-decoration:none;" href="http://www.partadami.ru/shop/oplata.php?id='. base64_encode($row['phone']) .'">Кредит</a></p>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<img src="http://www.partadami.ru/mail/img/pdf.png">
												</td>
												<td style="padding:5px;">
													<p style="padding:0;margin:0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><a style="color:#3F454B;text-decoration:none;" href="http://www.partadami.ru/shop/oplata.php?id='. base64_encode($row['phone']) .'">Счет на оплату для юр.лиц</a></p>
												</td>
											</tr>
											<tr>
												<td style="padding:5px;">
													<img src="http://www.partadami.ru/mail/img/money.png">
												</td>
												<td style="padding:5px;">
													<p style="padding:0;margin:0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><a style="color:#3F454B;text-decoration:none;">На карту Сбербанка</a></p>
												</td>
											</tr>
										</table>
									</td>
									<td style="width:50%;" valign="top">
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Покупатель:</b></p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>ФИО:</b> '. $row['lastname'] .' '. $row['firstname'] .' '. $row['middlename'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>Телефон:</b> '. $row['phone'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>E-mail:</b> '. $row['email'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>Город:</b> '. $row['city'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>Комментарий:</b> '. $row['msg'] .'</p>
									</td>
								</tr>
							</table>
							<p align="center" style="border-top:1px dashed #bbb;padding:10px 0 0 0; margin:5px 0 0 0;font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#888;">Благодарим Вас за обращение в «ДЭМИ». Мы свяжемся с Вами для уточнения заказа в ближайшее время.</p>
						</div>
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
											<li style="padding:8px 0;margin:0;line-height:15px;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#0f68b1;" href="http://www.partadami.ru/shop/white/">Белые парты</a></li>
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
					<div style="width:600px; -webkit-text-size-adjust:none; background:#fff;padding:10px 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 0 0 10px 10px; -webkit-border-radius: 0 0 10px 10px; border-radius: 0 0 10px 10px;">
						<p  style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; text-align:center;"><b>Будем признательны за ОТЗЫВ!</b></p>
						<p  style="font-family: Helvetica, Arial, sans-serif; font-size: 8pt; text-align:center;">Вы можете добавить свой отзыв с фотографией по <a style="color:#0f68b1;" href="http://www.partadami.ru/otziv.php">ссылке</a></p>
					</div>
					<br><br>
		</td>
		</tr>
		</table>
		</body>
		</html>';
	
	
	#echo $message;
	
	$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n"; 
	$headers .= "CC: ". $_POST['email'] ."\r\n";
	$headers .= "CC: skodeks@mail.ru\r\n";
		mail($to, $subject, $message, $headers); 
	
	
	# Если добавление или обновление заказа прошло успешно - Удаляем товар из корзины
	if ( $insert == true ) {
		$result  = mysql_query("DELETE FROM cart WHERE sid = '". session_id() ."' ");
		$result2 = mysql_query("UPDATE `email` SET status = 'confirm' WHERE email = '$_POST[email]' ");	
	}
	# Если добавление или обновление заказа НЕ прошло успешно - Отправляем в корзину
	else { 
		echo '<script language="JavaScript">window.location.href = "/shop/shoppingcart.php"</script>';	
	}
		
	# Перенаправляем на страницу оплаты
	$confirm_id = mysql_query("SELECT * FROM user WHERE sid = '$sid' "); 
	$row = mysql_fetch_assoc($confirm_id); 
	
		echo '<script language="JavaScript">window.location.href = "/shop/confirm.php?id='. base64_encode($row['phone']) .'"</script>';	
	
	}
	else { 
	
	echo '<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заказ НЕ принят</b><br>Не заполнены обязательные поля или ссылки в комментарии!</p>
			<p align="center"><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
	 } 
	
} ?>