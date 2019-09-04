	<div id="nav_menuid" class="product">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?php $menuid = mysql_query("SELECT * FROM ". $package ." WHERE url = '$url' ");
					$row = mysql_fetch_assoc($menuid); ?>
					
				<?php #Выстариваем путь до карточки товара
				if ($category == 'parta_bez_risunka') { ?>
					<a href="/shop/parta_bez_risunka/">Парты «ДЭМИ» (ДЕМИ) без рисунка</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/parta_bez_risunka/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'parta_s_risunkom') 	{ ?>
					<a href="/shop/parta_s_risunkom/">Парты «ДЭМИ» с рисунком</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/parta_s_risunkom/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'techno') { ?>
					<a href="/shop/white.php">Белые парты «ДЭМИ»</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/techno/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'white') { ?>
					<a href="/shop/white.php">Белые парты «ДЭМИ»</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/white/cyt<?php echo $row['art']; ?>/">Модели серии СУТ <?php echo $row['art']; ?></a> <i class="fa fa-angle-right" aria-hidden="true"></i>
				<?php } elseif ($category == 'ergonomichnyj_stul') { ?>
					<a href="/shop/ergonomichnyj_stul/">Стулья и кресла</a> <i class="fa fa-angle-right" aria-hidden="true"></i> 
				<?php } if ($_SERVER['REQUEST_URI'] == '/stol-dly-shkolnika.php') { echo 'Стол для школьника ДЭМИ'; }  elseif ($_SERVER['REQUEST_URI'] == '/pismenny_stol.php') { echo 'Письменный стол для школьника'; } elseif ($_SERVER['REQUEST_URI'] == '/kompyuterniy-stol.php') { echo 'Компьютерный стол для школьника'; }  elseif ($_SERVER['REQUEST_URI'] == '/detskij_stol.php') { echo 'Детский стол для школьника'; } else { echo $row['name']; } ?>
				
		</div>
	</div>
	<?php 	$cyt14 = mysql_query("SELECT * FROM ". $package ." `p` WHERE `p`.`url` = '$url' ");
			$row = mysql_fetch_array($cyt14)
	?>
	<div id="product_page">
		<div class="row product_box<?php if ($category == 'ergonomichnyj_stul') { echo ' bottom'; } ?>">
			
			<div class="two-thirds column left">
				<div class="section">
					<div itemscope itemtype="http://schema.org/Product">
						<h1 itemprop="name"><?php echo $row['name']; ?></h1>
						<p style="display:none; margin:0; padding:0;">
							<span itemprop="brand">ДЭМИ</span>
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
						<div class="center product_img gallery">
							<p>
								<?php if ($category == 'ergonomichnyj_stul' and $url == 'cyt01') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'cyt_grey') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'cyt_pink') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'cyt_blue') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'cyt_green') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'cyt_orange') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								
								<?php } elseif ($category == 'ergonomichnyj_stul' and $url == 'cyt02') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/0.jpg" <?php if ($color == 'cyt_white') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/0.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'cyt_beige') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/6.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'cyt_grey') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'cyt_pink') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'cyt_blue') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'cyt_green') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'cyt_orange') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								<?php } elseif ($category == 'white' or $category == 'techno') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>1.jpg" <?php if ($color == '' or $color == 'white_grey' ) {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno')  { echo 'parta_bez_stula/'; } else {} ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno')  { echo 'parta_bez_stula/'; } else {} ?>2.jpg" <?php if ($color == 'white_red') {} else { ?>  class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>3.jpg" <?php if ($color == 'white_blue' )  {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>4.jpg" <?php if ($color == 'white_green') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>5.jpg" <?php if ($color == 'white_orange') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_white' or $package == 'parta_0_techno') { echo 'parta_bez_stula/'; } else {} ?>5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								
								<?php } elseif ($category == 'parta_bez_risunka') { 
									if ($art == '14' or $art == '17')  { ?>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.jpg" <?php if ($color == 'grey' or $color == 'ja_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul')  { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul')  { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>2.jpg" <?php if ($color == 'pink') {} else { ?>  class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>3.jpg" <?php if ($color == 'blue')  {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>4.jpg" <?php if ($color == 'green') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>5.jpg" <?php if ($color == 'orange') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>6.jpg" <?php if ($color == 'brown') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>6.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<?php if ($art == '14') { ?>
											 <a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>0.jpg" <?php if ($color == 'beige') {} else { ?> class="hidden_item"  <?php } ?>>
												<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } else {} ?>0.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
											</a>
										<?php } ?>
										
									<?php } elseif ($art == '41' or $art == '42' or $art == '43') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>1.jpg" <?php if ($color == 'sonoma_grey') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>1.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>2.jpg" <?php if ($color == 'sonoma_pink') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>2.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>3.jpg" <?php if ($color == 'sonoma_blue') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>3.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>4.jpg" <?php if ($color == 'sonoma_turquoise') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>4.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>5.jpg" <?php if ($color == 'sonoma_beige') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>5.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>6.jpg" <?php if ($color == 'dub_grey') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>6.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>7.jpg" <?php if ($color == 'dub_beige') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/<?php if ($package == 'parta_0_stul') { echo 'parta_bez_stula/'; } ?>7.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>								
								<?php } ?>
							<?php } ?>								
							</p>
						</div>
					</div>

					<div class="one-half column pack">
						<div class="color">
							<h2>Цветовая гамма:</h2>
							<ul>
								<?php if ($category == "parta_s_risunkom") { ?>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=greyf"><i class="fa <?php if ($color == 'greyf') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=pinkc"><i class="fa <?php if ($color == 'pinkc') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>	
								<?php } elseif ($category == "ergonomichnyj_stul") { ?>
								
									<?php if ($url == 'cyt01') { ?>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_grey"><i class="fa <?php if ($color == 'cyt_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_pink"><i class="fa <?php if ($color == 'cyt_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_blue"><i class="fa <?php if ($color == 'cyt_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_green"><i class="fa <?php if ($color == 'cyt_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_orange"><i class="fa <?php if ($color == 'cyt_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'cyt02') { ?>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_white"><i class="fa <?php if ($color == 'cyt_white') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  white" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_beige"><i class="fa <?php if ($color == 'cyt_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_grey"><i class="fa <?php if ($color == 'cyt_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_pink"><i class="fa <?php if ($color == 'cyt_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_blue"><i class="fa <?php if ($color == 'cyt_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_green"><i class="fa <?php if ($color == 'cyt_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_orange"><i class="fa <?php if ($color == 'cyt_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
									<?php } ?>
									
								<?php } elseif ($category == "white" or $category == "techno") { ?>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_grey"><i class="fa <?php if ($color == 'white_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_red"><i class="fa <?php if ($color == 'white_red') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> red" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_blue"><i class="fa <?php if ($color == 'white_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> blue" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_green"><i class="fa <?php if ($color == 'white_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> green" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white_orange"><i class="fa <?php if ($color == 'white_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> orange" aria-hidden="true"></i></a></li>
								
								<?php } elseif ($category == "parta_bez_risunka") { ?>
									<?php if ($art == '14' or $art == '17') { ?>
										<?php if ($art == '14') { ?>
											<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=beige"><i class="fa <?php if ($color == 'beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?> beige" aria-hidden="true"></i></a></li>
										<?php }  ?>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=grey"><i class="fa <?php if ($color == 'grey' or $color == 'ja_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=pink"><i class="fa <?php if ($color == 'pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=blue"><i class="fa <?php if ($color == 'blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=green"><i class="fa <?php if ($color == 'green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=orange"><i class="fa <?php if ($color == 'orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
										<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=brown"><i class="fa <?php if ($color == 'brown') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  brown" aria-hidden="true"></i></a></li>

								<?php }  elseif ($art == '41' or $art == '42' or $art == '43') { ?>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=sonoma_grey"><i class="fa <?php if ($color == 'sonoma_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=sonoma_pink"><i class="fa <?php if ($color == 'sonoma_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=sonoma_blue"><i class="fa <?php if ($color == 'sonoma_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=sonoma_turquoise"><i class="fa <?php if ($color == 'sonoma_turquoise') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  turquoise" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=sonoma_beige"><i class="fa <?php if ($color == 'sonoma_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dub_grey"><i class="fa <?php if ($color == 'dub_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<li><a class="refresh__item" href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dub_beige"><i class="fa <?php if ($color == 'dub_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
								<?php } ?>
							<?php } ?>
							</ul>
						</div>
						
						<div class="option">
							<?php if ($category == 'ergonomichnyj_stul') {} else { ?><h2>Комплектация:</h2>
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
						
						<div class="garanty">
							<p><i class="fa fa-shield" aria-hidden="true"></i> Гарантия: <?php if ($category == "parta_bez_risunka" or $category == "parta_s_risunkom" or $category == "white" or $category == "techno") { ?><span>5</span> лет<?php } else { ?><span>1</span> год<?php } ?></p>
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
								elseif ($color == 'ja_grey') { echo '1.png'; }
								elseif ($color == 'sonoma_grey') 		{ echo '1.png'; }
								elseif ($color == 'sonoma_pink') 		{ echo '2.png'; }
								elseif ($color == 'sonoma_blue') 		{ echo '3.png'; }
								elseif ($color == 'sonoma_turquoise') 	{ echo '4.png'; }
								elseif ($color == 'sonoma_beige') 		{ echo '5.png'; }
								elseif ($color == 'dub_grey') 			{ echo '6.png'; }
								elseif ($color == 'dub_beige') 			{ echo '7.png'; }

								
							?>">
							<input class="button addtocar" <?php if ($url == 'piccolino' or $url == 'bambino' or $url == 'lavoro' or $url == 'volare' or $url == 'amare' or $url == 'cyt01' or $art == '15') { ?>disabled<?php } ?> name="button" type="submit" value="В корзину" onclick="yaCounter15357751.reachGoal('CARTORDER'); return true;" >
						</form>
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