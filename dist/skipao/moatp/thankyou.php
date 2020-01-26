<?php 
$admin_email = 'pak@onedivision.ru';

if ($_POST['phone'] != '' and $_POST['human'] == 'human') {

	$to  = $admin_email; 
	$subject = 'МОАТП: Заявка с сайта'; 
	$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: МОАТП <'. $admin_email .'>\r\n";
		
		$message = 'От кого: <b>'. $_POST['title'] .' '.  $_POST['name'] .'</b>
		<br>ИНН:  <b>'. $_POST['inn'] .'</b>
		<br>Дата:  <b>'. $_POST['date'] .'</b>
		<br>ФИО: <b>'. $_POST['fio'] .'</b>
		<br>Телефон: <b>'. $_POST['phone'] .'</b>';
	
		mail($to, $subject, $message, $headers);
	?>

<?php } else { ?>

<div class="error">Ошибка</div>

<?php } ?>