<?php 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/header.php');
$ip = $_SERVER['REMOTE_ADDR'];
$name = $_FILES['file']['name'];
$date = date('Y-m-d');
	if ($_POST['policy'] == '') {
		echo '<div id="send_ok">
				<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
				<p><b>Отзыв НЕ принят</b><br>Требуется согласие с условиями политики конфиденциальности</p>
				<p><a href="javascript:history.back();">&#8592; Назад</a></p>
			</div>';
	} elseif($_POST['username'] == '' or $_POST['msg'] == '' ){
		echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Отзыв НЕ принят</b><br>Не заполнены обязательные поля (имя или комментарий)</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
	} elseif (preg_match ("/href|http|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg'])) { 
		echo '<div id="send_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Отзыв НЕ принят</b><br>Найдена ссылка</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>';
	} else	{
	
				
	$res = mysql_query("SELECT MAX(id) FROM gb ");
	$row = mysql_fetch_row($res);
	$sum = $row[0]; // всего записей
	$id = $sum + 1;

	$result = mysql_query("INSERT INTO gb (id, username, phone, msg, dt, img, total_value, total_votes, url, category, ip) VALUES ('$id', '$_POST[username]', '$_POST[phone]', '$_POST[msg]', '$date', '$name', '$_POST[total_value]', '1', '$_POST[url]', '$_POST[category]', '$ip') ");
		

	$to  = "info@polikarbonata.net"; 
	$subject = 'ОТЗЫВ с сайта'; 
	$message = "Имя: ". $_POST['username'] ."<br>Телефон: ". $_POST['phone'] ."<br>Отзыв: ". $_POST['msg'] ."<br>Рейтинг: ". $_POST['total_value'] ."<br> IP: ". $ip ."<br><a href='http://polikarbonata.net/otziv.php#". $id ."'>Ссылка</a> на отзыв";
	$headers = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: polikarbonata.net <info@polikarbonata.net>\r\n";
						
		mail($to, $subject, $message, $headers); 
				
	echo '';
?>
	<div id="send_ok">
		<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
		<p><b>Отлично!</b></p>
		<p>Благодарим вас за отзыв</p>
		<p>На <a href="/">главную</a></p>
	</div>
	<script>
		setTimeout('window.location.href = "/otziv.php#<?php echo $id ?>"',1000); 
		
	</script>
<?php } ?>