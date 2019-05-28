<?

include('./mpdf.php');
include '../config.php'; 

$id = htmlspecialchars(trim($_GET['id'])); 
$user_id = htmlspecialchars(trim($_GET['user_id'])); 
$general = htmlspecialchars(trim($_GET['general'])); 
$dop_number = htmlspecialchars(trim($_GET['dop_number'])); 


#Функция вывода русского месяца
function rdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array('января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря');
	if(strpos($param,'M')===false) return date($param, $time);
	else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
}
	#Текущая аренда
	$row = mysql_query("SELECT * FROM `booking` WHERE id = '$id'"); 
	$row = mysql_fetch_assoc($row);

	# Прошлая аренда
	$last_row = mysql_query("SELECT * FROM `booking` WHERE id = ". $general); 
	$last_row = mysql_fetch_assoc($last_row);  
	
	#Данные клиента
	$user = mysql_query("SELECT * FROM `user` WHERE id = '$user_id'"); 
	$user = mysql_fetch_assoc($user); 

$html .='
<html>
		<head>
			<title>Дополнение соглашение № '. $dop_number .'</title>  
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
        <body>
			<div class="header">
				<h1>Дополнение соглашение № '. $dop_number .' к<br>Договору N  '. date("Ymd", strtotime($last_row["date"])) .' от '. rdate("d M Y", strtotime($last_row["date"])) .'</h1>
				<p class="center">аренды транспортного средства (автомобиля) без экипажа</p>
				<table width="100%">
					<tr>
						<td width="20%">г. Краснодар</td>
						<td width="60%">&nbsp;</td>
						<td width="20%" style="text-align:right;">'. rdate("d M Y", strtotime($row["date"])) .'</td>
					</tr>
				</table>
			</div>
			<div class="text" style="text-align:justify;">
				<p>Индивидуальный предприниматель Красовская А.В., именуемый в дальнейшем <b>«Арендодатель»</b>, с одной стороны и Гражданин(ка) РФ <b>'. $user['userfirstname'] .' '. $user['username'] .' '. $user['userlastname'] .', '. date('d.m.Y', strtotime($user['birthday'])) .' года рождения, '. $user['birthday_city'] .', паспорт '. $user['pas_s'] .' '. $user['pas_n'] .', выдан '. date('d.m.Y', strtotime($user['pas_date'])) .' '. $user['pas_who'] .', зарегистрирован '. $user['pas_reg'] .', водительское удостоверение '. $user['vy_s'] .' '. $user['vy_n'] .' от '. date('d.m.Y', strtotime($user['vy_date'])) .'</b>, именуемый(ая) в дальнейшем «Арендатор»,  с другой стороны, руководствуясь ст. 642 ГК РФ, заключили настоящее дополнительное соглашение о нижеследующем:</p>
				<br>
				<p>По договоренности Сторон  срок аренды продлевается и  устанавливается с <span class="date"> '. rdate('d M', strtotime($row['date1'])) .' по '. rdate('d M', strtotime($row['date2'])) .' '. date('Y', strtotime($row['date2'])) .' </span> согласно Акту приема-передачи авто, являющегося неотъемлемой частью Договора.</p>
				<br>
				<p>Арендатор производит оплату арендной платы предварительно (100% предоплата) за весь период аренды в рублях РФ путем внесения денежных средств на счет Арендодателя либо наличными.</p>
				<br>
				<p>Размер арендной платы определяется исходя из следующего расчета:</p>
				<br>
				<div class="booking">
					<table>
						<tr>
							<td>Арендная плата за 1 сутки (руб.)</td>
							<td>Количество суток</td>
							<td>Общая сумма (руб.)</td>
						</tr>
						<tr>
							<td>'. $row['price'] .'</td>
							<td>'. $row['count'] .'</td>
							<td>'. $row['total'] .'</td>
						</tr>
						<tr>
							<td class="noborder"></td>
							<td><b>Итого</b></td>
							<td><b>'. $row['total'] .'</b></td>
						</tr>
					</table>
				</div>
				<br>
				<p class="block">РЕКВИЗИТЫ И ПОДПИСИ СТОРОН</p>
				<div class="user">
					<table>
						<tr>
							<td>
								<p><b>Арендодатель</b></p>
								<p>ИП Красовская А.В.</p>
								<p>ИНН 010519930452</p>
								<p>Краснодар, ул. Тургенева, 56</p>
								<p>Тел: 8 (928) 210-23-35</p>
								<br>
								<br>
								<br>
								<br>
								<br>
								<p>________________________/ Красовская А.В.</p>
							</td>
							<td>
								<p><b>Арендатор</b></p>
								<p>'. $user['userfirstname'] .' '. $user['username'] .' '. $user['userlastname'] .'</p>
								<p>'. date('d.m.Y', strtotime($user['birthday'])) .' года рождения, '. $user['birthday_city'] .'</p>
								<p>паспорт '. $user['pas_s'] .' '. $user['pas_n'] .', выдан '. date('d.m.Y', strtotime($user['pas_date'])) .' '. $user['pas_who'] .'</p>
								<p>зарегистрирован '. $user['pas_reg'] .'</p>
								<p>водительское удостоверение '. $user['vy_s'] .' '. $user['vy_n'] .' от '. date('d.m.Y', strtotime($user['vy_date'])) .'</p>
								<p>Тел: '. $user['phone'] .'</p>
								<br>
								<br>
								<p>________________________/ '. $user['userfirstname'] .' '. $user['username'] .' '. $user['userlastname'] .'</p>
							</td>
						<tr>
					</table>
				</div>
			</div>';
