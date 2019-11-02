<?php

require_once __DIR__ . '/vendor/autoload.php';

$stylesheet = file_get_contents('./css/print.min.css');

$_GET['where']       ?  $where = htmlspecialchars(trim($_GET['where'])) : $where = '';
$_GET['step_name']   ?  $step_name = htmlspecialchars(trim($_GET['step_name'])) : $step_name = '';
$_GET['width']       ?  $width = htmlspecialchars(trim($_GET['width'])) : $width = '';
$_GET['height']      ?  $height = htmlspecialchars(trim($_GET['height'])) : $height = '';
$_GET['pixel_w']     ?  $pixel_w = htmlspecialchars(trim($_GET['pixel_w'])) : $pixel_w = '';
$_GET['pixel_h']     ?  $pixel_h = htmlspecialchars(trim($_GET['pixel_h'])) : $pixel_h = '';
$_GET['step']        ?  $step = htmlspecialchars(trim($_GET['step'])) : $step = '';
$_GET['step_size']   ?  $size = htmlspecialchars(trim($_GET['step_size'])) : $size = '';
$_GET['step_pixel']  ?  $pixel = htmlspecialchars(trim($_GET['step_pixel'])) : $pixel = '';

$_GET['led']         ?   $led = htmlspecialchars(trim($_GET['led'])) : '0';
$_GET['settingup']   ?   $settingup = htmlspecialchars(trim($_GET['settingup'])) : '0';
$_GET['delivery']    ?   $delivery = htmlspecialchars(trim($_GET['delivery'])) : '0';
$_GET['monitor']     ?   $monitor = htmlspecialchars(trim($_GET['monitor'])) : '0';
$_GET['price']       ?   $price = htmlspecialchars(trim($_GET['price'])) : '0';

switch ($where) {
  case 'inside':
      $where = 'Видеоэкран для помещения';
      $tab = 1;
      $smd1 = 'SMD 3in1 1RGB';
      $smd2 = 'NationStar SMD2121';
      $contrast = '1000';
      break;
  case 'outside':
      $where = 'Видеоэкран для улицы';
      $tab = 2;
      $smd1 = 'SMD';
      $smd2 = 'SMD 1921';
      $contrast = '5500';
      break;
}

$html .= '
  <div class="general">
  <h2 style="text-align: center"><b>Коммерческое предложение<br>ООО "LedImperial"</b></h2>
  <p><b>'. $where .'</b><br>
  Модуль: <b>'. $step_name .'</b></p>
  <br>
  <table style="width: 100%;">
    <tr>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/size.svg"></p>
        <p>Размер экрана</p>
        <p>'. $height .' x '. $width .' мм</p>
      </td>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/photo-size.svg"></p>
        <p>Разрешение экрана</p>
        <p>'. $pixel_h .' x '. $pixel_w .' px</p>
      </td>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/reduce.svg"></p>
        <p>Шаг пикселя</p>
        <p>'. $step .' мм</p>
      </td>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/guarantee.svg"></p>
        <p>Гарантия</p>
        <p>2 года</p>
      </td>
    </tr>
  </table>
  <br>
  <div style="display: block; text-align: center;">
    <img style="max-width: 100%" src="./img/tab'. $tab .'/step---'. $step .'.jpg">
  </div>
  
  <h2>Характеристики</h2>
  <div style="display: block; text-align: center;">
    <img style="max-width: 100%" src="./img/1235_site-758130484.jpg">
  </div>

  <h2>Параметры модуля</h2>
  <table style="width: 100%;cellspacing: 0; cellpadding: 0; border-spacing: 0">
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Шаг пикселя
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $step .' мм
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Конфигурация светодиодов
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $smd1 .'
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Производитель светодиодов
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $smd2 .'
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Размер модуля
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $size .'
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Разрешение модуля
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $pixel .'
      </td>
    </tr>

    <tr>
      <td style="padding: 5px;">
        Контрастность
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $contrast .' Кнд/м<sup>2</sup>
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Цветовая температура (°К)
      </td>
      <td style="padding: 5px; text-align: right;">
        3200 ~ 9300° K
      </td>
    </tr>
  </table>

  <h2 style="page-break-before:always;">Параметры Экрана</h2>
  <div style="display: block; text-align: center;">
    <img style="max-width: 100%" src="./img/artek.jpg">
  </div>
  <br>

  <table style="width: 100%;cellspacing: 0; cellpadding: 0; border-spacing: 0">
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Размер экрана
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $height .' x '. $width .' мм
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Разрешение экрана
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $pixel_h .' x '. $pixel_w .' мм
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Вес экрана кг
      </td>
      <td style="padding: 5px; text-align: right;">
        32.00
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Энергопотребление экрана макс / сред, Вт
      </td>
      <td style="padding: 5px; text-align: right;">
        700 / 350
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Контрастность
      </td>
      <td style="padding: 5px; text-align: right;">
      '. $contrast .' Кнд/м<sup>2</sup>
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Рабочее напряжение
      </td>
      <td style="padding: 5px; text-align: right;">
        220V/50Hz
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Степень защиты IP
      </td>
      <td style="padding: 5px; text-align: right;">
        IP31
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Угол обзора
      </td>
      <td style="padding: 5px; text-align: right;">
        H=140° / V=120°
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Температурный режим работы
      </td>
      <td style="padding: 5px; text-align: right;">
        -10°C~+60°C, влажн. до 90%
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Срок службы светодиодов
      </td>
      <td style="padding: 5px; text-align: right;">
        > 100 000
      </td>
    </tr>
  </table>


  <h1 style="page-break-before:always;"><b>Итог</b></h1>
  <table style="width: 100%;cellspacing: 0; cellpadding: 0; border-spacing: 0">
    <tr style="background: #f5f5f5">
      <td style="padding: 10px;"><p style="display: block;">Монтаж</p></td>
      <td style="padding: 10px;text-align: right;"><p style="display: block;padding: 10px;">'. $settingup .' p.</p></td>
    </tr>
    <tr>
    <td style="padding: 10px;"><p style="display: block;">Стоимость экрана</p></td>
    <td style="padding: 10px;text-align: right;"><p style="display: block;padding: 10px;">'. $monitor .' p.</p></td>
    </tr>
    <tr style="background: #f5f5f5">
    <td style="padding: 10px;"><p style="display: block;">Управляющий компьютер</p></td>
    <td style="padding: 10px;text-align: right;"><p style="display: block;padding: 10px;">'. $led .' p.</p></td>
    </tr>
    <tr>
    <td style="padding: 10px;"><p style="display: block;">Доставка</p></td>
    <td style="padding: 10px;text-align: right;"><p style="display: block;padding: 10px;">'. $delivery .' p.</p></td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 10px;"><p style="display: block;"><b>Итого</b></p></td>
      <td style="padding: 10px;text-align: right;"><p style="display: block;padding: 10px;"><b>'. $price .' p.</b></p></td>
    </tr>
  </table>
  </div>
';

$mpdf = new \Mpdf\Mpdf([
  'margin_top' => 20,
  'margin_header' => 5, 
  'margin_footer' => 5,
]);

$mpdf->SetTitle('Коммерческое предложение');
$mpdf->SetHTMLHeader('<table style="width: 100%; border-bottom: 1px solid #000;padding-bottom: 10px;"><tr><td>Телефон: 8 (800) 777-02-91</td><td style="text-align: right;"><a href="http://ledimperial.ru/">ledimperial.ru</td></tr></table>');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html,\Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();