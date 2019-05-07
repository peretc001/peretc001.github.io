<?php session_start();
	include ("../../inc/config.php");
	$url = "sst2";
	$category = "fundesk";
	$package = 'fundesk';
	$color = htmlspecialchars(trim($_GET['color']));
	if ($color == '') {$color = 'fundesk_blue'; }
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

<div id="page">
<div id="sst">
	<img src="/shop/img/sst6/6.jpg" align="left">
	<h2>Детское ортопедическое кресло FunDesk SST2</h2>
	<p>Ортопедическое кресло, которое позволит правильно сформироваться спинке вашего ребенка, при этом снизит нагрузку и усталость при занятиях и развлечениях.</p>
	<p>Спинка детского кресла состоит из двух гибких подушечек, типа «лепесток», специально разработанных для правильного позиционирования позвоночника ребенка.</p>
	<p>Экологически чистая PU пена обеспечивает большую долговечность и водонепроницаемость. Пневматическая пружина позволяет без усилий отрегулировать высоту детского кресла. Ультра ― широкое роликовое основание, типа «звездочка», обеспечивает большую устойчивость от опрокидывания. ABS ролик не позволяет произвольно скользить по полу когда ребенок сидит на стуле, однако, стул легко можно передвигать когда на нем никого нет.</p>
</div>
<div class="clear"></div>
</div>
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
							<li><em>Минимальная высота сиденья стула </em><span><?php echo $row['c1']; ?> см</span></li>
							<li><em>Максимальная высота сиденья стула </em><span><?php echo $row['c2']; ?> см</span></li>
							<li><em>Минимальная глубина сиденья </em><span><?php echo $row['c3']; ?> см</span></li>
							<li><em>Максимальная глубина сиденья </em><span><?php echo $row['c4']; ?> см</span></li>
							<li><em>Минимальная высота спинки стула </em><span><?php echo $row['c5']; ?> см</span></li>
							<li><em>Максимальная высота спинки стула </em><span><?php echo $row['c6']; ?> см</span></li>
							<li><em>Ширина стула </em><span><?php echo $row['c7']; ?> см</span></li>
							<li><em>Каркас </em><span><?php echo $row['c8']; ?></span></li>
							<li><em>Сиденье </em><span><?php echo $row['c10']; ?></span></li>
							<li><em>Спинка </em><span><?php echo $row['c10']; ?></span></li>
							<li><em>Возраст </em><span><?php echo $row['p15']; ?> лет</span></li>
							<li><em>Производитель </em><span><?php echo $row['p16']; ?></span></li>
							<li class="none">&nbsp;</li>
							<li><em><b>Общий вес </b></em><span><?php echo $row['v2']; ?> кг</span></li>
							<li><em><b>Общий объем </b></em><span><?php echo $row['o1']; ?></span></li>
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
		<?php include '../inc/retail.php'; ?>
		<h2 id="accessories">Еще стулья и кресла:</h2>
		<div id="ca-container" class="ca-container">
				<div class="ca-wrapper">
					<?php 	$i=1;
$dop = mysql_query("SELECT * FROM `accessories` WHERE id = '96' or id = '119' or id = '130' or id = '131' or id = '132' or id = '133' order by id desc ");
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