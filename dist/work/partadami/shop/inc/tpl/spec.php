<?php if ($art == '14' or $art == '15' or $art == '17' or $art == '24' or $art == '25' or $art == '26' or $art == '28' or $art == '29' or $art == '31' ) { ?>
<div id="section" class="product_page">
	<h2>Основные характеристики</h2>
	<div class="row">
		<div class="three columns school">
			<p><img src="/img/school/desk.svg"><br>
			<b>Высота стола</b>, <small>см</small></p>
			<p class="point">53 - 81</p>
		</div>
		<div class="three columns school">
			<p><img src="/img/school/chair.svg"><br>
			<b>Высота стула</b>, <small>см</small></p>
			<p class="point">34 - 44</p>
		</div>
		<div class="three columns school">
			<p><img src="/img/school/girl.svg"><br>
			<b>Рост ребенка</b>, <small>см</small></p>
			<p class="point">115 - 198</p>
		</div>
		<div class="three columns school">
			<p><img src="/img/school/group.svg"><br>
			<b>Возраст</b></p>
			<p class="point">5+</p>
		</div>
	</div>
</div>
<?php } ?>
<?php 	if ($url == "14r") { $url = '14'; }
		elseif ($url == "14-01r") { $url = '14-01'; }
		elseif ($url == "14-01r-k") { $url = '14-01-k'; }
		elseif ($url == "14-01r-d") { $url = '14-01-d'; }
		elseif ($url == "14-02r") { $url = '14-02'; }
		elseif ($url == "14-02r-d") { $url = '14-02-d'; }
	
		elseif ($url == "17-03r") { $url = '17-03'; }
		elseif ($url == "17-03r-k") { $url = '17-03-k'; }	
		elseif ($url == "17-04r") { $url = '17-04'; }	
		elseif ($url == "17-04r-d1") { $url = '17-04-d1'; }	
		elseif ($url == "17-04r-d2") { $url = '17-04-d2'; }	
		elseif ($url == "17-05r") { $url = '17-05'; }	
		elseif ($url == "17-05r-d1") { $url = '17-05-d1'; }
		elseif ($url == "17-05r-d2") { $url = '17-05-d2'; }
	
	$cyt14 = mysql_query("SELECT * FROM `spec` `p` WHERE `p`.`id` = '$url' ");
			$row = mysql_fetch_array($cyt14);
		?>
