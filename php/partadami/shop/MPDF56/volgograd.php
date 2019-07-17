<?

include('./mpdf.php');
$s = htmlspecialchars(trim($_GET['s'])); 
$id = htmlspecialchars(trim($_GET['id'])); 
include ("../../inc/config.php"); 

	
$html.='<html><head><title>Квитанция на оплату</title>  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
        <body>
            
<table class="ramka" cellspacing="0" style="width: 180mm;">
  <tr>
    <td style="width: 50mm; height: 65mm; border-bottom:1.5px solid #000;">
		<table style="width: 50mm; height: 100%;" cellspacing="0">
			<tr>
				<td class="kassir" style="vertical-align: top; letter-spacing: 0.2em;">Извещение</td>
			</tr>
			<tr>
				<td class="kassir" style="vertical-align: bottom;">Кассир</td></tr>
		</table>  
    </td>
    <td style="width: 130mm; height: 65mm; padding: 0mm 4mm 0mm 3mm; border-left:1.5px solid #000; border-bottom:1.5px solid #000;"> 

		<table cellspacing="0" style="width: 123mm; height: 100%;">
			<tr>
				<td>
					<table cellspacing="0">
						<tr>
							<td class="stext" width="65mm">
								СБЕРБАНК РОССИИ
							</td>
							<td class="stext7" width="65mm" style="text-align: right;">
								<i>Форма &#8470; ПД-4</i>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="vertical-align: bottom;">
					<table style="width:130mm" cellspacing="0">
						<tr>
							<td class="string">ООО "КрасГрупп-Волгоград"</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="subscript nowr">(наименование получателя платежа)</td>
			</tr>
			<tr>
				<td>
					<br><table cellspacing="0" width="100%">
						<tr>
							<td width="30%" class="floor">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 10%;">3</td>
										<td class="cell" style="padding: 3px;width: 10%;">4</td>
										<td class="cell" style="padding: 3px;width: 10%;">6</td>
										<td class="cell" style="padding: 3px;width: 10%;">0</td>
										<td class="cell" style="padding: 3px;width: 10%;">0</td>
										<td class="cell" style="padding: 3px;width: 10%;">1</td>
										<td class="cell" style="padding: 3px;width: 10%;">7</td>
										<td class="cell" style="padding: 3px;width: 10%;">5</td>
										<td class="cell" style="padding: 3px;width: 10%;">3</td>
										<td class="cell" style="padding: 3px;width: 10%;">1</td>
									</tr>
								</table>
							</td>
							<td width="10%" class="stext7">&nbsp;</td>
							<td width="80mm" class="floor" align="right">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 5%;">4</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">7</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">2</td>
										<td class="cell" style="padding: 3px;width: 5%;">8</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">8</td>
										<td class="cell" style="padding: 3px;width: 5%;">4</td>
										<td class="cell" style="padding: 3px;width: 5%;">7</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">5</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">5</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="subscript nowr">(ИНН получателя платежа)</td>
							<td class="subscript">&nbsp;</td>
							<td class="subscript nowr">(номер счета получателя платежа)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellspacing="0" width="100%">
						<tr>
							<td width="2%" class="stext">в</td>
							<td width="64%" class="string">Филиал "Южный" ПАО "БАНК УРАЛСИБ" г. Краснодар</td>
							<td width="10mm" class="stext" align="right">БИК&nbsp;</td>
							<td width="40mm" class="floor" align="right">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
										<td class="cell" style="padding: 3px;width: 11%;">4</td>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
										<td class="cell" style="padding: 3px;width: 11%;">3</td>
										<td class="cell" style="padding: 3px;width: 11%;">4</td>
										<td class="cell" style="padding: 3px;width: 11%;">9</td>
										<td class="cell" style="padding: 3px;width: 11%;">7</td>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="subscript">&nbsp;</td>
							<td class="subscript nowr">(наименование банка получателя платежа)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<br><table cellspacing="0" width="100%">
						<tr>
							<td class="stext7 nowr">Номер кор./сч. банка получателя платежа</td>
							<td width="60%" class="floor">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 5%;">3</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">8</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">4</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">7</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellspacing="0" width="100%">
						<tr>
							<td class="string" width="55%">Оплата по договору розничной купли-продажи № <b>'. $id .'Р</b></td>
							<td class="stext7" width="5%">&nbsp;</td>
							<td class="string" width="40%">&nbsp;</td>
						</tr>
						<tr>
						<td class="subscript nowr">(наименование платежа)</td>
						<td class="subscript">&nbsp;</td>
						<td class="subscript nowr">(номер лицевого счета (код) плательщика)</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="1%">Ф.И.О&nbsp;плательщика&nbsp;</td>
						<td class="string">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="1%">Адрес&nbsp;плательщика&nbsp;</td>
						<td class="string">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<br><table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="1%">Сумма&nbsp;платежа&nbsp;</td>
						<td class="string" width="8%"><b>'. $s .'</b></td>
						<td class="stext" width="1%">&nbsp;руб.&nbsp;</td>
						<td class="string" width="8%"><b> 00 </b></td>
						<td class="stext" width="1%">&nbsp;коп.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Сумма&nbsp;платы&nbsp;за&nbsp;услуги&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="1%">&nbsp;руб.&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="1%">&nbsp;коп.</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="5%">Итого&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="5%">&nbsp;руб.&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="5%">&nbsp;коп.&nbsp;</td>
						<td class="stext" width="20%" align="right">&laquo;&nbsp;</td>
						<td class="string" width="8%">&nbsp;</td>
						<td class="stext" width="1%">&nbsp;&raquo;&nbsp;</td>
						<td class="string" width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="3%">&nbsp;20&nbsp;</td>
						<td class="string" width="5%">&nbsp;</td>
						<td class="stext" width="1%">&nbsp;г.</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="stext7" style="text-align: justify">С условиями приема указанной в платежном документе суммы, в т.ч. с суммой взимаемой платы за&nbsp;услуги банка,&nbsp;ознакомлен&nbsp;и&nbsp;согласен.</td>
		</tr>
		<tr>
			<td style="padding-bottom: 0.5mm;">
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext7" width="50%">&nbsp;</td>
						<td class="stext7" width="1%"><b>Подпись&nbsp;плательщика&nbsp;</b></td>
						<td class="string" width="40%">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</td>
