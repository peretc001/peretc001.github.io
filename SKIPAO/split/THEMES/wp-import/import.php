<?php	
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

require( '../wp-load.php' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );


//Редактируем название постов
	// $query = new WP_Query(array ( 
	// 	'post_type' => 'seria', 
	// 	//'post_type' => 'models', 
	// 	'orderby' => 'date', 
	// 	'order' => 'DESC', 
	// 	'posts_per_page' => -1)
	// );
	// if ($query->have_posts()):
	// 	while ( $query->have_posts() ) : $query->the_post();

	// 	$title = $post->post_title;
	// 		$title = str_replace(['on/of','ON/OFF','(Инвертор)','inverter'],'',$title);
	// 	echo $title."\r\n";
	// 	 $post_data = array(
	// 		'ID'		   => $post->ID, //Если существует - обновляем
	// 	 	'post_title'   => $title,
	// 	 	'post_type'    => 'seria',
	// 	 	'post_status'  => 'publish'
	// 	 );
	// 	 $post_id = wp_insert_post( $post_data );





		
	
		// echo $square = get_field( 'square', $post->ID );
		// if ($square == 56) {
		// 	$sq = 50;
		// }
		// else if ($square == 27) {
		// 	$sq = 25;
		// }
		// else if ($square == 36) {
		// 	$sq = 40;
		// }
		// else if ($square == 72) {
		// 	$sq = 70;
		// } else {
		// 	$sq = $square;
		// }
		// echo '<br>';

		// update_field( 'square', $sq, $post->ID );







		
//			$garanty = get_field( 'garanty', $post->ID );
//			$garanty = str_replace([1,2],3,$garanty);
//			update_field( 'garanty', $garanty, $post->ID );




	// 	endwhile;
	// endif;

	











//Import
include './simplehtmldom/simple_html_dom.php';
$html = file_get_html('https://splitsystem-krasnodar.ru/katalog/');


$menu = array();
foreach($html->find('.brands_item') as $k => $href) {
	
	//foreach($element->find('.brands_list') as $href) {
			 //$title = $href->find("span", 0)->plaintext;
			 
			$menu[$k]['title']    = $href->find("span", 0)->plaintext;
			 //$menu[$k]['about']     = $href->find('.cat__main__desc', 0)->plaintext;
			$menu[$k]['img']      = $href->find("a img", 0)->attr['src'];
			$menu[$k]['url']      = $href->find("a", 0)->attr['href'];

			 
			//  $name = $href->find('img', 0)->attr['src'];
			 
			 // $dir = @mkdir('./img/brands/'. $title2);
			 // if($dir) { continue; }

			 // $file = 'http://splitlife-krasnodar.ru'. $name;
			 // $newfile = './img/brands/'. $title .'.png';

			 // copy($file, $newfile);


			//Записываем Бренды как категории в базу WP
			// $add_cat = wp_insert_term(
			// 	$href->find('.cat__main__title', 0)->plaintext,
			// 	'brands',
			// 	array(
			// 		'description'=> $href->find('.cat__main__desc', 0)->plaintext,
			// 		'slug' => $href->find('.cat__main__title', 0)->plaintext,
			// 		'parent'=> ''
			// 	)
			// );
			
			// foreach($add_cat as $ac) {
			// 	//Если категория существует
			// 	if( $ac['term_exists'] ) {
			// 		//достаем id
			// 		$cat_id = $ac['term_exists'];
			// 	} else {
			// 		//Если категории нет id = новый id
			// 		$cat_id = $ac;
			// 	}
			// }
			//var_dump($cat_id);
			
			//$upload_img = media_sideload_image( 'http://splitlife-krasnodar.ru'. $href->find('img')[0]->attr['src'], 0, $href->find('.cat__main__title')[0]->plaintext, 'id' );

			// if( is_wp_error($upload_img) ){
			// 	//echo $upload_img->get_error_message();
			// }
			// else {
			// 	//Id картинки = $upload_img;
			// }
			
			//Обновляем поле ACF - Изображение категории
			//$upd = update_field( 'img', $upload_img, 'brands_'. $cat_id );

	//}
}
for ($i = 0; $i <= 36; $i++) {
	if ($i <= 10 || $i == 13 || $i == 14 || $i == 15 || $i == 16 || $i == 21 || $i == 23 || $i == 24 || $i == 25 || $i == 30 || $i == 31 || $i >= 34 ) {
		unset ($menu[$i]);
	}
}

