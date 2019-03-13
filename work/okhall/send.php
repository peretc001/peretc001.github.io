<?php
require( dirname(__FILE__) . '/wp-load.php');

$url = site_url();
$options = get_option( 'okHall_settings' );
// print_r($_POST);

if ($_POST['email'] != '') {

	$to  = $options['ok_email']; 
	$subject = 'OKHALL: Заявка с сайта'; 
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: OKHALL <". $options['ok_email'] .">\r\n"; 
	$message = 'Имя: <b>'. $_POST['name'] .'</b><br>Email  <b>'. $_POST['email'] .'</b><br>--- Раздел: '. $_POST['block'];
		wp_mail($to, $subject, $message, $headers);

	?>
		
		<div class="modal-header">
			<div class="introHolder inverse">
				<h3>Запрос <span>принят</span>!</h3>
			</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-12 wow animated bounceIn">
					<p class="text-center">
						<i class="fas fa-check check_ok"></i>
					</p>
				</div>
			</div>
		</div>

<?php } else { ?>

	<div class="modal-header">
			<div class="introHolder inverse">
				<h3>Запрос <span>НЕ принят</span>!</h3>
			</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-12 wow animated bounceIn">
					<p class="text-center">
						<i class="far fa-surprise"></i>
					</p>
					<p class="text-center">Не указан email</p>
				</div>
			</div>
		</div>
		
<?php } ?>