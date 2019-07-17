<div id="accessories">
	<div class="row">
		<h2>Похожие товары</h2>
		<div class="uk-slidenav-position" data-uk-slider>
			<div class="uk-slider-container">
				<ul class="uk-slider uk-grid-width-medium-1-4">
					<?php $enable_acessories = 'yes';
					if ($category == 'parta_iz_massiva') {
						$dop = mysql_query("SELECT * FROM `". $package ."` WHERE category = 'parta_iz_massiva' and url != '$url' order by id asc ");
					}
					elseif ($category == 'tumby_i_stellazhi') {
						$dop = mysql_query("SELECT * FROM `". $package ."` WHERE url != '$url' order by id asc ");
					}
					elseif ($category == 'dopolnitelnye_elementy') {
						$dop = mysql_query("SELECT * FROM `". $package ."` WHERE url != '$url' and id != '100' and id != '111' and id != '112' order by id asc ");
					}
					
					while( $row = mysql_fetch_array($dop) ) { ?>
						<li><a href="/shop/<?php echo $row['category']; ?>/<?php if ($row['category'] == 'parta_iz_massiva' and $row['art'] == '14' or $row['art'] == '17') { echo 'parta_cyt'; } ?><?php echo $row['url']; ?><?php if ($row['category'] == 'parta_iz_massiva' and $row['art'] == '14' or $row['art'] == '17') { echo '_so_stulom_cyt01-01'; } ?>.php"><img src="/shop/img/<?php echo $row['url']; ?>/<?php echo $row['img']; ?>" alt="<?php echo $row['name']; ?>"></a><br>
						<a class="name" href="/shop/<?php echo $row['category']; ?>/<?php if ($row['category'] == 'parta_iz_massiva' and $row['art'] == '14' or $row['art'] == '17') { echo 'parta_cyt'; } ?><?php echo $row['url']; ?><?php if ($row['category'] == 'parta_iz_massiva' and $row['art'] == '14' or $row['art'] == '17') { echo '_so_stulom_cyt01-01'; } ?>.php"><?php echo $row['name']; ?></a><br>
						<b><?php echo $row['price']; ?> <small>р.</small></b></li>
					<?php } ?>
				</ul>
			</div>
			<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
   			<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>

		</div>
	</div>	
</div>
