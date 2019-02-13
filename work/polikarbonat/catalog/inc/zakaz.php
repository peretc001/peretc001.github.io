<?php session_start(); 
if ($sid == '') { $sid = session_id(); }
if ($_POST['msg'] == '') {$_POST['msg'] = '';}

# Подключаем файл конфигурации
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php');
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

$ip = $_SERVER['REMOTE_ADDR'];

	if ($_POST['policy'] == '') {
	echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заказ НЕ принят</b><br>Требуется согласие с условиями политики конфиденциальности</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif ($_POST['user'] == '' or $_POST['phone'] == '') {
	echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заказ НЕ принят</b><br>Не заполнены обязательные поля (ФИО или Телефон)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif ($_POST['email'] == '' or $_POST['city'] == '') {
	echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Заказ НЕ принят</b><br>Не заполнены обязательные поля (Email или Город)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} elseif (preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg']) ){	
		echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>FUCK OFF</b></p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
} else { 
		
		
		$db = new SafeMySQL();
		$date = date('Y-m-d H:i:s'); // дата и время
		$id = $db->getOne('SELECT id FROM user WHERE sid=?s',$sid);
		$data = array('user' => $_POST['user'], 'phone' => $_POST['phone'], 'email' => $_POST['email'], 'city' => $_POST['city'],'msg' => $_POST['msg'], 'ip' => $ip);
		$data['date'] = date('Y-m-d H:i:s'); // дата и время
		if($id) {
			$db->query("UPDATE  user SET sid=?s, date=?s, ?u WHERE id = ?i", $sid, $date, $data, $id );
		} else {
			$db->query("INSERT INTO user SET id=?s, sid=?s, ?u", $id, $sid, $data );
		}
		$sql  = "INSERT INTO user SET id=?s, sid=?s, ?u ON DUPLICATE KEY UPDATE ?u";
		$db->query($sql,$id,$sid,$data,$data);

		$total_value = $db->getOne('SELECT SUM(total) as `sum_total` FROM cart WHERE sid=?s',$sid); # Сумма заказа
		$user_id = $db->getOne('SELECT id FROM user WHERE sid=?s',$sid); # Номер договора
		
		# Проверяем наличие ранее оформленного заказа данным покупателем
		$zakaz_id = $db->getOne('SELECT id FROM zakaz WHERE sid=?s',$sid);
		
		if ( $zakaz_id ) { 
			
			# Удаляем ранее оформленный заказ
			$delete = $db->query("DELETE FROM zakaz WHERE sid=?s",$sid); 
			
			# Переносим из корзины и записываем номер $user_id
			$insert = mysql_query("INSERT INTO zakaz (id, product_id, product_name, money, size, qty, url, img, total, sid, date, user_id)  
			SELECT '', product_id, product_name, money, size, qty, url, img, total, sid, date, '". $user_id ."' FROM cart WHERE sid = '$sid' ");
		}
		else {
			
			# Переносим из корзины и записываем номер $user_id
			$insert = mysql_query("INSERT INTO zakaz (id, product_id, product_name, money, size, qty, url, img, total, sid, date, user_id)  
			SELECT '', product_id, product_name, money, size, qty, url, img, total, sid, date, '". $user_id ."' FROM cart WHERE sid = '$sid' ");
		}	
		// Отправляем письмо админу
		$to  = "av.krasovskaya@mail.ru"; 
		$subject = 'ЗАКАЗ с сайта ПОЛИКАРБОНАТА.НЕТ'; 
		$message .= '<body style="width:100%;margin:0;padding:0;background-color:#f0f0f0;">
		<table style="width:100%;margin:0;padding:0;background-color:#f0f0f0;">
				<tr>
				<td>
					<br>
					<div style="width:600px;margin:0 auto;padding:0;border:none;">
						<table style="width:100%;margin:0;padding:0;border:none;">
							<tr>
								<td width="10%"></td>
								<td valign="middle" style="background:url(http://polikarbonata.net/img/logo.png) 5px 5px no-repeat; padding:15px 10px; text-align:center;">
									<p style="font-family: Helvetica, Arial, sans-serif;font-size:14pt;text-align:left;color:#191919;padding:0;margin:10px 0 0 0;font-weight:bold;">
										<a style="border:none;color:#191919;text-decoration:none;" href="http://polikarbonata.net/">ПОЛИКАРБОНАТА.НЕТ</a></p>
									<p style="font-family: Helvetica, Arial, sans-serif;font-size:8pt;text-align:left;color:#888;padding:0;margin:0 0 5px 0;">Купить поликарбонат в Краснодаре и крае</p>
								</td>
								<td valign="middle"><p style="font-family: Helvetica, Arial, sans-serif;padding:0;margin:0;font-size:10pt; color:#3F454B;"><span style="line-height:12px;text-align:left;padding:0;font-size:8pt;text-align:left;color:#888;font-weight:300;padding:0;margin:0;">Телефон для справок:</span><br><span style="font-weight:bold;font-size:16px;">8 (918) 636-27-09</span></p></td>
							</tr>
						</table>
						
						<div style="-webkit-text-size-adjust:auto; width:95%;background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;">
						<br>';
		
				$name = mysql_query("SELECT *,DATE_FORMAT(date, '%d.%m.%Y') as date_f FROM user WHERE id = '$user_id' "); 
				$row = mysql_fetch_assoc($name);
									
		$message .= '<p style="text-align:center;font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Благодарим за заказ!</b></p>
					<p  style="text-align:center;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Ваш заказ <b>№ '. $row["id"] .'Р</b> от <b>'.  $row["date_f"] .'</b></p>
					<table style="width:100%;">';
					
						$cart = mysql_query("SELECT * FROM  zakaz WHERE user_id = '$user_id' ORDER by id asc"); 
						while($row = mysql_fetch_assoc($cart)) {
				$message .= '<tr>
					<td class="img" valign="top" style="width:5%; padding:15px 5px;"><img src="http://polikarbonata.net'. $row["img"] .'" style="width:30px;"></td>
					<td class="name" valign="top" style="width:72%; padding:15px; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#000;" href="http://polikarbonata.net'. $row["url"] .'"><u>'. $row["product_name"] .'</u></a><br>';
						
				if ($row['product_id'] <= '299') { 
					$message .= '<span style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#666;">Размер листа: '. $row["size"] .'м</span><br>';
				}
				elseif ($row['product_id'] >= '400') { 
					$message .= '<span style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#666;">Размер: 3x'. $row["size"] .'м</span><br>';
				}
				
				$message .= '<span style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#666;">Цена: '. number_format($row["money"], 0, ',', ' ') .'p</spna></td>
				<td class="qty" valign="top" style="width:11%; padding:15px 5px; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#000;">'. $row["qty"] .' шт</td>
					<td class="price" valign="top" style="width:12%; padding:15px 5px; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#000;">'. number_format($row["total"], 0, ',', ' ') .'</td>
				</tr>';
				 }
				 # Определяем сумму всего заказа
							$total_value = mysql_query("SELECT SUM(total) as `sum_total` FROM zakaz WHERE user_id = '$user_id' ");
							$query = mysql_fetch_assoc($total_value); 
							$total = $query['sum_total'];
		$message .= '<tr>
					<td></td>
					<td style="text-align:right;padding:0 5px;"><p style="text-align:right;font-family: Helvetica, Arial, sans-serif; font-size: 12pt; color:#000;"><b>К оплате:</b></p></td>
					<td colspan="2" style="border-top:1px solid #555;padding:5px 0;font-family: Helvetica, Arial, sans-serif; font-size: 12pt; color:#000;" align="center"><b>'. number_format($total, 0, ',', ' ') .' р.</b> </td>
				</tr>
			</table>
			<br>
		</div>
	</div>';
		
		# Записываем данные покупателя
		$name = mysql_query("SELECT * FROM user WHERE id = '$user_id' "); 
		$row = mysql_fetch_assoc($name);
	
	$message .= '<div style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; width:100%;margin:20px auto 0 auto; padding:0;">
						<div id="page" style="max-width:580px; margin:0 auto; padding:0;">
							<table style="width:100%;" >
								<tr>
									<td style="width:50%;" valign="top">
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Покупатель:</b></p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>ФИО:</b> '. $row['user'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>Телефон:</b> '. $row['phone'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>E-mail:</b> '. $row['email'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>Город:</b> '. $row['city'] .'</p>
										<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><b>Комментарий:</b> '. $row['msg'] .'</p>
									</td>
								</tr>
							</table>
							<br>
							<p align="center" style="border-top:1px dashed #bbb;padding:10px 0 0 0; margin:5px 0 0 0;font-family: Helvetica, Arial, sans-serif; font-size: 8pt; color:#888;">Благодарим Вас за заказ. Мы свяжемся с Вами для уточнения заказа в ближайшее время.</p>
						</div>
					</div>
				</div>
			</div>
			</td>
			</tr>
			</table>';
		
		$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: polikarbonata.net <info@polikarbonata.net>\r\n"; 
		$headers .= "Bcc: info@polikarbonata.net\r\n";
		$headers .= "CC: ". $_POST['email'] ."\r\n";	
			mail($to, $subject, $message, $headers); 
	
		# Если добавление или обновление заказа прошло успешно - Удаляем запись из корзины
		if ( $insert == true ) {
			$result = mysql_query("DELETE FROM cart WHERE sid = '$sid' ");
		}
		else { echo '<script language="JavaScript">window.location.href = "/catalog/cart.php"</script>';	
		}
		
		# Перенаправляем на страницу оплаты
		echo '<script language="JavaScript">window.location.href = "/catalog/confirm.php?id='. base64_encode($row['phone']) .'"</script>';	
	
	}
	
 ?>