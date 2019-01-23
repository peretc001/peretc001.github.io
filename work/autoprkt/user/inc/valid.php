<?php session_start();
/* Переменные для соединения с базой данных */
$hostname_db = "localhost:3306";
$username_db = "u0382_u0382359";
$password_db = "GFDgd39021";
$dbName_db = "u0382359_autoprkt";
/** Кодировка базы данных при создании таблиц. */
define('DB_CHARSET', 'utf8_general_ci');

/* создать соединение */
$link = mysqli_connect($hostname_db, $username_db, $password_db, $dbName_db);
mysqli_set_charset( $link, 'utf8');  

include ($_SERVER['DOCUMENT_ROOT'] .'/user/inc/header.php');
include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';


	#Создаем безопасносе соединение
	$db = new SafeMySQL();
	
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password = $_POST['password']; if ($password == '') { unset($password);} }
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
	 $row = $db->getRow('SELECT * FROM admin WHERE login=?s', $login);
	
    if (empty($row['password']))
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
    if ($row["password"] == $password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login'] = $row["login"]; 
    $_SESSION['id'] = $row["id"];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
	echo '<script language="JavaScript">window.location.href = "/user/home.php"</script>';	
    }
 else {
    //если пароли не сошлись

    exit ('<div class="error">
			<p><i class="fa fa-hand-stop-o" aria-hidden="true"></i></p>
			<p>Введённый вами пароль неверный</p>
			<p><a href="javascript:history.back();">&#8592; Назад</a></p>
		</div>');
    }
    }
    ?>