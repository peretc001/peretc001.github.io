<?php
    $name = $_POST['name'];
    $file = fopen("file.txt","w");
    fwrite($file,$name);
    fclose($file);
    header('Location: http://calculator.ledimperial.ru/index.php ');
?>