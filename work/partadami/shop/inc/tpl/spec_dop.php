<?php 	$cyt14 = mysql_query("SELECT * FROM `spec` `p` WHERE `p`.`id` = '$url' ");
			$row = mysql_fetch_array($cyt14);
		?>

<div id="specification" <?php if ($url == 'comf_pro_oxford' or $url == 'l3') { echo 'class="oxford"'; } ?> >
	<h2 id="spec">Спецификация:</h2>
	<div class="row">
	<?php if ($category == 'tumby_i_stellazhi') { ?>
		<div class="one-half column">
			<table>
				<tr>
					<td>Ширина</td>
					<td class="right"><?php echo $row['p1']; ?> см</td>
				</tr>
				<tr>
					<td>Высота</td>
					<td class="right"><?php echo $row['p2']; ?> см</td>
				</tr>
				<tr>
					<td>Глубина</td>
					<td class="right"><?php echo $row['p3']; ?> см</td>
				</tr>
			</table>
		</div>
		<div class="one-half column">
			<table>
				<tr>
					<td>Количество секций</td>
					<td class="right"><?php echo $row['p4']; ?></td>
				</tr>
				<tr>
					<td>Производитель</td>
					<td class="right"><?php echo $row['p16']; ?></td>
				</tr>
				<tr class="bottom">
					<td><b>Общий вес</b></td>
					<td class="right"><b><?php echo $row['v1']; ?> кг</b></td>
				</tr>
				<tr>
					<td><b>Общий объем</b></td>
					<td class="right"><b><?php echo $row['o1']; ?></b></td>
				</tr>
			</table>
		</div>
	<?php } elseif ($category == 'dopolnitelnye_elementy') { ?>
		<?php if ($url == 'l3') { ?>
		<div class="one-half column">
			<table>
				<tr>
					<td>Тип лампы</td>
					<td class="right"><?php echo $row['p1']; ?> см</td>
				</tr>
				<tr>
					<td>Мощность</td>
					<td class="right"><?php echo $row['p2']; ?> см</td>
				</tr>
				<tr>
					<td>Освещенность</td>
					<td class="right"><?php echo $row['p3']; ?> см</td>
				</tr>
				<tr>
					<td>Срок службы светодиодов</td>
					<td class="right"><?php echo $row['p4']; ?> см</td>
				</tr>
			</table>
		</div>
		<div class="one-half column">
			<table>
				<tr>
					<td>Цветовая температура</td>
					<td class="right"><?php echo $row['p5']; ?></td>
				</tr>
				<tr>
					<td>Индекс цветопередачи</td>
					<td class="right"><?php echo $row['p6']; ?> см</td>
				</tr>
				<tr>
					<td>Блок питания 12 V/1,5A</td>
					<td class="right"><?php echo $row['p8']; ?></td>
				</tr>
				<tr>
					<td>Производитель</td>
					<td class="right"><?php echo $row['p16']; ?></td>
				</tr>
			</table>
		</div>
		<?php } ?>
	<?php } ?>
	</div>
</div>