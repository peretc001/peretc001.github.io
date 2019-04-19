<?php  session_start();
unset($_COOKIE[session_name()]);
unset($_COOKIE[session_id()]);
session_unset(); // осов все переменные
session_destroy(); // всю информацию убиваем

header("location:/");
exit;
	
    ?>