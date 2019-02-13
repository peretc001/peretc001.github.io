<div id="menu">
	<div class="row">
		<ul>
			<li class="logo"><span class="logo"><a href="/">ПОЛИКАРБОНАТА.НЕТ</a></span><br><span class="desc">Купить поликарбонат в Краснодаре и крае</span></li>
			<li class="phone"><img src="/img/iphone.svg" alt="Phone"><img src="/img/whatsapp.svg" alt="Whatsapp"> <span class="phone">8 (918) 636-27-09</span></li>
			<li class="location"><i class="fa fa-address-card" aria-hidden="true"></i> <a href="/contact.php">Контакты</a></li>
			<li class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
				<?php	$cart = mysql_query("SELECT id FROM cart WHERE sid = '$sid'  "); 
						$query = mysql_fetch_assoc($cart); 
							if ( $query['id'] == '' ) { echo '<a class="cart">Корзина</a>';} 
							else { 
								$res = mysql_query("SELECT count(id) FROM cart WHERE sid = '$sid' ");
								$row = mysql_fetch_row($res);
								$qtys = $row[0]; // всего записей
								echo '<a class="cart" href="/catalog/cart.php">'. $qtys .' : <span>'; 
										
								$res = mysql_query("SELECT SUM(total) FROM cart WHERE sid = '$sid'  "); 
								$row = mysql_fetch_row($res);
								$totals = $row[0]; // всего записей
								echo number_format($totals, 0, ',', ' '); 
								echo " р</span></a>";
							}
				?>
			</li>
			<li class="insta"><i class="fa fa-instagram" aria-hidden="true"></i> <a href="https://www.instagram.com/polikarbonata.net_krd/" target="_blank">Мы в Instagram</a></li>
		</ul>
	</div>
</div>
<div id="menu_main">
	<div class="row">
		<ul class="menu">
			<li class="m1"><a href="/catalog/sotovy_polikarbonat/">Сотовый поликарбонат</a></li>
			<li class="m2"><a href="/catalog/monolitny_polikarbonat/">Монолитный поликарбонат</a></li>
			<li class="m3"><a href="/catalog/teplica_iz_polikarbonata/">Теплицы из поликарбоната</a></li>
			<li class="m4"><a href="/catalog/komplektujushhie_dly_polikarbonata/">Комплектующие</a></li>
		</ul>
	</div>
</div>
<div id="mobile_menu">
	<div class="row">
		<ul>
			<li class="home"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
			<li class="menu"><a href="#uk_menu" data-uk-offcanvas><i class="fa fa-bars" aria-hidden="true"></i> <span>Меню</span></a></li>
			<li class="contact"><a href="tel:8-918-636-27-09"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
			<li class="cart"><a href="/catalog/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> 
				<?php	$cart = mysql_query("SELECT id FROM cart WHERE sid = '$sid'  "); 
						$query = mysql_fetch_assoc($cart); 
							if ( $query['id'] == '' ) {} 
							else { 
								$res = mysql_query("SELECT count(id) FROM cart WHERE sid = '$sid' ");
								$row = mysql_fetch_row($res);
								$qtys = $row[0]; // всего записей
								echo $qtys; 
							}
				?></a>
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
			<div class="row top">
				<h3>Меню</h3>
				<div class="catalog">Каталог <i class="fa fa-caret-down" aria-hidden="true"></i></div>
				<div class="u-pull-left"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
				<ul class="catalog">
					<li><a href="/catalog/sotovy_polikarbonat/"><i class="fa fa-angle-right" aria-hidden="true"></i> Сотовый поликарбонат</a></li>
					<li><a href="/catalog/monolitny_polikarbonat/"><i class="fa fa-angle-right" aria-hidden="true"></i> Монолитный поликарбонат</a></li>
					<li><a href="/catalog/teplica_iz_polikarbonata/"><i class="fa fa-angle-right" aria-hidden="true"></i> Теплицы из поликарбоната</a></li>
					<li><a href="/catalog/komplektujushhie_dly_polikarbonata/"><i class="fa fa-angle-right" aria-hidden="true"></i> Комплектующие</a></li>
				</ul>
			</div>
			<div class="row bottom">
				<ul>	
					<li><a href="/sertificat.php">Сертификаты</a></li>
					<li><a href="/otziv.php">Отзывы</a></li>
					<li><a class="contact" href="/contact.php">Контакты</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>