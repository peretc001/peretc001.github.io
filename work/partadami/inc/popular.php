<div id="popular">
	<div class="introHolder">
		<h3>Самые популярные товары</h3>
	</div>		
	<div class="row">
		<div class="one-third column box">
			<? #CYT.14-01-К
				$cyt14 = mysql_query("SELECT * FROM `parta_0_stul` `p` WHERE `p`.`id` = '6' ");
						while( $row = mysql_fetch_array($cyt14) )
			{  
			$prod_url = '/shop/'. $row['category'] .'/cyt'. $row['art'] .'/bez_stula/parta_cyt'. $row['url'];
			?>
			<div itemscope itemtype="http://schema.org/Product">
				<p class="name"><a itemprop="url" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=grey"><span itemprop="name"><b><?php echo $row['name']; ?></b></span></a></p>
				<p class="model">Модель: <?php echo $row['model']; ?></p>
				<p style="display:none; margin:0; padding:0;">
					<span itemprop="brand">ДЭМИ</span>
					<span itemprop="description"><?php echo $row['desc']; ?></span>
					<img itemprop="image" src="/shop/img/<?php echo $row['url']; ?>/parta_bez_stula/1.png" />
				</p>
				<dl class="star-rating">
				<?php } $query=mysql_query("SELECT SUM(total_value) as value, SUM(total_votes) as vote  FROM gb WHERE url = '14-01-К'  "); 
							$query=mysql_fetch_assoc($query); 
								$totals = $query['value']/$query['vote'];
								$total =  substr($totals, 0, 3); 
					?>
					<ol class="star">
						<?php echo '<li class="stars" style="width:'. $total*16 .'px"><span>&nbsp;</span></li>'; ?>
					</ol>
					<ol>
						<li> 
							<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
							<span style="display:none;" itemprop="ratingValue"><?php echo $total; ?></span>
								<div class="str">Отзывов: <meta itemprop="reviewCount" content="<?php echo $query['vote'];  ?>" /><span itemprop="ratingCount"><?php echo $query['vote'];  ?></span> <a href="<?php echo $prod_url; ?>.php#product_otziv"><?php echo $query['vote'];  ?></a></div>
							</div>
						</li>
					</ol>
				</dl>
				<? $cyt14 = mysql_query("SELECT * FROM `parta_0_stul` `p` WHERE `p`.`id` = '6' ");
						while( $row = mysql_fetch_array($cyt14) )
			{  ?>
				<p class="img" align="center"><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=grey"><img src="/shop/img/<?php echo $row['url']; ?>/parta_bez_stula/1.png" alt="<?php echo $row['desc']; ?>"></a></p>
				<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
					<p class="price"><span itemprop="price" class="new"><?php echo $lpr = $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />РУБ.
					<a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=grey">Купить</a></p>
				</div>
			</div>
			<? } ?>
		</div>
		<div class="one-third column box">
			<? #CYT.14-02
				$cyt14 = mysql_query("SELECT * FROM `parta_0_stul` `p` WHERE `p`.`id` = '34' ");
						while( $row = mysql_fetch_array($cyt14) )
			{  
			$prod_url = '/shop/'. $row['category'] .'/cyt'. $row['art'] .'/bez_stula/parta_cyt'. $row['url'];
			?>
			<div itemscope itemtype="http://schema.org/Product">
				<p class="name"><a itemprop="url" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=pink"><span itemprop="name"><b><?php echo $row['name']; ?></b></span></a></p>
				<p class="model">Модель: <?php echo $row['model']; ?></p>
				<p style="display:none; margin:0; padding:0;">
					<span itemprop="brand">ДЭМИ</span>
					<span itemprop="description"><?php echo $row['desc']; ?></span>
					<img itemprop="image" src="/shop/img/<?php echo $row['url']; ?>/parta_bez_stula/2.png" />
				</p>
				<dl class="star-rating">
				<?php } $query=mysql_query("SELECT SUM(total_value) as value, SUM(total_votes) as vote  FROM gb WHERE url = '17-03'  "); 
							$query=mysql_fetch_assoc($query); 
								$totals = $query['value']/$query['vote'];
								$total =  substr($totals, 0, 3); 
					?>
					<ol class="star">
						<?php echo '<li class="stars" style="width:'. $total*16 .'px"><span>&nbsp;</span></li>'; ?>
					</ol>
					<ol>
						<li> 
							<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
							<span style="display:none;" itemprop="ratingValue"><?php echo $total; ?></span>
								<div class="str">Отзывов: <meta itemprop="reviewCount" content="<?php echo $query['vote'];  ?>" /><span itemprop="ratingCount"><?php echo $query['vote'];  ?></span> <a href="<?php echo $prod_url; ?>.php#product_otziv"><?php echo $query['vote'];  ?></a></div>
							</div>
						</li>
					</ol>
				</dl>
				<? $cyt14 = mysql_query("SELECT * FROM `parta_0_stul` `p` WHERE `p`.`id` = '34' ");
						while( $row = mysql_fetch_array($cyt14) )
			{  ?>
				<p class="img" align="center"><a href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=pink"><img src="/shop/img/<?php echo $row['url']; ?>/parta_bez_stula/2.png" alt="<?php echo $row['desc']; ?>"></a></p>
				<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
					<p class="price"><span itemprop="price" class="new"><?php $lpr = $row['price']; 
										echo $lpr; ?></span> <meta itemprop="priceCurrency" content="RUB" />РУБ.
					<a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/cyt<?php echo $row['art']; ?>/bez_stula/parta_cyt<?php echo $row['url']; ?>.php?color=pink">Купить</a></p>
				</div>
			</div>
			<? } ?>
			
		</div>
	
			
		<div class="one-third column box">
			<? $cyt14 = mysql_query("SELECT * FROM `ergonomichnyj_stul` WHERE id = '96' "); 
						while( $row = mysql_fetch_array($cyt14) )
			{  
			$prod_url = '/shop/'. $row['category'] .'/stul_dami_'. $row['url'];
			?>
			<div itemscope itemtype="http://schema.org/Product">
				<p class="name"><a itemprop="url" href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php"><span itemprop="name"><b><?php echo $row['name']; ?></b></span></a></p>
				<p class="model">Модель: <?php echo $row['model']; ?></p>
				<p style="display:none; margin:0; padding:0;">
					<span itemprop="brand">ДЭМИ</span>
					<span itemprop="description"><?php echo $row['desc']; ?></span>
				</p>
				<dl class="star-rating">
				<?php } $query=mysql_query("SELECT SUM(total_value) as value, SUM(total_votes) as vote  FROM gb WHERE url = 'stul_dami_cyt01-01'  "); 
							$query=mysql_fetch_assoc($query); 
								$totals = $query['value']/$query['vote'];
								$total =  substr($totals, 0, 3); 
					?>
					<ol class="star">
						<?php echo '<li class="stars" style="width:'. $total*16 .'px"><span>&nbsp;</span></li>'; ?>
					</ol>
					<ol>
						<li> 
							<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
							<span style="display:none;" itemprop="ratingValue"><?php echo $total; ?></span>
								<div class="str">Отзывов: <meta itemprop="reviewCount" content="<?php echo $query['vote'];  ?>" /><span itemprop="ratingCount"><?php echo $query['vote'];  ?></span> <a href="<?php echo $prod_url; ?>.php#product_otziv"><?php echo $query['vote'];  ?></a></div>
							</div>
						</li>
					</ol>
				</dl>
				<? $cyt14 = mysql_query("SELECT * FROM `ergonomichnyj_stul` WHERE id = '96' "); 
						while( $row = mysql_fetch_array($cyt14) )
			{  ?>
				<p class="img" align="center"><a href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php"><img src="/shop/img/cyt02/0.png" alt="Детское ортопедическое кресло Mealux Comf-pro Match"></a></p>
				<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
					<p class="price"><span itemprop="price" class="new"><?php echo $row['price']; ?></span> <meta itemprop="priceCurrency" content="RUB" />РУБ.
					<a class="button button-primary" href="/shop/<?php echo $row['category']; ?>/stul_dami_<?php echo $row['url']; ?>.php">Купить</a></p>
				</div>
			</div>
			<? } ?>
		</div>
	</div>
	<div class="row">
		<div class="twelve columns box desk">
			<ul>
				<li><img src="img/desk.svg"></li>
				<li>скидка на стул «ДЭМИ»<br><small>при покупке с партой</small></li>
				<li><span class="sale">-25%</span></li>
			</ul>
		</div>
	</div>	
</div>