<div id="pack">
<div id="specification" <?php if ($url == 'comf_pro_oxford') { echo 'class="oxford"'; } ?> >
	<h2 id="spec">Спецификация:</h2>
	<div class="row">
		<?php if ($category == 'ergonomichnyj_stul' or $category == 'fundesk'  or $category == 'mealux') { ?>
		<div class="one-half column">
			<table>
				<tr>
					<td>Минимальная высота сиденья стула</td>
					<td class="right"><?php echo $row['c1']; ?> см</td>
				</tr>
				<tr>
					<td>Максимальная высота сиденья стула</td>
					<td class="right"><?php echo $row['c2']; ?> см</td>
				</tr>
				<tr>
					<td>Минимальная глубина сиденья</td>
					<td class="right"><?php echo $row['c3']; ?> см</td>
				</tr>
				<tr>
					<td>Максимальная глубина сиденья</td>
					<td class="right"><?php echo $row['c4']; ?> см</td>
				</tr>
				<?php if ($category == 'mealux') {} else { ?>
					<tr>
						<td>Минимальная высота спинки стула</td>
						<td class="right"><?php echo $row['c5']; ?> см</td>
					</tr>
					<tr>
						<td>Максимальная высота спинки стула</td>
						<td class="right"><?php echo $row['c6']; ?> см</td>
					</tr>
				<?php } ?>
				<?php if ($category == 'mealux') { ?>
				</table>
		</div>
		<div class="one-half column">
			<table>
				<tr>
					<td>Стопора на колесах</td>
					<td class="right"><?php echo $row['c7']; ?></td>
				</tr>
				<?php } else { ?>
				<tr>
					<td>Ширина стула</td>
					<td class="right"><?php echo $row['c7']; ?> см</td>
				</tr>
			</table>
		</div>
		<div class="one-half column">
			<table>
				<?php } ?>
				<tr>
					<td><?php if ($category == 'mealux') { ?>Возраст<?php } else { ?>Каркас<?php } ?></td>
					<td class="right"><?php echo $row['c8']; ?></td>
				</tr>
				<tr>
					<td><?php if ($category == 'mealux') { ?>Производитель<?php } else { ?>Сиденье<?php } ?></td>
					<td class="right"><?php echo $row['c10']; ?></td>
				</tr>
				<?php if ($category == 'mealux') {} else { ?>
					<tr>
						<td>Спинка</td>
						<td class="right"><?php echo $row['c10']; ?></td>
					</tr>
					<tr>
						<td>Возраст</td>
						<td class="right"><?php echo $row['p15']; ?></td>
					</tr>
					<tr>
						<td>Производитель</td>
						<td class="right"><?php echo $row['p16']; ?></td>
					</tr>
				<?php } ?>
				<tr class="bottom">
					<td><b>Общий вес</b></td>
					<td class="right"><b><?php echo $row['v2']; ?> кг</b></td>
				</tr>
				<tr>
					<td><b>Общий объем</b></td>
					<td class="right"><b><?php echo $row['o1']; ?></b></td>
				</tr>
			</table>
		</div>
		<?php } else { ?>
		<div class="one-half column">
			<table>
				<tr>
					<td>Длина столешницы</td>
					<td class="right"><?php echo $row['p2']; ?> см</td>
				</tr>
				<tr>
					<td>Ширина столешницы</td>
					<td class="right"><?php echo $row['p3']; ?> см</td>
				</tr>
				<?php if ($url == "28" or $url == '29') {} else { ?>
				<tr>
					<td>Ширина пенала</td>
					<td class="right"><?php echo $row['p5']; ?> см</td>
				</tr>
				<?php } ?>
				<tr>
					<td>Габаритные размеры парты</td>
					<td class="right"><?php echo $row['p1']; ?> см</td>
				</tr>
				<tr>
					<td>Угол наклона столешницы</td>
					<td class="right"><?php echo $row['p6']; ?></td>
				</tr>
				<tr>
					<td>Минимальная высота парты</td>
					<td class="right"><?php echo $row['p7']; ?> см</td>
				</tr>
				<tr>
					<td>Максимальная высота парты</td>
					<td class="right"><?php echo $row['p8']; ?> см</td>
				</tr>
				<tr>
					<td>Полка сзади</td>
					<td class="right"><?php echo $row['p9']; ?></td>
				</tr>
				<tr>
					<td>Полка сбоку</td>
					<td class="right"><?php echo $row['p10']; ?></td>
				</tr>
				<?php if ($package == 'parta_1_stul' or $package == 'parta_2_stul' or $package == 'parta_1_white' or $package == 'parta_2_white' or $package == 'parta_1_techno' or $package == 'parta_2_techno') { ?>
				<tr>
					<td>Подвесная тумба</td>
					<td class="right"><?php echo $row['p11']; ?></td>
				</tr>
				<tr>
					<td>Фасад</td>
					<td class="right"><?php echo $row['p12']; ?></td>
				</tr>
				<tr>
					<td>Столешница</td>
					<td class="right"><?php echo $row['p12']; ?></td>
				</tr>
				<tr>
					<td>Кромка</td>
					<td class="right"><?php echo $row['p13']; ?></td>
				</tr>
				<tr>
					<td>Каркас</td>
					<td class="right"><?php echo $row['p14']; ?></td>
				</tr>
				<tr>
					<td>Возраст</td>
					<td class="right"><?php echo $row['p15']; ?></td>
				</tr>
				<tr>
					<td>Производитель</td>
					<td class="right"><?php echo $row['p16']; ?></td>
				</tr>
			</table>
		</div>
		<div class="one-half column">
			<table>
				<tr>
					<td>Минимальная высота сиденья стула</td>
					<td class="right"><?php echo $row['c1']; ?> см</td>
				</tr>
				<tr>
					<td>Максимальная высота сиденья стула</td>
					<td class="right"><?php echo $row['c2']; ?> см</td>
				</tr>
				<tr>
					<td>Минимальная глубина сиденья</td>
					<td class="right"><?php echo $row['c3']; ?> см</td>
				</tr>
				<tr>
					<td>Максимальная глубина сиденья</td>
					<td class="right"><?php echo $row['c4']; ?> см</td>
				</tr>
				<tr>
					<td>Минимальная высота спинки стула</td>
					<td class="right"><?php echo $row['c5']; ?> см</td>
				</tr>
				<tr>
					<td>Максимальная высота спинки стула</td>
					<td class="right"><?php echo $row['c6']; ?> см</td>
				<tr>
				<tr>
					<td>Ширина стула</td>
					<td class="right"><?php echo $row['c7']; ?> см</td>
				</tr>
				<tr>
					<td>Каркас</td>
					<td class="right"><?php echo $row['c8']; ?></td>
				</tr>
				<?php } else { ?>
				</tr>
			</table>
		</div>
		<div class="one-half column">
			<table>
				<tr>
					<td>Подвесная тумба</td>
					<td class="right"><?php echo $row['p11']; ?></td>
				</tr>
				<tr>
					<td>Фасад</td>
					<td class="right"><?php echo $row['p12']; ?></td>
				</tr>
				<tr>
					<td>Столешница</td>
					<td class="right"><?php echo $row['p12']; ?></td>
				</tr>
				<tr>
					<td>Кромка</td>
					<td class="right"><?php echo $row['p13']; ?></td>
				</tr>
				<tr>
					<td>Каркас</td>
					<td class="right"><?php echo $row['p14']; ?></td>
				</tr>
				<?php } ?>		
				<?php if ($package == 'parta_1_stul' or $package == 'parta_2_stul' or $package == 'parta_1_white' or $package == 'parta_2_white' or $package == 'parta_1_techno' or $package == 'parta_2_techno') { ?>
				<tr>
					<td>Сиденье</td>
					<td class="right"><?php echo $row['c10']; ?></td>
				</tr>
				<tr>
					<td>Спинка</td>
					<td class="right"><?php echo $row['c10']; ?></td>
				</tr>
				<?php } else { } ?>
				<tr>
					<td>Возраст</td>
					<td class="right"><?php echo $row['p15']; ?></td>
				</tr>
				<tr>
					<td>Производитель</td>
					<td class="right"><?php echo $row['p16']; ?></td>
				</tr>
				<?php if ($package == 'parta_1_stul' or $package == 'parta_2_stul' or $package == 'parta_1_white' or $package == 'parta_2_white' or $package == 'parta_1_techno' or $package == 'parta_2_techno') { ?>
				<tr class="bottom">
					<td><b>Общий вес</b></td>
					<td class="right"><b><?php echo $row['v3']; ?> кг</b></td>
				</tr>
				<tr>
					<td><b>Общий объем</b></td>
					<td class="right"><b><?php echo $row['o2']; ?></b></td>
				</tr>
				<?php } else { ?>
				<tr class="bottom">
					<td><b>Общий вес</b></td>
					<td class="right"><b><?php echo $row['v1']; ?> кг</b></td>
				</tr>
				<tr>
					<td><b>Общий объем</b></td>
					<td class="right"><b><?php echo $row['o1']; ?></b></td>
				</tr>
				<?php } ?>
			</table>		
		</div>
		<?php } ?>
	</div>
</div>