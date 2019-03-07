<!-- Main-menu -->
    <header class="header-main-menu"> <!-- Цвет линии между меню и верхним инф блоком - #efefef-->
        <ul>
            <li class="logo"><a href="/"><img src="/images/logo-main__logo-image.svg"></a></li>
            <li class="position">Не парься просто,<br>парься по-Суворовски!</li>
            <li class="phone">
                <span class="phone">
				<?php
					$id = 1300; // id страницы
					$post = get_page($id);
					$content = $post->post_content;
					echo $post->post_content;
				?>
				</span><br>    
                <a href="/contacts/"><?php
					$id = 1304; // id страницы
					$post = get_page($id);
					$content = $post->post_content;
					echo $post->post_content;
				?></a>
            </li>
			<li class="social">
				<?php
					$id = 1308; // id страницы
					$post = get_page($id);
					$content = $post->post_content;
					echo $post->post_content;
				?>
			</li>
        </ul> 
	</header>
	
	<!-- Mobile-menu -->
	<div class="mobile_header">
		<ul>
			<li class="mobile_menu">
				<a href="#uk_menu" data-uk-offcanvas><i class="fa fa-bars" aria-hidden="true"></i></a>
			</li>
			<li class="mobile_logo">
				<a href="/"><img class="logo-image" src="/images/logo-mobile.svg"></a>
			</li>
			<li class="mobile_phones">
				<a href="tel:<?php
					$id = 1300; // id страницы
					$post = get_page($id);
					$content = $post->post_content;
					echo $post->post_content;
				?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
			</li>
		</ul>
	</div>
	<div class="mobile-separator"></div>
	<div class="mobile_header_list">	
		<div id="uk_menu" class="uk-offcanvas">
			<div class="uk-offcanvas-bar">
				<div class="mobile-menu-list-block">
					<div class="logo"><a class="logo" href="/"><img src="/images/logo-mobile-menu.svg"></a></div>
					<h3>Меню:</h3>
					<ul>
						<li class="list"><a href="/meropriyatiya/">Мероприятия</a></li><li class="list"><a><span>Услуги</span></a>
							<ul class="child">
								<li><a href="/pareniya-i-ix-vidy/">Парения</a></li>
								<li><a href="/spa/">SPA</a></li>
								<li><a href="/o-chajnoj/">Необычная чайная</a></li>
								<li><a href="/russkaya-kuxnya/">Русская кухня</a></li>
							</ul>
						</li><li class="list"><a href="/nashe-menyu/"><span>Наше меню</span></a></li>
						<li class="list"><a><span>О нас</span></a>
							<ul class="child">
								<li><a href="/o-nas/">О нас</a></li>
								<li><a href="/o-nas/#sb_diplom">Награды</a></li>
								<li><a href="/o-nas/#sb_interrior">Интерьер</a></li>
								<li><a href="/o-nas/#sb_video">Видео галерея</a></li>
							</ul>
						</li><li class="list"><a href="/club/"><span>Банный клуб</span></a></li><li class="list"><a href="/contact/"><span>Контакты</span></a></li>
					</ul>
					<ul>
						<li class="social">
							<a target="_blank" href="https://vk.com/sbani_krd" rel="noopener"><img src="/images/social/1.svg"/></a>
							<a target="_blank" href="https://www.facebook.com/BaniSuvorovskie/" rel="noopener"><img src="/images/social/2.svg" /></a>
							<a target="_blank" href="https://instagram.com/sbani_krd/" rel="noopener"><img src="/images/social/3.svg"/></a>
						</li>
					</ul>						
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-separator"></div>
	<!-- Mobile-menu - end -->
	
	<!-- Main-menu -->
	<div class="dropmenu">
        <ul>
			<li class="list"><a href="/meropriyatiya/">Мероприятия</a></li><li class="list"><a>Услуги <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<ul class="drop">
					<li><a href="/pareniya-i-ix-vidy/">Парения</a></li>
					<li><a href="/spa/">SPA</a></li>
					<li><a href="/o-chajnoj/">Необычная чайная</a></li>
					<li><a href="/russkaya-kuxnya/">Русская кухня</a></li>
				</ul>
			</li>
			<li class="list"><a href="/nashe-menyu/"><span>Наше меню</span></a></li>
			<li class="list"><a>О нас <i class="fa fa-angle-down" aria-hidden="true"></i></a>
				<ul class="drop">
					<li><a href="/o-nas/">О нас</a></li>
					<li><a href="/o-nas/#sb_diplom">Награды</a></li>
					<li><a href="/o-nas/#sb_interrior">Интерьер</a></li>
					<li><a href="/o-nas/#sb_video">Видео галерея</a></li>
				</ul>
			</li><li class="list"><a href="/club/">Банный клуб</a></li><li class="list"><a href="/contact/">Контакты</a></li>
		</ul>
	</div>
	<!-- Main-menu - end -->
	