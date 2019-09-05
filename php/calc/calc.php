<?php
//Определяем переданную форму
is_float((float)$_POST['form_id']) || is_integer((int)$_POST['form_id']) ? $id = $_POST['form_id'] : $id = null;

////////////////////////////////////////
///////////////// ЦЕНЫ /////////////////
////////////////////////////////////////

//Стоимость ДОЛЛАРА в рублях
$dollor = file_get_contents('dollor.txt');

if ($id == 1) {
   //Ценна ШАГА для ПОМЕЩЕНИЯ в долларах
   $stepsPrice = [
      '1.25' =>   ['price' => 9740], 
      '1.66' =>   ['price' => 5390], 
      '1.83' =>   ['price' => 3360], 
      '2'    =>   ['price' => 2105], 
      '2.5'  =>   ['price' => 1470], 
      '3.07' =>   ['price' => 1075], 
      '3'    =>   ['price' => 1100], 
      '4'    =>   ['price' => 868],
      '5'    =>   ['price' => 770]
   ];
} else if ($id == 2) {
   //Ценна ШАГА для ПОМЕЩЕНИЯ в долларах
   $stepsPrice = [
      '4' =>      ['price' => 1380], 
      '4.81' =>   ['price' => 1020], 
      '5' =>      ['price' => 1135], 
      '6' =>      ['price' => 1035], 
      '6.66' =>   ['price' => 930], 
      '8' =>      ['price' => 870], 
      '10' =>     ['price' => 710]
   ];
} else if ($id == 3) {
   //Ценна ШАГА для ПОМЕЩЕНИЯ в долларах
   $stepsPrice = [
      '50' =>     ['price' => 2275], 
      '25' =>     ['price' => 1896], 
      '31' =>     ['price' => 1145], 
      // '10.4' =>   ['price' => 1035], 
      // '15.6' =>   ['price' => 930], 
      // '15.63' =>  ['price' => 870], 
      // '16.6' =>   ['price' => 710]
   ];
}

//Цены для дополнительных полей в Долларах
$dopPrice = [
   'calc-room-option1' =>  [ 'price' => 32000 ],
   'calc-room-option2' =>  [ 'price' => 13500 ],
   'calc-room-option3' =>  [ 'price' => 3500 ],
   'calc-room-option4' =>  [ 'price' => 14500 ],
   'calc-room-option5' =>  [ 'price' => 1000 ],
   'calc-room-option6' =>  [ 'price' => 55000 ],

   'calc-room-option7' =>  [ 'price' => 1500 ],
   'calc-room-option8' =>  [ 'price' => 1000 ],
   'calc-room-option9' =>  [ 'price' => 2000 ],
   'calc-room-option10' => [ 'price' => 2000 ],
   'calc-room-option11' => [ 'price' => 2500 ],
   'calc-room-option12' => [ 'price' => 300 ]
];

//Процент гарантии
$warrantyPercent = [
   '1' =>  [ 'price' => 0.95 ],
   '2' =>  [ 'price' => 1 ],
   '3' =>  [ 'price' => 1.05 ]
];

//Доставка
$deliveryPrice = 1000;

////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////



//Проверка передаваемых полей
is_float((float)$_POST['width']) || is_integer((int)$_POST['width']) ? $width = $_POST['width'] : $width = null;
is_float((float)$_POST['height']) || is_integer((int)$_POST['height']) ? $height = $_POST['height'] : $height = null;
is_float((float)$_POST['step']) || is_integer((int)$_POST['step']) ? $step = $_POST['step'] : $step = null;
is_float((float)$_POST['step']) || is_integer((int)$_POST['step']) ? $step_id = (float)$_POST['step'] : $step_id = null;
is_float((float)$_POST['warranty-room']) || is_integer((int)$_POST['warranty-room']) ? $warrantyRoom = (int)$_POST['warranty-room'] : $warrantyRoom = null;
is_float((float)$_POST['warranty-street']) || is_integer((int)$_POST['warranty-street']) ? $warrantyStreet = (int)$_POST['warranty-street'] : $warrantyStreet = null;
is_float((float)$_POST['warranty-media']) || is_integer((int)$_POST['warranty-media']) ? $warrantyMedia = (int)$_POST['warranty-media'] : $warrantyMedia = null;
((bool)$_POST['delivery'] != null) ? $delivery = $deliveryPrice : $delivery = null;
//Проверка доп полей и внесение их в массив
for($i = 1; $i <= 6; $i++) {
   if($_POST['calc-room-option'. $i]) {
      ((bool)$_POST['calc-room-option'. $i] != null) ? $calcDopOption['calc-room-option'. $i]['result'] = $_POST['calc-room-option'. $i] : $calcDopOption[$i]['result'] = null;
   }
}
//Проверка монтажа и внесение их в массив
for($i = 7; $i <= 12; $i++) {
   if($_POST['calc-room-option'. $i]) {
      ((bool)$_POST['calc-room-option'. $i] != null) ? $calcSettingupOption['calc-room-option'. $i]['result'] = $_POST['calc-room-option'. $i] : $calcSettingupOption[$i]['result'] = null;
   }
}

if($calcDopOption != null) {
   //Объеденяем массив Цен ДОПОВ и значений переданных через форму
   foreach($calcDopOption as $key => $value) {
      $dopResult[$key]['price'] = $dopPrice[$key]['price'];
   }
   //Складываем цены и получаем стоимость выбранных ДОПОВ
   foreach($dopResult as $row) {
      $dop += $row['price'];
   }
}

if($calcSettingupOption != null) {
   //Объеденяем массив Цен ДОПОВ и значений переданных через форму
   foreach($calcSettingupOption as $key => $value) {
      $settingupResult[$key]['price'] = $dopPrice[$key]['price'];
   }
   //Складываем цены и получаем стоимость выбранных ДОПОВ
   foreach($settingupResult as $row) {
      $settingup += $row['price'];
   }
}

//Достаем цену шага
$step = $stepsPrice[$step]['price'];

if ( $warrantyRoom != null )           $garanty = $warrantyRoom;
else if ( $warrantyStreet != null )    $garanty = $warrantyStreet;
else if ( $warrantyMedia  != null )    $garanty = $warrantyMedia;
else $garanty = 2;

//Достаем процент гарантии
$warranty = $warrantyPercent[$garanty]['price'];

if($id == 3) {
   $col = $width*$height;
   $x = $width;
   $y = $height;
} else {
   $col = $width/0.96*$height/0.96;
   $x = $width/0.96;
   $y = $height/0.96;
}

//Цена LED экрана
$led = (($col*$step)*$warranty)*$dollor;

//Итоговая
$calc = (($col*$step)*$warranty)*$dollor + $dop + $delivery + $settingup;

$square = $width*$height;



$pixel_w = 320/$step_id*$x;
$pixel_y = 160/$step_id*$y;

$pixel = $pixel_w .' x '. $pixel_y;

$step_name = 'P-'. $step_id .'мм-'. round($pixel_w, 0) .'x'. round($pixel_y, 0) .'мм';

$response = [
   'led' => round($led, 0),
   'control' => round($dop, 0),
   'delivery' => round($delivery, 0),
   'settingup' => round($settingup, 0),
   'price' => round($calc, 0),
   'square' => round($square, 2),
   'step' => $step_id,
   'step_name' => $step_name,
   'pixel_w' => round($pixel_w, 0),
   'pixel_y' => round($pixel_y, 0),
   'garanty' => $garanty
];
echo json_encode($response);
?>