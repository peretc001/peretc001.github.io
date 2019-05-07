<? session_start();
include('./mpdf.php');
$s = htmlspecialchars(trim($_GET['s'])); 
$id = htmlspecialchars(trim($_GET['id'])); 
$phone = htmlspecialchars(trim($_GET['phone']));
include ("../../inc/config.php"); 

	
$query = mysql_query("SELECT *,DATE_FORMAT(date,'%d.%m.%Y') as bdate FROM zakaz_new  WHERE user_id = '$id' "); 
			$query = mysql_fetch_assoc($query); 
$html.='<html><head><title>Счет на оплату</title>  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
        <body>
        <table class="top">
			<tr>
				<td align="center"><img src="logo.jpg"></td>
				<td>400074, г. Волгоград, ул. Козловская, 55<br>
				Телефон: (8442) 98-35-50<br>
				<a href="http://www.partadami.ru">www.partadami.ru</a></td>
			</tr>
		</table>
		<br><br>
		<table class="recvizit">
			<tr>
				<td colspan="2" class="top">Получатель:</td>
				<td colspan="2" class="top_right">ООО "КрасГрупп-Волгоград"</td>
			</tr>
			<tr>
				<td class="left">ИНН</td>
				<td class="left1">3460017538</td>
				<td class="right">КПП</td>
				<td class="right1">346001001</td>
			</tr>
			<tr>
				<td class="left">Р/с</td>
				<td class="left1">40702810847050000005</td>
				<td class="right">К/с</td>
				<td class="right1">30101810400000000700</td>
			</tr>
			<tr>
				<td class="left" style="border-bottom:1px solid #000;">БИК</td>
				<td class="left1" style="border-bottom:1px solid #000;">040349700</td>
				<td class="right" style="border-bottom:1px solid #000;">Банк</td>
				<td class="right1" style="border-bottom:1px solid #000;">Филиал "Южный" ПАО "БАНК УРАЛСИБ"</td>
			</tr>
		</table>
		<br><br><h1 align="center">Счет № '. $id .'Р от '. date("d.m.Y") .'</h1><br>
		<br><br>
		<table class="product">
			<tr>
				<td class="n"><b>№</b></td>
				<td class="name" align="center"><b>Товары (работы, услуги)</b></td>
				<td class="price"><b>Цена</b></td>
				<td class="price"><b>Кол-во</b></td>
				<td class="total"><b>Сумма</b></td>
			</tr>
			<tr>
				<td class="n">1</td>
				<td class="name">Оплата за товар по договору розничной купли-продажи № '.  $id  .'Р от '. $query["bdate"] .'</td>
				<td class="price">'. $s .',00</td>
				<td class="price">1</td>
				<td class="total">'. $s .',00</td>
			</tr>
			<tr>
				<td class="n_bottom"></td>
				<td class="name_bottom" colspan="3"><b>Итого:</b></td>
				<td class="total_bottom">'. $s .',00</td>
			</tr>
			<tr>
				<td class="n_bottom"></td>
				<td class="name_bottom" colspan="3"><b>Без налога (НДС):</b></td>
				<td class="total_bottom">-</td>
			</tr>
			<tr>
				<td class="n_bottom"></td>
				<td class="name_bottom" colspan="3"><b>Всего к оплате:</b></td>
				<td class="total_bottom">'. $s .',00</td>
			</tr>
		</table>
		<br>';
		function Suma($inn, $stripkop=false) {
$nol = 'нуль';
$str[100]= array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот', 'восемьсот','девятьсот');
$str[11] = array('','десять','одиннадцать','двенадцать','тринадцать', 'четырнадцать','пятнадцать','шестнадцать','семьнадцать', 'восемнадцать','девятнадцать','двадцать');
$str[10] = array('','десять','двадцать','тридцать','сорок','пятьдесят', 'шестьдесят','семьдесят','восемьдесят','девяносто');
$sex = array(
array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),// m
array('','одна','две','три','четыри','пять','шесть','семь', 'восемь','девять') // f
);
$forms = array(
array('копейка',  'копейки',   'копеек',     1), // 10^-2
array('рубля',    'рубли',     'рублей',     0), // 10^ 0
array('тысяча',   'тысячи',    'тысяч',      1), // 10^ 3
);
$out = $tmp = array();
$tmp = explode('.', str_replace(',','.', $inn));
$rub = number_format($tmp[0],0,'','-');
if ($rub==0) $out[] = $nol;
// нормализация копеек
$kop = isset($tmp[1]) ? substr(str_pad($tmp[1], 2, '0', я),0,2) : '00';
$segments = explode('-', $rub);
$offset = sizeof($segments);
if ((int)$rub==0) {
$o[] = $nol;
$o[] = morph(0, $forms[1][0],$forms[1][1],$forms[1][2]);
}
else {
foreach ($segments as $k=>$lev) {
$sexi= (int) $forms[$offset][3];
$ri  = (int) $lev;
if ($ri==0 && $offset>1) {
$offset--;
continue;
}
$ri = str_pad($ri, 3, '0', STR_PAD_LEFT);
$r1 = (int)substr($ri,0,1);
$r2 = (int)substr($ri,1,1);
$r3 = (int)substr($ri,2,1);
$r22= (int)$r2.$r3;
if ($ri>99) $o[] = $str[100][$r1];
if ($r22>20) {// >20
$o[] = $str[10][$r2];
$o[] = $sex[ $sexi ][$r3];
}
else { // <=20
if ($r22>9) $o[] = $str[11][$r22-9]; // 10-20
elseif($r22>0)  $o[] = $sex[ $sexi ][$r3]; // 1-9
}
$o[] = morph($ri, $forms[$offset][0],$forms[$offset][1],$forms[$offset][2]);
$offset--;
}
}
if (!$stripkop) {
$o[] = $kop;
$o[] = morph($kop,$forms[0][0],$forms[0][1],$forms[0][2]);
}
return preg_replace("/\s{2,}/",' ',implode(' ',$o));
}

function morph($n, $f1, $f2, $f5) {
$n = abs($n) % 100;
$n1= $n % 10;
if ($n>10 && $n<20)	return $f5;
if ($n1>1 && $n1<5)	return $f2;
if ($n1==1)	return $f1;
return $f5;
}

	
	$html.='<table class="theme" style="border:0;">
			<tr>
				<td>К оплате: '. Suma($s) .' </td>
			</tr>
			<tr>
				<td>НДС не предусмотрен.</td>
			</tr>
		</table>
		<br>
		<table class="stamp">
			<tr>
				<td class="dir">Директор</td>
				<td class="line"><img src="stamp_vlg.png"></td>
				<td class="fio">И.В. Красовский</td>
			</tr>
		</table>
        </body>
</html>';
$mpdf=new mPDF('','', 0, '', 15, 15, 6, 16, 9, 9, 'L');
$mpdf->AddPage();
$mpdf->ignore_invalid_utf8 = true;
$mpdf->SetAutoFont(AUTOFONT_ALL);
$stylesheet = file_get_contents('./print3.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html); 
$mpdf->Output('Счет.pdf', 'I');
 
 
?>