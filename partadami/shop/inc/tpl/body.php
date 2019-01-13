	<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
		<div class="slides"></div>
		<h3 class="title"></h3>
		<a class="prev">‹</a>
		<a class="next">›</a>
		<a class="close">×</a>
		<ol class="indicator"></ol>
	</div>
	
	<div id="nav_menuid" class="product">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?php $menuid = mysql_query("SELECT * FROM ". $package ." WHERE url = '$url' ");
					$row = mysql_fetch_assoc($menuid); ?>
					
				<?php #Выстариваем путь до карточки товара
				if ($category == 'parta_bez_risunka') { ?>
					<a href="/shop/parta_bez_risunka/">Парты «ДЭМИ» (ДЕМИ) без рисунка</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/parta_bez_risunka/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'parta_s_risunkom') 	{ ?>
					<a href="/shop/parta_s_risunkom/">Парты «ДЭМИ» с рисунком</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/parta_s_risunkom/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'parta_iz_massiva') 	{ ?>
					<a href="/shop/parta_iz_massiva/">Парты «ДЭМИ» из МАССИВА Березы</a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
				<?php } elseif ($category == 'techno') { ?>
					<a href="/shop/white.php">Белые парты «ДЭМИ»</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/techno/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'white') { ?>
					<a href="/shop/white.php">Белые парты «ДЭМИ»</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/white/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'ergonomichnyj_stul' or $category == 'fundesk' or $category == 'mealux') { ?>
					<a href="/shop/ergonomichnyj_stul/">Стулья и кресла</a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
				<?php } if ($_SERVER['REQUEST_URI'] == '/stol-dly-shkolnika.php') { echo 'Стол для школьника ДЭМИ'; }  elseif ($_SERVER['REQUEST_URI'] == '/pismenny_stol.php') { echo 'Письменный стол для школьника'; } elseif ($_SERVER['REQUEST_URI'] == '/kompyuterniy-stol.php') { echo 'Компьютерный стол для школьника'; }  elseif ($_SERVER['REQUEST_URI'] == '/detskij_stol.php') { echo 'Детский стол для школьника'; } else { echo $row['name']; } ?>
				
		</div>
	</div>
	<?php 	$cyt14 = mysql_query("SELECT * FROM ". $package ." `p` WHERE `p`.`url` = '$url' ");
			$row = mysql_fetch_array($cyt14)
	?>
	<div id="product_page">
		<div class="row product_box <?php if ($category == 'ergonomichnyj_stul' or $category == 'fundesk' or $category == 'mealux') { echo 'bottom'; } ?>">
			
			<div class="two-thirds column left">
				<div class="section">
					<div itemscope itemtype="http://schema.org/Product">
						<h1 itemprop="name"><?php echo $row['name']; ?></h1>
						<p style="display:none; margin:0; padding:0;">
							<span itemprop="brand"><?php if ($category == 'fundesk') { echo 'FunDesk';} else { echo 'ДЭМИ'; } ?></span>
							<span itemprop="description"><?php echo $row['desc']; ?></span>
							<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<span itemprop="price"><?php echo $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />РУБ.
								<span itemprop="image">http://www.partadami.ru/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?><?php echo $row['img']; ?></span>
							</span>
						</p>
						<ul class="star">
							<li class="model">Модель: <?php echo $row['model']; ?></li>
							<?php 	$query=mysql_query("SELECT SUM(total_value) as value, SUM(total_votes) as vote  FROM gb WHERE url = '$url'  "); 
									$query=mysql_fetch_assoc($query); 
								
							for ($a = 1; $a <= 5; $a++) {
								if ($a > $query['value'])  // если значение переменной $a равно 5
									goto end;  // то переходим к выполнению инструкций следующих за меткой   
									echo '<i class="fa fa-star" aria-hidden="true"></i>';
								}
								end:
									for ($c = $a; $c <= 5; $c++)
									echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
								
							?>
							<li><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#product_otziv"><?php echo $query['vote']; ?></a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="one-half column">
						<div id="links" class="center">
							<p>
								
								<?php if ($category == 'parta_iz_massiva') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.jpg" data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul')  { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								<?php } elseif ($category == 'parta_s_risunkom') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.jpg" <?php if ($color == 'greyf') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul')  { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul')  { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>2.jpg" <?php if ($color == 'pinkc') {} else { ?>  class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>										
								<?php } elseif ($category == 'mealux') { ?>
									<?php if ($url == 'comf_pro_match' or $url == 'comf_pro_newton') { ?>								
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'mealux_black') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/1.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'mealux_blue') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/2.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<?php if ($url == 'comf_pro_newton') {} else { ?>
											<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'mealux_blue2') {} else { ?> class="gallary"  <?php } ?> data-gallery >
												<img src="/shop/img/<?php echo $row['url']; ?>/3.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
											</a>
										<?php } ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'mealux_blue3') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/4.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'mealux_blue4') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/5.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'mealux_blue5') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/6.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/7.jpg" <?php if ($color == 'mealux_green') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/7.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/8.jpg" <?php if ($color == 'mealux_green2') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/8.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/9.jpg" <?php if ($color == 'mealux_green3') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/9.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<?php if ($url == 'comf_pro_newton') {} else { ?>
											<a href="/shop/img/<?php echo $row['url']; ?>/10.jpg" <?php if ($color == 'mealux_green4') {} else { ?> class="gallary"  <?php } ?> data-gallery >
												<img src="/shop/img/<?php echo $row['url']; ?>/10.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
											</a>
										<?php } ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/11.jpg" <?php if ($color == 'mealux_orange') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/11.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<?php if ($url == 'comf_pro_newton') { ?>
											<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'mealux_orange2') {} else { ?> class="gallary"  <?php } ?> data-gallery >
												<img src="/shop/img/<?php echo $row['url']; ?>/3.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
											</a>
										<?php } ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/12.jpg" <?php if ($color == 'mealux_pink') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/12.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/13.jpg" <?php if ($color == 'mealux_pink2') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/13.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/14.jpg" <?php if ($color == 'mealux_pink3') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/14.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/15.jpg" <?php if ($color == 'mealux_red') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/15.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/16.jpg" <?php if ($color == 'mealux_red2') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/16.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/17.jpg" <?php if ($color == 'mealux_red3') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/17.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/18.jpg" <?php if ($color == 'mealux_yellow') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/18.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'comf_pro_oxford') { ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'mealux_blue_oxford') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/1.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'mealux_darkblue_oxford') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/2.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'mealux_red_oxford') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/3.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'mealux_green_oxford') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/4.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'champion') { ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'mealux_blue_champion') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/1.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/1r.jpg" <?php if ($color == 'mealux_blue_champion_r') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/1r.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'mealux_red_champion') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/2.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2r.jpg" <?php if ($color == 'mealux_red_champion_r') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/2r.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'mealux_green_champion') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/3.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3r.jpg" <?php if ($color == 'mealux_green_champion_r') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/3r.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'mealux_orange_champion') {} else { ?> class="gall