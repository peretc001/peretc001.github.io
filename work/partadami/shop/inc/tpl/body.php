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
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'mealux_orange_champion') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/4.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'mealux_violet_champion') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/5.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } ?>
								<?php } elseif ($category == 'fundesk') { ?>
									<?php if ($color == 'fundesk_pink') { ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" class="gallary" data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/5.png" class="gallary" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/8.jpg" class="gallary" data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/8.png" class="gallary" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($color == 'fundesk_blue') { ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" class="gallary" data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/6.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/9.jpg" class="gallary" data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/9.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>											
									<?php } ?>
								
								<?php } elseif ($category == 'ergonomichnyj_stul' and $url == 'cyt01') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'cyt_grey') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'cyt_pink') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'cyt_blue') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'cyt_green') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'cyt_orange') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								
								<?php } elseif ($category == 'ergonomichnyj_stul' and $url == 'cyt02') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/0.jpg" <?php if ($color == 'cyt_white') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/0.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'cyt_beige') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/6.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'cyt_grey') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'cyt_pink') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'cyt_blue') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'cyt_green') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'cyt_orange') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								<?php } elseif ($category == 'white' or $category == 'techno') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>1.jpg" <?php if ($color == '' or $color == 'white_grey' ) {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno')  { echo 'parta_bez_stula/'; } else {} ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno')  { echo 'parta_bez_stula/'; } else {} ?>2.jpg" <?php if ($color == 'white_red') {} else { ?>  class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>3.jpg" <?php if ($color == 'white_blue' )  {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>4.jpg" <?php if ($color == 'white_green') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>5.jpg" <?php if ($color == 'white_orange') {} else { ?> class="gallary"  <?php } ?> data-gallery >
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								
								<?php } elseif ($category == 'parta_bez_risunka') { 
									if ($url == '28' or $url == '29') { ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.jpg" <?php if ($color == 'grey' or $color == 'ja_grey') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } else { ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.jpg" <?php if ($color == 'grey' or $color == 'ja_grey') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul')  { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul')  { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>2.jpg" <?php if ($color == 'pink') {} else { ?>  class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>3.jpg" <?php if ($color == 'blue')  {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>4.jpg" <?php if ($color == 'green') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>5.jpg" <?php if ($color == 'orange') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>6.jpg" <?php if ($color == 'brown') {} else { ?> class="gallary"  <?php } ?> data-gallery >
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>6.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<?php if ($art == '14') { ?>
											 <a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>0.jpg" <?php if ($color == 'beige') {} else { ?> class="gallary"  <?php } ?> data-gallery >
												<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>0.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
											</a>
										<?php } ?>
									<?php } ?>									
								<?php } ?>								
							</p>
						</div>
						<script>
							document.getElementById('links').onclick = function (event) {
							event = event || window.event;
							var target = event.target || event.srcElement,
							link = target.src ? target.parentNode : target,
							options = {index: link, event: event, toggleControlsOnSlideClick: false},
							links = this.getElementsByTagName('a');
							blueimp.Gallery(links, options);
							};
						</script>
					</div>

					<div class="one-half column pack">
						<div class="color">
							<h2>Цветовая гамма:</h2>
							<ul>
								<?php if ($category == 'parta_iz_massiva') { ?>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>"><i class="fa fa-circle beige" aria-hidden="true"></i></a></li>
								<?php } elseif ($category == "parta_s_risunkom") { ?>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=greyf"><i class="fa <?php if ($color == 'greyf') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=pinkc"><i class="fa <?php if ($color == 'pinkc') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>	
								<?php } elseif ($category == "mealux") { ?>
									<?php if ($url == 'comf_pro_match' or $url == 'comf_pro_newton') { ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_black"><img src="/shop/img/color/mealux/black.jpg" alt="Черный" title="Черный" <?php if ($color == 'mealux_black') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue"><img src="/shop/img/color/mealux/blue.jpg" alt="Голубой" title="Голубой" <?php if ($color == 'mealux_blue') { echo 'class="active"'; } ?>/></a></li>
										<?php if ($url == 'comf_pro_newton') {} else { ?>
											<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue2"><img src="/shop/img/color/mealux/blue2.jpg" alt="Голубой" title="Голубой" <?php if ($color == 'mealux_blue2') { echo 'class="active"'; } ?>/></a></li>
										<?php } ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue3"><img src="/shop/img/color/mealux/blue3.jpg" alt="Голубой" title="Голубой" <?php if ($color == 'mealux_blue3') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue4"><img src="/shop/img/color/mealux/blue4.jpg" alt="Голубой" title="Голубой" <?php if ($color == 'mealux_blue4') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue5"><img src="/shop/img/color/mealux/blue5.jpg" alt="Голубой" title="Голубой" <?php if ($color == 'mealux_blue5') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_green"><img src="/shop/img/color/mealux/green.jpg" alt="Зеленый" title="Зеленый" <?php if ($color == 'mealux_green') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_green2"><img src="/shop/img/color/mealux/green2.jpg" alt="Зеленый" title="Зеленый" <?php if ($color == 'mealux_green2') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_green3"><img src="/shop/img/color/mealux/green3.jpg" alt="Зеленый" title="Зеленый" <?php if ($color == 'mealux_green3') { echo 'class="active"'; } ?>/></a></li>
										<?php if ($url == 'comf_pro_newton') {} else { ?>
											<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_green4"><img src="/shop/img/color/mealux/green4.jpg" alt="Зеленый" title="Зеленый" <?php if ($color == 'mealux_green4') { echo 'class="active"'; } ?>/></a></li>
										<?php } ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_orange"><img src="/shop/img/color/mealux/orange.jpg" alt="Оранжевый" title="Оранжевый" <?php if ($color == 'mealux_orange') { echo 'class="active"'; } ?>/></a></li>
										<?php if ($url == 'comf_pro_newton') { ?>
											<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_orange2"><img src="/shop/img/color/mealux/orange2.jpg" alt="Оранжевый" title="Оранжевый" <?php if ($color == 'mealux_orange2') { echo 'class="active"'; } ?>/></a></li>
										<?php } ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_pink"><img src="/shop/img/color/mealux/pink.jpg" alt="Розовый" title="Розовый" <?php if ($color == 'mealux_pink') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_pink2"><img src="/shop/img/color/mealux/pink2.jpg" alt="Розовый" title="Розовый" <?php if ($color == 'mealux_pink2') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_pink3"><img src="/shop/img/color/mealux/pink3.jpg" alt="Розовый" title="Розовый" <?php if ($color == 'mealux_pink3') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_red"><img src="/shop/img/color/mealux/red.jpg" alt="Красный" title="Красный" <?php if ($color == 'mealux_red') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_red2"><img src="/shop/img/color/mealux/red2.jpg" alt="Красный" title="Красный" <?php if ($color == 'mealux_red2') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_red3"><img src="/shop/img/color/mealux/red3.jpg" alt="Красный" title="Красный" <?php if ($color == 'mealux_red3') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_yellow"><img src="/shop/img/color/mealux/yellow.jpg" alt="Желтый" title="Желтый" <?php if ($color == 'mealux_yellow') { echo 'class="active"'; } ?>/></a></li>
									
									<?php } elseif ($url == 'comf_pro_oxford') { ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue_oxford"><img src="/shop/img/color/mealux/blue.jpg" alt="Голубой" title="Голубой" <?php if ($color == 'mealux_blue_oxford') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_darkblue_oxford"><img src="/shop/img/color/mealux/blue2.jpg" alt="Синий" title="Синий" <?php if ($color == 'mealux_darkblue_oxford') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_red_oxford"><img src="/shop/img/color/mealux/red_oxford.jpg" alt="Красный" title="Красный" <?php if ($color == 'mealux_red_oxford') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_green_oxford"><img src="/shop/img/color/mealux/green.jpg" alt="Зеленый" title="Зеленый" <?php if ($color == 'mealux_green_oxford') { echo 'class="active"'; } ?>/></a></li>
									<?php } elseif ($url == 'champion') { ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue_champion"><img src="/shop/img/color/mealux/blue2.jpg" alt="Синий" title="Синий" <?php if ($color == 'mealux_blue_champion') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_blue_champion_r"><img src="/shop/img/color/mealux/blue_r.jpg" alt="Синий" title="Синий" <?php if ($color == 'mealux_blue_champion_r') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_red_champion"><img src="/shop/img/color/mealux/red_oxford.jpg" alt="Красный" title="Красный" <?php if ($color == 'mealux_red_champion') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_red_champion_r"><img src="/shop/img/color/mealux/red_r.jpg" alt="Красный" title="Красный" <?php if ($color == 'mealux_red_champion_r') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_green_champion"><img src="/shop/img/color/mealux/green.jpg" alt="Зеленый" title="Зеленый" <?php if ($color == 'mealux_green_champion') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_green_champion_r"><img src="/shop/img/color/mealux/green_r.jpg" alt="Зеленый" title="Зеленый" <?php if ($color == 'mealux_green_champion_r') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_orange_champion"><img src="/shop/img/color/mealux/orange_champion.jpg" alt="Оранжевый" title="Оранжевый" <?php if ($color == 'mealux_orange_champion') { echo 'class="active"'; } ?>/></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=mealux_violet_champion"><img src="/shop/img/color/mealux/violet_champion.jpg" alt="Фиолетовый" title="Фиолетовый" <?php if ($color == 'mealux_violet_champion') { echo 'class="active"'; } ?>/></a></li>
									<?php } ?>
									
									
								<?php } elseif ($category == "fundesk") { ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=fundesk_pink"><i class="fa <?php if ($color == 'fundesk_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=fundesk_blue"><i class="fa <?php if ($color == 'fundesk_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
								
								<?php } elseif ($category == "ergonomichnyj_stul") { ?>
								
									<?php if ($url == 'cyt01') { ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_grey"><i class="fa <?php if ($color == 'cyt_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_pink"><i class="fa <?php if ($color == 'cyt_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_blue"><i class="fa <?php if ($color == 'cyt_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_green"><i class="fa <?php if ($color == 'cyt_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_orange"><i class="fa <?php if ($color == 'cyt_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'cyt02') { ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_white"><i class="fa <?php if ($color == 'cyt_white') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  white" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_beige"><i class="fa <?php if ($color == 'cyt_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_grey"><i class="fa <?php if ($color == 'cyt_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_pink"><i class="fa <?php if ($color == 'cyt_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_blue"><i class="fa <?php if ($color == 'cyt_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_green"><i class="fa <?php if ($color == 'cyt_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_orange"><i class="fa <?php if ($color == 'cyt_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
									<?php } ?>
									
								<?php } elseif ($category == "white" or $category == "techno") { ?>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_grey"><i class="fa <?php if ($color == 'white_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_red"><i class="fa <?php if ($color == 'white_red') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> red" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_blue"><i class="fa <?php if ($color == 'white_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> blue" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_green"><i class="fa <?php if ($color == 'white_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> green" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_orange"><i class="fa <?php if ($color == 'white_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> orange" aria-hidden="true"></i></a></li>
								
								<?php } elseif ($category == "parta_bez_risunka") { ?>
									<?php if ($url == '28' or $url == '29') { ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=grey"><i class="fa <?php if ($color == 'grey' or $color == 'ja_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<?php } else { ?>
										<?php if ($art == '14') { ?>
											<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=beige"><i class="fa <?php if ($color == 'beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> beige" aria-hidden="true"></i></a></li>
										<?php }  ?>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=grey"><i class="fa <?php if ($color == 'grey' or $color == 'ja_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=pink"><i class="fa <?php if ($color == 'pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=blue"><i class="fa <?php if ($color == 'blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=green"><i class="fa <?php if ($color == 'green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=orange"><i class="fa <?php if ($color == 'orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=brown"><i class="fa <?php if ($color == 'brown') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  brown" aria-hidden="true"></i></a></li>
									<?php }  ?>
								<?php }  ?>
							</ul>
						</div>
						
						<div class="option">
							<?php if ($category == 'ergonomichnyj_stul' or $category == 'fundesk' or $category == 'mealux') {} else { ?><h2>Комплектация:</h2>
							<?php if ($package == '' or $package == 'parta_0_stul') { ?>
								<p class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Без стула</p>
								<p><a href="/shop/<?php echo $category; ?><?php if ($category == 'parta_iz_massiva') {} else { ?>/cyt<?php echo $row['art']; } ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt01-01.php?color=<?php echo $color; ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом</a></p>
							<?php } elseif ($package == 'parta_1_stul') { ?>
								<p><a href="/shop/<?php echo $category; ?><?php if ($category == 'parta_iz_massiva') {} else { ?>/cyt<?php echo $row['art']; } ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=<?php echo $color; ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a></p>
								<p class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Со стулом</p>
							<?php } elseif ($package == 'parta_2_stul') { ?>
								<li><a href="/shop/<?php echo $category; ?><?php if ($category == 'parta_iz_massiva') {} else { ?>/cyt<?php echo $row['art']; } ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=<?php echo $color; ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a></p>
								<p class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Со стулом</p>
							<?php } elseif ($package == 'parta_0_white' or $package == 'parta_0_techno') { ?>
								<p class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Без стула</p>
								<p><a href="/shop/<?php echo $category; ?><?php if ($category == 'parta_iz_massiva') {} else { ?>/cyt<?php echo $row['art']; } ?>/parta_cyt<?php echo $row['url']; ?>_so_stulom_cyt02-01.php?color=<?php echo $color; ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом</a></p>
							<?php } elseif ($package == 'parta_1_white' or $package == 'parta_1_techno') { ?>
								<p><a href="/shop/<?php echo $category; ?><?php if ($category == 'parta_iz_massiva') {} else { ?>/cyt<?php echo $row['art']; } ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=<?php echo $color; ?>"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a></p>
								<p class="active"><i class="fa fa-check-square-o" aria-hidden="true"></i> Со стулом</p>
							<?php } ?>
							<?php } ?>
						</div>
						
						<div class="garanty <?php if ($category == 'mealux') { echo 'mealux'; } ?>">
							<p><i class="fa fa-shield" aria-hidden="true"></i> Гарантия: <?php if ($category == "parta_bez_risunka" or $category == "parta_s_risunkom" or $category == "parta_iz_massiva" or $category == "white" or $category == "techno") { ?><span>5</span> лет<?php } else { ?><span>1</span> год<?php } ?></p>
							<p><i class="fa fa-bookmark" aria-hidden="true"></i> Официальный дилер</p>
						</div>
					</div>
				</div>
			</div>
			
			<div class="one-third column product_buy">
				<div class="row">
					<div class="one-half column">
						<form action="/shop/inc/cart/addtocart.php" method="post" id="add" class="-visor-no-click">
						
						<?php 
							
							
							#снято с производства
							if ($url == 'piccolino' or $url == 'bambino' or $url == 'lavoro' or $url == 'volare' or $url == 'amare' or $url == 'cyt01' or $art == '15') { echo '<p class="bf">отсутствует </p>'; $lpr = '0'; }
							 
							
							else {
								$lpr = $row['price'];
							}
							echo '<p class="price"><b>'. $lpr .'</b> руб.</p>.';
							 ?>
										
						
						
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
							<input type="hidden" name="sid" value="<?php echo session_id(); ?>">
							<input type="hidden" name="qty" value="1">
							<input type="hidden" name="color" value="<?php echo $color; ?>">
							<input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
							<input type="hidden" name="package" value="<?php echo $package; ?>">
							<input type="hidden" name="price" value="<?php echo $lpr; ?>">
							<input type="hidden" name="img" value="/shop/img/<?php echo $row['url']; ?>/<?php 
								if ($package == 'parta_0_stul' or $package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; }  
								 
							
								if ($color == '' or $color == 'grey' or $color == 'beige' or $color == 'greyf' or $color == 'cyt_grey' or $color == 'cyt_beige' or $color == 'tyv_grey' or $color == 'tyv_greyf' or $color == 'dop_grey' or $color == 'dop_nnc' or $color == 'white' or $color == 'white_grey' or $color == 'pink_det' or $color == 'grey_det' or $color == 'beige_det' or $color == 'red_det_lev' or $color == 'red_det') { echo '1.png'; }
								elseif ($color == 'pink' or $color == 'pinkc' or $color == 'cyt_pink' or $color == 'tyv_brown' or $color == 'tyv_greyc' or $color == 'dop_pink' or $color == 'dop_red' or $color == 'white_red' or $color == 'blue_det' or $color == 'blue_det_nypogodi') { echo '2.png'; } 
								elseif ($color == 'blue' or $color == 'bluef' or $color == 'cyt_blue' or $color == 'tyv_brownf' or $color == 'tyv_beige' or $color == 'dop_blue' or $color == 'white_blue' or $color == 'green_det' or $color == 'green_det_gav') { echo '3.png'; } 
								elseif ($color == 'green' or $color == 'greenf' or $color == 'cyt_green' or $color == 'tyv_white_grey' or $color == 'dop_green' or $color == 'white_green' or $color == 'orange_det' or $color == 'orange_det_vinni') { echo '4.png'; } 
								elseif ($color == 'orange' or $color == 'orangef' or $color == 'cyt_orange'  or $color == 'dop_orange' or $color == 'white_orange' or $color == 'yellow_det' ) { echo '5.png'; } 
								elseif ($color == 'brown' or $color == 'brownf' or $color == 'cyt_beige' or $color == 'dop_beige') { echo '6.png'; } 
								elseif ($color == 'beige' or $color == 'cyt_white') { echo '0.png'; } 
								elseif ($color == 'fundesk_grey') { echo '1.png'; } elseif ($color == 'fundesk_pink') { echo '2.png'; } elseif ($color == 'fundesk_blue') { echo '3.png'; } 
								elseif ($color == 'ja_grey') { echo '1.png'; }

								elseif ($color == 'mealux_black' or $color == 'mealux_blue_oxford' or $color == 'mealux_blue_champion') { echo '1.jpg'; } 
								elseif ($color == 'mealux_blue' or $color == 'mealux_darkblue_oxford' or $color == 'mealux_red_champion') { echo '2.jpg'; } 
								elseif ($color == 'mealux_blue2' or $color == 'mealux_orange2' or $color == 'mealux_red_oxford' or $color == 'mealux_green_champion') { echo '3.jpg'; } 
								elseif ($color == 'mealux_blue3' or $color == 'mealux_green_oxford' or $color == 'mealux_orange_champion') { echo '4.jpg'; } 
								elseif ($color == 'mealux_blue4' or $color == 'mealux_violet_champion') { echo '5.jpg'; }	
								elseif ($color == 'mealux_blue5') { echo '6.jpg'; } 
								elseif ($color == 'mealux_green') { echo '7.jpg'; } 
								elseif ($color == 'mealux_green2') { echo '8.jpg'; }
								elseif ($color == 'mealux_green3') { echo '9.jpg'; }
								elseif ($color == 'mealux_green4') { echo '10.jpg'; }
								elseif ($color == 'mealux_orange') { echo '11.jpg'; }
								elseif ($color == 'mealux_pink') { echo '12.jpg'; }
								elseif ($color == 'mealux_pink2') { echo '13.jpg'; }
								elseif ($color == 'mealux_pink3') { echo '14.jpg'; }
								elseif ($color == 'mealux_red') { echo '15.jpg'; }
								elseif ($color == 'mealux_red2') { echo '16.jpg'; }
								elseif ($color == 'mealux_red3') { echo '17.jpg'; }
								elseif ($color == 'mealux_yellow') { echo '18.jpg'; }
								elseif ($color == 'mealux_blue_r') { echo '1r.jpg'; }
								elseif ($color == 'mealux_red_r') { echo '2r.jpg'; }
								elseif ($color == 'mealux_green_r') { echo '3r.jpg'; }
							?>">
							<input class="button addtocar" <?php if ($url == 'piccolino' or $url == 'bambino' or $url == 'lavoro' or $url == 'volare' or $url == 'amare' or $url == 'cyt01' or $art == '15') { ?>disabled<?php } ?> name="button" type="submit" onclick="yaCounter15357751.reachGoal('CARTORDER'); return true;" value="В корзину">
						</form>
						<script>
						jQuery(document).ready(function ($) {
							$('.addtocar').click(function($){
							target: '#cartajax', 
							$("html, body").animate({scrollTop: 0});
							$('#menu li.cart').hide();
							});		
						})
						</script>
						<div class="delivery">
							<?php if ($url == 'piccolino' or $url == 'bambino' or $url == 'lavoro' or $url == 'volare' or $url == 'amare' or $url == 'cyt01') { ?>
								<p>Доставка - нет</p>
								<p>Самовывоз - нет</p>
							<?php } else { ?>
								<p>Доставка от <a href="/delivery.php">500 руб</a></p>
								<p>или <a href="/gde_kupit/">самовывоз</a></p>
							<?php } ?>
						</div>
					</div>
					<div class="one-half column">
						<h3>Способы оплаты:</h3>
						<div class="oplata">
							<p>Наличными в магазине</p>
							<p>Банковской картой</p>
							<p>Квитанцией в банке</p>
						</div>
					</div>
				</div>
				<?php if ($category == 'mealux') { ?>
					<div class="garanty-mealux">
						<p class="u-pull-left"><i class="fa fa-shield" aria-hidden="true"></i> Гарантия: <?php if ($category == "parta_bez_risunka" or $category == "parta_s_risunkom" or $category == "parta_iz_massiva" or $category == "white" or $category == "techno") { ?><span>5</span> лет<?php } else { ?><span>1</span> год<?php } ?></p>
						<p class="u-pull-right"><i class="fa fa-bookmark" aria-hidden="true"></i> Официальный дилер</p>
					</div>
				<?php } ?>
			</div>		
			<div class="garanty <?php if ($category == 'mealux') { echo 'mealux'; } ?>">
				<p class="u-pull-left"><i class="fa fa-shield" aria-hidden="true"></i> Гарантия: <?php if ($category == "parta_bez_risunka" or $category == "parta_s_risunkom" or $category == "parta_iz_massiva" or $category == "white" or $category == "techno") { ?><span>5</span> лет<?php } else { ?><span>1</span> год<?php } ?></p>
				<p class="u-pull-right"><i class="fa fa-bookmark" aria-hidden="true"></i> Официальный дилер</p>
			</div>			
		</div>
		<?php if ($category == 'ergonomichnyj_stul' or $category == 'fundesk' or $category == 'mealux') {} else { ?>
		<div class="row arrow-col">
			<div class="four columns">
				<div class="three columns">
					<img src="/img/arrow/h1.svg">
				</div>
				<div class="nine columns">
					<p><strong>Растущая парта для школьника</strong></p>
					<p><?php if ($url == '28' or $url == '29') { echo 'Стол парта «ДЭМИ» регулируется по высоте от 52,5 до 76,5 см (рост ребенка - от 120 до 168 см).'; } else { echo 'Стол парта «ДЭМИ» регулируется по высоте от 53 до 81,5 см (рост ребенка - от 120 до 198 см).'; } ?></p>
				</div>
			</div>
			<div class="four columns">
				<div class="three columns">
					<img src="/img/arrow/h2.svg">
				</div>
				<div class="nine columns">
					<p><strong>Наклон столешницы</strong></p>
					<p>Изменение угла наклона столешницы позволяет снять нагрузку с позвоночника.</p>
				</div>
			</div>
			<div class="four columns">
				<div class="three columns">
					<img src="/img/arrow/h4.svg">
				</div>
				<div class="nine columns">
					<p><strong>Детский стул</strong></p>
					<p>Детский стульчик <?php if ($category == 'fundesk') { echo 'FunDesk'; } else { echo '«Дэми»'; } ?> тоже растет вместе с ребенком, регулируясь и по высоте и по глубине.</p>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	
	<?php if ($url == 'comf_pro_oxford') {} else { ?>
	<div class="product_menu">
		<ul>
			<li class="left"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#product_about">Обзор</a></li>
			<li class="right"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#spec">Спецификация</a></li>
			<li class="left"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#accessories">Аксессуары</a></li>
			<li class="right"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>#product_otziv">Отзывы</a></li>
		</ul>
	</div>
	<?php } ?>
	<?php if ($url == '28') { ?>
		<div style="width:960px;margin:0 auto;padding:0;"><img src="/shop/img/28/IMG_3851.jpg" align="center" style="margin:0;padding:0;"></div>
	<?php } ?>
	<?php if ($dop_url == 'kompyuterniy-stol') { ?>
		<div style="width:960px;margin:0 auto;padding:0;"><img src="/shop/img/14-01/kompyuterniy-stol.jpg" align="center" style="margin:0;padding:0;"></div>
	<?php } ?>	
	
	<?php include $_SERVER['DOCUMENT_ROOT'] .'/shop/inc/tpl/product_about.php'; ?>