<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';

	$id = htmlspecialchars(trim($_GET['id'])); # определяем id managera

	$db = new SafeMySQL();
	
	$row = $db->getRow("SELECT * FROM manager WHERE id = ?s", $id);

	
	function deletfile($directory, $filename) { 
		// открываем директорию (получаем дескриптор директории) 
		$dir = opendir($directory); 
			
		// считываем содержание директории 
		while(($file = readdir($dir))) 
		{ 
					// Если это файл и он равен удаляемому ... 
		if((is_file("$directory/$file")) && ("$directory/$file" == "$directory/$filename"))
		{ 
			// ...удаляем его. 
			unlink("$directory/$file"); 
								
			// Если файла нет по запрошенному пути, возвращаем TRUE - значит файл удалён. 
			if(!file_exists($directory."/".$filename)) return $s = TRUE; 
		} 
		} 
		// Закрываем дескриптор директории. 
		closedir($dir); 
	} 

	deletfile('../../img/manager/', $row['img']);

	$db->query("UPDATE manager SET img = '' WHERE id = ?s", $id );
	
	
	

	echo '<script language="JavaScript">
		window.location.href = "/manager.php?id='. $id .'";
		</script>';
?>