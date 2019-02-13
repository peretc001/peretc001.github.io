<?php session_start();
	include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');

?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru-ru" lang="ru-ru"> 
<head> 
    <title>ПОЛИКАРБОНАТА.НЕТ</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,900&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/skeleton.css">
    <link rel="stylesheet" href="/adm/adm.css" />
    <!-- Scripts
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<?php

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ('<div class="error">
            <p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
            <p>Вы забыли ввести login или пароль</p>
            <p><a href="javascript:history.back();">&#8592; Назад</a></p>
        </div>');
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);

    
 //извлекаем из базы все данные о пользователе с введенным логином
$result = mysql_query("SELECT * FROM user WHERE user = '$login'");
    $myrow = mysql_fetch_assoc($result);
    if (empty($myrow['phone']))
    {
    //если пользователя с введенным логином не существует
    exit ('<div class="error">
            <p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
            <p>Введённый вами login или пароль неверный</p>
            <p><a href="javascript:history.back();">&#8592; Назад</a></p>
        </div>');
    }
    else {
    //если существует, то сверяем пароли
    if ($myrow["phone"]==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow["user"]; 
    $_SESSION['id']=$myrow["id"];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
	echo '<script language="JavaScript">window.location.href = "/adm/"</script>';	
    }
 else {
    //если пароли не сошлись

    exit ('<div class="error">
            <p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
            <p>Введённый вами login или пароль неверный</p>
            <p><a href="javascript:history.back();">&#8592; Назад</a></p>
        </div>');
    }
    }
    ?>