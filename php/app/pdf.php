<?php

require_once __DIR__ . '/vendor/autoload.php';

$stylesheet = file_get_contents('./css/print.min.css');

$tab = htmlspecialchars(trim($_GET['tab']));
$_GET['step_name']   ?  $step_name = htmlspecialchars(trim($_GET['step_name'])) : $step_name = '';
$_GET['width']       ?  $width = htmlspecialchars(trim($_GET['width'])) : $width = '';
$_GET['height']      ?  $height = htmlspecialchars(trim($_GET['height'])) : $height = '';
$_GET['pixel_w']     ?  $pixel_w = htmlspecialchars(trim($_GET['pixel_w'])) : $pixel_w = '';
$_GET['pixel_y']     ?  $pixel_y = htmlspecialchars(trim($_GET['pixel_y'])) : $pixel_y = '';
$_GET['step']        ?  $step = htmlspecialchars(trim($_GET['step'])) : $step = '';
$_GET['garanty']     ?  $garanty = htmlspecialchars(trim($_GET['garanty'])) : $garanty = '';
if ( $garanty > 1) {
  $year = 'a';
}
$_GET['square']      ?   $square = htmlspecialchars(trim($_GET['square'])) : '';
$_GET['settingup']   ?   $settingup = htmlspecialchars(trim($_GET['settingup'])) : '0';
$_GET['led']         ?   $led = htmlspecialchars(trim($_GET['led'])) : '0';
$_GET['control']     ?   $control = htmlspecialchars(trim($_GET['control'])) : '0';
$_GET['delivery']    ?   $delivery = htmlspecialchars(trim($_GET['delivery'])) : '0';
$_GET['price']       ?   $price = htmlspecialchars(trim($_GET['price'])) : '0';
$_GET['step_size']   ?   $step_size = htmlspecialchars(trim($_GET['step_size'])) : '';
$_GET['step_ratio']  ?   $step_ratio = htmlspecialchars(trim($_GET['step_ratio'])) : '';
$_GET['col']         ?   $col = htmlspecialchars(trim($_GET['col'])) : '';

$settingup != '' ? $settingup : $settingup = '0';
$led != '' ? $led : $led = '0';
$control != '' ? $control : $control = '0';
$delivery != '' ? $delivery : $delivery = '0';

switch ($tab) {
  case 1:
      $tab_name = 'Видеоэкран для помещения';
      $contrast = '1000';
      $size = '960 х 960 мм';
      $smd1 = 'SMD 3in1 1RGB';
      $smd2 = 'NationStar SMD2121';
      break;
  case 2:
      $tab_name = 'Видеоэкран для улицы';
      $contrast = '5500';
      $size = '960 х 960 мм';
      $smd1 = 'SMD';
      $smd2 = 'SMD 1921';
      break;
  case 3:
      $tab_name = 'Медиафасад';
      $contrast = '7000';
      $size = '1000 х 1000 мм';
      $smd1 = 'DIP 1R1G1B';
      $smd2 = 'Xinda';
      break;
}



$html .= '
  <div class="general">
  <h2 style="text-align: center"><b>Коммерческое предложение<br>ООО "LedImperial"</b></h2>
  <p><b>'. $tab_name .'</b><br>
  Модуль: <b>'. $step_name .'</b></p>
  <br>
  <table style="width: 100%;">
    <tr>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/size.svg"></p>
        <p>Размер экрана</p>
        <p>'. $width .' x '. $height .' мм</p>
      </td>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/photo-size.svg"></p>
        <p>Разрешение экрана</p>
        <p>'. $pixel_w .' x '. $pixel_y .' px</p>
      </td>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/reduce.svg"></p>
        <p>Шаг пикселя</p>
        <p>'. $step .' мм</p>
      </td>
      <td style="width: 25%;padding: 5px 10px;text-align: center">
        <p><img style="width:50px;margin-bottom:10px" src="./img/icon/guarantee.svg"></p>
        <p>Гарантия</p>
        <p>'. $garanty .' год'. $year .'</p>
      </td>
    </tr>
  </table>
  <br>
  <div style="display: block; text-align: center;">
    <img style="max-width: 100%" src="./img/tab'. $tab .'/step---'. $step .'.jpg">
  </div>
        
  <h2 style="page-break-before:always;">Параметры кабинета</h2>
  <table style="width: 100%;cellspacing: 0; cellpadding: 0; border-spacing: 0">
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Размер кабинета
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $size .'
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Доступ для обслуживания экрана
      </td>
      <td style="padding: 5px; text-align: right;">
        Тыльное
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Вес (кг/м2)
      </td>
      <td style="padding: 5px; text-align: right;">
        32.00
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Плотность пикселей на м2
      </td>
      <td style="padding: 5px; text-align: right;">
        62500
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Потребляемая мощность макс / сред, Вт/м2
      </td>
      <td style="padding: 5px; text-align: right;">
        700 / 350
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Частота обновления (Гц)
      </td>
      <td style="padding: 5px; text-align: right;">
        1920
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Частота кадра (Гц)
      </td>
      <td style="padding: 5px; text-align: right;">
        50/60
      </td>
    </tr>
  </table>
  
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
      '. $step_size .'
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Разрешение модуля
      </td>
      <td style="padding: 5px; text-align: right;">
      '. $step_ratio .'
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
        '. $width .' x '. $height .' мм
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Разрешение экрана
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $pixel_w .' x '. $pixel_y .' мм
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Кол-во кабинетов
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $col .'
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Вес экрана кг
      </td>
      <td style="padding: 5px; text-align: right;">
        32.00
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Энергопотребление экрана макс / сред, Вт
      </td>
      <td style="padding: 5px; text-align: right;">
        700 / 350
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
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Площадь экрана м2
      </td>
      <td style="padding: 5px; text-align: right;">
        '. $square .' M2
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
    <td style="padding: 10px;text-align: right;"><p style="display: block;padding: 10px;">'. $led .' p.</p></td>
    </tr>
    <tr style="background: #f5f5f5">
    <td style="padding: 10px;"><p style="display: block;">Управляющий компьютер</p></td>
    <td style="padding: 10px;text-align: right;"><p style="display: block;padding: 10px;">'. $control .' p.</p></td>
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