<?php 
include './simplehtmldom/simple_html_dom.php';
// Create DOM from URL or file
$html = file_get_html('http://splitlife-krasnodar.ru/split_systemi/');

$menu = [];
foreach($html->find('.wrapper__brand li') as $k => $element) {
       foreach($element->find('a') as $href) {
              $title = $href->find('.cat__main__title')[0]->plaintext;
              
              $menu[$k]['title']     = $href->find('.cat__main__title')[0]->plaintext;
              $menu[$k]['about']     = $href->find('.cat__main__desc')[0]->plaintext;
              $menu[$k]['img']      = '/img/brands/'. $title .'.png';
              $menu[$k]['url']       = $href->attr['href'];

              
              $name = $href->find('img')[0]->attr['src'];
              
              // $dir = @mkdir('./img/brands/'. $title2);
              // if($dir) { continue; }

              // $file = 'http://splitlife-krasnodar.ru'. $name;
              // $newfile = './img/brands/'. $title .'.png';

              // copy($file, $newfile);

       }
}



$products = [];

//title and desc
// foreach($html->find('.wrapper__content') as $element) {
//        $products['brand']['title'] = $element->find('h1')[0]->plaintext;
//        $products['brand']['about'] = $element->find('.list-item__description-text__hidden__in')[0]->innertext;
// }

//cards
foreach ($menu as $key => $page) {
       $html2 = file_get_html('http://splitlife-krasnodar.ru'. $page['url']);
       //var_dump('http://splitlife-krasnodar.ru'. $page['url']);

       foreach($html2->find('.item-block') as $key2 => $element) {
              $title2 = $page['title'];

              $products[$key][$key2]['title'] = $page['title'];

              $products[$key][$key2]['name'] = $element->find('.h2')[0]->plaintext;
              $products[$key][$key2]['img']  = '/img/'. $title2 .'/'. $key2 .'.png';
              $products[$key][$key2]['garanty'] = $element->find('.item-block__garant')[0]->innertext;
              $products[$key][$key2]['desc'] = $element->find('.text-description__in')[0]->innertext;

              $products[$key][$key2]['tech']['zavod'] = '';
              //Компрессор
              $products[$key][$key2]['tech']['compres'] = $element->find('.item-block__chars.row li')[0]->find('span')[1]->innertext;
              //Таймер
              $products[$key][$key2]['tech']['timer'] = $element->find('.item-block__chars.row li')[3]->find('span')[1]->innertext;
              //Класс
              $products[$key][$key2]['tech']['class'] = $element->find('.item-block__chars.row li')[4]->find('span')[1]->innertext;
              //Шум
              $products[$key][$key2]['tech']['shoom'] = $element->find('.item-block__chars.row li')[7]->find('span')[1]->innertext;
              //Ионизация
              $products[$key][$key2]['tech']['ion'] = $element->find('.item-block__chars.row li')[8]->find('span')[1]->innertext;
              //Wifi 
              $products[$key][$key2]['tech']['wifi'] = $element->find('.item-block__chars.row li')[9]->find('span')[1]->innertext;
              
              // foreach ($element->find('.col-12.d-md-block.d-none table tr') as $key3 => $t) {
              //        if ( $t->find('.text-left')[0]->innertext != 'Модель' && $t->find('.text-left')[0]->innertext != null ) {
              //               $products[$key][$key2]['models'][$key3]['name'] = $t->find('.text-left')[0]->innertext;
              //               $products[$key][$key2]['models'][$key3]['square'] = preg_replace("/[^0-9]/", '', $t->find('.text-left')[0]->next_sibling(0)->innertext);
              //               $products[$key][$key2]['models'][$key3]['cold'] = (int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->innertext;
              //               $products[$key][$key2]['models'][$key3]['hot'] = (int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;
              //               $products[$key][$key2]['models'][$key3]['size'] = $t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;
              //               $products[$key][$key2]['models'][$key3]['price'] = (int)$t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;

              //        }
              // }

              //$name = $element->find('a')[0]->attr['href'];
              
              //$dir = @mkdir('./img/'. $title2 .'/');
              //if($dir) { continue; } 

              // $file2 = 'http://splitlife-krasnodar.ru'. $name;
              // $newfile2 = './img/'. $title2 .'/'. $key2 .'.png';
              

              // copy($file2, $newfile2);

              
       }
}

// echo '<pre>';
// var_dump($menu);
// echo '</pre>';
// echo '----------------';
echo '<pre>';
var_dump($products);
echo '</pre>';



// # Подключаем файл конфигурации
// include $_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php';
	
// $db = new SafeMySQL();



// foreach($menu as $m) {
//        $data = array('title' => $m['title'], 'about' => $m['about'], 'img' => $m['img'], 'url' => $m['url']);
//        $db->query("INSERT INTO `brands` SET ?u", $data);
// }

// foreach($products as $prod) {
       
//        foreach($prod as $p) {
//               $title = $p['title'];
//               $row = $db->getRow('SELECT * FROM `brands` WHERE title = ?s', $title);
//               $brands_id = $row['id'];

//               if ($p['desc'] == null) {
//                      $p['desc'] = '';
//               }

//               $data = array('brands_id' => $brands_id, 'name' => $p['name'], 'desc' => $p['desc'], 'img' => $p['img']);
//               $db->query("INSERT INTO `products` SET ?u", $data);

//               //var_dump($data);

//               $row = $db->getRow('SELECT * FROM `products` WHERE name = ?s', $p['name']);
//               echo $products_id = $row['id'];

//               foreach($p['models'] as $m) {

//                      $data2= array('brands_id' => $brands_id, 'products_id' => $products_id, 'name' => $m['name'], 'square' => $m['square'], 'cold' => $m['cold'], 'hot' => $m['hot'], 'size' => $m['size'], 'price' => $m['price'] );
//                      $db->query("INSERT INTO `models` SET ?u", $data2);
//                      echo '----------------';
//                      //var_dump($data2);
//               }
//        }


// }

?>