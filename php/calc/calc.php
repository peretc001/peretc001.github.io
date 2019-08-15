<?php



////////////////////////////////////////
///////////////// ЦЕНЫ /////////////////
////////////////////////////////////////

//Стоимость ДОЛЛАРА в рублях
$dollor = 65;


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
$deliveryPrice = 50;

////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////



//Проверка передаваемых полей
is_float((float)$_POST['width']) || is_integer((int)$_POST['width']) ? $width = $_POST['width'] : $width = null;
is_float((float)$_POST['height']) || is_integer((int)$_POST['height']) ? $height = $_POST['height'] : $height = null;
is_float((float)$_POST['step']) || is_integer((int)$_POST['step']) ? $step = $_POST['step'] : $step = null;
is_float((float)$_POST['warranty-room']) || is_integer((int)$_POST['warranty-room']) ? $warrantyRoom = $_POST['warranty-room'] : $warrantyRoom = null;
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

//Достаем процент гарантии
$warranty = $warrantyPercent[$warrantyRoom]['price'];


$col = $width/0.96*$height/0.96;

//Цена LED экрана
$led = (($col*$step)*$warranty)*$dollor;

//Итоговая
$calc = (($col*$step)*$warranty)*$dollor + $dop + $delivery + $settingup;

$square = $width*$height;

$response = [
   'led' => round($led, 0),
   'control' => round($dop, 0),
   'delivery' => round($delivery, 0),
   'settingup' => round($settingup, 0),
   'price' => round($calc, 0),
   'square' => round($square, 2)
];
echo json_encode($response);
?>