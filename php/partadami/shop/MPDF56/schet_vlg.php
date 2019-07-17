<?
include('./mpdf.php');
require( 'http://startaks.ru/wp-load.php' );
	
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