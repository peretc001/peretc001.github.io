<?php 
$admin_email = 'Mika_project@mail.ru';

if ($_POST['phone'] != '' and $_POST['human'] == 'human') {

	$to  = $admin_email; 
	$subject = 'Взрослые праздники: Заявка с сайта'; 
	$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: Mika project <mikaprojectkrd@yandex.ru>\r\n";
	if($_POST['method'] != '') {
		$message = 'Имя: <b>'. $_POST['name'] .'</b><br>Телефон:  <b>'. $_POST['phone'] .'</b><br>Способ связи: <b>'. $_POST['method'] .'</b><br>';
	} else {
		$message = 'Имя: <b>'. $_POST['name'] .'</b><br>Телефон:  <b>'. $_POST['phone'] .'</b><br>';
	}
	
		mail($to, $subject, $message, $headers);
	?>

<?php } else { ?>

<div class="error">Ошибка</div>

<?php } ?>