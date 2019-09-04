<?php	

require( '../wp-load.php' );
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

include './simplehtmldom/simple_html_dom.php';
$html = file_get_html('http://splitlife-krasnodar.ru/split_systemi/');


$menu = array();
foreach($html->find('.wrapper__brand li') as $k => $element) {
	foreach($element->find('a') as $href) {
			 $title = $href->find(".cat__main__title", 0)->plaintext;
			 
			 $menu[$k]['title']     = $href->find('.cat__main__title', 0)->plaintext;
			 $menu[$k]['about']     = $href->find('.cat__main__desc', 0)->plaintext;
			 $menu[$k]['img']      = '/img/brands/'. $title .'.png';
			 $menu[$k]['url']       = $href->attr['href'];

			 
			 $name = $href->find('img', 0)->attr['src'];
			 
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

	}
}

//Добавляем серии
$products = array();

//cards
foreach ($menu as $key => $page) {
       $html2 = file_get_html('http://splitlife-krasnodar.ru'. $page['url']);
		 echo 'http://splitlife-krasnodar.ru'. $page['url'];
		 echo '<br>';

       foreach($html2->find('.item-block') as $key2 => $element) {
              $title2 = $page['title'];

              $products[$key][$key2]['title'] = $page['title'];

              $products[$key][$key2]['name'] = $element->find('.h2', 0)->plaintext;
              $products[$key][$key2]['img']  = '/img/'. $title2 .'/'. $key2 .'.png';
              $products[$key][$key2]['garanty'] = $element->find('.item-block__garant', 0)->innertext;
              $products[$key][$key2]['desc'] = $element->find('.text-description__in', 0)->innertext;
              
              

              $name = $element->find('a', 0)->attr['href'];
              
              //$dir = @mkdir('./img/'. $title2 .'/');
              //if($dir) { continue; } 

              // $file2 = 'http://splitlife-krasnodar.ru'. $name;
              // $newfile2 = './img/'. $title2 .'/'. $key2 .'.png';
              

				  // copy($file2, $newfile2);
				  
				//Находим id поста
				$mypost = get_page_by_title( $element->find('.h2', 0)->plaintext, '', 'seria' );
				//Находим категорию
				//$cat_id = get_term_by( 'name', $page['title'], 'brands');

				// Create new post.
				$post_data = array(
					'ID' 				=> $mypost->ID, //Если существует - обновляем
					'post_title'   => $element->find('.h2', 0)->plaintext,
					'post_type'    => 'seria',
					'post_status'  => 'publish',
					'post_content' => $element->find('.text-description__in', 0)->innertext, 
					//'post_category'=> array( $cat_id )
				);
				//Добавляем запись - Серия
				$post_id = wp_insert_post( $post_data );
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
				$upload_img = media_sideload_image( 'http://splitlife-krasnodar.ru'. $element->find('a', 0)->attr['href'], $post_id, $key2, 'id' );
				set_post_thumbnail( $post_id, $upload_img );

              
       }
}




?>
	