<?php session_start();
	
	$img1 = $_FILES['img1']['name'];
	$img2 = $_FILES['img2']['name'];
	$img3 = $_FILES['img3']['name'];
	$img4 = $_FILES['img4']['name'];
	
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/conf.php');
	include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
 
	
	
	$db = new SafeMySQL();
		
	$data = array('img1' => $img1, 'img2' => $img2, 'img3' => $img3, 'img4' => $img4 );
	
	$db->query("UPDATE user SET ?u WHERE id = ?s", $data, $_POST['id'] );
	 
           
    $upload_dir = '../../../uploads/'. $_POST['id'] .'/';  
      
    move_uploaded_file($_FILES['img1']['tmp_name'], $upload_dir . $_FILES["img1"]["name"]);
	move_uploaded_file($_FILES['img2']['tmp_name'], $upload_dir . $_FILES["img2"]["name"] );
	move_uploaded_file($_FILES['img3']['tmp_name'], $upload_dir . $_FILES["img3"]["name"] );
	move_uploaded_file($_FILES['img4']['tmp_name'], $upload_dir . $_FILES["img4"]["name"] );
	

	echo '<script language="JavaScript">
		window.location.href = "/user/user_page.php?id='. $_POST['id'] .'"
		</script>';


?>