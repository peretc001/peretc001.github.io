<?php if ($url == 'cyt02' or $url == 'cyt01') { ?>
	<div id="product_about">
		<div class="about">
			<div class="row">
				<div class="one-third column img">
					<div class="wrap">
						<img src="/shop/img/gif/cyt01.gif" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
					</div>
				</div>
				<div class="two-thirds column justify">
					<h3>Мнение специалиста:</h3>
					<p>Правильная посадка на стуле такова: ноги, согнуты под прямым углом, упираются в пол все плоскостью ступни. Передняя часть сиденья находитя на высоте низа коленной чашечки, а при использовании полной глубины сиденья не давит на голень. Угол между бедром и туловищем - примерно 90 градусов, т.е. прямой.</p>
					<p>Родителям нужно помнить, что правильно подобранный стул также является действенным методом коррекции детской осанки. Правильный стул снимает более половины нагрузки на детский позвоночник.</p>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div id="product_about">
		<div class="about">
			<div class="row">
				<div class="one-half column img">
					<div class="wrap"><video autoplay loop>
						<source src="img/video/setting.mp4" type="video/mp4"></source>
						<source src="img/video/setting.ogv" type="video/ogg"/></source>
						<source src="img/video/setting.webm" type="video/webm"></source>
					</video></div>
				</div>
				<div class="one-half column justify">
					<h3><?php if ($_SERVER['REQUEST_URI'] == '/stol-dly-shkolnika.php' or $_SERVER['REQUEST_URI'] == '/pismenny_stol.php' or $_SERVER['REQUEST_URI'] == '/kompyuterniy-stol.php' or $_SERVER['REQUEST_URI'] == '/detskij_stol.php') { echo '<i class="fa fa-angle-up" aria-hidden="true"></i> Регулируемый по высоте стол'; } else { echo '<i class="fa fa-angle-up" aria-hidden="true"></i> Регулируемая по высоте парта <i class="fa fa-angle-down" aria-hidden="true"></i>'; } ?></h3>
					<p>Парта «ДЭМИ» <?php echo $row['model']; ?> регулируется по высоте от <b>53</b> до <b>81,5</b> см, подстраивается под рост Вашего ребенка и растет вместе с ним с 5-ти лет и до университета.</p>
					<p>Регулировать высоту легко и просто, для удобства настройки высоты на парте нанесена шкала роста ребенка. </p>
				</div>
			</div>
		</div>
		<div class="about grey">
			<div class="row">
				<div class="one-half column justify">
					<h3><?php if ($_SERVER['REQUEST_URI'] == '/stol-dly-shkolnika.php' or $_SERVER['REQUEST_URI'] == '/pismenny_stol.php' or $_SERVER['REQUEST_URI'] == '/kompyuterniy-stol.php' or $_SERVER['REQUEST_URI'] == '/detskij_stol.php') { echo 'Стол с регулируемым наклоном столешницы'; } else { echo 'Парты с регулируемым наклоном столешницы'; } ?></h3>
					<p>Немецкий механизм подъема обеспечивает ступенчатую (9 положений) регулировку столешницы. Работа за наклонной поверхностью обеспечивает эргономическое 
					положение для разгрузки позвоночника и шейного отдела, а так же раскрепощает мускулатуру спины. Наклонное положение столешницы позволяет читать и писать, 
					держа прямо голову и туловище.</p>
				</div>
				<div class="one-half column img">
					<div class="wrap"><video autoplay loop>
						<source src="img/video/setting2.mp4" type="video/mp4"></source>
						<source src="img/video/setting2.ogv" type="video/ogg"/></source>
						<source src="img/video/setting2.webm" type="video/webm"></source>
					</video></div>
				</div>
			</div>
		</div>
		<?php if ($row['url'] == "13" or $row['url'] == "21" or $row['url'] == "14" or $row['url'] == "14-01-k" or $row['url'] == "15" or $row['url'] == "15-01-k" or $row['url'] == "15-03" or $row['url'] == "15-03-k" or $row['url'] == "17" or $row['url'] == "17-01-k" or $row['url'] == "17-03" or $row['url'] == "17-03-k" or $row['url'] == "15-03" or $row['url'] == "14r" or $row['url'] == "14-01r-k" or $row['url'] == "17-03r" or $row['url'] == "17-03r-k" or $row['url'] == "14-10" or $row['url'] == "17-14" or $row['url'] == "17-15" or $row['url'] == "24" or $row['url'] == "24-01-k" or $row['url'] == "25" or $row['url'] == "25-01-k" or $row['url'] == "26" or $row['url'] == "31" or $row['url'] == "25-03-k" or $row['url'] == "28" or $row['url'] == "29" or $row['art'] == "41" or $row['art'] == "42" or $row['art'] == "43") {} else { ?>
		<div class="about">
			<div class="row">
				<div class="one-third column img">
					<img src="/shop/img/element/element2.svg">
				</div>
				<div class="two-thirds column justify">
					<h3>Задняя полка под монитор</h3>
					<p>Формованная задняя полка даст возможность удобно разместить книги, детские игрушки или монитор. 
					Угол расположения экрана (он составляет 30°) и расстояние до него (примерно 50-60 см) оптимальны для сохранения зрения ребенка.</p>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="about <?php if ($row['url'] == "13" or $row['url'] == "21" or $row['url'] == "14" or $row['url'] == "14-01-k" or $row['url'] == "15" or $row['url'] == "15-01-k" or $row['url'] == "15-03" or $row['url'] == "15-03-k" or $row['url'] == "17" or $row['url'] == "17-01-k" or $row['url'] == "17-03" or $row['url'] == "17-03-k" or $row['url'] == "15-03" or $row['url'] == "14r" or $row['url'] == "14-01r-k" or $row['url'] == "17-03r" or $row['url'] == "17-03r-k" or $row['url'] == "14-10" or $row['url'] == "17-14" or $row['url'] == "17-15" or $row['url'] == "24" or $row['url'] == "24-01-k" or $row['url'] == "25" or $row['url'] == "25-01-k" or $row['url'] == "26" or $row['url'] == "31" or $row['url'] == "25-03-k" or $row['url'] == "28" or $row['url'] == "29") {} else { echo 'grey';} ?>">
			<div class="row">
				<div class="one-third column img">
					<img src="/shop/img/element/element3.svg">
				</div>
				<div class="two-thirds column justify">
					<h3>Детский стул «Дэми»</h3>
					<p>Эргономичный стул «Дэми» регулируется не только по высоте, но и по глубине, для того, чтобы ребенок мог равномерно распределить нагрузку на спину и 
					бедра. Такая регулировка – незаменимая вещь для растущего организма, благодаря чему уменьшается риск появления у ребенка такого заболевания как сколиоз.</p>
				</div>
			</div>
		</div>
	</div>
<?php } ?>