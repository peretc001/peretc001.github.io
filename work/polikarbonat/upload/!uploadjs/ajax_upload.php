<?php

session_start();

$user_id = htmlspecialchars(trim($_GET['user_id'])); # определяем usera

				
if(isset($_FILES['file'])) {
    $name = $_FILES['file']['name'];
    $type = $_FILES['file']['type'];
    $size = $_FILES['file']['size'];
}

$error_message = '';

if(isset($_FILES['file']['error'])) {
    $code = $_FILES['file']['error'];
    switch ($code) { 
        case UPLOAD_ERR_OK: 
            $error_message .= ""; 
            break;
        case UPLOAD_ERR_INI_SIZE: 
            $error_message .= "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
            break; 
        case UPLOAD_ERR_FORM_SIZE: 
            $error_message .= "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"; 
            break; 
        case UPLOAD_ERR_PARTIAL: 
            $error_message .= "The uploaded file was only partially uploaded"; 
            break; 
        case UPLOAD_ERR_NO_FILE: 
            $error_message .= "No file was uploaded"; 
            break; 
        case UPLOAD_ERR_NO_TMP_DIR: 
            $error_message .= "Missing a temporary folder"; 
            break; 
        case UPLOAD_ERR_CANT_WRITE: 
            $error_message .= "Failed to write file to disk"; 
            break; 
        case UPLOAD_ERR_EXTENSION: 
            $error_message .= "File upload stopped by extension"; 
            break; 
        default: 
            $error_message .= "Unknown upload error"; 
            break; 
    } 
} elseif(!isset($_FILES['file'])) {
    $error_message = "File not recieved";
}

$uploaddir = 'upload';

if(isset($_FILES['file']['name'])) {
    $uploadfile = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$uploaddir.DIRECTORY_SEPARATOR.$user_id.DIRECTORY_SEPARATOR.$_FILES['file']['name'];
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        // ok
        $file_id = md5($uploadfile);
        // Store File id in session. We can delete file by this id from other script
        $_SESSION["drop_uploader_".$file_id] = $uploadfile;
        $_SESSION["drop_uploader_".$file_id."_name"] = $_FILES['file']['name'];
        $_SESSION["drop_uploader_".$file_id."_type"] = $_FILES['file']['type'];
        $_SESSION["drop_uploader_".$file_id."_size"] = $_FILES['file']['size'];
        $success_message = $file_id;
        				
    } else {
        $error_message = "Error while uploading file ".$_FILES['file']['name'];
    }
}

if($error_message != "") {
	$response['success'] = false;
	$response['message'] = $error_message;
} else {
	$response['success'] = true;
	$response['file_id'] = $file_id;
}

echo json_encode($response);