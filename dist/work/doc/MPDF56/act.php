<?

include('./mpdf.php');
$id = htmlspecialchars(trim($_GET['id'])); 
$user_id = htmlspecialchars(trim($_GET['user_id'])); 
include '../config.php'; 


#Функция вывода русского месяца
function rdate($param, $time=0) {
	if(intval($time)==0)$time=time();
	$MonthNames=array('января' , 'февраля' , 'марта' , 'апреля' , 'мая' , 'июня' , 'июля' , 'августа' , 'сентября' , 'октября' , 'ноября' , 'декабря');
	if(strpos($param,'M')===false) return date($param, $time);
	else return date(str_replace('M',$MonthNames[date('n',$time)-1],$param), $time);
}

	$row = mysql_query("SELECT * FROM `booking` WHERE id = '$id'"); 
	$row = mysql_fetch_assoc($row); 
	
	$user = mysql_query("SELECT * FROM `user` WHERE id = '$user_id'"); 
	$user = mysql_fetch_assoc($user); 

$html ='
<html>
		<head>
			<title>Акт приема-передачи № '. $id .'</title>  
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
        <body>
			<div class="header">
				<h1>Акт приема-передачи №  '. $id .' от '. rdate('d M Y', strtotime($row['date1'])) .' г.</h1>
			</div>
			
				<p>Настоящий акт приема передачи транспортного средства составлен к Договору аренды транспортного средства № '. date('Ymd', strtotime($row['date'])) .' от '. rdate('d M Y', strtotime($row['date'])) .' года и является неотъемлемой частью данного договора.</p>
				<div class="booking_auto">
					<table>
						<tr>
							<td class="left">Автомобиль:</td>
							<td class="right">INFINITI FX35, VIN JN1TANS51U0303429</td>
						</tr>
						<tr>
							<td>Регистрационный знак:</td>
							<td>Т 572 ТР 123</td>
						</tr>
						<tr>
							<td>Водитель:</td>
							<td><b>'. $user['userfirstname'] .' '. $user['username'] .' '. $user['userlastname'] .', '. date('d.m.Y', strtotime($user['birthday'])) .' года рождения, '. $user['birthday_city'] .', паспорт '. $user['pas_s'] .' '. $user['pas_n'] .', выдан '. date('d.m.Y', strtotime($user['pas_date'])) .' '. $user['pas_who'] .', зарегистрирован '. $user['pas_reg'] .', водительское удостоверение '. $user['vy_s'] .' '. $user['vy_n'] .' от '. date('d.m.Y', strtotime($user['vy_date'])) .'</b></td>
						</tr>
					</table>
				</div>
				<p class="block">Комплектность, дополнительное оборудование, <br>оценочная стоимость и описание повреждений (дефектов) а/м</p>
				<div class="act">
					<table>
						<tr>
							<td class="center">Передача</td>
							<td class="center">Приём</td>
							<td colspan="4" class="center">Стоимость штрафа в случае утери или порчи комплектующих, указана за 1 ед.</td>
							<td class="center">Передача</td>
							<td class="center">Приём</td>
						</tr>
						<tr>
							<td class="col-1 center">+</td>
							<td class="col-1">&nbsp;</td>
							<td class="col-2">Свидетельство о регистрации 1 шт.</td>
							<td class="col-3">5000 руб.</td>
							<td class="col-2">Государственные номера 2 шт.</td>
							<td class="col-3">1500 руб.</td>
							<td class="col-1 center">+</td>
							<td class="col-1">&nbsp;</td>
						</tr>
						<tr>
							<td class="center">+</td>
							<td></td>
							<td>Ключ от автомобиля 1 комплект</td>
							<td>5000 руб.</td>
							<td>Баллонный ключ 1 шт.</td>
							<td>500 руб.</td>
							<td class="center">+</td>
							<td></td>
						</tr>
						<tr>
							<td class="center">+</td>
							<td></td>
							<td>Талон госуд. тех. Осмотра 1 шт.</td>
							<td>2000 руб.</td>
							<td>Автошины 5 шт.</td>
							<td>10000 руб.</td>
							<td class="center">+</td>
							<td></td>
						</tr>
						<tr>
							<td class="center">+</td>
							<td></td>
							<td>Полис ОСАГО 1 шт. </td>
							<td>2000 руб.</td>
							<td>Колесные диски 5 шт. </td>
							<td>10000 руб.</td>
							<td class="center">+</td>
							<td></td>
						</tr>
						<tr>
							<td class="center">+</td>
							<td></td>
							<td>Резиновые коврики 4 шт.</td>
							<td>500 руб.</td>
							<td>Бензин в баке автомобиля </td>
							<td>50 руб./л</td>
							<td class="center">+</td>
							<td></td>
						</tr>
					</table>
				</div>
				<div class="teh">
					<table>
						<tr>
							<td><img src="./auto.jpg"></td>
							<td  class="right">
								<p><b>Обозначение повреждений:</b></p>
								<table>
									<tr>
										<td><b>Передача</b></td>
										<td><b>Приём</b></td>
										<td></td>
									</tr>
									<tr>
										<td><b>А</b></td>
										<td><b>А1</b></td>
										<td>Царапина</td>
									</tr>
									<tr>
										<td><b>П</b></td>
										<td><b>П1</b></td>
										<td>Повреждение</td>
									</tr>
									<tr>
										<td><b>О</b></td>
										<td><b>О1</b></td>
										<td>Отсутствует</td>
									</tr>
									<tr>
										<td><b>С</b></td>
										<td><b>С1</b></td>
										<td>Скол</td>
									</tr>
									<tr>
										<td><b>Ч</b></td>
										<td><b>Ч1</b></td>
										<td>Счес</td>
									</tr>
									<tr>
										<td><b>Т</b></td>
										<td><b>Т1</b></td>
										<td>Трещина</td>
									</tr>
									<tr>
										<td><b>B</b></td>
										<td><b>B1</b></td>
										<td>Вмятина</td>
									</tr>
								</table>
								<p><b>Состояние:</b></p>
								<table>
									<tr>
										<td colspan="2" vAlign="middle"><b>Чистый/Грязный</b></td>
										<td><b>Спидометр / Бензин</b></td>
									</tr>
									<tr>
										<td rowspan="2" vAlign="middle" width="60px"><b>Передача:</b></td>
										<td align="left">Кузов<br>&#10065; чистый &#10065; грязный</td>
										<td rowspan="2"><img src="/MPDF56/fuel.svg" style="width:60px;"></td>
									</tr>
									<tr>
										<td align="left">Салон<br>&#10065; чистый &#10065; грязный</td>
									</tr>
									<tr>
										<td rowspan="2" vAlign="middle" width="60px"><b>Прием:</b></td>
										<td align="left">Кузов<br>&#10065; чистый &#10065; грязный</td>
										<td rowspan="2"><img src="/MPDF56/fuel.svg" style="width:60px;"></td>
									</tr>
									<tr>
										<td align="left">Салон<br>&#10065; чистый &#10065; грязный</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="dop">
					<table>
						<tr>
							<td>Оплаченные доп.услуги (руб.):</td>
							<td>Подача</td>
							<td>Возврат</td>
							<td>Мойка</td>
						</tr>
					</table>
				</div>
				<div class="note">
					<table>
						<tr>
							<td>Повреждения салона автомобиля</td>
							<td class="line"></td>
						</tr>
						<tr>
							<td>Замечания по автомобилю</td>
							<td class="line"></td>
						</tr>
						<tr>
							<td colspan="2" style="text-align:justify;">Автомобиль передается в технически исправном состоянии, регистрационные номера автомобиля сверены и соответствуют указанным в документах, комплектность автомобиля проверена.</td>
						</tr>
					</table>
				</div>

				<p class="block">ПОДПИСИ СТОРОН</p>
				<div class="user">
					<table>
						<tr>
							<td>
								<p><b>Принял:</b></p>
								<p>Автомобиль принял:</p>
								<br>
								<br>
								<p>________________________/ '. $user['userfirstname'] .' '. $user['username'] .' '. $user['userlastname'] .'</p>
								<br>
								<br>
								<p>«____»___________________2018 г. время ______:______</p>
							</td>
							<td>
								<p><b>Передал:</b></p>
								<p>Автомобиль передал:</p>
								<br>
								<br>
								<p>________________________/ _______________________</p>
								<br>
								<br>
								<p>«____»___________________2018 г.</p>
							</td>
						<tr>
					</table>
				</div>
				<div class="user">
					<table>
						<tr>
							<td>
								<p><b>Передал:</b></p>
								<p>Автомобиль передал:</p>
								<br>
								<br>
								<p>________________________/ '. $user['userfirstname'] .' '. $user['username'] .' '. $user['userlastname'] .'</p>
								<br>
								<br>
								<p>«____»___________________2018 г. время ______:______</p>
							</td>
							<td>
								<p><b>Принял:</b></p>
								<p>Автомобиль принял:</p>
								<br>
								<br>
								<p>________________________/ _______________________</p>
								<br>
								<br>
								<p>«____»___________________2018 г.</p>
							</td>
						<tr>
					</table>
				</div>
			</div>
        </body>
</html>';

$mpdf=new mPDF();
$mpdf=new mPDF('','', 0, '', 15, 15, 6, 16, 9, 9, 'L');
$mpdf->ignore_invalid_utf8 = true;
$mpdf->SetAutoFont(AUTOFONT_ALL);
$mpdf->SetDisplayMode('fullpage');
$stylesheet = file_get_contents('./print.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html); 
$mpdf->Output('Договор N '. $id .'_'. $row['userfirstname'] .'.pdf', 'I');
 
 
?>