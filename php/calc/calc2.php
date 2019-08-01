<?php



////////////////////////////////////////
///////////////// ЦЕНЫ /////////////////
////////////////////////////////////////

//Стоимость ДОЛЛАРА в рублях
$dollor = 65;


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

//Цены для дополнительных полей в Долларах
$dopPrice = [
   'calc-room-option1' =>  [ 'price' => 1 ],
   'calc-room-option2' =>  [ 'price' => 1 ],
   'calc-room-option3' =>  [ 'price' => 1 ],
   'calc-room-option4' =>  [ 'price' => 1 ],
   'calc-room-option5' =>  [ 'price' => 1 ],
   'calc-room-option6' =>  [ 'price' => 1 ],
   'calc-room-option7' =>  [ 'price' => 1 ],
   'calc-room-option8' =>  [ 'price' => 1 ],
   'calc-room-option9' =>  [ 'price' => 1 ],
   'calc-room-option10' => [ 'price' => 1 ],
   'calc-room-option11' => [ 'price' => 1 ],
   'calc-room-option12' => [ 'price' => 1 ]
];

//Цена за Управление
$control = 1;

//Процент гарантии
$warrantyPercent = [
   '1' =>  [ 'price' => 1 ],
   '2' =>  [ 'price' => 2 ],
   '3' =>  [ 'price' => 3 ]
];

////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////



//Проверка передаваемых полей
is_float((float)$_POST['width']) || is_integer((int)$_POST['width']) ? $width = $_POST['width'] : $width = null;
is_float((float)$_POST['height']) || is_integer((int)$_POST['height']) ? $height = $_POST['height'] : $height = null;
is_float((float)$_POST['step']) || is_integer((int)$_POST['step']) ? $step = $_POST['step'] : $step = null;
is_float((float)$_POST['warranty-room']) || is_integer((int)$_POST['warranty-room']) ? $warrantyRoom = $_POST['warranty-room'] : $warrantyRoom = null;
//Проверка доп полей и внесение их в массив
for($i = 1; $i <= 12; $i++) {
   if($_POST['calc-room-option'. $i]) {
      ((bool)$_POST['calc-room-option'. $i] != null) ? $calcRoomOption['calc-room-option'. $i]['result'] = $_POST['calc-room-option'. $i] : $calcRoomOption[$i]['result'] = null;
   }
}

if($calcRoomOption != null) {
   //Объеденяем массив Цен ДОПОВ и значений переданных через форму
   foreach($calcRoomOption as $key => $value) {
      $dopResult[$key]['price'] = $dopPrice[$key]['price'];
   }
   //Складываем цены и получаем стоимость выбранных ДОПОВ
   foreach($dopResult as $row) {
      $dop += $row['price'];
   }
}

//Достаем цену шага
$step = $stepsPrice[$step]['price'];

//Достаем процент гарантии
$warranty = $warrantyPercent[$warrantyRoom]['price'];


$col = $width/0.96*$height/0.96;
$calc = ((($col*$step) + $control + $dop)*$warranty)*$dollor;

$square = $width*$height;

$response = [
   'price' => round($calc, 0),
   'square' => round($square, 2)
];
echo json_encode($response);
?>