foreach($menu as $k => $value) {
	// //Записываем Бренды как категории в базу WP
	// $add_cat = wp_insert_term(
	// 	$value['title'],
	// 	'brands',
	// 	array(
	// 		'description'=> '',
	// 		'parent'=> ''
	// 	)
	// );

	// foreach($add_cat as $ac) {
	// 		//Если категория существует
	// 		if( $ac['term_exists'] ) {
	// 			//достаем id
	// 			$cat_id = $ac['term_exists'];
	// 		} else {
	// 			//Если категории нет id = новый id
	// 			$cat_id = $ac;
	// 		}
	// }

	// $upload_img = media_sideload_image( 'https://splitsystem-krasnodar.ru/'. $value['img'], 0, $value['title'], 'id' );

	// if( is_wp_error($upload_img) ){
	// 	//echo $upload_img->get_error_message();
	// }
	// else {
	// 	//Id картинки = $upload_img;
	// }
	
	// //Обновляем поле ACF - Изображение категории
	// $upd = update_field( 'img', $upload_img, 'brands_'. $cat_id );
	
}

// echo '<pre>';
// var_dump($menu);
// echo '</pre>';



////Добавляем серии
$products = array();

foreach ($menu as $key => $page) {
       $html2 = file_get_html('https://splitsystem-krasnodar.ru/'. $page['url']);
		//  echo 'https://splitsystem-krasnodar.ru/'. $page['url'];
		 
		 

		// foreach($html2->find('.50percent.fleft') as $key2 => $element) {

		// 		$products[$key][$key2]['title'] = $page['title'];
		// 		$name = str_replace(['on/of','onoff','ON/OFF','(Инвертор)', 'Серия ', 'Сплит система '],'',$element->find('a', 0)->plaintext);
		// 		$products[$key][$key2]['name'] = $name;
		// }

		foreach($html2->find('.series_item') as $key2 => $element) {

			$products[$key][$key2]['title'] = $page['title'];
			$name = str_replace(['on/of','onoff','ON/OFF','(Инвертор)', 'Серия ', 'Сплит Система ', 'Сплит Система  серии ', 'Сплит Система  серий ', 'серия ', 'серии ', 'серий ', 'Сплит система ', $page['title']],'',$element->find('.series_item_name', 0)->plaintext);
			$products[$key][$key2]['name'] = $name;

              $products[$key][$key2]['img']  = $element->find('.series_item_image img', 0)->attr['src'];
              $products[$key][$key2]['garanty'] = 'Гарантия <span>3</span> года';
				  
				  $desc = $name = str_replace([' 		 			Заказать сплит-систему 			Нашли дешевле? 			Стоимость установки 		 		 		', $page['title']],'',$element->find('.series_item_desc', 0)->plaintext);

				  $products[$key][$key2]['desc'] = $desc;
				  

             
              

      //         $name = $element->find('a', 0)->attr['href'];
              
              //$dir = @mkdir('./img/'. $title2 .'/');
              //if($dir) { continue; } 

              // $file2 = 'http://splitlife-krasnodar.ru'. $name;
              // $newfile2 = './img/'. $title2 .'/'. $key2 .'.png';
              

				  // copy($file2, $newfile2);
				  
				

				// 

				

				// $products[$key][$key2]['tech']['zavod'] = $page['title'];
				// update_field( 'zavod_izgotovitel', $page['title'], $post_id );
				// //Компрессор
				// update_field( 'tip_kompressora', $element->find('.item-block__chars.row li')[0]->find('span')[1]->plaintext, $post_id );
				// //Таймер
				// update_field( 'tajmer', $element->find('.item-block__chars.row li')[3]->find('span')[1]->plaintext, $post_id );
				// //Класс
				// update_field( 'klass_energoeffektivnosti', $element->find('.item-block__chars.row li')[4]->find('span')[1]->plaintext, $post_id );
				// //Шум
				// update_field( 'uroven_shuma', $element->find('.item-block__chars.row li')[7]->find('span')[1]->plaintext, $post_id );
				// //Ионизация
				// update_field( 'ionizacziya', $element->find('.item-block__chars.row li')[8]->find('span')[1]->plaintext, $post_id );
				// //Wifi 
				// update_field( 'wi-fi', $element->find('.item-block__chars.row li')[9]->find('span')[1]->plaintext, $post_id );
				

				// foreach ($element->find('.series_item_models table tbody tr') as $key3 => $t) {

				// 	$products[$key][$key2]['models'][$key3]['name'] = $t->find('td')[0]->plaintext;
				// 	$products[$key][$key2]['models'][$key3]['square'] = preg_replace("/[^0-9]/", '', $t->find('td')[0]->next_sibling(0)->plaintext);
				// 	$products[$key][$key2]['models'][$key3]['cold'] 	= (int)$t->find('td')[0]->next_sibling(0)->next_sibling(0)->plaintext;
				// 	$products[$key][$key2]['models'][$key3]['hot'] 	= (int)$t->find('td')[0]->next_sibling(0)->next_sibling(0)->plaintext;
				// 	$products[$key][$key2]['models'][$key3]['size'] 	= $t->find('td')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->plaintext;
				// 	$price = str_replace([' руб.', ' руб. ', 'руб.'], '', $t->find('td')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->plaintext);

				// 	$products[$key][$key2]['models'][$key3]['price'] 	= $price;
					
		  		// }

				//Добавляем изображение
				// $upload_img = media_sideload_image( 'http://splitlife-krasnodar.ru'. $element->find('a', 0)->attr['href'], $post_id, $key2, 'id' );
				// set_post_thumbnail( $post_id, $upload_img );

              
       }
}


