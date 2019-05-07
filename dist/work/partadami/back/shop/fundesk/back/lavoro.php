<?php session_start();
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';
	$url = "lavoro";
	$category = 'fundesk';
	$package = 'fundesk';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'fundesk_pink'; }
	$menuid = mysql_query("SELECT * FROM ". $package ." WHERE url = '$url' "); $row = mysql_fetch_assoc($menuid);		
	$title = $row['name'] .' Модель: '. $row['model'];
	$desc = $row['desc'];

	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/head.php'; ?>
<body>
<?php 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/top.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/menu.php';
	include $_SERVER['DOCUMENT_ROOT'] .'/inc/leftmenu_nav.php'; 
	include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/body.php'; ?>

<?php 	$cyt14 = mysql_query("SELECT * FROM `spec` `p` WHERE `p`.`id` = '$url' ");
				while( $row = mysql_fetch_array($cyt14) ) { 
		?>
<div id="block1">
	<div id="page">
		<h2 id="spec">Спецификация:</h2>
		<div id="specific">
			<table>
				<tr>
					<td>
						<ul>
							<li><em>Габаритные размеры парты </em><span><?php echo $row['p1']; ?> см</span></li>
							<li><em>Длина столешницы </em><span><?php echo $row['p2']; ?> см</span></li>
							<li><em>Ширина столешницы </em><span><?php echo $row['p3']; ?> см</span></li>
							<li><em>Угол наклона столешницы </em><span><?php echo $row['p6']; ?> <sup>0</sup></span></li>
							<li><em>Минимальная высота парты </em><span><?php echo $row['p7']; ?> см</span></li>
							<li><em>Максимальная высота парты </em><span><?php echo $row['p8']; ?> см</span></li>
							<li><em>Выдвижной пенал </em><span><?php echo $row['p9']; ?></span></li>
							<li><em>Полка сзади </em><span><?php echo $row['p11']; ?></span></li>
							<li><em>Столешница </em><span><?php echo $row['p12']; ?></span></li>
							<li><em>Каркас </em><span><?php echo $row['p14']; ?></span></li>
							<li><em>Возраст ребенка </em><span><?php echo $row['p15']; ?></span></li>
							<li><em>Производитель </em><span><?php echo $row['p16']; ?></span></li>
						</ul>
					</td>
					<td>
						<ul>
							<li><em>Минимальная высота сиденья стула </em><span><?php echo $row['c1']; ?> см</span></li>
							<li><em>Максимальная высота сиденья стула </em><span><?php echo $row['c2']; ?> см</span></li>
							<li><em>Минимальная высота стула </em><span><?php echo $row['c3']; ?> см</span></li>
							<li><em>Максимальная высота стула </em><span><?php echo $row['c4']; ?> см</span></li>
							<li><em>Ширина стула </em><span><?php echo $row['c5']; ?> см</span></li>
							<li><em>Каркас </em><span><?php echo $row['c8']; ?></span></li>
							<li><em>Сиденье </em><span><?php echo $row['c10']; ?></span></li>
							<li><em>Спинка </em><span><?php echo $row['c10']; ?></span></li>
							<li><em>Производитель </em><span><?php echo $row['p16']; ?></span></li>
							<li class="none">&nbsp;</li>
							<li><em><b>Общий вес </b></em><span><?php echo $row['v3']; ?> кг</span></li>
							<li><em><b>Общий объем </b></em><span><?php echo $row['o2']; ?></span></li>
						</ul>
					</td>
				</tr>
			</table>
		</div>
		<? } ?>		
	</div>
</div>
<div class="clear"></div>
<div id="block2">
	<div id="page">
		<h2 id="accessories">Самые продаваемые товары:</h2>
		<div id="ca-container" class="ca-container">
				<div class="ca-wrapper">
					<?php 	$i=1;
$dop = mysql_query("SELECT * FROM `accessories` WHERE id = '118' or id = '119' or id = '120' or id = '121' or id = '122' or id = '124' or id = '125' order by id asc ");
									while( $row = mysql_fetch_array($dop) ) { ?>
						<?php include '../inc/accessories.php'; ?>
					<?php $i++; } ?>
				</div>
			</div>
		<script type="text/javascript" src="js/scroll/jquery.easing.1.3.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="js/scroll/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="js/scroll/jquery.contentcarousel.js"></script>
		<script type="text/javascript" src="/js/scroll/code.js"></script>
		<div class="clear"></div>	
	</div>	
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/product_otziv.php'; #Отзывы ?>
<?php include '../../inc/footer.php'; ?>	