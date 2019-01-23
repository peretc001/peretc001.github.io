<div id="menu">
	<div class="row">
		<ul>
			<li class="logo"><a href="/"><img src="/img/logo.svg" alt="АВТОНАКИДКИ.НЕТ"></a></li>
			<li class="phone"><img src="/img/iphone.svg" alt="Телефон"><img src="/img/whatsapp.svg" alt="Whatsapp"> <span class="phone">8 (918) 636-27-09</span></li>
			<li class="location"><i class="fa fa-address-card" aria-hidden="true"></i> <a href="/contact.php">Контакты</a></li>
			<li class="cart"><?php	
			
						$cart = $db->getRow('SELECT id FROM cart WHERE sid = ?s', $sid);
							if ( $cart == '' ) { echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>'; } 
							else { 
								$cart_numeric = $db->getRow('SELECT sum(qty) as qtys FROM cart WHERE sid = ?s', $sid);
								$qty = $cart_numeric['qtys'];
								echo '<a class="cart" href="/catalog/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> '. $qty .' : <span>'; 
										
								$cart_balance = $db->getRow('SELECT SUM(total) as sum FROM cart WHERE sid = ?s', $sid);
								echo number_format($cart_balance['sum'], 0, ',', ' '); 
								echo "</span> р.</a>";
							}
				?>
			</li>
			<li class="insta"><img src="/img/instagram.svg" alt="instagram"> <a href="https://www.instagram.com/avtonakidki_net/" target="_blank">avtonakidki</a></li>
		</ul>
	</div>
</div>
<div id="menu_main">
	<div class="row">
		<ul class="menu">
			<li><a href="/catalog/mex/">Меховые накидки</a></li>
			<li><a href="/catalog/sheep/">Накидки из овчины</a></li>
			<li><a href="/catalog/alcantara/">Накидки из алькантары</a></li>
			<li><a href="/catalog/len/">Накидки из льна</a></li>
			<li><a href="/catalog/velure/">Накидки из велюра</a></li>
			<li><a href="/catalog/kids/">Накидки детские</a></li>
		</ul>
	</div>
</div>
<div id="mobile_menu">
	<div class="row">
		<ul>
			<li class="menu"><a href="#uk_menu" data-uk-offcanvas><i class="fa fa-bars" aria-hidden="true"></i></a></li>
			<li class="home"><a href="/"><img src="/img/logo_white.svg" alt="АВТОНАКИДКИ.НЕТ"></a></li>
			<li class="cart"><?php if ($qty != '') { ?><a href="/catalog/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php echo $qty; ?></a><?php } else { ?><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php } ?>
			</li>
		</ul>
	</div>
</div>
<div class="separator"></div>
<!-- This is the off-canvas sidebar -->
<div id="mobile_menu_list">
	<div id="uk_menu" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">
			<div class="u-pull-right close"><a class="close_bar"><i class="fa fa-times" aria-hidden="true"></i></a></div>
			
			<div class="row">	
				<h3>Каталог</h3>
				<ul class="catalog">
					<li><a href="/catalog/mex/"><i class="fa fa-angle-right" aria-hidden="true"></i> Меховые накидки</a></li>
					<li><a href="/catalog/sheep/"><i class="fa fa-angle-right" aria-hidden="true"></i> Накидки из овчины</a></li>
					<li><a href="/catalog/alcantara/"><i class="fa fa-angle-right" aria-hidden="true"></i> Накидки из алькантары</a></li>
					<li><a href="/catalog/len/"><i class="fa fa-angle-right" aria-hidden="true"></i> Накидки из льна</a></li>
					<li><a href="/catalog/velure/"><i class="fa fa-angle-right" aria-hidden="true"></i> Накидки из велюра</a></li>
					<li><a href="/catalog/kids/"><i class="fa fa-angle-right" aria-hidden="true"></i> Накидки детские</a></li>
				</ul>
				
				<ul class="bottom_menu">	
					<li><a href="/delivery.php">Доставка</a></li>
					<li><a href="/sertificat.php">Сертификаты</a></li>
					<li><a class="contact" href="/contact.php">Контакты</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>