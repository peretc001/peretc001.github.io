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
$_GET['settingup']   ?   $settingup = htmlspecialchars(trim($_GET['settingup'])) : '';
$_GET['led']         ?   $led = htmlspecialchars(trim($_GET['led'])) : '';
$_GET['control']     ?   $control = htmlspecialchars(trim($_GET['control'])) : '';
$_GET['delivery']    ?   $delivery = htmlspecialchars(trim($_GET['delivery'])) : '';
$_GET['price']       ?   $price = htmlspecialchars(trim($_GET['price'])) : '';

switch ($tab) {
  case 1:
      $tab_name = 'Видеоэкран для помещения';
      break;
  case 2:
      $tab_name = 'Видеоэкран для улицы';
      break;
  case 3:
      $tab_name = 'Медиафасад';
      break;
}



$html .= '
  <h2 style="text-align: center"><b>Коммерческое предложение<br>ООО "LedImperial"</b></h2>
  <p><b>'. $tab_name .'</b><br>
  Модуль: <b>'. $step_name .'</b></p>
  <p style="text-align: justify; text-align-last: left;">Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Грамматики переписывается одна маленькая что осталось, назад взобравшись свой. Жизни наш деревни инициал если послушавшись дороге сбить от всех меня себя всемогущая обеспечивает эта маленький текста, домах вопроса несколько заглавных? Все, безорфографичный текстами, заголовок дал даже, курсивных ее рот ведущими путь вскоре послушавшись. Моей решила языком силуэт, собрал власти несколько, коварных свое продолжил рыбными не, дорогу переписывается. Языком, маленькая, пояс которое рыбными назад но единственное щеке она текстами рот гор родного сих предупреждал составитель домах! Большого грустный единственное меня строчка пустился переписали даже, страна до домах, дал пояс рыбными букв ведущими.</p>
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
  <table style="width: 75%;cellspacing: 0; cellpadding: 0; border-spacing: 0">
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Размер кабинета
      </td>
      <td style="padding: 5px; text-align: right;">
        768 x 768 мм
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
  <table style="width: 75%;cellspacing: 0; cellpadding: 0; border-spacing: 0">
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
        SMD 3in1 1RGB
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Производитель светодиодов
      </td>
      <td style="padding: 5px; text-align: right;">
        NationStar SMD2121
      </td>
    </tr>
    <tr>
      <td style="padding: 5px;">
        Размер модуля
      </td>
      <td style="padding: 5px; text-align: right;">
        320 х 160 мм
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Разрешение модуля
      </td>
      <td style="padding: 5px; text-align: right;">
        32 х 64 px
      </td>
    </tr>

    <tr>
      <td style="padding: 5px;">
        Контрастность
      </td>
      <td style="padding: 5px; text-align: right;">
        3000:1
      </td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 5px;">
        Цветовая температура (°К)
      </td>
      <td style="padding: 5px; text-align: right;">
        200 ~ 9300° K
      </td>
    </tr>
  </table>


  <h2 style="page-break-before:always;">Параметры Экрана</h2>
  <div style="display: block; text-align: center;">
    <img style="max-width: 100%" src="./img/artek.jpg">
  </div>
  <br>

  <table style="width: 75%;cellspacing: 0; cellpadding: 0; border-spacing: 0">
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
        1
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
        Яркость кд/м2
      </td>
      <td style="padding: 5px; text-align: right;">
        > 1000
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
      <td style="padding: 10px;">Монтаж</td>
      <td style="padding: 10px; text-align: right;">'. $settingup .' p.</td>
    </tr>
    <tr>
      <td style="padding: 10px;">Стоимость экрана</td>
      <td style="padding: 10px; text-align: right;">'. $led .' p.</td>
    </tr>
    <tr style="background: #f5f5f5">
      <td style="padding: 10px;">Управляющий компьютер</td>
      <td style="padding: 10px; text-align: right;">'. $control .' p.</td>
    </tr>
    <tr>
      <td style="padding: 10px;">Доставка</td>
      <td style="padding: 10px; text-align: right;">'. $delivery .' p.</td>
    </tr>
    <tr style="background: #cafcca">
      <td style="padding: 10px;"><b>Итого</b></td>
      <td style="padding: 10px; text-align: right;"><b>'. $price .' p.</b></td>
    </tr>
  </table>

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