</tr>
<tr>
	<td style="width: 50mm; height: 80mm; vertical-align: bottom;" class="kassir">Квитанция<br><br>Кассир</td>
	<td style="width: 130mm; height: 80mm; padding: 0mm 4mm 0mm 3mm; border-left:1.5px solid #000;"> 

		<table cellspacing="0" style="width: 123mm; height: 100%;">
			<tr>
				<td>
					<table cellspacing="0">
						<tr>
							<td class="stext" width="65mm">
								СБЕРБАНК РОССИИ
							</td>
							<td class="stext7" width="65mm" style="text-align: right;">
								<i>Форма &#8470; ПД-4</i>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="vertical-align: bottom;">
					<table style="width:130mm" cellspacing="0">
						<tr>
							<td class="string">ООО "КрасГрупп-Волгоград"</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="subscript nowr">(наименование получателя платежа)</td>
			</tr>
			<tr>
				<td>
					<br><table cellspacing="0" width="100%">
						<tr>
							<td width="30%" class="floor">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 10%;">3</td>
										<td class="cell" style="padding: 3px;width: 10%;">4</td>
										<td class="cell" style="padding: 3px;width: 10%;">6</td>
										<td class="cell" style="padding: 3px;width: 10%;">0</td>
										<td class="cell" style="padding: 3px;width: 10%;">0</td>
										<td class="cell" style="padding: 3px;width: 10%;">1</td>
										<td class="cell" style="padding: 3px;width: 10%;">7</td>
										<td class="cell" style="padding: 3px;width: 10%;">5</td>
										<td class="cell" style="padding: 3px;width: 10%;">3</td>
										<td class="cell" style="padding: 3px;width: 10%;">1</td>
									</tr>
								</table>
							</td>
							<td width="10%" class="stext7">&nbsp;</td>
							<td width="80mm" class="floor" align="right">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 5%;">4</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">7</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">2</td>
										<td class="cell" style="padding: 3px;width: 5%;">8</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">8</td>
										<td class="cell" style="padding: 3px;width: 5%;">4</td>
										<td class="cell" style="padding: 3px;width: 5%;">7</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">5</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">5</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="subscript nowr">(ИНН получателя платежа)</td>
							<td class="subscript">&nbsp;</td>
							<td class="subscript nowr">(номер счета получателя платежа)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellspacing="0" width="100%">
						<tr>
							<td width="2%" class="stext">в</td>
							<td width="64%" class="string">Филиал «Южный» ОАО «УРАЛСИБ» г. Краснодар</td>
							<td width="10mm" class="stext" align="right">БИК&nbsp;</td>
							<td width="40mm" class="floor" align="right">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
										<td class="cell" style="padding: 3px;width: 11%;">4</td>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
										<td class="cell" style="padding: 3px;width: 11%;">3</td>
										<td class="cell" style="padding: 3px;width: 11%;">4</td>
										<td class="cell" style="padding: 3px;width: 11%;">9</td>
										<td class="cell" style="padding: 3px;width: 11%;">7</td>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
										<td class="cell" style="padding: 3px;width: 11%;">0</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="subscript">&nbsp;</td>
							<td class="subscript nowr">(наименование банка получателя платежа)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<br><table cellspacing="0" width="100%">
						<tr>
							<td class="stext7 nowr">Номер кор./сч. банка получателя платежа</td>
							<td width="60%" class="floor">
								<table class="cells" cellspacing="0">
									<tr>
										<td class="cell" style="padding: 3px;width: 5%;">3</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">8</td>
										<td class="cell" style="padding: 3px;width: 5%;">1</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">4</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">7</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
										<td class="cell" style="padding: 3px;width: 5%;">0</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table cellspacing="0" width="100%">
						<tr>
							<td class="string" width="55%">Оплата по договору розничной купли-продажи № <b>'. $id .'Р</b></td>
							<td class="stext7" width="5%">&nbsp;</td>
							<td class="string" width="40%">&nbsp;</td>
						</tr>
						<tr>
						<td class="subscript nowr">(наименование платежа)</td>
						<td class="subscript">&nbsp;</td>
						<td class="subscript nowr">(номер лицевого счета (код) плательщика)</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="1%">Ф.И.О&nbsp;плательщика&nbsp;</td>
						<td class="string">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="1%">Адрес&nbsp;плательщика&nbsp;</td>
						<td class="string">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<br><table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="1%">Сумма&nbsp;платежа&nbsp;</td>
						<td class="string" width="8%"><b>'. $s .'</b></td>
						<td class="stext" width="1%">&nbsp;руб.&nbsp;</td>
						<td class="string" width="8%"><b> 00 </b></td>
						<td class="stext" width="1%">&nbsp;коп.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Сумма&nbsp;платы&nbsp;за&nbsp;услуги&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="1%">&nbsp;руб.&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="1%">&nbsp;коп.</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext" width="5%">Итого&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="5%">&nbsp;руб.&nbsp;</td>
						<td class="string" width="8%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="5%">&nbsp;коп.&nbsp;</td>
						<td class="stext" width="20%" align="right">&laquo;&nbsp;</td>
						<td class="string" width="8%">&nbsp;</td>
						<td class="stext" width="1%">&nbsp;&raquo;&nbsp;</td>
						<td class="string" width="20%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td class="stext" width="3%">&nbsp;20&nbsp;</td>
						<td class="string" width="5%">&nbsp;</td>
						<td class="stext" width="1%">&nbsp;г.</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td class="stext7" style="text-align: justify">С условиями приема указанной в платежном документе суммы, в т.ч. с суммой взимаемой платы за&nbsp;услуги банка,&nbsp;ознакомлен&nbsp;и&nbsp;согласен.</td>
		</tr>
		<tr>
			<td style="padding-bottom: 0.5mm;">
				<table cellspacing="0" width="100%">
					<tr>
						<td class="stext7" width="50%">&nbsp;</td>
						<td class="stext7" width="1%"><b>Подпись&nbsp;плательщика&nbsp;</b></td>
						<td class="string" width="40%">&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
    </td>
  </tr>
</table>
			
			
						
        </body>
</html>';
$mpdf=new mPDF();
$mpdf->AddPage('L','','','','',10,10,10,10,10,10);
$mpdf->ignore_invalid_utf8 = true;
$mpdf->SetAutoFont(AUTOFONT_ALL);
$stylesheet = file_get_contents('./print.css');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html); 
$mpdf->Output('квитанция.pdf', 'I');
 
 
?>