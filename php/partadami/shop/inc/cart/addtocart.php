<?php 
include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
include $_SERVER['DOCUMENT_ROOT'] .'/inc/header.php';
 error_reporting(E_ALL & ~E_NOTICE);
// Достаем id
	$id = $_POST['id'];
// Достаем sid
	$sid = $_POST['sid'];
	
	$query=mysql_query("SELECT * FROM cart WHERE sid = '$sid'  "); 
	$query=mysql_fetch_assoc($query); 
	
	$email = $query['email'];
		
	if ($_POST['color'] == '' or $_POST['color'] == 'grey') { $color = 'Клен / Серый';}
	elseif ($_POST['color'] == 'kbeige') { $color = 'Клен / Бежевый';}
	elseif ($_POST['color'] == 'pink') { $color = 'Клен / Розовый';}
	elseif ($_POST['color'] == 'blue') { $color = 'Клен / Синий';}
	elseif ($_POST['color'] == 'green') { $color = 'Клен / Зеленый';}
	elseif ($_POST['color'] == 'orange') { $color = 'Клен / Оранжевый';}
	elseif ($_POST['color'] == 'brown') { $color = 'Яблоня / Серый';}
	elseif ($_POST['color'] == 'beige') { $color = 'Береза / Бежевый';}
	elseif ($_POST['color'] == 'cyt_white') { $color = 'Белый';}
	elseif ($_POST['color'] == 'cyt_grey') { $color = 'Серый';}
	elseif ($_POST['color'] == 'cyt_pink') { $color = 'Розовый';}
	elseif ($_POST['color'] == 'cyt_blue') { $color = 'Синий';}
	elseif ($_POST['color'] == 'cyt_green') { $color = 'Зеленый';}
	elseif ($_POST['color'] == 'cyt_orange') { $color = 'Оранжевый';}
	elseif ($_POST['color'] == 'cyt_beige') { $color = 'Бежевый';}
	elseif ($_POST['color'] == 'cyt_kbeige') { $color = 'Бежевый';}
	elseif ($_POST['color'] == 'cyt_red') { $color = 'Красный';}
	elseif ($_POST['color'] == 'tyv_grey') { $color = 'Клен / Серый';}
	elseif ($_POST['color'] == 'tyv_brown') { $color = 'Яблоня / Серый';}
	elseif ($_POST['color'] == 'tyv_beige') { $color = 'Клен / Бежевый';}
	elseif ($_POST['color'] == 'tyv_white_grey') { $color = 'Белый / Серый';}
	elseif ($_POST['color'] == 'tyv_greyf') { $color = 'Клен / Фрегат';}
	elseif ($_POST['color'] == 'tyv_greyc') { $color = 'Клен / Цветы';}
	elseif ($_POST['color'] == 'tyv_brownf') { $color = 'Яблоня / Фрегат';}
	elseif ($_POST['color'] == 'dop_nnc') { $color = 'Прозрачный';}
	elseif ($_POST['color'] == 'dop_grey') { $color = 'Серый';}
	elseif ($_POST['color'] == 'dop_pink') { $color = 'Розовый';}
	elseif ($_POST['color'] == 'dop_red') { $color = 'Красный';}
	elseif ($_POST['color'] == 'dop_blue') { $color = 'Синий';}
	elseif ($_POST['color'] == 'dop_green') { $color = 'Зеленый';}
	elseif ($_POST['color'] == 'dop_orange') { $color = 'Оранжевый';}
	elseif ($_POST['color'] == 'dop_beige') { $color = 'Бежевый';}
	elseif ($_POST['color'] == 'greyf') { $color = 'Клен / Серый / Фрегат';}
	elseif ($_POST['color'] == 'pinkc') { $color = 'Клен / Розовый / Цветы';}
	elseif ($_POST['color'] == 'bluef') { $color = 'Клен / Синий / Фрегат';}
	elseif ($_POST['color'] == 'greenf') { $color = 'Клен / Зеленый / Фрегат';}
	elseif ($_POST['color'] == 'orangef') { $color = 'Клен / Оранжевый / Фрегат';}
	elseif ($_POST['color'] == 'brownf') { $color = 'Яблоня / Серый / Фрегат';}
	elseif ($_POST['color'] == 'grey_det') { $color = 'Серый';}
	elseif ($_POST['color'] == 'pink_det') { $color = 'Розовый';}
	elseif ($_POST['color'] == 'blue_det') { $color = 'Синий';}
	elseif ($_POST['color'] == 'beige_det') { $color = 'Бежевый';}
	elseif ($_POST['color'] == 'red_det') { $color = 'Красный';}
	elseif ($_POST['color'] == 'green_det') { $color = 'Зеленый';}
	elseif ($_POST['color'] == 'orange_det') { $color = 'Оранжевый';}
	elseif ($_POST['color'] == 'yellow_det') { $color = 'Желтый';}
	elseif ($_POST['color'] == 'pink_det_chipolino') { $color = 'Розовый / Чиполлино';}
	elseif ($_POST['color'] == 'blue_det_maugli') { $color = 'Синий / Майгли';}
	elseif ($_POST['color'] == 'pink_det_nypogodi') { $color = 'Розовый / Ну погоди';}
	elseif ($_POST['color'] == 'blue_det_nypogodi') { $color = 'Синий / Ну погоди';}
	elseif ($_POST['color'] == 'red_det_lev') { $color = 'Красный / Львенок и Черепаха';}
	elseif ($_POST['color'] == 'green_det_gav') { $color = 'Зеленый/ Котенок по имени Гав';}
	elseif ($_POST['color'] == 'orange_det_vinni') { $color = 'Оранжевый / Винни пух';}
	elseif ($_POST['color'] == 'white') { $color = 'Белый';}
	elseif ($_POST['color'] == 'white_grey') { $color = 'Белый / Серый';}
	elseif ($_POST['color'] == 'white_red') { $color = 'Белый / Красный';}
	elseif ($_POST['color'] == 'white_pink') { $color = 'Белый / Розовый';}
	elseif ($_POST['color'] == 'white_blue') { $color = 'Белый / Синий';}
	elseif ($_POST['color'] == 'white_green') { $color = 'Белый / Зеленый';}
	elseif ($_POST['color'] == 'white_orange') { $color = 'Белый / Оранжевый';}
	elseif ($_POST['color'] == 'white_beige') { $color = 'Белый / Бежевый';}
	elseif ($_POST['color'] == 'ja_grey') { $color = 'Ясень / Серый';}

	elseif ($_POST['color'] == 'sonoma_grey') { $color = 'Сонома / Серый';}
	elseif ($_POST['color'] == 'sonoma_pink') { $color = 'Сонома / Розовый';}
	elseif ($_POST['color'] == 'sonoma_blue') { $color = 'Сонома / Синий';}
	elseif ($_POST['color'] == 'sonoma_turquoise') { $color = 'Сонома / Бирюзовый';}
	elseif ($_POST['color'] == 'sonoma_beige') { $color = 'Сонома / Бежевый';}
	elseif ($_POST['color'] == 'dub_grey') { $color = 'Дуб / Серый';}
	elseif ($_POST['color'] == 'dub_beige') { $color = 'Дуб / Бежевый';}

	
	
	

	$package = $_POST['package']; // определяем комплект со стулом или без
	
	$date = date('Y-m-d H:i:s'); // дата и время
	
	# Если товар уже есть в корзине
	$query = mysql_query("SELECT * FROM cart WHERE id = '$id' and sid = '$sid' and color = '$color' and package = '$package' "); 
	$query = mysql_fetch_assoc($query); 
		if ($query['id'] == $id) { }
		else {
	
	$sql = mysql_query("SELECT * FROM ". $package ." WHERE id = '$id' "); 
		while( $row = mysql_fetch_array($sql) ) { 
		
			if ($_POST['price'] == '') {
				$price = $row["price"]; 
			}
			else {
				$price = $_POST['price']; 
			}
			$qty = $_POST["qty"];
			$rezult = ($price * $qty);
			$total = $total + $rezult;
			
		$result = mysql_query("INSERT INTO cart (num, id, art, name, model, url, price, qty, color, sid, date, img, total, package, email)  VALUES ('', '$id', '$row[art]', '$row[name]', '$row[model]', '$_POST[url]', '$price', '$qty', '$color', '$sid', '$date', '$_POST[img]', '$total', '$package', '$email' ) ");					
	}	}

	$cart = mysql_query("SELECT id FROM cart WHERE sid = '$sid'  "); 
	$query = mysql_fetch_assoc($cart); 
		$res = mysql_query("SELECT count(id) FROM cart WHERE sid = '$sid' ");
		$row = mysql_fetch_row($res);
		$qtys = $row[0]; // всего записей
		echo '<a class="nav-menu__cart" href="/shop/shoppingcart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> '. $qtys;
		
		$res = mysql_query("SELECT SUM(total) FROM cart WHERE sid = '$sid'  "); 
		$row = mysql_fetch_row($res);
		$totals = $row[0]; // всего записей
		echo '<span> : ';
		echo number_format($totals, 0, ',', ' '); 
		echo " р</span></a>";
?>


