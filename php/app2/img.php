<?php 
include './simplehtmldom/simple_html_dom.php';
// Create DOM from URL or file
$html = file_get_html('https://xn--80aplneco.xn--p1ai/catalog/product/stul-demi-sut-01/');

$menu = [];
foreach($html->find('.js-good-zoom-gallery') as $k => $element) {
       $i = 1;
       foreach ($element->find('.good-gallery__item.gallery-item.js-open-img') as $key => $value) {
              echo $title = 'https://xn--80aplneco.xn--p1ai'. $value->attr['href'];
              echo '<br>';

              
              // $name = $href->find('img')[0]->attr['src'];
              
              $dir = @mkdir('./cyt01/');
              if($dir) { continue; }

              $file = $title;
              $newfile = './cyt01/'. $i .'.jpg';

              copy($file, $newfile);

              $i++;
       }
       echo 'Done';
}

?>