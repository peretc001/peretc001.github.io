<?php session_start(); 
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/config.php'); 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
	$db = new SafeMySQL();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
	<title>Ссылка для проверки</title> 
	<?php include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php'); ?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/user/inc/nav.php'; ?>
	<div class="booking_page">
		<div class="row">
			<p><a href="http://fssprus.ru/" target="_blank">Проверить штрафы ФССП</a></p>
			<p><a href="http://services.fms.gov.ru/info-service-result.htm?sid=2000" target="_blank">Проверить паспорт</a></p>
			<p><a href="https://service.nalog.ru/inn.html" target="_blank">Узнать ИНН</a></p>
			<p><a href="https://xn--b1aew.xn--p1ai/wanted" target="_blank">Проверить розыск</a></p>
			<p><a href="https://xn--90adear.xn--p1ai/check/driver#+" target="_blank">Проверить водителя</a></p>
			<p><a href="https://dkbm-web.autoins.ru/dkbm-web-1.0/kbm.htm" target="_blank">Проверить КБМ</a></p>
			<p><a href="https://money.yandex.ru/taxes-debts" target="_blank">Проверить налоги</a></p>
		</div>
		<br>
		<div class="row">
			<form action="https://api.whatsapp.com/send?phone=" id="form1">
				<input id="phone" type="text" name="phone" value="">
				<button type="submit">WhatsApp</button>
			</form>
		</div>
	</article>
</body>
</html>