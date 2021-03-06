<?php
require( dirname(__FILE__) . '/wp-load.php');

$url = site_url();
$options = get_option( 'okHall_settings' );
// print_r($_POST);

if ($_POST['step'] == '1') {

	$to  = $options['ok_email']; 
	$subject = $options['banner__modal__subject']; 
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: ". $options['banner__modal__from'] ." <". $options['ok_email'] .">\r\n"; 
	$message = 'Имя: <b>'. $_POST['name'] .'</b><br>Телефон:  <b>'. $_POST['phone'] .'</b><br>--- Раздел: '. $_POST['block'];
		wp_mail($to, $subject, $message, $headers);

	?>
		
		<form action="/send.php" method="post" class="okhall-form">
				<input type="hidden" name="step" value="2">
				<input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
				<div class="modal-header">
					<h3><?php echo $options['price__modal__p__intro__let2']; ?></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<p class="blue"><?php echo $options['price__modal__let2__text1']; ?></p>
					<div class="row no-border">
						<div class="col-12 col-lg-6">
							<input type="email" name="email" class="form-control" value="" placeholder="e-mail" required>
							<p class="form__two__grey"><?php echo $options['price__modal__let2__text2']; ?></p>
						</div>
						<div class="col-12 col-lg-6">
							<button type="submit" class="form__one__button">Отправить</button>
						</div>
					</div>
				</div>
			</form>
			<script>
				$(function() {
					$('.okhall-modal').removeClass('fadeInDown');
					$('.okhall-form').submit(function(e){
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
								$('.okhall-form').hide();
								$('.okhall-modal').append(result).addClass('fadeInDown');
							}
						});
					});
				})
			</script>

		

<?php } else { 

$to  = $_POST['email']; 
	$subject = $options['price__modal__subject__let2'];
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: ". $options['price__modal__from__let2'] ." <". $options['ok_email'] .">\r\n";
	$message = '
	<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700|Roboto:300,400,500,700" rel="stylesheet">
		<title>OK.HALL - ПУТЕВОДИТЕЛЬ ПО РЕМОНТУ</title>
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
		                                                <p style="text-align:center;font-size:14px;color:#fff"><strong style="font-size:36px;font-weight:700;">ПУТЕВОДИТЕЛЬ <span style="color:#ffae04">ПО РЕМОНТУ</span></strong><br>
		                                                    <span style="color:#888;font-size:26px;">В нем мы собрали 100 СОВЕТОВ для начинающих ремонт</span></p>
		                                                <p style="display:inline-block;vertical-align: middle;"><a href="'. $url .'/'. $options["price__100"] .'" style="color:#fff;font-weight: bold;font-size: 18px;text-decoration: none;"><img src="'. $url .'/wp-content/themes/okhall/img/email/pdf.png" style="display:inline-block;width: 24px; height: 24px; margin: 0 5px 0 0;"> <span style="display:inline-block; margin: 0;font-size:26px;">Скачать</span></a></p>
		                                                
		                                               
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
		                                                <p style="text-align:center;font-size:26px">© OKHALL</p>
		                                                <p style="text-align:center;font-size:26px">Телефон: <b>+7 (925) 344-25-77</b></p>
		                                                <p style="text-align:center;max-width:30%;border-bottom: 1px solid #ccc;margin: 0 auto;">&nbsp;</p>
		                                            </td>
		                                        </tr>
		                                       <tr>
		                                            <td>
		                                                <p style="text-align:center;font-size:14px"><a href="https://vk.com/id244931621"><img src="'. $url .'/wp-content/themes/okhall/img/email/vk.png" style="width: 30px; height: 30px; margin: 0 5px 0 0;"></a> <a href="https://www.facebook.com/missulixy"><img src="'. $url .'/wp-content/themes/okhall/img/email/facebook.png" style="width: 30px; height: 30px; margin: 0 5px 0 0;"></a>
		                                               <a href="https://www.instagram.com/uliyakurbanniyazova/"><img src="'. $url .'/wp-content/themes/okhall/img/email/instagram.png" style="width: 30px; height: 30px; margin: 0;"></a></p>
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

	$to_adm  = $options['ok_email']; 
	$subject_adm = 'OK.HALL: Скачан путеводитель'; 
	$headers_adm[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers_adm[] = "From: ". $options['price__modal__from'] ." <". $options['ok_email'] .">\r\n"; 
	$message_adm = 'Посетитель <b>'. $_POST['name'] .'</b> указал email и скачал путеводитель.<br>Email  <b>'. $_POST['email'] .'</b>';
		wp_mail($to_adm, $subject_adm, $message_adm, $headers_adm); 

	?>
		
		<div class="modal-header">
			<div class="form__three__header">
				<h3>Путеводитель <span>отправлен!</span></h3>
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

	<? } ?>