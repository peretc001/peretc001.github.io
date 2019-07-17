<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Благодарим за ОТЗЫВ</title> 
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php'; ?>
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php'; ?>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/inc/nav.php';
# Достаем sid
# Подключаем файл конфигурации
include $_SERVER['DOCUMENT_ROOT'] .'/inc/form/safemysql.class.php';
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$sid = session_id();

	$db = new SafeMySQL();
	$id = $db->getOne('SELECT id FROM check_delivery WHERE sid=?s',$sid);
	
	
	
	if($_POST['username'] != '' && $_POST['msg'] != '' && $_POST['total_value'] != '' ){
		
		if (!preg_match ("/href|<b>|<p>|<div>|<a>|www|url|.ru|.com|.net|.info|.org/i", $_POST['msg']) && !preg_match ("/href|<b>|<p>|<div>|<a>|www|url|.ru|.com|.net|.info|.org/i", $_POST['name']) ) {
				
		function uploadHandle($max_file_size = 100, $valid_extensions = array(), $upload_dir = '.')  
    {  
      
        $error = null;  
        $info  = null;    

        if ($_FILES['userfile']['error'] === UPLOAD_ERR_OK)  
        {  
            // проверяем расширение файла  
            $file_extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);  
            if (in_array($file_extension, $valid_extensions))  
            {  
                // проверяем размер файла  
                $max_file_size = 15728640; #15728640 - 15mb
				if ($_FILES['userfile']['size'] < $max_file_size)  
                {  
					$destination = $upload_dir .'/' . $_FILES['userfile']['name'];  
      
                    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $destination))  
                        $info = 'Файл успешно загружен';  
                    else  
                        $error = 'Не удалось загрузить файл';  
                }   
                else  
                    $error = 'Размер файла больше допустимого';  
            }   
            else  
                $error = 'У файла недопустимое расширение';  
        }   
        else  
        {  
            // массив ошибок  
            $error_values = array( 

                UPLOAD_ERR_INI_SIZE   => 'Размер файла больше разрешенного директивой upload_max_filesize в php.ini',
                UPLOAD_ERR_FORM_SIZE  => 'Размер файла превышает указанное значение в MAX_FILE_SIZE', 
                UPLOAD_ERR_PARTIAL    => 'Файл был загружен только частично',   
                UPLOAD_ERR_NO_FILE    => 'Не был выбран файл для загрузки',   
                UPLOAD_ERR_NO_TMP_DIR => 'Не найдена папка для временных файлов',   
                UPLOAD_ERR_CANT_WRITE => 'Ошибка записи файла на диск' 

                                  );  
      
            $error_code = $_FILES['userfile']['error'];  
      
            if (!empty($error_values[$error_code]))  
                $error = $error_values[$error_code];  
            else  
                $error = 'Случилось что-то непонятное';  
        }  
      
        return array('info' => $info, 'error' => $error); 
    }  
           
    $extensions = array('jpg', 'jpeg', 'JPG', 'JPEG','png', 'gif', 'PNG', 'GIF');  
    $upload_dir = '../../upload/';  
      
    // Запускаем функцию  				
    $message = uploadHandle(200, $extensions, $upload_dir); 
	$name = $_FILES['userfile']['name'];	
	$date = date('Y-m-d H:i:s');
				
	$res = mysql_query("SELECT MAX(id) FROM gb ");
	$row = mysql_fetch_row($res);
	$sum = $row[0]; // всего записей
	$id = $sum + 1;

	if ($_POST['ip'] == '') { $_POST['ip'] == $_SERVER["REMOTE_ADDR"]; }
	
	$result = mysql_query("INSERT INTO gb (id, username, phone, msg, dt, img, total_value, total_votes, url, category, art, ip) VALUES ('$id', '$_POST[username]', '$_POST[phone]', '$_POST[msg]', '$date', '$name', '$_POST[total_value]', '1', '$_POST[url]', '$_POST[category]', '$_POST[art]', '$_POST[ip]') ");
		

	$to  = "info@partadami.ru"; 
	$subject = 'ОТЗЫВ ДЭМИ'; 
	$message = "Имя: ". $_POST['username'] ."<br>Отзыв: ". $_POST['msg'] ."<br>Рейтинг: ". $_POST['total_value'] ."<br> IP: ". $_POST['ip'] .'<br>Изображение: <a href="http://partadami.ru/upload/'. $name .'">'. $name .'</a>';
	$headers = "Content-type: text/html; charset=utf-8 \r\n"; 
	$headers .= "From: КрасГрупп <info@partadami.ru>\r\n";
		mail($to, $subject, $message, $headers); 
?>				
<div id="check_ok">
	<p><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></p>
	<p><b>Благодарим за отзыв.</p>
</div>
<script language="JavaScript">
	setTimeout(function() {
		window.location.href = "<?php echo $_POST['back_url']; ?>#product_otziv";
	},1500);
</script>
<?php } else { ?>
		<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Отзыв НЕ принят</b><br>Найдена ссылка, ай-ай-ай )</p>
		</div>
		<script language="JavaScript">
			setTimeout(function() {
				window.location.href = "<?php echo $_POST['back_url']; ?>#product_otziv";
			},1500);
		</script>
	<?php }
}
else { ?>
		<div id="check_ok">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p><b>Отзыв НЕ принят</b><br>Не заполнены обязательные поля!</p>
		</div>
		<script language="JavaScript">
			setTimeout(function() {
				window.location.href = "<?php echo $_POST['back_url']; ?>#product_otziv";
			},1500);
		</script>
	
	<?php } 

include $_SERVER['DOCUMENT_ROOT'] .'/inc/popular.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/footer.php'; ?>
