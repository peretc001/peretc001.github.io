<?php 
include './simplehtmldom/simple_html_dom.php';
// Create DOM from URL or file


$products = [];

//cards

       $html2 = file_get_html('http://splitlife-krasnodar.ru/split_systemi/aux');
       foreach($html2->find('.item-block') as $key2 => $element) {
              $title2 = $page['title'];
              
              $products[$key][$key2]['title'] = $page['title'];

              $products[$key][$key2]['name'] = $element->find('.h2')[0]->plaintext;
              $products[$key][$key2]['img']  = '/img/'. $title2 .'/'. $key2 .'.png';
              $products[$key][$key2]['garanty'] = $element->find('.item-block__garant')[0]->innertext;
              $products[$key][$key2]['desc'] = $element->find('.text-description__in')[0]->innertext;
              
              foreach ($element->find('.col-12.d-md-block.d-none table tr') as $key3 => $t) {
                     if ( $t->find('.text-left')[0]->innertext != 'Модель' && $t->find('.text-left')[0]->innertext != null ) {
                            $products[$key][$key2]['model'][$key3]['name'] = $t->find('.text-left')[0]->innertext;
                            $products[$key][$key2]['model'][$key3]['square'] = $t->find('.text-left')[0]->next_sibling(0)->innertext;
                            $products[$key][$key2]['model'][$key3]['cold'] = $t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->innertext;
                            $products[$key][$key2]['model'][$key3]['hot'] = $t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;
                            $products[$key][$key2]['model'][$key3]['size'] = $t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;
                            $products[$key][$key2]['model'][$key3]['price'] = $t->find('.text-left')[0]->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->next_sibling(0)->innertext;

                     }
              }


              //$name = $element->find('a')[0]->attr['href'];
              
              //$dir = @mkdir('./img/'. $title2 .'/');
              //check if the folder not exists then create it
              //if($dir) { continue; } 

              //$file2 = 'http://splitlife-krasnodar.ru'. $name;
              //$newfile2 = './img/'. $title2 .'/'. $key2 .'.png';
              

              //copy($file2, $newfile2);

              
       }


// echo '<pre>';
// var_dump($menu);
// echo '</pre>';

echo '<pre>';
var_dump($products);
echo '</pre>';



?>