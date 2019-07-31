<?php
var_dump('<pre>');
echo 'Пришло с формы: <br><br>';
var_dump($_POST);

//Проверка
is_float(floatval($_POST['width'])) || is_integer((int)$_POST['width']) ? $width = $_POST['width'] : $width = null;
is_float(floatval($_POST['height'])) || is_integer((int)$_POST['height']) ? $height = $_POST['height'] : $height = null;
is_float(floatval($_POST['step'])) || is_integer((int)$_POST['step']) ? $step = $_POST['step'] : $step = null;
for($i = 1; $i <= 12; $i++) {
   //is_bool(bool($_POST['calc-room-option'. $i])) ? $calcRoomOption.''.$i = $_POST['calc-room-option'. $i] : $calcRoomOption.''.$i = null;
   $calcRoomOption[$i] = $_POST['calc-room-option'. $i];
   //echo $_POST['calc-room-option1'];
   echo $calcRoomOption.''.$i;
   echo '<br>';
}

//Массив цен для ПОМЕЩЕНИЯ в долларах
$steps = [
   '1.25' => [ 'price' => 1], 
   '1.66' => [ 'price' => 2], 
   '1.83' => [ 'price' => 3], 
   '2' => ['price' => 4], 
   '2.5' => ['price' => 5], 
   '3.07' => ['price' => 6], 
   '3' => ['price' => 7], 
   '4' => ['price' => 8],
   '5' => ['price' => 9]
];


//Массив цен за ДОП параметры
$steps = [
   '1.25' => [ 'price' => 1], 
   '1.66' => [ 'price' => 2], 
   '1.83' => [ 'price' => 3], 
   '2' => ['price' => 4], 
   '2.5' => ['price' => 5], 
   '3.07' => ['price' => 6], 
   '3' => ['price' => 7], 
   '4' => ['price' => 8],
   '5' => ['price' => 9]
];
//Цена за Управление
$control = 1;

echo '<br>';
echo $stepPrice = $steps[$step]['price'];


echo '<br> Ширина: ';
echo $width/0.96;
echo '<br> Высота: ';
echo $height/0.96;
echo '<br> Количество: ';
echo $col = $width/0.96*$height/0.96;
echo '<br> ----<br> Цена: ';
$calc = ($col*$stepPrice) + $control + $dop;

echo $calc .' $';

echo '<br> Площадь: ';
$square = $_POST['width']*$_POST['height'];
echo round($square, 2) .' m2';
//var_dump('<pre>');
?>