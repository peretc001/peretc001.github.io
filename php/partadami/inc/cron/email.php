<?php 
include ("../config.php");
error_reporting(E_ALL & ~E_NOTICE);

			 
	#Письмо № 1
	#$res = mysql_query(" SELECT * FROM email WHERE date <= NOW('Y-m-d H:i:s') and status = 'abandonedcart' and qty = '' ");
	while ($row = mysql_fetch_assoc($res)) {
	
		if ($row['email'] != '') { $email = $row['email'];
		
		// Отправляем письмо админу
		$to = $email;
		$subject = 'Ваша корзина'; 
		$message = '<body style="margin:0;padding:30px 20px;background-color:#f0f0f0;">
					<div style="width:600px; -webkit-text-size-adjust:none; background:#fff;padding:0 20px;margin:0 auto; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; border:1px solid #dedede; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;">  
						<table style="width:100%;margin:0; padding:0;">
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
					</div>
					<br>
					<div style="-webkit-text-size-adjust:auto; width:600px;background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
						<div style="padding:0 20px;">';
						
									
	$message .= '<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Добрый день.</b></p>
				<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Мы заметили что Вы положили некоторые товары в корзину, но так и не оформили заказ. Мы сохранили их для вас.</p>
				<table style="width:100%;">';
				
				$cart = mysql_query("SELECT * FROM cart WHERE email = '$email' ORDER by date ASC");
					while($row = mysql_fetch_assoc($cart)) { 
	$message .= '
				<tr>
					<td class="img" valign="top" style="width:5%; padding:5px;"><img src="http://www.partadami.ru'. $row["img"] .'" style="width:30px;"></td>
					<td class="name" valign="top" style="width:78%; padding:5px; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#000;" href="http://www.partadami.ru/'. $row["url"] .'">'. $row["name"] .'</a><br>Модель: '. $row["model"] .'. Цвет: '. $row["color"] .'</td>
					<td class="qty" valign="top" style="width:7%; padding:5px;font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;">'. $row["qty"] .' x </td>
					<td class="price" valign="top" style="width:10%; padding:5px;font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;">'. $row["price"] .'</td>
				</tr>';
				 }
				 
	$message .= '<tr>
					<td></td>
					<td style="text-align:right;padding:0 5px;"><p style="text-align:right;font-family: Helvetica, Arial, sans-serif; font-size: 12pt; color:#000;"></p></td>
					<td colspan="2" style="border-top:1px solid #555;padding:5px 0;font-family: Helvetica, Arial, sans-serif; font-size: 12pt; color:#000;" align="center"><b>';
				
				# Определяем сумму всего заказа
				$total_value = mysql_query("SELECT SUM(total) as `sum_total` FROM cart WHERE email = '$email' ");
				$query = mysql_fetch_assoc($total_value); 
				$total = $query['sum_total'];
	$message .= $total .' р.</b> </td>
				</tr>
			</table>
			<br>
		</div>
	</div>';
	$message .= '<div style="width:600px;margin:0 auto; padding:0;">
					<p style="padding:10px 0;" align="center"><a style="cursor: pointer;cursor: hand;border: 0;background: #4caf50;font-family:Helvetica; color: white;font-weight: normal; text-decoration:none; text-transform: normal;padding: 10px 20px; margin: 0; font-size: 14px; border-radius: 3px 3px 3px 3px; -moz-border-radius: 3px 3px 3px 3px; -webkit-border-top-left-radius: 3px; -webkit-border-top-right-radius: 3px; -webkit-border-bottom-right-radius: 3px; -webkit-border-bottom-left-radius: 3px;"
					href="http://www.partadami.ru/shop/abandonedcart.php?email='. $email .'">ПЕРЕЙТИ В КОРЗИНУ</a>
				</div>
	<br>';
	
	#Зачем вам парта
	$message .= '<table style="width:600px; -webkit-text-size-adjust:none; padding:0; margin:0 auto;">
								<tr>
									<td colspan="2" style="width:100%;padding:0;">
										<h1 style="font: bold 16pt Helvetica; color:#444; margin:20px 0 20px 0; padding:0;" align="center">Зачем вашему ребенку парта?</h1>
									</td>
								</tr>
								<tr>
									<td style="width:48%;padding:0 5px;">
										<p class="h1" style="text-align:justify;color:#444;background:url(http://www.partadami.ru/img/arrow/h1.png) left center no-repeat;padding:15px 0 15px 90px;font-family:Helvetica;font-size:8pt;font-weight:normal;margin:10px 0;"><span style="font-family:Helvetica;font-size:10pt;font-weight:bold;line-height:20px;">Растет вместе с ребенком</span><br>
										Парта растет вместе с ребенком с 5-ти лет и до университета (рост от 120 до 198 см)</p>
										<p class="h1" style="text-align:justify;color:#444;background:url(http://www.partadami.ru/img/arrow/h2.png) left center no-repeat;padding:15px 0 15px 90px;font-family:Helvetica;font-size:8pt;font-weight:normal;margin:10px 0;"><span style="font-family:Helvetica;font-size:10pt;font-weight:bold;line-height:20px;">Заботится об осанке</span><br>
										Парта и стул заботятся о том, чтобы ребенок сидел правильно и не сутулился</p>
									</td>
									<td style="width:48%;padding:0 5px;">
										<p class="h1" style="text-align:justify;color:#444;background:url(http://www.partadami.ru/img/arrow/h3.png) left center no-repeat;padding:15px 0 15px 90px;font-family:Helvetica;font-size:8pt;font-weight:normal;margin:10px 0;"><span style="font-family:Helvetica;font-size:10pt;font-weight:bold;line-height:20px;">Наклоняется к ребенку</span><br>
										Изменение угла наклона столешницы позволяет снять нагрузку с позвоночника</p>
										<p class="h1" style="text-align:justify;color:#444;background:url(http://www.partadami.ru/img/arrow/h4.png) left center no-repeat;padding:15px 0 15px 90px;font-family:Helvetica;font-size:8pt;font-weight:normal;margin:10px 0;"><span style="font-family:Helvetica;font-size:10pt;font-weight:bold;line-height:20px;">Стул тоже хорош</span><br>
										Стул регулируется не только по высоте но и по глубине, снижая нагрузку на позвоночник</p>
									</td>
								</tr>
							</table>';
							
	#Как правильно сидеть
	$message .= '<div style="width:600px; -webkit-text-size-adjust:none; background:#fff;padding:0 20px;margin:0 auto; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; border:1px solid #dedede; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;">  
						<h1 style="font: bold 16pt Helvetica; color:#444; margin:20px 0 20px 0; padding:0;" align="center">Как правильно сидеть</h1>
						<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Для сохранения здоровья спины и формирования правильной осанки ребенка определены общие стандарты, которым должна удовлетворять детская парта.</p>
						<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Вот некоторые из них:</p>
						<ul style="margin:20px;padding:0;">
							<li style="padding:3px 0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Школьник должен сидеть за партой и стулом, соответствующим его <a href="http://www.partadami.ru/notes/rekomendacii-po-nastrojke-party-i-stula-Demi.php">группе роста</a>.</li>
							<li style="padding:3px 0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Столешница должна наклоняться к ребенку, чтобы ребенок не наклонялся к ней. <br>Рекомендуемые настройки: </li>
								<ul style="margin:10px 30px;padding:0;">
									<li style="list-style:square;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">рисование: 0 - 5°,</li> 
									<li style="list-style:square;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">письмо: 15°,</li> 
									<li style="list-style:square;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">чтение: 30°</li>
								</ul>
							<li style="padding:3px 0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Грудь должна быть приближена к столу на расстоянии детского кулака</li>
							<li style="padding:3px 0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Тетрадь при письме необходимо наклонить влево (левше - вправо) примерно на 30 градусов, чтобы ребенку не приходилось поворачивать туловище. Наклонять голову как можно меньше.</li>
							<li style="padding:3px 0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Посадка за стулом: колени под столом образуют один прямой угол, линия бедер и спина - второй, ноги должны плотно стоят на полу.</li>
						</ul>
						<table style="width:560px;margin:0 auto;padding:0 0 20px 0;">
							<tr>
								<td align="center">
									<img src="http://www.partadami.ru/shop/img/element/element.jpg" style="width:270px;">
								</td>
								<td align="center">
									<img src="http://www.partadami.ru/shop/img/element/element2.jpg" style="width:270px;">
								</td>
							</tr>
						</table>
						<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">За таким столом позвоночник Вашего ребенка не будет испытывать больших нагрузок и ребенок будет более подвижен, весел и, самое главное, здоров.</p>
						<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Сидите правильно, и будьте здоровы!</p>
					</div>';
					
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
		echo $message;
		$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n";
		$headers .= "CC: info@partadami.ru\r\n";	
			mail($to, $subject, $message, $headers); 
			
		$qty = $row['qty']+1;
		$send_date = date('Y-m-d H:i:s', strtotime("+23 hours", strtotime(date('Y-m-d H:i:s'))));
		mysql_query("UPDATE `email` SET date = '$send_date', qty = '$qty' WHERE email = '$email' ");						
		}
		else {}
	}
	
	
	#Письмо № 2
	$res = mysql_query(" SELECT * FROM email WHERE date <= NOW('Y-m-d H:i:s') and status = 'abandonedcart' and qty = '1' ");
	while ($row = mysql_fetch_assoc($res)) {
	
		if ($row['email'] != '') { $email = $row['email'];
		
		// Отправляем письмо админу
		$to = $email;
		$subject = 'Ваша корзина'; 
		$message = '<body style="margin:0;padding:30px 20px;background-color:#f0f0f0;">
					<div style="width:600px; -webkit-text-size-adjust:none; background:#fff;padding:0 20px;margin:0 auto; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; border:1px solid #dedede; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;">  
						<table style="width:100%;margin:0; padding:0;">
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
					</div>
					<br>
					<div style="-webkit-text-size-adjust:auto; width:600px;background:#fff;padding:0 20px; margin:0 auto; color:#222; border:1px solid #dedede; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px; border-radius: 10px 10px 10px 10px;">
						<div style="padding:0 20px;">';
						
									
	$message .= '<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 12pt;"><b>Добрый день.</b></p>
				<p  style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Мы заметили что Вы положили некоторые товары в корзину, но так и не оформили заказ. Мы сохранили их для вас.</p>
				<table style="width:100%;">';
				
				$cart = mysql_query("SELECT * FROM cart WHERE email = '$email' ORDER by date ASC");
					while($row = mysql_fetch_assoc($cart)) { 
	$message .= '
				<tr>
					<td class="img" valign="top" style="width:5%; padding:5px;"><img src="http://www.partadami.ru'. $row["img"] .'" style="width:30px;"></td>
					<td class="name" valign="top" style="width:78%; padding:5px; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;"><a style="font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#000;" href="http://www.partadami.ru/'. $row["url"] .'">'. $row["name"] .'</a><br>Модель: '. $row["model"] .'. Цвет: '. $row["color"] .'</td>
					<td class="qty" valign="top" style="width:7%; padding:5px;font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;">'. $row["qty"] .' x </td>
					<td class="price" valign="top" style="width:10%; padding:5px;font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color:#555;">'. $row["price"] .'</td>
				</tr>';
				 }
				 
	$message .= '<tr>
					<td></td>
					<td style="text-align:right;padding:0 5px;"><p style="text-align:right;font-family: Helvetica, Arial, sans-serif; font-size: 12pt; color:#000;"></p></td>
					<td colspan="2" style="border-top:1px solid #555;padding:5px 0;font-family: Helvetica, Arial, sans-serif; font-size: 12pt; color:#000;" align="center"><b>';
				
				# Определяем сумму всего заказа
				$total_value = mysql_query("SELECT SUM(total) as `sum_total` FROM cart WHERE email = '$email' ");
				$query = mysql_fetch_assoc($total_value); 
				$total = $query['sum_total'];
	$message .= $total .' р.</b> </td>
				</tr>
			</table>
			<br>
		</div>
	</div>';
	$message .= '<div style="width:600px;margin:0 auto; padding:0;">
					<p style="padding:10px 0;" align="center"><a style="cursor: pointer;cursor: hand;border: 0;background: #4caf50;font-family:Helvetica; color: white;font-weight: normal; text-decoration:none; text-transform: normal;padding: 10px 20px; margin: 0; font-size: 14px; border-radius: 3px 3px 3px 3px; -moz-border-radius: 3px 3px 3px 3px; -webkit-border-top-left-radius: 3px; -webkit-border-top-right-radius: 3px; -webkit-border-bottom-right-radius: 3px; -webkit-border-bottom-left-radius: 3px;"
					href="http://www.partadami.ru/shop/abandonedcart.php?email='. $email .'">ПЕРЕЙТИ В КОРЗИНУ</a>
				</div>
	<br>';
	
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
		echo $message;
		$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
		$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n";
		$headers .= "CC: info@partadami.ru\r\n";	
			mail($to, $subject, $message, $headers); 
			
		$qty = $row['qty']+2;
		$send_date = date('Y-m-d H:i:s', strtotime("+23 hours", strtotime(date('Y-m-d H:i:s'))));
		mysql_query("UPDATE `email` SET date = '$send_date', qty = '$qty' WHERE email = '$email' ");						
		}
		else {}
	}
	

	?>