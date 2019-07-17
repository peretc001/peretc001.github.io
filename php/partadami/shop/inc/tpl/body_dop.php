	<div id="nav_menuid" class="product">
		<div class="row">
			<a href="/">Главная</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/shop/">Каталог товаров</a> <i class="fa fa-angle-right" aria-hidden="true"></i> <?php $menuid = mysql_query("SELECT * FROM ". $package ." WHERE url = '$url' ");
					$row = mysql_fetch_assoc($menuid); ?>
					<?php #Тумбы и стеллажи
						if ($category == 'tumby_i_stellazhi') { ?>
							<a href="/shop/tumby_i_stellazhi/">Тумбы и Стеллажи «ДЭМИ»</a>		
					<?php } #Чехлы
						elseif ($category == 'ergonomichnyj_stul') { ?>
							<a href="/shop/ergonomichnyj_stul/">Стулья и кресла</a>
					<?php } #Дополнительные элементы
						elseif ($category == 'dopolnitelnye_elementy') { ?>
							<a href="/shop/dopolnitelnye_elementy/">Дополнительные элементы</a>
					<?php } ?>  <i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo $row['name']; ?>
				
		</div>
	</div>
	<?php 	$cyt14 = mysql_query("SELECT * FROM ". $package ." `p` WHERE `p`.`url` = '$url' ");
			$row = mysql_fetch_array($cyt14)
	?>
	<div id="product_page">
		<div class="row product_box bottom">
			
			<div class="two-thirds column left">
				<div class="section">
					<div itemscope itemtype="http://schema.org/Product">
						<h1 itemprop="name"><?php echo $row['name']; ?></h1>
						<p style="display:none; margin:0; padding:0;">
							<span itemprop="brand"><?php if ($category == 'fundesk') { echo 'FunDesk';} else { echo 'ДЭМИ'; } ?></span>
							<span itemprop="description"><?php echo $row['desc']; ?></span>
							<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<span itemprop="price"><?php echo $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />РУБ.
								<span itemprop="image">http://www.partadami.ru/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?></span>
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
							<?php #Тумбы из массива
								if ($category == 'tumby_i_stellazhi' and $package == 'tumby_i_stellazhi_with_picture') { ?>
									<?php if ($url == 'cmd03-02r' or $url == 'cmd04-01r' or $url == 'cmd04-02r' or $url == 'cmd05r' or $url == 'cmd06r') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'tyv_greyf') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'tyv_greyc') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'tyv_brownf') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'tyv01r' or $url == 'tyv02r' or $url == 'tcn01r') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'tyv_greyf') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'tyv_greyc') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'tyv_brownf') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } ?>
								<?php } #Тумбы и стеллажи с рисунком
								elseif ($category == 'tumby_i_stellazhi' and $package == 'tumby_i_stellazhi') { ?>
									<?php if ($url == 'cmd03-01' or $url == 'cmd03-02' or $url == 'cmd04-01' or $url == 'cmd04-02' or $url == 'cmd05' or $url == 'cmd06') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'tyv_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'tyv_brown') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'tyv01' or $url == 'tyv02' or $url == 'tcn01') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'tyv_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'tyv_brown') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'tyv_beige') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'tyv_white_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/4.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } ?>
								<?php } #Чехлы
								elseif ($category == 'ergonomichnyj_stul' and $url == 'cyt03') { ?>
									<a href="/shop/img/cyt04/1.jpg" <?php if ($color == 'cyt_beige') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/cyt04/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'cyt_grey') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'cyt_pink') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'cyt_red') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/6.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'cyt_blue') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'cyt_green') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/4.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'cyt_orange') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/5.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								<?php } elseif ($category == 'ergonomichnyj_stul' and $url == 'cyt04') { ?>
									<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'cyt_beige') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'cyt_pink') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'cyt_blue') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'cyt_green') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/4.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
									<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'cyt_orange') {} else { ?> class="hidden_item"  <?php } ?>>
										<img src="/shop/img/<?php echo $row['url']; ?>/5.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
									</a>
								<?php } #Дополнительные элементы
									elseif ($category == 'dopolnitelnye_elementy') { ?>
									<?php if ($url == 'dop10' or $url == 'dop11') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'dop_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'dop4' or $url == 'dop5' or $url == 'dop6' or $url == 'dop7' or $url == 'dop8' or $url == 'dop9') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/0.jpg" <?php if ($color == 'beige') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/0.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'pink') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'blue') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'green') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/4.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'orange') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/5.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'brown') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/6.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'dop3') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'dop_beige') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/6.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'dop_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'dop_red') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'dop_blue') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'dop_green') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/4.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'dop_orange') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/5.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'dop2') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'dop_beige') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/6.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'dop_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'dop_pink') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'dop_blue') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'dop_green') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/4.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'dop_orange') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/5.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'dop1') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'dop_nnc') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'l3') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'white') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" class="hidden_item">
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" class="hidden_item">
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
									<?php } elseif ($url == 'dop12') { ?>	
										<a href="/shop/img/<?php echo $row['url']; ?>/6.jpg" <?php if ($color == 'dop_beige') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/6.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/1.jpg" <?php if ($color == 'dop_grey') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/1.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/2.jpg" <?php if ($color == 'dop_red') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/2.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/3.jpg" <?php if ($color == 'dop_blue') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/3.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/4.jpg" <?php if ($color == 'dop_green') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/4.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
										</a>
										<a href="/shop/img/<?php echo $row['url']; ?>/5.jpg" <?php if ($color == 'dop_orange') {} else { ?> class="hidden_item"  <?php } ?>>
											<img src="/shop/img/<?php echo $row['url']; ?>/5.png"  alt="<?php echo $row['name'] .' '.  $row['model'] ?>">
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
								<?php if ($category == 'tumby_i_stellazhi' and $package == 'tumby_i_stellazhi_with_picture') { ?>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_greyf"><img src="/shop/img/color/color_kfr.png" alt="Клен / Фрегат" title="Клен / Фрегат"></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_greyc"><img src="/shop/img/color/color_kcv.png" alt="Клен / Цвета" title="Клен / Цветы"></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_brownf"><img src="/shop/img/color/color_yfr.png" alt="Ябл / Фрегат" title="Ябл / Фрегат"></a></li>
								<?php } elseif ($package == 'tumby_i_stellazhi' and $package == 'tumby_i_stellazhi') { ?>
									<?php if ($url == 'cmd03-01' or $url == 'cmd03-02' or $url == 'cmd04-01' or $url == 'cmd04-02' or $url == 'cmd05' or $url == 'cmd06') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_grey"><i class="fa <?php if ($color == 'tyv_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_brown"><i class="fa <?php if ($color == 'tyv_brown') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  brown" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'tyv01' or $url == 'tyv02' or $url == 'tcn01') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_grey"><i class="fa <?php if ($color == 'tyv_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_brown"><i class="fa <?php if ($color == 'tyv_brown') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  brown" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_beige"><i class="fa <?php if ($color == 'tyv_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=tyv_white_grey"><i class="fa <?php if ($color == 'tyv_white_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  white" aria-hidden="true"></i></a></li>
									<?php } ?>
								
								
								<?php } #Чехлы
								elseif ($category == 'ergonomichnyj_stul' and $url == 'cyt03') { ?>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_beige"><i class="fa <?php if ($color == 'cyt_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_grey"><i class="fa <?php if ($color == 'cyt_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_pink"><i class="fa <?php if ($color == 'cyt_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_red"><i class="fa <?php if ($color == 'cyt_red') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  red" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_blue"><i class="fa <?php if ($color == 'cyt_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_green"><i class="fa <?php if ($color == 'cyt_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_orange"><i class="fa <?php if ($color == 'cyt_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
								<?php } elseif ($category == 'ergonomichnyj_stul' and $url == 'cyt04') { ?>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_beige"><i class="fa <?php if ($color == 'cyt_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_pink"><i class="fa <?php if ($color == 'cyt_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_blue"><i class="fa <?php if ($color == 'cyt_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_green"><i class="fa <?php if ($color == 'cyt_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
									<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=cyt_orange"><i class="fa <?php if ($color == 'cyt_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>

								<?php } elseif ($category == 'dopolnitelnye_elementy') { ?>
									<?php if ($url == 'dop10' or $url == 'dop11') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_grey"><i class="fa <?php if ($color == 'dop_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'dop4' or $url == 'dop5' or $url == 'dop6' or $url == 'dop7' or $url == 'dop8' or $url == 'dop9') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=beige"><i class="fa <?php if ($color == 'beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=grey"><i class="fa <?php if ($color == 'grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=pink"><i class="fa <?php if ($color == 'pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=blue"><i class="fa <?php if ($color == 'blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=green"><i class="fa <?php if ($color == 'green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=orange"><i class="fa <?php if ($color == 'orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=brown"><i class="fa <?php if ($color == 'brown') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  brown" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'dop3') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_beige"><i class="fa <?php if ($color == 'dop_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_grey"><i class="fa <?php if ($color == 'dop_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_red"><i class="fa <?php if ($color == 'dop_red') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_blue"><i class="fa <?php if ($color == 'dop_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_green"><i class="fa <?php if ($color == 'dop_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_orange"><i class="fa <?php if ($color == 'dop_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'dop2') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_beige"><i class="fa <?php if ($color == 'dop_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_grey"><i class="fa <?php if ($color == 'dop_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_pink"><i class="fa <?php if ($color == 'dop_pink') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_blue"><i class="fa <?php if ($color == 'dop_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_green"><i class="fa <?php if ($color == 'dop_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_orange"><i class="fa <?php if ($color == 'dop_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'dop1') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_nnc"><i class="fa <?php if ($color == 'dop_nnc') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  white" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'l3') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=white"><i class="fa <?php if ($color == 'white') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  white" aria-hidden="true"></i></a></li>
									<?php } elseif ($url == 'dop12') { ?>	
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_beige"><i class="fa <?php if ($color == 'dop_beige') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  beige" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_grey"><i class="fa <?php if ($color == 'dop_grey') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  grey" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_red"><i class="fa <?php if ($color == 'dop_red') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  pink" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_blue"><i class="fa <?php if ($color == 'dop_blue') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  blue" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_green"><i class="fa <?php if ($color == 'dop_green') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  green" aria-hidden="true"></i></a></li>
										<li><a href="<?php echo $_SERVER['PHP_SELF'] ?>?color=dop_orange"><i class="fa <?php if ($color == 'dop_orange') { ?>fa-circle<?php } else { ?>fa-square<?php } ?>  orange" aria-hidden="true"></i></a></li>
									<?php } ?>
								<?php }  ?>
							</ul>
						</div>
						<br>
						<div class="garanty <?php if ($category == 'mealux') { echo 'mealux'; } ?>">
							<p><i class="fa fa-shield" aria-hidden="true"></i> Гарантия: <span>1</span> год</p>
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
							#Черная пятница
							if ($_SESSION['black_friday'] == 'yes' and $url == 'tyv01r') {
								if ($color == 'tyv_greyf') { 
									$lpr = '5000'; 
									echo '<p class="bf"><span class="old">'. $row['price'] .'</span><br>';
									echo '<span class="text">Цена со скидкой</span></p>';
									
								} else { $lpr = $row['price']; }
							}
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
								if ($package == 'parta_0_stul' or $package == 'parta_0_white') { echo 'parta_bez_stula/'; } 
								elseif ($package == 'parta_2_stul') { echo 'parta_so_stulom/'; } 
								else {} 
							?><?php 
								if ($color == '' or $color == 'grey' or $color == 'beige' or $color == 'greyf' or $color == 'cyt_grey' or $color == 'cyt_beige' or $color == 'tyv_grey' or $color == 'tyv_greyf' or $color == 'dop_grey' or $color == 'dop_nnc' or $color == 'white' or $color == 'white_grey' or $color == 'pink_det' or $color == 'grey_det' or $color == 'beige_det' or $color == 'red_det_lev' or $color == 'red_det') { echo '1.png'; }
								elseif ($color == 'pink' or $color == 'pinkc' or $color == 'cyt_pink' or $color == 'tyv_brown' or $color == 'tyv_greyc' or $color == 'dop_pink' or $color == 'dop_red' or $color == 'white_red' or $color == 'blue_det' or $color == 'blue_det_nypogodi') { echo '2.png'; } 
								elseif ($color == 'blue' or $color == 'bluef' or $color == 'cyt_blue' or $color == 'tyv_brownf' or $color == 'tyv_beige' or $color == 'dop_blue' or $color == 'white_blue' or $color == 'green_det' or $color == 'green_det_gav') { echo '3.png'; } 
								elseif ($color == 'green' or $color == 'greenf' or $color == 'cyt_green' or $color == 'tyv_white_grey' or $color == 'dop_green' or $color == 'white_green' or $color == 'orange_det' or $color == 'orange_det_vinni') { echo '4.png'; } 
								elseif ($color == 'orange' or $color == 'orangef' or $color == 'cyt_orange'  or $color == 'dop_orange' or $color == 'white_orange' or $color == 'yellow_det' ) { echo '5.png'; } 
								elseif ($color == 'brown' or $color == 'brownf' or $color == 'cyt_beige' or $color == 'dop_beige') { echo '6.png'; } 
								elseif ($color == 'beige' or $color == 'cyt_white') { echo '0.png'; } 
								elseif ($color == 'fundesk_grey') { echo '1.png'; } elseif ($color == 'fundesk_pink') { echo '2.png'; } elseif ($color == 'fundesk_blue') { echo '3.png'; } 
								elseif ($color == 'ja_grey') { echo '1.png'; }
							?>">
							<input class="button addtocar" <?php if ($url == 'dop10' or $url == 'dop11') { ?>disabled<?php } ?> name="button" type="submit" onclick="yaCounter15357751.reachGoal('CARTORDER'); return true;" value="В корзину">
						</form>
						<div class="delivery">
							<?php if ($url == 'dop10' or $url == 'dop11') { ?>
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
			</div>		
			<div class="garanty <?php if ($category == 'mealux') { echo 'mealux'; } ?>">
				<p class="u-pull-left"><i class="fa fa-shield" aria-hidden="true"></i> Гарантия: <span>1</span> год</p>
				<p class="u-pull-right"><i class="fa fa-bookmark" aria-hidden="true"></i> Официальный дилер</p>
			</div>			
		</div>
		<br>
		<br>
	</div>
	<?php if ($category == 'tumby_i_stellazhi') { ?>
		<?php if ($url == 'tyv01' or $url == 'tyv02' or $url == 'tyv01r' or $url == 'tyv02r') { ?>	
			<div id="product_about_dop">
				<div class="row">
					<div class="fundesk">
						<div class="one-third column">
							<div class="wrap"><img src="/shop/img/tyv01/tyv00.png" alt="<?php echo $row['name']; ?>"></div>
						</div>
						<div class="two-thirds column justify">
							<p>Тумба нужна чтобы сложить все необходимые школьно-письменные принадлежности, у ребенка есть выдвижные лотки разной емкости и удобный пластиковый пенал для карандашей и ручек. Все школьные и письменные принадлежности разместятся в такой компактной тумбе. Наличие поворотных колес в тумбе позволяет легко перемещать ее по комнате. Благодаря тому, что тумба имеет цвета клена и яблони, а также серый цвет пластиковых деталей, ее можно подобрать к парте такой же расцветки и в результате у Вас дома получится целый детский офис. Ребенку и Вам  не нужно будет думать, где сложить все учебники и тетради, а также прочие необходимые принадлежности – все уместится в этой тумбе, а на рабочей поверхности парты не будет ничего лишнего, что загромождает ее. </p>
							<p>Выкатная тумба хотя и компактна, но вместительна. Ее вполне можно задвинуть под парту при необходимости. Также следует обратить внимание, что такая тумба будет хороша, если в комплекте мебели Дэми не предусмотрена подвесная тумба. Ведь даже если есть в комнате, например, книжные полки, то они могут быть размещены на такой высоте, что ребенку будет неудобно до них каждый раз добираться. А когда по его росту и всегда в пределах досягаемости есть тумба, то ему будет гораздо проще наводить порядок в своих вещах и просто убирать свои принадлежности в ящики тумбы. Кроме ящиков в подкатной тумбе имеется пенал для письменных принадлежностей. </p>
						</div>
					</div>
				</div>
			</div>
		<?php } elseif ($url == 'tcn01' or $url == 'tcn01r') { ?>	
			<div id="product_about_dop">
				<div class="row">
					<div class="fundesk">
						<div class="one-third column">
							<div class="wrap"><img src="/shop/img/tcn01/tcn00.png" alt="<?php echo $row['name']; ?>"></div>
						</div>
						<div class="two-thirds column justify">
							<p>Тумба нужна чтобы сложить все необходимые школьно-письменные принадлежности, у ребенка есть выдвижные лотки разной емкости и удобный пластиковый пенал для карандашей и ручек. Все школьные и письменные принадлежности разместятся в такой компактной тумбе. Благодаря тому, что тумба имеет цвета клена и яблони, а также серый цвет пластиковых деталей, ее можно подобрать к парте такой же расцветки и в результате у Вас дома получится целый детский офис. Ребенку и Вам  не нужно будет думать, где сложить все учебники и тетради, а также прочие необходимые принадлежности – все уместится в этой тумбе, а на рабочей поверхности парты не будет ничего лишнего, что загромождает ее. </p>
							<p>Подвесная тумба хотя и компактна, но вместительна. Ведь даже если есть в комнате, например, книжные полки, то они могут быть размещены на такой высоте, что ребенку будет неудобно до них каждый раз добираться. А когда по его росту и всегда в пределах досягаемости есть тумба, то ему будет гораздо проще наводить порядок в своих вещах и просто убирать свои принадлежности в ящики тумбы. Кроме ящиков в подвесной тумбе имеется пенал для письменных принадлежностей. </p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } elseif ($category == 'dopolnitelnye_elementy') { ?>
		<?php if ($url == 'dop3') { ?>
			<div id="product_about_dop">
				<div class="row">
					<div class="wrap"><img src="shop/img/dop3/7.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>"></div>
					<div class="wrap"><img src="shop/img/dop3/8.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>"></div>
					<div class="wrap"><img src="shop/img/dop3/9.jpg" alt="<?php echo $row['name'] .' '.  $row['model'] ?>"></div>
				</div>
			</div>
		<?php } elseif ($url == 'dop12') { ?>
			<div id="product_about_dop">
				<div class="row">
					<p class="justify">Удобный навесной органайзер для парты Вашего ребенка. Предназначен для канцелярских принадлежностей и других мелочей необходимых под рукой. 
					Крепиться к краю столешницы и при любом изменении угла наклона столешницы остается на месте, а предметы в нем не скатываются вниз. 
					Легко снимается и переставляется. Порядок на парте гарантирован!</p>
					<div class="wrap"><img src="shop/img/dop12/7.png" alt="<?php echo $row['name'] .' '.  $row['model'] ?>"></div>
				</div>
			</div>
		<?php } elseif ($url == 'l3') { ?>	
			<div id="product_about_dop">
				<div class="row">
					<div class="fundesk">
						<div class="one-third column">
							<div class="wrap"><img class="l3" src="/shop/img/l3/4.jpg" align="left"></div>
						</div>
						<div class="two-thirds column justify">
							<h2>Настольная светодиодная лампа с прищепкой FunDesk L3</h2>
							<p>Специальное крепление-фиксатор позволяет использовать лампу при любом наклоне столешницы. Гибкая стойка лампы с регулятором положения вверх-вниз и влево-вправо позволит направить освещение в нужном направлении.</p>
							<p>Светодиодная лампа FunDesk выполнена из высококачественных негорючих и нетоксичных материалов и не содержит паров ртути. Как известно, светодиодные лампы потребляют минимальное количество энергии.</p>
							<p>А трехуровневая сенсорная регулировка яркости позволит настроить освещение, максимально комфортное для глаз вашего ребенка.</p>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
	