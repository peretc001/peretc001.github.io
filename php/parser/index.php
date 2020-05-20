<?php 
include './simplehtmldom/simple_html_dom.php';
$html = file_get_html('https://vklybe.tv/krasnodar/ru/places/place/id/33732');

$menu = [];
foreach($html->find('.event-content a') as $k => $element) {
       $link = $element->href;
       $menu[] = $link;
}

foreach($menu as $item) {
       $html = file_get_html('https://vklybe.tv'. $item);
       foreach($html->find('.photo-block-content a') as $k => $element) {
              echo $element->href;
              echo '<br>';
       }
}
?>