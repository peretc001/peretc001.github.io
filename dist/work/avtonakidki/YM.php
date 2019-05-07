<?php 
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/config.php');  
include ($_SERVER['DOCUMENT_ROOT'] .'/inc/safemysql.class.php');

	$date = date('Y-m-d H:i');

	$db = new SafeMySQL(); ?><!-- ?xml version="1.0" encoding="UTF-8"? -->
	<pre>
<yml_catalog date="<?php echo $date; ?>">
    <shop>
		<name>Автонакидки.Нет</name>
		<company>Автонакидки.Нет</company>
		<url>http://avtonakidki.net/</url>
		<currencies>
			<currency id="RUR" rate="1" />
		</currencies>
		<categories>
			<category id="102">Все товары/Авто/Аксессуары и оборудование/Обустройство салона/Чехлы и накидки на сиденья</category>
				<category id="1" parentId="102">Накидки из алькантары</category>
				<category id="2" parentId="102">Накидки из меха</category>
				<category id="3" parentId="102">Накидки из овчины</category>
				<category id="4" parentId="102">Накидки из льна</category>
				<category id="5" parentId="102">Накидки из велюра</category>
				<category id="6" parentId="102">Накидки на детские кресла</category>
		</categories>
		<offers>

	<?php
 		$product = $db->getAll('SELECT * FROM products');
 		foreach($product as $row) { ?>

 			<offer id="<?php echo $row['id']?>" available="true">
		       <url>http://avtonakidki.net/catalog/<?php echo $row['category']?>/<?php echo $row['url']?>/<?php 
		       		if ($row['category'] == 'alcantara' or $row['category'] == 'mex' or $row['category'] == 'sheep') { 
		       			echo 'pack/'; 
		       		}
		       	?></url>
		       <price><?php 
		       		$pr = $row['price']*2 - 10; 
		       		if ($row['category'] == 'alcantara' or $row['category'] == 'mex' or $row['category'] == 'sheep') { 
		       			echo $pr; 
		       		} else {
		       			echo $row['price'];
		       		} 
		       	?></price>
		       <currencyId>RUR</currencyId>
		       <categoryId><?php 
		       		if 		($row['category'] == 'alcantara') { echo '1'; } 
		       		elseif 	($row['category'] == 'mex') { echo '2'; } 
		       		elseif 	($row['category'] == 'sheep') { echo '3'; } 
		       		elseif 	($row['category'] == 'len') { echo '4'; } 
		       		elseif 	($row['category'] == 'velure') { echo '5'; } 
		       		elseif 	($row['category'] == 'kids') { echo '6'; } 
		       	?></categoryId>
				<picture>http://avtonakidki.net/img/catalog/<?php echo $row['category']?>/<?php echo $row['img']?></picture>
				<delivery>true</delivery>
				<name><?php 
					if 	($row['category'] == 'alcantara') { 
							echo 'Комплект накидок на передние сиденья из алькантары, цвет: '. $row['color'];
					} 	elseif($row['category'] == 'mex') { 
							echo 'Комплект премиум накидок на передние сиденья из натурального меха на шкуре, цвет: '. $row['color'] .', Длинный ворс';
					} 	elseif($row['category'] == 'sheep' and $row['id'] < "307") { 
							echo 'Комплект накидок на передние сиденья из натуральной овчины на шкуре, цвет: '. $row['color'] .', Короткий ворс';
					} 	elseif($row['category'] == 'sheep' and $row['id'] > "306") { 
							echo 'Комплект накидок на передние сиденья из Мутона, цвет: '. $row['color'] .', Короткий ворс';
					} 	elseif($row['category'] == 'len') { 
							echo 'Автомобильная накидка на переднее сиденье из Льна, '. $row['color'];
					} 	elseif($row['category'] == 'velure') { 
							echo 'Одна накидка на любое переднее сиденье из Велюра, '. $row['color'];
					} 	elseif($row['category'] == 'kids') { 
							echo 'Меховая накидка на детское кресло '. $row['color'];
					} 
				?></name>
				<description><?php 
					if 	($row['category'] == 'alcantara') { 
							echo 'Комплект накидок на передние сиденья из алькантары, цвет: '. $row['color'];
					} 	elseif($row['category'] == 'mex') { 
							echo 'Комплект премиум накидок на передние сиденья из натурального меха на шкуре, цвет: '. $row['color'] .', Длинный ворс';
					} 	elseif($row['category'] == 'sheep' and $row['id'] < "307") { 
							echo 'Комплект накидок на передние сиденья из натуральной овчины на шкуре, цвет: '. $row['color'] .', Короткий ворс';
					} 	elseif($row['category'] == 'sheep' and $row['id'] > "306") { 
							echo 'Комплект накидок на передние сиденья из Мутона, цвет: '. $row['color'] .', Короткий ворс';
					} 	elseif($row['category'] == 'len') { 
							echo 'Автомобильная накидка на переднее сиденье из Льна, '. $row['color'];
					} 	elseif($row['category'] == 'velure') { 
							echo 'Одна накидка на любое переднее сиденье из Велюра, '. $row['color'];
					} 	elseif($row['category'] == 'kids') { 
							echo 'Меховая накидка на детское кресло '. $row['color'];
					} 
				?></description>
				<param name="Color"><?php echo $row['color']?></param>
				<param name="Type">накидка</param>				
				<param name="Material"><?php 
					if 		($row['category'] == 'alcantara') { echo 'алькантара'; } 
					elseif 	($row['category'] == 'mex') { echo 'шерсть'; } 
					elseif 	($row['category'] == 'sheep') { echo 'овчина'; } 
					elseif 	($row['category'] == 'len') { echo 'лен'; } 
					elseif 	($row['category'] == 'velure') { echo 'велюр'; } 
					elseif 	($row['category'] == 'kids') { echo 'мех'; } 
				?></param>
				<manufacturer_warranty>true</manufacturer_warranty>
        		<country_of_origin>Россия</country_of_origin>
			</offer>

	<?php } ?>

	</offers>
</shop>
</yml_catalog>
</pre>