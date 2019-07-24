<?php 
$admin_email = 'i.krasovsky@yandex.ru';

if ($_POST['phone'] != '' and $_POST['human'] == 'human') {

	$to  = $admin_email; 
	$subject = 'Заявка с сайта'; 
	$headers .= "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: ". $admin_email ." <". $admin_email .">\r\n"; 
	if($_POST['name'] !== '') {
		$message .= 'Имя: <b>'. $_POST['name'] .'</b><br>';
	}
	$message .= 'Телефон:  <b>'. $_POST['phone'] .'</b><br>';
		mail($to, $subject, $message, $headers);
	?>

<?php } else { ?>

<div class="error">Ошибка</div>

<?php } ?>