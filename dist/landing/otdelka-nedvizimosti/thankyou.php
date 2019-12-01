<?php 
$admin_email = 'nedvizhimosti@yandex.ru';

if ($_POST['phone'] != '' and $_POST['human'] == 'human') {

	$to  = $admin_email; 
	$subject = 'Отделка недвижимости: Заявка с сайта'; 
	$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: Отделка недвижимости <'. $admin_email .'>\r\n";
	if($_POST['data-name'] != '') {
		$message .= 'Какая форма связи: <b>'. $_POST['data-name'] .'</b><br>';
	}
	$message .= 'Имя: <b>'. $_POST['name'] .'</b><br>Телефон:  <b>'. $_POST['phone'] .'</b><br>';
	
		mail($to, $subject, $message, $headers);
	?>

<?php } else { ?>

<div class="error">Ошибка</div>

<?php } ?>