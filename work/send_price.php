<?php
require( dirname(__FILE__) . '/wp-load.php');

$url = site_url();
$options = get_option( 'okHall_settings' );
// print_r($_POST);

if ($_POST['step'] == '1') {

	$to  = $options['ok_email']; 
	$subject = 'Заявка на рассчет стоимости'; 
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: OKHALL <". $options['ok_email'] .">\r\n"; 
	$message = 'Имя: <b>'. $_POST['name'] .'</b><br>Телефон  <b>'. $_POST['phone'] .'</b><br>Тип жилья:  <b>'. $_POST['home'] .'</b><br>Примерная площадь:  <b>'. $_POST['square'] .'</b><br>Планирую приступить к ремонту:  <b>'. $_POST['time'] .'</b>';
		wp_mail($to, $subject, $message, $headers); 
?>

<form action="/send_price.php" method="post" id="step2">
				<input type="hidden" name="step" value="2">
				<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
				<div class="modal-header">
					<div class="form__two__header">
						<h2>Получите <span>в подарок</span> путеводитель по ремонту</h2>
						<p>В нем мы собрали 100 СОВЕТОВ для начинающих ремонт</p>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					
						<div class="row no-border">
							<div class="col-12 col-lg-6">
								<input type="email" name="email" class="form-control" value="" placeholder="e-mail">
								<p class="form__two__grey">Оставьте e-mail, чтобы получить советы.<br>Мы не будем доставать рекламой.</p>
							</div>
							<div class="col-12 col-lg-6">
								<button type="submit" class="form__one__button">Отправить</button>
							</div>
						</div>
					
				</div>
			</form>
			<script>
				$(function() {
					$('.price__form').removeClass('fadeInDown');
					$('#step2').submit(function(e){
						//отменяем стандартное действие при отправке формы
						e.preventDefault();
						//берем из формы метод передачи данных
						var m_method=$(this).attr('method');
						//получаем адрес скрипта на сервере, куда нужно отправить форму
						var m_action=$(this).attr('action');
						//получаем данные, введенные пользователем в формате input1=value1&input2=value2...,
						//то есть в стандартном формате передачи данных формы
						var m_data=$(this).serialize();
						$.ajax({
							type: m_method,
							url: m_action,
							data: m_data,
							success: function(result){
								$('#step2').hide();
								$('.price__form').append(result).addClass('fadeInDown');
							}
						});
					});
				})
			</script>
<?php }
	else { 

	$to  = $_POST['email']; 
	$subject = 'OKHALL - ПУТЕВОДИТЕЛЬ ПО РЕМОНТУ'; 
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: www.partadami.ru <info@partadami.ru>\r\n"; 
	$message = '
	<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700|Roboto:300,400,500,700" rel="stylesheet">
		<title>OKHALL - ПУТЕВОДИТЕЛЬ ПО РЕМОНТУ</title>
	</head>
	<body style="font-family:Roboto, Helvetica, Arial, sans-serif; background-color:#f4fafa; margin:0; padding:0; color:#222; font-size:16px; font-weight:300; line-height:20px; box-sizing: border-box; text-size-adjust:none; -webkit-text-size-adjust:none; -ms-text-size-adjust:none;">

		<table width="100%" bgcolor="#f4fafa" cellpadding="0" cellspacing="0" border="0">
		    <tbody>
		        <tr>
		            <td style="padding:40px;">
		                <!-- begin main block -->
		                <table cellpadding="0" cellspacing="0" width="100%" border="0" align="center" style="max-width: 600px;box-sizing: border-box;">
		                    <tbody>
		                        <tr>
		                            <td style="text-align:center;">
		                                <p style="padding:0;margin:20px auto 10px auto;">
		                                    <a href="'. $url .'"><img src="'. $url .'/wp-content/themes/okhall/img/email/logo.png" style="width: 80px; height: 80px; margin: 0;"></a>
		                                </p>
		                                <br>
		                                

		                                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:url('. $url .'/wp-content/uploads/2019/02/Img_4_Acquaintance.jpg);background-size:cover;border-radius: 10px;">
		                                    <tbody>
		                                        <tr>
		                                            <td style="border-radius:6px;padding:150px 20px 120px 20px;margin:0;text-align: center;">
		                                                <!-- begin content -->
		                                                <p style="text-align:center;font-size:14px;color:#fff"><strong style="font-size:18px;font-weight:700;">ПУТЕВОДИТЕЛЬ <span style="color:#ffae04">ПО РЕМОНТУ</span></strong><br>
		                                                    <span style="color:#888;">В нем мы собрали 100 СОВЕТОВ для начинающих ремонт</span></p>
		                                                <p style="display:inline-block;vertical-align: middle;"><a href="'. $options["price__100"] .'" style="color:#fff;font-weight: bold;font-size: 18px;text-decoration: none;"><img src="'. $url .'/wp-content/themes/okhall/img/email/pdf.png" style="display:inline-block;width: 24px; height: 24px; margin: 0 5px 0 0;"> <span style="display:inline-block; margin: 0;">Скачать</span></a></p>
		                                                
		                                               
		                                                <!-- end content --> 
		                                            </td>
		                                        </tr>
		                                    </tbody>
		                                </table>
		                                
		                                <br>
		                                <table cellpadding="0" cellspacing="0" width="608" border="0" align="center">
		                                    <tbody>
		                                        <tr>
		                                            <td>
		                                                <p style="text-align:center;font-size:14px">© OKHALL</p>
		                                                <p style="text-align:center;font-size:14px">Телефон: <b>+7 (925) 344-25-77</b></p>
		                                                <p style="text-align:center;max-width:30%;border-bottom: 1px solid #ccc;margin: 0 auto;">&nbsp;</p>
		                                            </td>
		                                        </tr>
		                                       <tr>
		                                            <td>
		                                                <p style="text-align:center;font-size:14px"><a href="https://vk.com/id244931621"><img src="'. $url .'/wp-content/themes/okhall/img/email/vk.png" style="width: 24px; height: 24px; margin: 0 5px 0 0;"></a> <a href="https://www.facebook.com/missulixy"><img src="'. $url .'/wp-content/themes/okhall/img/email/facebook.png" style="width: 24px; height: 24px; margin: 0 5px 0 0;"></a>
		                                               <a href="https://www.instagram.com/uliyakurbanniyazova/"><img src="'. $url .'/wp-content/themes/okhall/img/email/instagram.png" style="width: 24px; height: 24px; margin: 0;"></a></p>
		                                                     
		                                            </td>
		                                        </tr>
		                                    </tbody>
		                                </table>
		                            </td>
		                        </tr>
		                    </tbody>
		                </table>
		                <!-- end main block -->
		            </td>
		        </tr>
		    </tbody>
		</table>
	</body>
	</html>';
		
	wp_mail($to, $subject, $message, $headers); 

	$to  = $options['ok_email']; 
	$subject = 'Заявка на рассчет стоимости'; 
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: OKHALL <". $options['ok_email'] .">\r\n"; 
	$message = 'Посетитель <b>'. $_POST['name'] .'</b> указал email и скачал путеводитель.<br>Email  <b>'. $_POST['email'] .'</b>';
		wp_mail($to, $subject, $message, $headers); 

	?>
		
		<div class="modal-header">
			<div class="form__three__header">
				<h2>Ваш запрос <span>принят</span>!</h2>
			</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row no-border no-padding">
				<div class="col-12">
					<p class="form__three__text text-center">
						В рабочее время (с 10:00 до 20:00) перезвоним в течение 30 минут.<br> В выходные в течение 1 часа
					</p>
					<p class="form__three__text text-center">
						Если сейчас нерабочее время, то позвоним завтра с 10:00 до 12:00,<br> предварительно написав в Whatsapp или Viber
					</p>
					
					<p class="form__three__bottom text-center">
						<span>Не хотите ждать?</span>
						<br>
						Звоните или пишите:
						<br>
						<b>+7 (925) 344-25-77</b> - Юлия
					</p>
				</div>
			</div>
		</div>

	<? }	