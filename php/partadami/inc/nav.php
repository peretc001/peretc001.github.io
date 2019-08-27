<nav class="nav">
	<div class="nav-menu">
		<button class="navbar-toggler hamburger hamburger--slider" type="button">
         <span class="hamburger-box">
            <span class="hamburger-inner"></span>
         </span>
      </button>
		<a href="/" class="brand">
			<img src="/img/logo.svg" alt="Парты ДЕМИ Краснодар">
			<p>
				<strong>Парты ДЭМИ</strong>
				<span>официальный дилер в Краснодаре</span>
			</p>
		</a>
		<a class="nav-menu__phone" href="tel:79882428105"><i class="fa fa-mobile" aria-hidden="true"></i> <span>8 (988) 242-81-05</span></a>
		<a class="whatsapp" href="https://api.whatsapp.com/send?phone=79282102335&text=Добрый%20день.%20Меня%20интересуют%20парты%20ДЭМИ.%20Свяжитесь%20со%20мной" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> <span>Написать в</span> Whatsapp</a>
		<a class="nav-menu__callback myModal"><i class="fa fa-phone" aria-hidden="true"></i>Заказать звонок</a>
		<a class="nav-menu__sale" href="/akcia/"><i class="fa fa-percent" aria-hidden="true"></i> Акция</a>
		<?php	
				$cart = mysql_query("SELECT id FROM cart WHERE sid = '". session_id() ."'  "); 
				$query = mysql_fetch_assoc($cart); 
					if ( $query['id'] == '' ) { ?>
					<a class="nav-menu__cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
				<?php }
					else { 
						$res = mysql_query("SELECT count(id) FROM cart WHERE sid = '". session_id() ."' ");
						$row = mysql_fetch_row($res);
						$qtys = $row[0]; // всего записей ?>

					<a class="nav-menu__cart" href="/shop/shoppingcart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php echo $qtys; ?> 
				<?php		
						$res = mysql_query("SELECT SUM(total) FROM cart WHERE sid = '". session_id() ."'  "); 
						$row = mysql_fetch_row($res);
						$totals = $row[0]; // всего записей
						echo '<span> : ';
						echo number_format($totals, 0, ',', ' ') .' p';
						echo '</span></a>';
					} ?>
				<span class="cartajax"></span>
	</div>
	<div class="nav-catalog">
		<div class="container">
			<a class="nav-catalog__title" href="/shop/"><i class="fa fa-bars" aria-hidden="true"></i> <span>Каталог товаров</span></a>
			<a href="/shop/parta_bez_risunka/">Парты ДЭМИ</a>
			<a href="/shop/white.php">Белые парты</a>
			<a href="/shop/ergonomichnyj_stul/">Стулья и кресла</a>
			<a href="/shop/dopolnitelnye_elementy/">Аксессуары</a>
			<a href="/shop/tumby_i_stellazhi/">Тумбы и стеллажи</a>
			<a class="action" href="/akcia/">Акции</a>
			<a class="nav-catalog__garanty" href="/delivery.php">Доставка</a>
			<a class="nav-catalog__review" href="/settingup.php">Сборка</a>
			<a class="nav-catalog__review" href="/garanty.php">Гарантия</a>
			<a class="nav-catalog__review" href="/otziv.php">Отзывы</a>
			<a class="nav-catalog__school" href="/shkolnaya-mebel.php">Для школ</a>
			<a class="nav-catalog__contact" href="/gde_kupit/">Контакты</a>
		</div>
	</div>
</nav>