<?php session_start();
    include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Вход</title>
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

<?php	#Создаем безопасносе соединение
	$db = new SafeMySQL();
	
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
        if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }
        //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
        exit ('<section class="error">
        			<p><i class="far fa-thumbs-down"></i></p>
        			<p>Вы забыли ввести login или пароль</p>
        			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
        		</section>');
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
	 $row = $db->getRow('SELECT * FROM manager WHERE login=?s', $login);
	
    if (empty($row['password']))
    {
    //если пользователя с введенным логином не существует
    exit ('<section class="error">
			<p><i class="far fa-thumbs-down"></i></p>
			<p>Введённый вами login или пароль неверный</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</section>');
    }
    else {
    //если существует, то сверяем пароли
    if ($row["password"] == $password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login'] = $row["login"];
    $_SESSION['name'] = $row["name"];
    $_SESSION['role'] = $row["role"];
    $_SESSION['id'] = $row["id"];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
	echo '<script language="JavaScript">window.location.href = "/home.php"; cosole.log("ok");</script>';	
    }
 else {
    //если пароли не сошлись

    exit ('<section class="error">
			<p><i class="far fa-thumbs-down"></i></p>
			<p>Введённый вами пароль неверный</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</section>');
    }
}?>