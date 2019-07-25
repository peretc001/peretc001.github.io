<?php

$msg_box = ""; // в этой переменной будем хранить сообщения формы
$errors = array(); // контейнер для ошибок
// проверяем корректность полей
if($_POST['user_name_street'] == "")    $errors[] = "Поле 'Ваше имя' не заполнено!";
if($_POST['user_email_street'] == "")   $errors[] = "Поле 'Ваш e-mail' не заполнено!";
if($_POST['user_phone_street'] == "") $errors[] = "Поле 'Текст сообщения' не заполнено!";

// если форма без ошибок
if(empty($errors)){     
    // собираем данные из формы
    $message  = "Имя пользователя: " . $_POST['user_name_street'] . "<br/>";
    $message .= "E-mail пользователя: " . $_POST['user_email_street'] . "<br/>";
    $message .= "Телефон: " . $_POST['user_phone_street'];      
    send_mail($message); // отправим письмо
    // выведем сообщение об успехе
    $msg_box = "<span style='color: white; font-size: 20px; margin-top: 10px;'>Сообщение успешно отправлено!</span>";
}else{
    // если были ошибки, то выводим их
    $msg_box = "";
    foreach($errors as $one_error){
        $msg_box .= "<span style='color: red; font-size: 20px; margin-top: 10px;'>$one_error</span><br/>";
    }
}

// делаем ответ на клиентскую часть в формате JSON
echo json_encode(array(
    'result' => $msg_box
));
 
 
// функция отправки письма
function send_mail($message){
    // почта, на которую придет письмо
    $mail_to = "Ledimperial@mail.ru"; 
    // тема письма
    $subject = "Письмо с обратной связи";
     
    // заголовок письма
    $headers= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
    $headers .= "From: Тестовое письмо <no-reply@test.com>\r\n"; // от кого письмо
     
    // отправляем письмо 
    mail($mail_to, $subject, $message, $headers);
}
 
?>