foreach ($products as $prod) {

	foreach ($prod as $k => $p) {

		echo $p['title'];
		echo '<ul>';
		//Находим категорию
		// $cat_id = get_term_by( 'name', $p['title'], 'brands');
		// echo '<ul>';
		// 	echo $p['name'];
		// 	echo '<br>';
			echo '<a href="https://splitsystem-krasnodar.ru/'. $p['img'] .'">'. $p['name'] .'</a> --- ';
		// 	echo '<br>';
		// 	echo $p['garanty'];
		// 	echo '<br>';
		// 	echo $p['desc'];

			// //Находим id поста
			$mypost = get_page_by_title( trim($p['name']), '', 'seria' );
			echo $mypost->ID;

			echo ' --- '. $k; 
			//Добавляем изображение
			// $upload_img = media_sideload_image( 'https://splitsystem-krasnodar.ru/'. $p['img'], $mypost->ID, $k, 'id' );
			// set_post_thumbnail( $mypost->ID, $upload_img );

		echo '</ul>';
			
		
			// // Create new post.
			// $post_data = array(
			// 	'ID' 				=> $mypost->ID, //Если существует - обновляем
			// 	'post_title'   => $p['name'],
			// 	'post_type'    => 'seria',
			// 	'post_status'  => 'publish',
			// 	'post_content' => $p['desc'], 
			// 	'post_category'=> array( $cat_id )
			// );
			// // //Добавляем запись - Серия
			// $post_id = wp_insert_post( $post_data );
			// $taxonomy = 'brands';
			// // // //Присваиваем бренд
			// wp_set_object_terms($post_id, $p['title'], $taxonomy);

			// $post_parent = $post_id;
			// //Добавляем гарантию
			// update_field( 'garanty', 'Гарантия <span>3</span> года', $post_id );

			// echo 'models:';
			// echo '<ul>';
			

		// echo '</ul>';

		// foreach ( $p['models'] as $m) {
			// echo $m['name'];
			// echo '<br>';
			// echo $m['square'];
			// echo '<br>';
			// echo $m['cold'];
			// echo '<br>';
			// echo $m['hot'];
			// echo '<br>';
			// echo $m['size'];
			// echo '<br>';
			// echo $m['price'];
			// echo '<br>';

			//Находим id поста
			// $myseriapost = get_page_by_title( $m['name'], '', 'models' );
			
			// $post_data = array(
			// 	'ID' 				=> $myseriapost->ID, //Если существует - обновляем
			// 	'post_title'   => $m['name'],
			// 	'post_type'    => 'models',
			// 	'post_status'  => 'publish',
			// 	//'post_content' => $element->find('.text-description__in')[0]->innertext,
			// 	'post_parent'    => $post_parent, 
			// );
			// $post_id = wp_insert_post( $post_data );

			// update_field( 'square', $m['square'], $post_id );
			// update_field( 'cold', 	$m['cold'], $post_id );
			// update_field( 'hot', 	$m['hot'], $post_id );
			// update_field( 'size', 	$m['size'], $post_id );
			// update_field( 'price', 	$m['price'], $post_id );


		// }

		
		

	}
}
// $products[0][0]['title'] = 'DAHATSU';

