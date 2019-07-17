<?php 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/form/safemysql.class.php';
error_reporting(E_ALL & ~E_NOTICE);
// Достаем id
	if ($email == '') { $email = htmlspecialchars(trim($_GET['email']));}
	elseif ($email == '') { $email = $_POST['email']; }
	else { $email = ''; }
	
	$db = new SafeMySQL();
	

	?>
	<div style="width:100%;margin:0 auto; padding:30px 0;">
				<body style="margin:0;padding:30px 20px;background-color:#f0f0f0;">
					<div style="width:600px; -webkit-text-size-adjust:none; background:#fff;padding:0 20px;margin:0 auto; font-family: Helvetica, Arial, sans-serif; font-size: 10pt; border:1px solid #dedede; border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-top-left-radius: 10px; -webkit-border-top-right-radius: 10px; -webkit-border-bottom-right-radius: 10px; -webkit-border-bottom-left-radius: 10px;">  
						<table style="width:100%;margin:0; padding:0;">
							<tr>
								<td style="padding:10px 5px;">
									<p><a style="text-decoration:none; border:none; padding:0; margin:0;" href="http://www.partadami.ru">
									<img style="border:none;" src="http://www.partadami.ru/img/top/logo.png" alt="Парта ДЭМИ, парта трансформер ДЕМИ"></a></p>
								</td>
								<td style="padding:0px 0px 0 10px; text-align:left; color:#3F454B;">
									<div style="background:url(http://www.partadami.ru/img/top/line.png) left center no-repeat; margin:0; padding:0px 15px 0 25px;">
									<a style="color:#888; text-decoration:none;" href="http://www.partadami.ru">
										<p style="text-transform:uppercase; font-size:8pt; text-align:left; color:#888; padding:0; margin:0 0 2px 0;">
											<b style="text-transform:uppercase; color: #3F454B; text-align:left;">Парты трансформеры</b>
										</p>
										<p style="text-transform:uppercase; font-size:7pt; text-align:left; color:#888; padding:0; margin:0 0 2px 0;">Официальный поставщик<br> на Юге России</a></p></div></td> 
								<td><p style="background:url(http://www.partadami.ru/mail/img/catalog.png) left center no-repeat; padding:5px 15px 5px 30px; font-size:10pt; color:#3F454B;"><a style="text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/shop/">Каталог</a></p></td>
								<td><p style="background:url(http://www.partadami.ru/mail/img/map.png) left center no-repeat; padding:5px 15px 5px 30px; font-size:10pt; color:#3F454B;"><a style="text-decoration:none; color:#3F454B;" href="http://www.partadami.ru/gde_kupit/">Контакты</a></p></td>
							</tr>
						</table>
					</div>
					<br>
					<div style="width:600px;padding:0 20px; height:180px; margin:0 auto; color:#222;">
						<div style="padding:0 20px;">
							<?php #Если email не пустой
								if ($email != '') { 
									
									$db->query('UPDATE `email` SET status = "unsubscribe", coupon = "", coupon_date = "", coupon_price = "", used = "" WHERE email=?s', $email );
			
									// Отправляем письмо админу
									$to = "info@partadami.ru";
									$subject = 'Отписка от рассылки'; 
									$message = 'Адрес почты: <b>'. $email .'</b>';
									$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
									$headers .= "From: www.partadami.ru <info@partadami.ru>\r\n";
										mail($to, $subject, $message, $headers); 
							?>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">
							<img src="http://www.partadami.ru/img/delete_email.jpg" align="left" style="border:2px solid #dedede;margin:0 20px 0 0;"></p>
							<p style="padding:20px 0 0 0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Нам очень жаль... что адрес <b><?php echo $email; ?></b> отписан от рассылки.</p>
							<p style="text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;"><a style="color:#888;"href="http://www.partadami.ru/">На главную</a></p>
							
							<?php 	} else { ?>
							<p style="padding:20px 0 0 0;text-align:justify;font-family: Helvetica, Arial, sans-serif; font-size: 10pt;">Нам почему-то не удалось определить ваш mail. Чтобы отписаться введите ваш адрес email.</p>
							<form action="/inc/cron/delete_email.php">
								<input type="email" name="email" value="" placeholder="введите email" style="width:190px;padding:7px 0 7px 10px;font-size: 10pt;color:#191919;text-align:left;margin:0;background:#fff;border:1px solid #4caf50;	border-radius: 3px 3px 3px 3px;	-moz-border-radius: 3px 3px 3px 3px;	-webkit-border-top-left-radius: 3px;	-webkit-border-top-right-radius: 3px;	-webkit-border-bottom-right-radius: 3px;	-webkit-border-bottom-left-radius: 3px;">
								<input type="submit" value="Отписаться" style="width:100px;cursor: pointer;cursor: hand;border: 0;background:#4caf50;color: #fff;font-family: PT Sans Narrow; text-align:center;text-transform: uppercase;text-decoration:none;padding:7px;margin:0 0 0 10px;font-size: 10pt;border-radius: 3px 3px 3px 3px;-moz-border-radius: 3px 3px 3px 3px;-webkit-border-top-left-radius: 3px;-webkit-border-top-right-radius: 3px;-webkit-border-bottom-right-radius: 3px;-webkit-border-bottom-left-radius: 3px;">					</form>
							
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter15357751 = new Ya.Metrika({id:15357751,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/15357751" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Google Analytics counter -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37283478-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- / Google Analytics counter -->