$html .= '<pagebreak />';

$html .='
			<div class="header">
				<h1>ДОВЕРЕННОСТЬ НА ПРАВО УПРАВЛЕНИЯ АВТОМОБИЛЕМ</h1>
				<table width="100%">
					<tr>
						<td width="20%">г. Краснодар</td>
						<td width="60%">&nbsp;</td>
						<td width="20%" style="text-align:right;">'. rdate('d M Y', strtotime($row['date'])) .'</td>
					</tr>
				</table>
			</div>
			<div class="text" style="text-align:justify;">
				<p>ИП Красовская А.В., доверяет управление и эксплуатацию автомобиля, принадлежащего на основании Договора аренды № 3452 от 26.12.2016 года:</p>
				<div class="auto">
					<table>
						<tr>
							<td>Марка, модель ТС</td>
							<td>INFINITI FX35</td>
						</tr>
						<tr>
							<td>Регистрационный номер	Т 572 ТР 123</td>
							<td>Т 572 ТР 123</td>
						</tr>
						<tr>
							<td>Идентификационный номер (VIN)</td>
							<td>JN1TANS51U0303429</td>
						</tr>
						<tr>
							<td>Год изготовления</td>
							<td>2009</td>
						</tr>
						<tr>
							<td>Модель, N двигателя</td>
							<td>VQ35  735964C</td>
						</tr>
						<tr>
							<td>Цвет кузова (кабины, прицепа)</td>
							<td>ЧЕРНЫЙ</td>
						</tr>
						<tr>
							<td>Мощность двигателя, л.с. (кВт)</td>
							<td>307 Л.С., 226кВт</td>
						</tr>
						<tr>
							<td>Свидетельство о регистрации ТС</td>
							<td>Серия 2348 № 244939 от 14.02.2017 г.</td>
						</tr>
					</table>
				</div>
				<br>
				<p>Доверенное лицо:</p>
				<br>
				<div class="auto">
					<table>
						<tr>
							<td>Гражданин (ка)</td>
							<td>
								'. $user['userfirstname'] .' '. $user['username'] .' '. $user['userlastname'] .' '. date('d.m.Y', strtotime($user['birthday'])) .' года рождения, '. $user['birthday_city'] .'				
							</td>
						</tr>
						<tr>
							<td>Паспорт</td>
							<td>
								'. $user['pas_s'] .' '. $user['pas_n'] .', выдан '. date('d.m.Y', strtotime($user['pas_date'])) .' '. $user['pas_who'] .'
							</td>
						</tr>
						<tr>
							<td>Адрес регистрации</td>
							<td>'. $user['pas_reg'] .'</td>
						</tr>
						<tr>
							<td>Водительское удостоверение</td>
							<td>'. $user['vy_s'] .' '. $user['vy_n'] .' от '. date('d.m.Y', strtotime($user['vy_date'])) .'</td>
						</tr>
					</table>
				</div>
				<br>
				<p><b>Доверенность выдана без права передоверия.</b></p>
				<p>Территория действии доверенности – Российская Федерация.</p>
				<br>
				<p>Выезд за пределы Краснодарского края допустим только по согласованию с «Арендодателем».</p>
				<p><b>Выезд за пределы Российской Федерации, а также в въезд в Чеченскую республика, республику Северная Осетия-Алания, республику Дагестан, республику Ингушетия, республику Карачаево-Черкесия, республику Кабардино-Балкария ЗАПРЕЩЕН.</b></p>
				<br>
				<p>Разрешенные территории:</p>
				<p><b>Краснодарский край и Республика Адыгея</b></p>
				<br>
				<p>Доверенность выдана на срок до '. rdate('d M', strtotime($row['date2'])) .' '. date('Y', strtotime($row['date2'])) .' года</p>
				<br>
				<br>
				<br>
				<br>
				<p>_________________________ ИП Красовская А.В.</p>
';



$mpdf=new mPDF();
$mpdf=new mPDF('','', 0, '', 15, 15, 6, 16, 9, 9, 'L');
$mpdf->ignore_invalid_utf8 = true;
$mpdf->SetAutoFont(AUTOFONT_ALL);
$mpdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('./print.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html); 
$mpdf->Output('Договор N '. date("Ymd", strtotime($row["date"])) .'.pdf', 'I');
 
 
?>