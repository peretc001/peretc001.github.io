<div id="filter_mobile" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">
			<div class="u-pull-right close"><a class="close_bar"><i class="fa fa-times" aria-hidden="true"></i></a></div>
			<div class="filter">
				<p class="package">Комплектация:</p>
				<ul class="package">
					<li><?php 	if ($package == 'parta_0_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Без стула</b>'; } else { ?><a href="/shop/parta_bez_risunka/index.php?art=<?php echo $art; ?>&package=parta_0_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Без стула</a><?php } ?></li>
					<li><?php 	if ($package == '' or $package == 'parta_1_stul') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Со стулом СУТ.01-01</b>'; } else { ?><a href="/shop/parta_bez_risunka/index.php?art=<?php echo $art; ?>&package=parta_1_stul"><i class="fa fa-square-o" aria-hidden="true"></i> Со стулом СУТ.01-01</a><?php } ?></li>
				</ul>
				<p class="model">Модель:</p>
				<ul class="model">
				<li><?php 	if ($art == '' or $art == '41') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.41</b>'; } else { ?><a href="/shop/parta_bez_risunka/index.php?art=41<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.41</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 75х55 см</span></li>
				<li><?php 	if ($art == '42') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.42</b>'; } else { ?><a href="/shop/parta_bez_risunka/index.php?art=42<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.42</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см</span></li>
				<li><?php 	if ($art == '14') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.14</b>'; } else { ?><a href="/shop/parta_bez_risunka/index.php?art=14<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.14</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 75х55 см</span></li>
				<li><?php 	if ($art == '17') { echo '<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>СУТ.17</b>'; } else { ?><a href="/shop/parta_bez_risunka/index.php?art=17<?php 	if ($package == 'parta_0_stul') { echo "&package=parta_0_stul"; } elseif ($package == 'parta_1_stul') { echo "&package=parta_1_stul"; } elseif ($package == 'parta_2_stul') { echo "&package=parta_2_stul"; }  ?>"><i class="fa fa-square-o" aria-hidden="true"></i> СУТ.17</a><?php } ?> <br><span><i class="fa fa-expand" aria-hidden="true"></i> 120х55 см (две столешницы)</span></li>
				</ul>
			</div>				
		</div>
	</div>