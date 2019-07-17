<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/check.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Профиль</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <style>
        @font-face{font-family:MuseoSans;font-weight:400;font-style:normal;src:url(../fonts/MuseoSans/MuseoSansCyrl-300.eot);src:url(../fonts/MuseoSans/MuseoSansCyrl-300.eot?#iefix) format("embedded-opentype"),url(../fonts/MuseoSans/MuseoSansCyrl-300.woff) format("woff"),url(../fonts/MuseoSans/MuseoSansCyrl-300.ttf) format("truetype")}@font-face{font-family:MuseoSans;font-weight:700;font-style:normal;src:url(../fonts/MuseoSans/MuseoSansCyrl-900.eot);src:url(../fonts/MuseoSans/MuseoSansCyrl-900.eot?#iefix) format("embedded-opentype"),url(../fonts/MuseoSans/MuseoSansCyrl-900.woff) format("woff"),url(../fonts/MuseoSans/MuseoSansCyrl-900.ttf) format("truetype")}
        body{font-size:16px;min-width:320px;position:relative;font-family:MuseoSans,sans-serif;overflow-x:hidden;color:#777;background:#f7f7f7;height: 100vh;margin: 0;padding: 0;box-sizing: border-box;}
        .error {
            display: -webkit-flex;
            display: -moz-flex;
            display: -ms-flex;
            display: -o-flex;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }
        .error .far {
            font-size: 5em;
        }
    </style>
</head>
<body> 
	<?php
	$db = new SafeMySQL();

	$row = $db->getRow("SELECT * FROM manager WHERE id = ?s", $_POST['id']);
	if ($_POST['role'] == '') { $role = $row['role']; } else { $role = $_POST['role']; }
	
	if ($_FILES['file']['tmp_name']) {
		
		$uploaddir = '../../img/manager/';
		$uploadfile = $uploaddir . basename($_FILES['file']['name']);

		if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
		    echo '<section class="error">
		    		<p><i class="far fa-thumbs-up"></i></p>
        			<p>Файл загружен</p>
        		</section>';
		} else {
		    echo '<section class="error">
		    		<p><i class="far fa-thumbs-down"></i></p>
        			<p>Ошибка загрузки</p>
        			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
        		</section>';
		}
		
		$timeout = '1000';

		$data = array('name' => $_POST['name'], 'login' => $_POST['login'], 'password' => $_POST['password'], 'role' => $role, 'img' => $_FILES['file']['name'] );
		
	} else {
		$data = array('name' => $_POST['name'], 'login' => $_POST['login'], 'password' => $_POST['password'], 'role' => $role );
	}

	$db->query("UPDATE `manager` SET ?u WHERE id = ?s", $data, $_POST['id'] );
	

	echo '<script language="JavaScript">
		setTimeout(function() {
			window.location.href = "/manager.php?id='. $_POST['id'] .'";
		}, '. $timeout .');
		</script>';
?>