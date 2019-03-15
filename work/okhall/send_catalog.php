<?php
require( dirname(__FILE__) . '/wp-load.php');

$url = site_url();
$options = get_option( 'okHall_settings' );
// print_r($_POST);

if ($_POST['email'] != '') {

	$to_adm  = $options['ok_email']; 
	$subject_adm = $options['photos__modal__subject'];
	$headers_adm[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers_adm[] = "From: ". $options['photos__modal__from'] ." <". $options['ok_email'] .">\r\n"; 
	$message_adm = 'Имя: <b>'. $_POST['name'] .'</b><br>Email  <b>'. $_POST['email'] .'</b><br>--- Скачал каталог';
		wp_mail($to_adm, $subject_adm, $message_adm, $headers_adm); 

	$to  = $_POST['email']; 
	$subject = $options['photos__modal__subject'];
	$headers[]  = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers[] = "From: ". $options['photos__modal__from'] ." <". $options['ok_email'] .">\r\n";
	$message = '
	<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:700|Roboto:300,400,500,700" rel="stylesheet">
		<title>'. $options['photos__modal__subject'] .'</title>
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
		                                                <p style="text-align:center;font-size:14px;color:#fff"><strong style="font-size:36px;font-weight:700;">КАТАЛОГ <span style="color:#ffae04">НАШИХ РАБОТ</span></strong><br>
		                                                    <span style="color:#888;font-size:26px;">В нем мы собрали наши лучшие проекты</span></p>
		                                                <p style="display:inline-block;vertical-align: middle;font-size:28px;"><a href="'. $url .'/'. $options['photos__btn__href'] .'" style="color:#fff;font-weight: bold;font-size: 18px;text-decoration: none;"><img src="'. $url .'/wp-content/themes/okhall/img/email/pdf.png" style="display:inline-block;width: 24px; height: 24px; margin: 0 5px 0 0;"> <span style="display:inline-block; margin: 0;">Скачать</span></a></p>
		                                                
		                                               
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

	?>
		
		<div class="modal-header">
			<div class="introHolder inverse">
				<h3>Каталог <span>отправлен!</span></h3>
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
					<p class="text-center">
						<b>Проверьте почту</b>
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