// $products[0][0]['name'] 		= 'Classik';
// $products[0][0]['img']  		= 'https://splitsystem-krasnodar.ru/assets/templates/home/img/classik-obwij_210_300.jpg';
// $products[0][0]['garanty'] 	= 'Гарантия <span>3</span> года';
// $products[0][0]['desc'] 		= 'Данная серия состоит из шести моделей кондиционеров, каждая из которых имеет высокие показатели энергоэффективности, коэффициента полезного действия и бесшумности. Все это способствует тому, что техника является необычайно привлекательной для среднестатистического отечественного клиента. Также нельзя не отметить презентабельный дизайн устройств';

// 	$products[0][0]['models'][0]['name'] 	= 'DH - 09 H';
// 	$products[0][0]['models'][0]['square'] = '25';
// 	$products[0][0]['models'][0]['cold'] 	= '3';
// 	$products[0][0]['models'][0]['hot'] 	= '3';
// 	$products[0][0]['models'][0]['size'] 	= '718x240x180';
// 	$products[0][0]['models'][0]['price'] 	= '13000';

// 	$products[0][0]['models'][1]['name'] 	= 'DH - 12 H';
// 	$products[0][0]['models'][1]['square'] = '35';
// 	$products[0][0]['models'][1]['cold'] 	= '4';
// 	$products[0][0]['models'][1]['hot'] 	= '4';
// 	$products[0][0]['models'][1]['size'] 	= '770x240x180';
// 	$products[0][0]['models'][1]['price'] 	= '17000';

// 	$products[0][0]['models'][2]['name'] 	= 'DH - 18 H';
// 	$products[0][0]['models'][2]['square'] = '50';
// 	$products[0][0]['models'][2]['cold'] 	= '5';
// 	$products[0][0]['models'][2]['hot'] 	= '5';
// 	$products[0][0]['models'][2]['size'] 	= '900x280x202';
// 	$products[0][0]['models'][2]['price'] 	= '25100';

// 	$products[0][0]['models'][2]['name'] 	= 'DH - 24 H';
// 	$products[0][0]['models'][2]['square'] = '70';
// 	$products[0][0]['models'][2]['cold'] 	= '7';
// 	$products[0][0]['models'][2]['hot'] 	= '7';
// 	$products[0][0]['models'][2]['size'] 	= '900x280x202';
// 	$products[0][0]['models'][2]['price'] 	= '32300';

// $products[0][1]['name'] 		= 'PREMIER';
// $products[0][1]['img']  		= 'https://splitsystem-krasnodar.ru/assets/templates/home/img/i.jpg';
// $products[0][1]['garanty'] 	= 'Гарантия <span>3</span> года';
// $products[0][1]['desc'] 		= 'Стильные и энергоэффективные кондиционеры данной модели предназначены для обслуживания жилых домов и квартир. Они могут работать как на обогрев, так и на охлаждение воздуха в помещении. Кроме того, вся техника оснащена встроенными ионизаторами воздуха, увлажнителями и фильтрами. В комплекте прилагается пульт, инструкция по эксплуатации и набор креплений для обоих блоков.';

