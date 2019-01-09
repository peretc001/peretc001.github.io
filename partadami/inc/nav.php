<!-- <div id="nav_msg"></div> -->
<div id="top">
	<div class="row">
		<ul>
			<li class="location"><a href="/gde_kupit/"><i class="fa fa-map-marker" aria-hidden="true"></i> Адреса магазинов</a></li>
			<li><a href="/delivery.php">Доставка</a></li>
			<li><a href="/settingup.php">Сборка</a></li>
			<li><a href="/garanty.php">Гарантия</a></li>
			<li><a href="/otziv.php">Отзывы</a></li>
			<li><a href="/oplata.php">Оплата</a></li>
			<li><a href="/exchange.php">Возврат</a></li>
			<li><a href="/certificate.php">Сертификаты</a></li>
		</ul>
	</div>
</div>
<div id="menu">
	<div class="row">
		<ul>
			<li class="logo"><a href="/"><img src="/img/logo.svg" alt="Парта ДЭМИ, парта трансформер ДЕМИ"></a></li>
			<li class="name"><a href="/"><b>Парты трансформеры</b><br><span>официальный дилер «ДЭМИ»</span></a></li>
			<li class="phone">Телефон: <br><span class="phone">8 (988) 242-81-05</span></li>
			<li class="contact"><span>Краснодар:</span> <br><a href="/gde_kupit/">ул. Тургенева, 56</a></li>
			<li class="akcia"><i class="fa fa-percent" aria-hidden="true"></i> <a href="/akcia/">Акции</a></li>
			<li class="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php	
				$sid = session_id();
				$cart = mysql_query("SELECT id FROM cart WHERE sid = '$sid'  "); 
				$query = mysql_fetch_assoc($cart); 
					if ( $query['id'] == '' ) { echo '<a class="cart">Корзина</a>';} 
					else { 
						$res = mysql_query("SELECT count(id) FROM cart WHERE sid = '$sid' ");
						$row = mysql_fetch_row($res);
						$qtys = $row[0]; // всего записей
						echo '<a class="cart" href="/shop/shoppingcart.php">'. $qtys .' : <span>'; 
								
						$res = mysql_query("SELECT SUM(total) FROM cart WHERE sid = '$sid'  "); 
						$row = mysql_fetch_row($res);
						$totals = $row[0]; // всего записей
						echo number_format($totals, 0, ',', ' '); 
						echo " р</span></a>";
					}
				?></li>
			<li class="cartajax"></li>
		</ul>
	</div>
</div>
<div id="nav_phone">
	<div class="row">
		<ul>
			<li class="home"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
			<li class="menu"><a href="#uk_menu" data-uk-offcanvas><i class="fa fa-bars" aria-hidden="true"></i> Меню</a></li>
			<li class="contact"><a href="#uk_contact" data-uk-offcanvas><i class="fa fa-phone" aria-hidden="true"></i> Контакты</a></li>
			<li class="cart"><?php	
					$sid = session_id();
					$cart = mysql_query("SELECT id FROM cart WHERE sid = '$sid'  "); 
					$query = mysql_fetch_assoc($cart); 
						if ( $query['id'] == '' ) { echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';} 
						else { 
							$res = mysql_query("SELECT count(id) FROM cart WHERE sid = '$sid' ");
							$row = mysql_fetch_row($res);
							$qtys = $row[0]; // всего записей
							echo '<a class="cart" href="/shop/shoppingcart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> '. $qtys .'</a>';
						}
				?></li>
		</ul>
	</div>
</div>
<div id="leftmenu_nav">
	<div class="row">
		<ul>
			<li class="catalog_name"><a><i class="fa fa-bars" aria-hidden="true"></i> Каталог товаров <i class="fa fa-caret-down" aria-hidden="true"></i></a>
				<div class="nav_menu_hide">
					<div class="row">
					<ul>
						<li><a href="/shop/parta_bez_risunka/">
							<img src="/img/nav_menu/1.png" alt="ПАРТЫ без РИСУНКА «ДЭМИ»"><br>
							ПАРТЫ ДЭМИ</a>
						</li>
						<li><a href="/shop/white.php">
							<img src="/img/nav_menu/4.png" alt="БЕЛЫЕ ПАРТЫ"><br>
							БЕЛЫЕ ПАРТЫ</a>
						</li>
						<li><a href="/shop/ergonomichnyj_stul/">
							<img src="/img/nav_menu/7.png" alt="Эргономичные стулья «ДЭМИ»"><br>
							Стулья и кресла</a>
						</li>
						<li><a href="/shop/dopolnitelnye_elementy/">
							<img src="/img/nav_menu/9.png" alt="Дополнительные элементы"><br>
							Аксессуары</a>
						</li>
						
					</ul>
					</div>
					<div class="row">
					<ul>
						<li><a href="/shop/tumby_i_stellazhi/">
							<img src="/img/nav_menu/6.png" alt="ТУМБЫ и СТЕЛЛАЖИ «ДЭМИ»"><br>
							ТУМБЫ и СТЕЛЛАЖИ «ДЭМИ»</a>
						</li>
						<li><a href="/shop/parta_s_risunkom/">
							<img src="/img/nav_menu/2.png" alt="ПАРТЫ с РИСУНКОМ «ДЭМИ»"><br>
							ПАРТЫ с РИСУНКОМ</a>
						</li>
						<li><a href="/shop/parta_iz_massiva/">
							<img src="/img/nav_menu/3.png" alt="ПАРТЫ из МАССИВА «ДЭМИ»"><br>
							ПАРТЫ и ТУМБЫ из БЕРЕЗЫ</a>
						</li>
						<li class="none">&nbsp;</li>
					</ul>
					</div>
				</div>
			</li>
			<li><a href="/shop/parta_bez_risunka/">Парты ДЭМИ</a></li>
			<li><a href="/shop/white.php">Белые парты</a></li>
			<li><a href="/shop/ergonomichnyj_stul/">Стулья и кресла</a></li>
			<li><a href="/shop/dopolnitelnye_elementy/">Аксессуары</a></li>
			<li><a href="/shop/tumby_i_stellazhi/">Тумбы и стеллажи</a></li>
		</ul>
	</div>
</div>
<script src="/js/catalog/nav_menu.js"></script>