// 	$products[0][1]['models'][0]['name'] 	= 'DHP-07';
// 	$products[0][1]['models'][0]['square'] = '20';
// 	$products[0][1]['models'][0]['cold'] 	= '2';
// 	$products[0][1]['models'][0]['hot'] 	= '2';
// 	$products[0][1]['models'][0]['size'] 	= '715*250*188';
// 	$products[0][1]['models'][0]['price'] 	= '12000';

// 	$products[0][1]['models'][1]['name'] 	= 'DHP-09';
// 	$products[0][1]['models'][1]['square'] = '25';
// 	$products[0][1]['models'][1]['cold'] 	= '3';
// 	$products[0][1]['models'][1]['hot'] 	= '3';
// 	$products[0][1]['models'][1]['size'] 	= '715*250*188';
// 	$products[0][1]['models'][1]['price'] 	= '13500';

// 	$products[0][1]['models'][1]['name'] 	= 'DHP-12';
// 	$products[0][1]['models'][1]['square'] = '35';
// 	$products[0][1]['models'][1]['cold'] 	= '4';
// 	$products[0][1]['models'][1]['hot'] 	= '4';
// 	$products[0][1]['models'][1]['size'] 	= '800*275*188';
// 	$products[0][1]['models'][1]['price'] 	= '17500';

// 	$products[0][1]['models'][1]['name'] 	= 'DHP-18';
// 	$products[0][1]['models'][1]['square'] = '55';
// 	$products[0][1]['models'][1]['cold'] 	= '6';
// 	$products[0][1]['models'][1]['hot'] 	= '6';
// 	$products[0][1]['models'][1]['size'] 	= '940*275*20';
// 	$products[0][1]['models'][1]['price'] 	= '2600';

// 	$products[0][1]['models'][1]['name'] 	= 'DHP-24';
// 	$products[0][1]['models'][1]['square'] = '70';
// 	$products[0][1]['models'][1]['cold'] 	= '7';
// 	$products[0][1]['models'][1]['hot'] 	= '7';
// 	$products[0][1]['models'][1]['size'] 	= '1036*230*315';
// 	$products[0][1]['models'][1]['price'] 	= '2600';




// echo '<pre>';
// var_dump($products);
// echo '</pre>';

////cards
// foreach ($menu as $key => $page) {
//        $html2 = file_get_html('https://splitsystem-krasnodar.ru/dahatsu/');
// 		 //echo 'http://splitlife-krasnodar.ru'. $page['url'];
		 
		 

//        foreach($html2->find('row.certificates_content') as $key2 => $element) {

//               $products[$key][$key2]['title'] = $page['title'];

//               $products[$key][$key2]['name'] = $element->find('.h2', 0)->plaintext;
//               $products[$key][$key2]['img']  = '/img/'. $title2 .'/'. $key2 .'.png';
//               $products[$key][$key2]['garanty'] = $element->find('.item-block__garant', 0)->innertext;
//               $products[$key][$key2]['desc'] = $element->find('.text-description__in', 0)->innertext;
              
              

      //         $name = $element->find('a', 0)->attr['href'];
              
              //$dir = @mkdir('./img/'. $title2 .'/');
              //if($dir) { continue; } 

              // $file2 = 'http://splitlife-krasnodar.ru'. $name;
              // $newfile2 = './img/'. $title2 .'/'. $key2 .'.png';
              

				  // copy($file2, $newfile2);
				  
				//Находим id поста
				//$mypost = get_page_by_title( $element->find('.h2', 0)->plaintext, '', 'seria' );
				//Находим категорию
				//$cat_id = get_term_by( 'name', $page['title'], 'brands');

				// Create new post.
				// $post_data = array(
				// 	'ID' 				=> $mypost->ID, //Если существует - обновляем
				// 	'post_title'   => $element->find('.h2', 0)->plaintext,
				// 	'post_type'    => 'seria',
				// 	'post_status'  => 'publish',
				// 	'post_content' => $element->find('.text-description__in', 0)->innertext, 
				// 	//'post_category'=> array( $cat_id )
				// );
				//Добавляем запись - Серия
				//$post_id = wp_insert_post( $post_data );
				// $taxonomy = 'brands';
				// //Присваиваем бренд
				// wp_set_object_terms($post_id, $page['title'], $taxonomy);

				//$post_parent = $post_id;
				//Добавляем гарантию
				// update_field( 'garanty', $element->find('.item-block__garant')[0]->innertext, $post_id );

				// $products[$key][$key2]['tech']['zavod'] = $page['title'];
				// update_field( 'zavod_izgotovitel', $page['title'], $post_id );
				// //Компрессор
				// update_field( 'tip_kompressora', $element->find('.item-block__chars.row li')[0]->find('span')[1]->plaintext, $post_id );
				// //Таймер
				// update_field( 'tajmer', $element->find('.item-block__chars.row li')[3]->find('span')[1]->plaintext, $post_id );
				// //Класс
				// update_field( 'klass_energoeffektivnosti', $element->find('.item-block__chars.row li')[4]->find('span')[1]->plaintext, $post_id );
				// //Шум
				// update_field( 'uroven_shuma', $element->find('.item-block__chars.row li')[7]->find('span')[1]->plaintext, $post_id );
				// //Ионизация
				// update_field( 'ionizacziya', $element->find('.item-block__chars.row li')[8]->find('span')[1]->plaintext, $post_id );
				// //Wifi 
				// update_field( 'wi-fi', $element->find('.item-block__chars.row li')[9]->find('span')[1]->plaintext, $post_id );
				

				// foreach ($element->find('.col-12.d-md-block.d-none table tr') as $key3 => $t) {
				// 	if ( $t->find('.text-left')[0]->innertext != 'Модель' && $t->find('.text-left')[0]->innertext != null ) {
				// 			 $products[$key][$key2]['models'][$key3]['name'] = $t->find('.text-left')[0]->innertext;
				// 			 $products[$key][$key2]['models'][$key3]['square'] = preg_replace("/[^0-9]/", '', $t->find('.text-left')[0]->next_sibling(0)->innertext);
				// 			 $products[$key][$key2]['models'][$key3]['cold'] 	= (int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->innertext;
				// 			 $products[$key][$key2]['models'][$key3]['hot'] 	= (int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;
				// 			 $products[$key][$key2]['models'][$key3]['size'] 	= $t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;
				// 			 $products[$key][$key2]['models'][$key3]['price'] 	= (int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;

				// 			//Находим id поста
				// 			$myseriapost = get_page_by_title( $t->find('.text-left')[0]->innertext, '', 'models' );
							
				// 			$post_data = array(
				// 				'ID' 				=> $myseriapost->ID, //Если существует - обновляем
				// 				'post_title'   => $t->find('.text-left')[0]->innertext,
				// 				'post_type'    => 'models',
				// 				'post_status'  => 'publish',
				// 				'post_content' => $element->find('.text-description__in')[0]->innertext,
				// 				'post_parent'    => $post_parent, 
				// 			);
				// 			$post_id = wp_insert_post( $post_data );

				// 			update_field( 'square', preg_replace("/[^0-9]/", '', $t->find('.text-left')[0]->next_sibling(0)->innertext), $post_id );
				// 			update_field( 'cold', 	(int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->innertext, $post_id );
				// 			update_field( 'hot', 	(int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext, $post_id );
				// 			update_field( 'size', 	$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext, $post_id );
				// 			update_field( 'price', 	(int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext, $post_id );

					
				// 	}
		  		// }

				//Добавляем изображение
				// $upload_img = media_sideload_image( 'http://splitlife-krasnodar.ru'. $element->find('a', 0)->attr['href'], $post_id, $key2, 'id' );
				// set_post_thumbnail( $post_id, $upload_img );

              
//        }
// }




?>
	